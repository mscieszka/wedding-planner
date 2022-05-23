<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * MusicFilters Controller
 *
 * @property \App\Model\Table\MusicFiltersTable $MusicFilters
 * @method \App\Model\Entity\MusicFilter[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MusicFiltersController extends AppController
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
        $musicFilters = $this->paginate($this->MusicFilters);

        $this->set(compact('musicFilters'));
    }

    /**
     * View method
     *
     * @param string|null $id Music Filter id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();

        $musicFilter = $this->MusicFilters->get($id, [
            'contain' => ['Offers'],
        ]);

        $this->set(compact('musicFilter'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $musicFilter = $this->MusicFilters->newEmptyEntity();
        $this->Authorization->authorize($musicFilter);
        if ($this->request->is('post')) {
            $musicFilter = $this->MusicFilters->patchEntity($musicFilter, $this->request->getData());
            if ($this->MusicFilters->save($musicFilter)) {
                $this->Flash->success(__('The music filter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The music filter could not be saved. Please, try again.'));
        }
        $offers = $this->MusicFilters->Offers->find('list', ['limit' => 200])->all();
        $this->set(compact('musicFilter', 'offers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Music Filter id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $musicFilter = $this->MusicFilters->get($id, [
            'contain' => [],
        ]);
        $this->Authorization->authorize($musicFilter);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $musicFilter = $this->MusicFilters->patchEntity($musicFilter, $this->request->getData());
            if ($this->MusicFilters->save($musicFilter)) {
                $this->Flash->success(__('The music filter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The music filter could not be saved. Please, try again.'));
        }
        $offers = $this->MusicFilters->Offers->find('list', ['limit' => 200])->all();
        $this->set(compact('musicFilter', 'offers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Music Filter id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $musicFilter = $this->MusicFilters->get($id);
        $this->Authorization->authorize($musicFilter);
        if ($this->MusicFilters->delete($musicFilter)) {
            $this->Flash->success(__('The music filter has been deleted.'));
        } else {
            $this->Flash->error(__('The music filter could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
