<?php
declare(strict_types=1);

namespace App\Controller;

use Authentication\PasswordHasher\DefaultPasswordHasher;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
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

        $this->paginate = [
            'contain' => ['AccountTypes'],
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users', 'account_type_id'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null, $argument = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['AccountTypes', 'Addresses', 'Bookings', 'Offers', 'Ratings',  'SavedUserOffers'],
        ]);

        //'SavedUserBookings',
        //$this->Authorization->authorize($user);
        $this->Authorization->skipAuthorization();
        $account_type_id = $this->request->getAttribute('identity')->get('account_type_id');
        $id_user_log = $this->request->getAttribute('identity')->getIdentifier();

        $current_user = $user->id;
        $this->set(compact('user', 'current_user', 'account_type_id', 'id_user_log'));


        $layout = '';


        //oferty domyslnie
        if ($argument == null) $argumetn =1;

        //oferty
        if ($argument == 1){
            $layout = 'ofertyprofil';
        }

        //oceny
        if ($argument == 2){
            $layout = 'ocenyprofil';
        }


        //zamowienia
        if ($argument == 3){
            $layout = 'zamowieniaprofil';
        }

        /*
        if($user->get('account_type_id') == 1) {
            $layout = 'viewrecipient';
        }
        */

        $this->render($layout);
    }





    public function profile($argument = 1, $id_user = null)
    {
        //wlasny profil zalogowanego uzytkownika

        $user = null;



        if($id_user == null) {
            $user = $this->Users->get($this->request->getAttribute('identity')->getIdentifier(), [
                'contain' => ['AccountTypes', 'Addresses', 'Bookings', 'Offers', 'Ratings',  'SavedUserOffers'],
            ]);
        }

        else {
            $user = $this->Users->get($id_user, [
                'contain' => ['AccountTypes', 'Addresses', 'Bookings', 'Offers', 'Ratings',  'SavedUserOffers'],
            ]);
        }

/*
        $saved_user_offers = $this->Offers->SavedUserOffers->find()
            ->where([
                'user_id' => $this->request->getAttribute('identity')->getIdentifier()
            ])->toArray();
        $saved_user_offers = (new Collection($saved_user_offers))->extract('offer_id')->toList();

*/





        //'SavedUserBookings',
        //$this->Authorization->authorize($user);
        $this->Authorization->skipAuthorization();
        $account_type_id = $this->request->getAttribute('identity')->get('account_type_id');
        $id_user_log = $this->request->getAttribute('identity')->getIdentifier();

        $this->set(compact('user', 'account_type_id', 'id_user_log'));


        $layout = '';


        //oferty domyslnie
        if ($argument == null) $argument = 1;

        //oferty
        if ($argument == 1){
            $layout = 'ofertyprofil';
        }

            //oceny
            if ($argument == 2){
                $layout = 'ocenyprofil';
            }


                //zamowienia
                if ($argument == 3){
                    $layout = 'zamowieniaprofil';
                }

        /*
        if($user->get('account_type_id') == 1) {
            $layout = 'viewrecipient';
        }
        */

        $this->render($layout);
    }





    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($account_type=2)
    {
        $this->Authorization->skipAuthorization();
        if(!empty($this->request->getAttribute('identity'))){
            $this->Flash->error(__('You are already logged in.'));
            $this->redirect($this->referer());
        }
//        $this->Authorization->skipAuthorization();
        $user = $this->Users->newEmptyEntity();
        $user->account_type_id = $account_type;
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $accountTypes = $this->Users->AccountTypes->find('list', ['limit' => 200])->all();
        $this->set(compact('user', 'accountTypes'));
        if($account_type == 1) {
            $this->render('addrecipient');
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        $this->Authorization->authorize($user);
        $account_type_id = $this->request->getAttribute('identity')->get('account_type_id');

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $accountTypes = $this->Users->AccountTypes->find('list', ['limit' => 200])->all();
        $this->set(compact('user', 'accountTypes', 'account_type_id'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        $this->Authorization->authorize($user);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'Users', 'action' => 'logout']);

    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['login', 'add']);
    }

    public function login()
    {
        $this->Authorization->skipAuthorization();
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            // redirect to /offers after login success
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'pages',
                'action' => 'index',
            ]);
            return $this->redirect($redirect);
        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }
        $this->viewBuilder()->setLayout('login');
    }

    public function logout()
    {
        $this->Authorization->skipAuthorization();
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }

    public function changePassword(){

        $this->Authorization->skipAuthorization();
        $account_type_id = $this->request->getAttribute('identity')->get('account_type_id');
        $this->set(compact('account_type_id'));

        if ($this->request->is('post')) {
            $user = $this->Users->get($this->request->getAttribute('identity')->getIdentifier());
            if((new DefaultPasswordHasher())->check($this->request->getData('old_password'),$user->password)) {
                $user->password = $this->request->getData('password');
                if($this->Users->save($user)) {
                    $this->Flash->success("Password has been changed.");
                    $redirect = $this->request->getQuery('redirect', [
                        'controller' => 'pages',
                        'action' => 'index',
                    ]);

                    return $this->redirect(['controller' => 'pages', 'action' => 'index',]);
                }
            }

            $this->Flash->error(__("Wrong password"));
        }
    }
}
