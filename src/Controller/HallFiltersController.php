<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * HallFilters Controller
 *
 * @property \App\Model\Table\HallFiltersTable $HallFilters
 * @method \App\Model\Entity\HallFilter[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HallFiltersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Offers', 'HallTypes'],
        ];
        $hallFilters = $this->paginate($this->HallFilters);

        $this->set(compact('hallFilters'));
    }

    /**
     * View method
     *
     * @param string|null $id Hall Filter id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();
        $hallFilter = $this->HallFilters->get($id, [
            'contain' => ['Offers', 'HallTypes'],
        ]);

        $this->set(compact('hallFilter'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $hallFilter = $this->HallFilters->newEmptyEntity();
        $this->Authorization->authorize($hallFilter);
        if ($this->request->is('post')) {
            $hallFilter = $this->HallFilters->patchEntity($hallFilter, $this->request->getData());
            if ($this->HallFilters->save($hallFilter)) {
                $this->Flash->success(__('The hall filter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hall filter could not be saved. Please, try again.'));
        }
        $offers = $this->HallFilters->Offers->find('list', ['limit' => 200])->all();
        $hallTypes = $this->HallFilters->HallTypes->find('list', ['limit' => 200])->all();
        $this->set(compact('hallFilter', 'offers', 'hallTypes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Hall Filter id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $hallFilter = $this->HallFilters->get($id, [
            'contain' => [],
        ]);
        $this->Authorization->authorize($hallFilter);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $hallFilter = $this->HallFilters->patchEntity($hallFilter, $this->request->getData());
            if ($this->HallFilters->save($hallFilter)) {
                $this->Flash->success(__('The hall filter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hall filter could not be saved. Please, try again.'));
        }
        $offers = $this->HallFilters->Offers->find('list', ['limit' => 200])->all();
        $hallTypes = $this->HallFilters->HallTypes->find('list', ['limit' => 200])->all();
        $this->set(compact('hallFilter', 'offers', 'hallTypes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Hall Filter id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $hallFilter = $this->HallFilters->get($id);
        $this->Authorization->authorize($hallFilter);
        if ($this->HallFilters->delete($hallFilter)) {
            $this->Flash->success(__('The hall filter has been deleted.'));
        } else {
            $this->Flash->error(__('The hall filter could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
