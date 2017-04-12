<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Utility\Security;

class UsersController extends AppController {
  public function index() {
    $users = $this->paginate($this->Users);

    $this->set(compact('users'));
    $this->set('_serialize', ['users']);
  }

  public function view($id = null) {
    $user = $this->Users->get($id, ['contain' => []]);

    $this->set('user', $user);
    $this->set('_serialize', ['user']);
  }

  public function add() {
    $user = $this->Users->newEntity();

    if ($this->request->is('post')) {
        $user = $this
                  ->Users->patchEntity($user, $this->request->getData());
        $user['password'] = Security::hash($user['password'], 'md5', true);

        if ($this->Users->save($user)) {
            $this->Flash->success(__('The user has been saved.'));

            return $this->redirect(['action' => 'index']);
        }
        $this
          ->Flash
            ->error(__('The user could not be saved. Please, try again.'));
    }

    $this->set(compact('user'));
    $this->set('_serialize', ['user']);
  }

  public function edit($id = null) {
    $user = $this->Users->get($id, ['contain' => []]);

    if ($this->request->is(['patch', 'post', 'put'])) {
        $user = $this->Users->patchEntity($user, $this->request->getData());
        $user['password'] = Security::hash($user['password'], 'md5', true);

        if ($this->Users->save($user)) {
            $this->Flash->success(__('The user has been saved.'));

            return $this->redirect(['action' => 'index']);
        }
        $this
          ->Flash
            ->error(__('The user could not be saved. Please, try again.'));
    }

    $this->set(compact('user'));
    $this->set('_serialize', ['user']);
  }
}
