<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * SavedUserOffers Controller
 *
 * @property \App\Model\Table\SavedUserOffersTable $SavedUserOffers
 * @method \App\Model\Entity\SavedUserOffer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SavedUserOffersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Offers'],
        ];
        $savedUserOffers = $this->paginate($this->SavedUserOffers);

        $this->set(compact('savedUserOffers'));
    }

    /**
     * View method
     *
     * @param string|null $id Saved User Offer id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $savedUserOffer = $this->SavedUserOffers->get($id, [
            'contain' => ['Users', 'Offers'],
        ]);
        $this->Authorization->authorize($savedUserOffer);
        $this->set(compact('savedUserOffer'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($offer_id)
    {
        $savedUserOffer = $this->SavedUserOffers->newEmptyEntity();
        $this->Authorization->authorize($savedUserOffer);

        $savedUserOffer->offer_id = $offer_id;
        $savedUserOffer->user_id = $this->request->getAttribute('identity')->getIdentifier();
        $savedUserOffer = $this->SavedUserOffers->patchEntity($savedUserOffer, $this->request->getData());
        if ($this->SavedUserOffers->save($savedUserOffer)) {
            $this->Flash->success(__('Oferta została pomyślnie dodana do ulubionych'));
        } else {
            $this->Flash->error(__('Nie można dodać oferty do ulubionych. Spróbuj ponownie'));
        }

        return $this->redirect($this->referer());
    }

    /**
     * Edit method
     *
     * @param string|null $id Saved User Offer id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $savedUserOffer = $this->SavedUserOffers->get($id, [
            'contain' => [],
        ]);
        $this->Authorization->authorize($savedUserOffer);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $savedUserOffer = $this->SavedUserOffers->patchEntity($savedUserOffer, $this->request->getData());
            if ($this->SavedUserOffers->save($savedUserOffer)) {
                $this->Flash->success(__('Oferta została pomyślnie dodana do ulubionych'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Nie można dodać oferty do ulubionych. Spróbuj ponownie'));
        }
        $users = $this->SavedUserOffers->Users->find('list', ['limit' => 200])->all();
        $offers = $this->SavedUserOffers->Offers->find('list', ['limit' => 200])->all();
        $this->set(compact('savedUserOffer', 'users', 'offers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Saved User Offer id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($offer_id)
    {
        $this->request->allowMethod(['post', 'delete']);
        $saved_user_offer = $this->SavedUserOffers->find()->where([
            'user_id' => $this->request->getAttribute('identity')->getIdentifier(),
            'offer_id' => $offer_id
        ])->first();
        $this->Authorization->authorize($saved_user_offer);
        if ($this->SavedUserOffers->delete($saved_user_offer)) {
            $this->Flash->success(__('Oferta została usunięta z ulubionych'));
        } else {
            $this->Flash->error(__('Błąd, nie można usunąć oferty z ulubionych'));
        }

        return $this->redirect($this->referer());
    }
}
