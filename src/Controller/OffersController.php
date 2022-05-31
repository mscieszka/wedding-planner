<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Collection\Collection;
use Cake\Datasource\ConnectionManager;

/**
 * Offers Controller
 *
 * @property \App\Model\Table\OffersTable $Offers
 * @method \App\Model\Entity\Offer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OffersController extends AppController
{

    public function initialize(): void
    {
        parent::initialize();
        $this->paginate = [
            'contain' => ['Users', 'Categories', 'Addresses'],
        ];

    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index($onlymyoffer = null)
    {

        $this->Authorization->skipAuthorization();
        $account_type_id = $this->request->getAttribute('identity')->get('account_type_id');
        $id_user_log = $this->request->getAttribute('identity')->getIdentifier();

        //then display all offers
        if ($onlymyoffer == null) {
            if($account_type_id == 1) $onlymyoffer = 2;
                else if($account_type_id == 2) $onlymyoffer = 1;

        }
        //tylko oferty providera zalogowanego "My offers" lub tylko oferty klienta "My saved offers"
        //ale to zabezpieczone w templates
        // onlymyoffrs = 1 lub =2


        //provider
        if($onlymyoffer == 1){
            $offers = $this->paginate($this->Offers->find()->where(
                ['offers.user_id' => $this->request->getAttribute('identity')->getIdentifier()]
            ));
        }

        //klient
            else if($onlymyoffer == 2){
                $offers = $this->paginate($this->Offers->find());
            }

        $saved_user_offers = $this->Offers->SavedUserOffers->find()
            ->where([
                'user_id' => $this->request->getAttribute('identity')->getIdentifier()
            ])->toArray();
        $saved_user_offers = (new Collection($saved_user_offers))->extract('offer_id')->toList();
        $this->set(compact('offers', 'onlymyoffer', 'account_type_id', 'saved_user_offers', 'id_user_log'));

    }

    /**
     * View method
     *
     * @param string|null $id Offer id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    public function view($id)
    {
        $this->Authorization->skipAuthorization();
        $account_type_id = $this->request->getAttribute('identity')->get('account_type_id');

        //then display ratings for this offer

            $ratings = $this->Offers->Ratings->find()->where(['offer_id' => $id])->contain(['Offers', 'Users']);

//dodawanie!

        $rating = $this->Offers->Ratings->newEmptyEntity();
        $this->Authorization->authorize($rating);
        if ($this->request->is('post')) {
            $rating = $this->Offers->Ratings->patchEntity($rating, $this->request->getData());
           $rating->user_id = $this->request->getAttribute('identity')->getIdentifier();
           $rating->offer_id = $id;
           // $rating->rating = 4;
            $rating->opinion_date = date("Y-m-d");

            if ($this->Offers->Ratings->save($rating)) {
                $this->Flash->success(__('The rating has been saved.'));


                return $this->redirect(['controller' => 'Offers', 'action' => 'view', $id]);
            }
            $this->Flash->error(__('The rating could not be saved. Please, try again.'));
        }
        $users = $this->Offers->Ratings->Users->find('list', ['limit' => 200])->all();
        $offers = $this->Offers->Ratings->Offers->find('list', ['limit' => 200])->all();

        $offer = $this->Offers->get($id, [
            'contain' => ['Users', 'Categories', 'Addresses', 'Bookings', 'CateringFilters', 'HallFilters',
                'MusicFilters', 'OfferActiveDays', 'Ratings',
                'SavedUserOffers'
            ],
        ]);

//debug($offer); exit;
        $offer_type_id = $offer->category_id;
        $id_user_log = $this->request->getAttribute('identity')->getIdentifier();
        $categories = $this->Offers->Categories->find('list', ['limit' => 200])->where(['id' => $offer_type_id]);
        $provinces = $this->Offers->Addresses->Provinces->find('list', ['limit' => 200])->all();

        $booked_dates = $this->getBookedOfferDates($id);
        $active_offer_days = $this->date_range(date('Y-m-d'), date('Y-m-d', strtotime(date('Y-m-d').' +300 days')), $offer['offer_active_day'], $booked_dates);
        $booking = $this->getTableLocator()->get('Bookings')->newEmptyEntity();
        $booking->offer_id = $id;



        $saved_user_offers = $this->Offers->SavedUserOffers->find()
            ->where([
                'user_id' => $this->request->getAttribute('identity')->getIdentifier()
            ])->toArray();
        $saved_user_offers = (new Collection($saved_user_offers))->extract('offer_id')->toList();


        $this->set(compact('offer', 'account_type_id', 'id_user_log', 'categories', 'provinces', 'active_offer_days', 'booking', 'ratings', 'users', 'offers','saved_user_offers'));

    }

    private function getBookedOfferDates($offer_id) {
        $arr = [];
        $arr = $this->Offers->Bookings->find('list')->select(['booking_date'])->where(['offer_id'=>$offer_id])->toArray();
        $arr = json_decode(json_encode($arr), true);
//        debug($arr); exit;
        return $arr;
    }

    private function getActiveOfferDays($active_offer_days) {
        $arr = [];
        $weekdays = ['monday','tuesday','wednesday','thursday','friday','saturday','sunday'];
        foreach ($weekdays as $weekday) {
            if($active_offer_days[$weekday]) {
                $arr[] = date("N",strtotime($weekday));
            }
        }
        return $arr;
    }

    private function date_range($first, $last, $active_offer_days, $booked_offer_days, $step = '+1 day', $output_format = 'Y-m-d') {

//        debug($active_offer_days);
//        debug(date("N",strtotime("wednesday")));
//        debug(date("N",strtotime("2022-05-28")));
//        exit;
        $active_offer_days = $this->getActiveOfferDays($active_offer_days);
        $dates = array();
        $current = strtotime($first);
        $last = strtotime($last);

        while( $current <= $last ) {
            if(in_array(date("N",$current),$active_offer_days) && !in_array(date('Y-m-d',$current), $booked_offer_days)) {
                $dates[date($output_format, $current)] = date($output_format, $current);
            }
            $current = strtotime($step, $current);
        }

        return $dates;
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($offer_type_id = null)
    {
        //$this->Authorization->authorize($address);

        $offer = $this->Offers->newEmptyEntity();
        $this->Authorization->authorize($offer);

        $account_type_id = $this->request->getAttribute('identity')->get('account_type_id');

        if ($offer_type_id == null) {
            $template = 'add_home';
            $this->set(compact('account_type_id'));
            $this->render($template);
            return;
        }


        if ($this->request->is('post')) {
            $conn = ConnectionManager::get('default');
            $conn->begin();
            try {

                $address = $this->Offers->Addresses->newEntity($this->request->getData('address'));
                $address->user_id = $this->request->getAttribute('identity')->getIdentifier();
                $this->Offers->Addresses->saveOrFail($address);

                $data = $this->request->getData();
                unset($data['address']);
                $offer = $this->Offers->patchEntity($offer, $data );
                $offer->address_id = $address->get('id');
                $offer->user_id = $this->request->getAttribute('identity')->getIdentifier();
                $offer->category_id = $offer_type_id;

                $this->Offers->saveOrFail($offer);
                $offer_id = $offer->get('id');

                $offer_active_days = $this->Offers->OfferActiveDays->newEntity($this->request->getData('offer_active_day'));
                $offer_active_days->offer_id = $offer_id;
                $this->Offers->OfferActiveDays->saveOrFail($offer_active_days);

                if ($offer->get('category_id') == 1) {
                    $hall_filters = $this->Offers->HallFilters->newEntity($this->request->getData('hall_filter'));
                    $hall_filters->offer_id = $offer_id;
                    $this->Offers->HallFilters->saveOrFail($hall_filters);
                }
                if ($offer->get('category_id') == 2) {
                    $music_filters = $this->Offers->MusicFilters->newEntity($this->request->getData('music_filter'));
                    $music_filters->offer_id = $offer_id;
                    $this->Offers->MusicFilters->saveOrFail($music_filters);
                }
                if ($offer->get('category_id') == 3) {
                    $catering_filters = $this->Offers->CateringFilters->newEntity($this->request->getData('catering_filter'));
                    $catering_filters->offer_id = $offer_id;
                    $this->Offers->CateringFilters->saveOrFail($catering_filters);
                }
                $conn->commit();

                $this->Flash->success(__('The offer has been saved.'));
                return $this->redirect(['controller' => 'Offers', 'action' => 'index', null]);



            } catch (\Cake\ORM\Exception\PersistanceFailedException $e) {
                $conn -> rollback();
                $this->Flash->error(__('The address could not be saved. Please, try again.'));
            }
        }

        $users = $this->Offers->Users->find('list', ['limit' => 200])->all();
        $categories = $this->Offers->Categories->find('list', ['limit' => 200])->where(['id' => $offer_type_id]);
        $provinces = $this->Offers->Addresses->Provinces->find('list', ['limit' => 200])->all();
        $hallTypes = $this->Offers->HallFilters->HallTypes->find('list', ['limit' => 200])->all();
        $this->set(compact('offer', 'users', 'categories', 'provinces', 'hallTypes', 'account_type_id'));




        if ($offer_type_id == 1) {
            $template = 'add_hall';
        }
        if ($offer_type_id == 2) {
            $template = 'add_music';
        }
        if ($offer_type_id == 3) {
            $template = 'add_catering';
        }
        $this->render($template);
    }

    /**
     * Edit method
     *
     * @param string|null $id Offer id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id)
    {
        $onlymyoffer = 1;
        $offer = $this->Offers->get($id, [
            'contain' => ['Users', 'Categories', 'Addresses', 'Bookings', 'CateringFilters', 'HallFilters',
                'MusicFilters', 'OfferActiveDays', 'Ratings',
                'SavedUserOffers'
            ]
        ]);
        $this->Authorization->authorize($offer);
        $account_type_id = $this->request->getAttribute('identity')->get('account_type_id');
        if ($this->request->is(['patch', 'post', 'put'])) {
            $offer = $this->Offers->patchEntity($offer, $this->request->getData());
            if ($this->Offers->save($offer)) {
                $this->Flash->success(__('The offer has been saved.'));

                return $this->redirect(['action' => 'index']);

            }
            $this->Flash->error(__('The offer could not be saved. Please, try again.'));
        }
        $users = $this->Offers->Users->find('list', ['limit' => 200])->all();
        $categories = $this->Offers->Categories->find('list', ['limit' => 200])->all();
        $addresses = $this->Offers->Addresses->find('list', ['limit' => 200])->all();
        $provinces = $this->Offers->Addresses->Provinces->find('list', ['limit' => 200])->all();
        $hallTypes = $this->Offers->HallFilters->HallTypes->find('list', ['limit' => 200])->all();
        $this->set(compact('offer', 'users', 'categories', 'addresses','provinces', 'hallTypes', 'account_type_id', 'onlymyoffer'));
        $offer_type_id = $offer->category_id;
        $template = 'add_hall';
        if ($offer_type_id == 2) {
            $template = 'add_music';
        }
        if ($offer_type_id == 3) {
            $template = 'add_catering';
        }
        $this->render($template);
    }

    /**
     * Delete method
     *
     * @param string|null $id Offer id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $offer = $this->Offers->get($id);
        $this->Authorization->authorize($offer);
        if ($this->Offers->delete($offer)) {
            $this->Flash->success(__('The offer has been deleted.'));
        } else {
            $this->Flash->error(__('The offer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    // ADDITIONAL FUNCTIONS

    //display offers table by
    public function displayOffersBy($attribute, $value)
    {

        $offer_attribute = 'Offers.';
        $offer_attribute .= $attribute;

        $offers = $this->paginate($this->Offers->find(
            'all', ['conditions' => [$offer_attribute => $value]]));
        $this->index($offers);
    }
}
