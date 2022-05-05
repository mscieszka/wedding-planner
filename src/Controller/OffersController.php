<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Offers Controller
 *
 * @property \App\Model\Table\OffersTable $Offers
 * @method \App\Model\Entity\Offer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OffersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->skipAuthorization();
        $this->paginate = [
            'contain' => ['Users', 'Categories', 'Addresses'],
        ];
        $offers = $this->paginate($this->Offers);

        $this->set(compact('offers'));
    }

    /**
     * View method
     *
     * @param string|null $id Offer id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();
        $offer = $this->Offers->get($id, [
            'contain' => ['Users', 'Categories', 'Addresses', 'Bookings', 'CateringFilters', 'HallFilters', 'MusicFilters', 'OfferActiveDays', 'Ratings', 'SavedUserOffers'],
        ]);

        $this->set(compact('offer'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $offer = $this->Offers->newEmptyEntity();
        $this->Authorization->authorize($offer);
        if ($this->request->is('post')) {
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
        $this->set(compact('offer', 'users', 'categories', 'addresses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Offer id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $offer = $this->Offers->get($id, [
            'contain' => [],
        ]);
        $this->Authorization->authorize($offer);
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
        $this->set(compact('offer', 'users', 'categories', 'addresses'));
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
}
