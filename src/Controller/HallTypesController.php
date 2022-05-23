<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * HallTypes Controller
 *
 * @property \App\Model\Table\HallTypesTable $HallTypes
 * @method \App\Model\Entity\HallType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HallTypesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $hallTypes = $this->paginate($this->HallTypes);

        $this->set(compact('hallTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Hall Type id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();
        $hallType = $this->HallTypes->get($id, [
            'contain' => ['HallFilters'],
        ]);

        $this->set(compact('hallType'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $hallType = $this->HallTypes->newEmptyEntity();
        $this->Authorization->authorize($hallType);
        if ($this->request->is('post')) {
            $hallType = $this->HallTypes->patchEntity($hallType, $this->request->getData());
            if ($this->HallTypes->save($hallType)) {
                $this->Flash->success(__('The hall type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hall type could not be saved. Please, try again.'));
        }
        $this->set(compact('hallType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Hall Type id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $hallType = $this->HallTypes->get($id, [
            'contain' => [],
        ]);
        $this->Authorization->authorize($hallType);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $hallType = $this->HallTypes->patchEntity($hallType, $this->request->getData());
            if ($this->HallTypes->save($hallType)) {
                $this->Flash->success(__('The hall type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hall type could not be saved. Please, try again.'));
        }
        $this->set(compact('hallType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Hall Type id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $hallType = $this->HallTypes->get($id);
        $this->Authorization->authorize($hallType);
        if ($this->HallTypes->delete($hallType)) {
            $this->Flash->success(__('The hall type has been deleted.'));
        } else {
            $this->Flash->error(__('The hall type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
