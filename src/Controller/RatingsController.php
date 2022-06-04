<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Offer;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\Locator\LocatorInterface;

/**
 * Ratings Controller
 *
 * @property \App\Model\Table\RatingsTable $Ratings
 * @method \App\Model\Entity\Rating[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RatingsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->paginate = [
            'contain' => ['Users', 'Offers'],
        ];
    }

    /**
     * Index method
     *
     * @return \App\Model\Entity\Rating[]|\Cake\Datasource\ResultSetInterface|\Cake\Http\Response|void|null
     */

    //wszystkie oceny dla danej oferty od razu

    public function index($id_offer = null)
    {
        $this->Authorization->skipAuthorization();
        $ratings = null;
        //then display all ratings
        if ($id_offer != null) {
            $ratings = $this->paginate($this->Ratings->find()->where(['offer_id' => $id_offer]));
        }

        //$this->set(compact('ratings'));
    }

    /**
     * View method
     *
     * @param string|null $id Rating id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();
        $rating = $this->Ratings->get($id, [
            'contain' => ['Users', 'Offers'],
        ]);

        $this->set(compact('rating'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rating = $this->Ratings->newEmptyEntity();
        $this->Authorization->authorize($rating);
        if ($this->request->is('post')) {
            $rating = $this->Ratings->patchEntity($rating, $this->request->getData());
            if ($this->Ratings->save($rating)) {
                $this->Flash->success(__('Opinia dodana pomyślnie'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rating could not be saved. Please, try again.'));
        }
        $users = $this->Ratings->Users->find('list', ['limit' => 200])->all();
        $offers = $this->Ratings->Offers->find('list', ['limit' => 200])->all();
        $this->set(compact('rating', 'users', 'offers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Rating id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rating = $this->Ratings->get($id, [
            'contain' => [],
        ]);
        $this->Authorization->authorize($rating);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rating = $this->Ratings->patchEntity($rating, $this->request->getData());
            if ($this->Ratings->save($rating)) {
                $this->Flash->success(__('Opinia dodana pomyślnie'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rating could not be saved. Please, try again.'));
        }
        $users = $this->Ratings->Users->find('list', ['limit' => 200])->all();
        $offers = $this->Ratings->Offers->find('list', ['limit' => 200])->all();
        $this->set(compact('rating', 'users', 'offers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Rating id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rating = $this->Ratings->get($id);
        $this->Authorization->authorize($rating);
        if ($this->Ratings->delete($rating)) {
            $this->Flash->success(__('The rating has been deleted.'));
        } else {
            $this->Flash->error(__('The rating could not be deleted. Please, try again.'));
        }

        return $this->redirect($this->referer());
    }

    /* ADDITIONAL FUNCTIONS */
    //display ratings table for a given offer
    public function displayRatingsTableForOffer($id = null)
    {

        $ratings = $this->paginate($this->Ratings->find(
            'all',
            ['conditions' => ['Ratings.offer_id' => $id]]
        ));
        $this->index($ratings);
    }
}
