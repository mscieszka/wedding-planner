<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Provinces Controller
 *
 * @property \App\Model\Table\ProvincesTable $Provinces
 * @method \App\Model\Entity\Province[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProvincesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->skipAuthorization();
        $account_type_id = $this->request->getAttribute('identity')->get('account_type_id');
        $provinces = $this->paginate($this->Provinces);

        $this->set(compact('provinces', 'account_type_id'));
    }

    /**
     * View method
     *
     * @param string|null $id Province id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();
        $account_type_id = $this->request->getAttribute('identity')->get('account_type_id');
        $province = $this->Provinces->get($id, [
            'contain' => ['Addresses'],
        ]);
        $id_user_log = $this->request->getAttribute('identity')->getIdentifier();

        $offers =  $this->Provinces->Addresses->Offers->find('all', ['contain' => ['Users', 'Categories', 'Addresses']]);

        $this->set(compact('province', 'id_user_log', 'account_type_id', 'offers'));


/*
<?php if($addresses->user_id == $id_user_log):?>
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Addresses', 'action' => 'edit', $addresses->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Addresses', 'action' => 'delete', $addresses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $addresses->id)]) ?>
                                <?php endif; ?>

*/
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $province = $this->Provinces->newEmptyEntity();
        $this->Authorization->authorize($province);
        if ($this->request->is('post')) {
            $province = $this->Provinces->patchEntity($province, $this->request->getData());
            if ($this->Provinces->save($province)) {
                $this->Flash->success(__('The province has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The province could not be saved. Please, try again.'));
        }
        $this->set(compact('province'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Province id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $province = $this->Provinces->get($id, [
            'contain' => [],
        ]);
        $this->Authorization->authorize($province);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $province = $this->Provinces->patchEntity($province, $this->request->getData());
            if ($this->Provinces->save($province)) {
                $this->Flash->success(__('The province has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The province could not be saved. Please, try again.'));
        }
        $this->set(compact('province'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Province id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $province = $this->Provinces->get($id);
        $this->Authorization->authorize($province);

        if ($this->Provinces->delete($province)) {
            $this->Flash->success(__('The province has been deleted.'));
        } else {
            $this->Flash->error(__('The province could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
