<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * OfferActiveDays Controller
 *
 * @property \App\Model\Table\OfferActiveDaysTable $OfferActiveDays
 * @method \App\Model\Entity\OfferActiveDay[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OfferActiveDaysController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Offers'],
        ];
        $offerActiveDays = $this->paginate($this->OfferActiveDays);

        $this->set(compact('offerActiveDays'));
    }

    /**
     * View method
     *
     * @param string|null $id Offer Active Day id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();

        $offerActiveDay = $this->OfferActiveDays->get($id, [
            'contain' => ['Offers'],
        ]);

        $this->set(compact('offerActiveDay'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $offerActiveDay = $this->OfferActiveDays->newEmptyEntity();
        $this->Authorization->authorize($offerActiveDay);
        if ($this->request->is('post')) {
            $offerActiveDay = $this->OfferActiveDays->patchEntity($offerActiveDay, $this->request->getData());
            if ($this->OfferActiveDays->save($offerActiveDay)) {
                $this->Flash->success(__('The offer active day has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The offer active day could not be saved. Please, try again.'));
        }
        $offers = $this->OfferActiveDays->Offers->find('list', ['limit' => 200])->all();
        $this->set(compact('offerActiveDay', 'offers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Offer Active Day id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $offerActiveDay = $this->OfferActiveDays->get($id, [
            'contain' => [],
        ]);
        $this->Authorization->authorize($offerActiveDay);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $offerActiveDay = $this->OfferActiveDays->patchEntity($offerActiveDay, $this->request->getData());
            if ($this->OfferActiveDays->save($offerActiveDay)) {
                $this->Flash->success(__('The offer active day has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The offer active day could not be saved. Please, try again.'));
        }
        $offers = $this->OfferActiveDays->Offers->find('list', ['limit' => 200])->all();
        $this->set(compact('offerActiveDay', 'offers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Offer Active Day id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $offerActiveDay = $this->OfferActiveDays->get($id);
        $this->Authorization->authorize($offerActiveDay);
        if ($this->OfferActiveDays->delete($offerActiveDay)) {
            $this->Flash->success(__('The offer active day has been deleted.'));
        } else {
            $this->Flash->error(__('The offer active day could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
