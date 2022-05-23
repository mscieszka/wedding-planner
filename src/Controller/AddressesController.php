<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Addresses Controller
 *
 * @property \App\Model\Table\AddressesTable $Addresses
 * @method \App\Model\Entity\Address[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AddressesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
//        exit;
        $this->Authorization->skipAuthorization();
        $this->paginate = [
            'contain' => ['Users', 'Provinces'],
        ];

        //wyswietla tylko swoje adresy

        $addresses = $this->paginate($this->Addresses->find()->where(
            ['user_id' => $this->request->getAttribute('identity')->getIdentifier()]
        ));
        $account_type_id = $this->request->getAttribute('identity')->get('account_type_id');
        $this->set(compact('addresses', 'account_type_id'));
    }

    /**
     * View method
     *
     * @param string|null $id Address id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $address = $this->Addresses->get($id, [
            'contain' => ['Users', 'Provinces', 'Offers'],
        ]);

        $this->Authorization->authorize($address);

        $account_type_id = $this->request->getAttribute('identity')->get('account_type_id');
        $id_user_log = $this->request->getAttribute('identity')->getIdentifier();

        $this->set(compact('address', 'account_type_id', 'id_user_log'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $address = $this->Addresses->newEmptyEntity();
      //  $address->user_id = $this->request->getAttribute('identity')->getIdentifier();
        //$this->Authorization->authorize($address);
        if ($this->request->is('post')) {
            $address = $this->Addresses->patchEntity($address, $this->request->getData());
            if ($this->Addresses->save($address)) {
                $this->Flash->success(__('The address has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The address could not be saved. Please, try again.'));
        }
        //$users = $this->Addresses->Users->find('list', ['limit' => 200])->all();
       // $provinces = $this->Addresses->Provinces->find('list', ['limit' => 200])->all();
        //$this->set(compact('address', 'provinces'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Address id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $address = $this->Addresses->get($id, [
            'contain' => [],
        ]);
        $this->Authorization->authorize($address);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $address = $this->Addresses->patchEntity($address, $this->request->getData());
            if ($this->Addresses->save($address)) {
                $this->Flash->success(__('The address has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The address could not be saved. Please, try again.'));
        }
        $users = $this->Addresses->Users->find('list', ['limit' => 200])->all();
        $provinces = $this->Addresses->Provinces->find('list', ['limit' => 200])->all();
        $this->set(compact('address', 'users', 'provinces'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Address id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $address = $this->Addresses->get($id);
        $this->Authorization->authorize($address);
        if ($this->Addresses->delete($address)) {
            $this->Flash->success(__('The address has been deleted.'));
        } else {
            $this->Flash->error(__('The address could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
