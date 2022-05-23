<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * CateringFilters Controller
 *
 * @property \App\Model\Table\CateringFiltersTable $CateringFilters
 * @method \App\Model\Entity\CateringFilter[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CateringFiltersController extends AppController
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
        $cateringFilters = $this->paginate($this->CateringFilters);

        $this->set(compact('cateringFilters'));
    }

    /**
     * View method
     *
     * @param string|null $id Catering Filter id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();
        $cateringFilter = $this->CateringFilters->get($id, [
            'contain' => ['Offers'],
        ]);

        $this->set(compact('cateringFilter'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cateringFilter = $this->CateringFilters->newEmptyEntity();
        $this->Authorization->authorize($cateringFilter);
        if ($this->request->is('post')) {
            $cateringFilter = $this->CateringFilters->patchEntity($cateringFilter, $this->request->getData());
            if ($this->CateringFilters->save($cateringFilter)) {
                $this->Flash->success(__('The catering filter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The catering filter could not be saved. Please, try again.'));
        }
        $offers = $this->CateringFilters->Offers->find('list', ['limit' => 200])->all();
        $this->set(compact('cateringFilter', 'offers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Catering Filter id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cateringFilter = $this->CateringFilters->get($id, [
            'contain' => [],
        ]);
        $this->Authorization->authorize($cateringFilter);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cateringFilter = $this->CateringFilters->patchEntity($cateringFilter, $this->request->getData());
            if ($this->CateringFilters->save($cateringFilter)) {
                $this->Flash->success(__('The catering filter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The catering filter could not be saved. Please, try again.'));
        }
        $offers = $this->CateringFilters->Offers->find('list', ['limit' => 200])->all();
        $this->set(compact('cateringFilter', 'offers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Catering Filter id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cateringFilter = $this->CateringFilters->get($id);
        $this->Authorization->authorize($cateringFilter);
        if ($this->CateringFilters->delete($cateringFilter)) {
            $this->Flash->success(__('The catering filter has been deleted.'));
        } else {
            $this->Flash->error(__('The catering filter could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
