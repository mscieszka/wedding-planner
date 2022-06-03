<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Collection\Collection;
use Cake\Datasource\ConnectionManager;

/**
 * Categories Controller
 *
 * @property \App\Model\Table\CategoriesTable $Categories
 * @method \App\Model\Entity\Category[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CategoriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->skipAuthorization();
        $categories = $this->paginate($this->Categories);

        $account_type_id = $this->request->getAttribute('identity')->get('account_type_id');

        $this->set(compact('categories', 'account_type_id'));
    }

    /**
     * View method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();
        $account_type_id = $this->request->getAttribute('identity')->get('account_type_id');
        $category = $this->Categories->get($id, [
            'contain' => ['Offers', 'Offers.MusicFilters', 'Offers.HallFilters', 'Offers.CateringFilters'],
        ]);

        $id_user_log = $this->request->getAttribute('identity')->getIdentifier();

        $saved_user_offers = $this->Categories->Offers->SavedUserOffers->find()
            ->where([
                'user_id' => $this->request->getAttribute('identity')->getIdentifier()
            ])->toArray();
        $saved_user_offers = (new Collection($saved_user_offers))->extract('offer_id')->toList();
        $this->set(compact('category', 'id_user_log', 'account_type_id', 'saved_user_offers'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $category = $this->Categories->newEmptyEntity();
        $this->Authorization->authorize($category);
        $account_type_id = $this->request->getAttribute('identity')->get('account_type_id');

        if ($this->request->is('post')) {
            $category = $this->Categories->patchEntity($category, $this->request->getData());
            if ($this->Categories->save($category)) {
                $this->Flash->success(__('The category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The category could not be saved. Please, try again.'));
        }
        $this->set(compact('category', 'account_type_id'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $category = $this->Categories->get($id, [
            'contain' => [],
        ]);
        $this->Authorization->authorize($category);
        $account_type_id = $this->request->getAttribute('identity')->get('account_type_id');
        if ($this->request->is(['patch', 'post', 'put'])) {
            $category = $this->Categories->patchEntity($category, $this->request->getData());
            if ($this->Categories->save($category)) {
                $this->Flash->success(__('The category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The category could not be saved. Please, try again.'));
        }
        $this->set(compact('category', 'account_type_id'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $category = $this->Categories->get($id);
        $this->Authorization->authorize($category);
        if ($this->Categories->delete($category)) {
            $this->Flash->success(__('The category has been deleted.'));
        } else {
            $this->Flash->error(__('The category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
