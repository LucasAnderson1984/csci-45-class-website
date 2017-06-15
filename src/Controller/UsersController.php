<?php
namespace App\Controller;
use App\Controller\AppController;
use App\Form\CreateUserForm;
use App\Form\UpdateUserForm;

class UsersController extends AppController {
  public function index() {
    $users = $this->paginate($this->Users);

    $this->set(compact('users'));
    $this->set('_serialize', ['users']);
  }

  public function view($uuid = null) {
    $user = $this->Users->get($uuid, ['contain' => []]);

    $this->set('user', $user);
    $this->set('_serialize', ['user']);
  }

  public function add() {
    $form = new CreateUserForm();

    if ($this->request->is('post')) {
      $data = $this->request->getData();

      if ($form->validate($data)) {
        $result = $form->execute($data);
        if ($result) {
          $this->Flash->success(__('The user has been saved.'));

          return $this->redirect(['action' => 'view', $result->uuid]);
        } else {
          $this
            ->Flash
              ->error(__('The user could not be saved. Please, try again.'));
        }
      }
    }

    $this->set('form', $form);
  }

  public function edit($uuid = null) {
    $user = $this->Users->get($uuid, ['contain' => []]);
    $form = new UpdateUserForm();

    if ($this->request->is(['patch', 'post', 'put'])) {
      $data = $this->request->getData();

      if ($form->validate($data)) {
        $data['id'] = $user->uuid;
        $data['updated_at'] = time();

        if ($form->execute($data)) {
          $this->Flash->success(__('The user has been upated.'));

          return $this->redirect(['action' => 'view', $user->uuid]);
        } else {
          $this
            ->Flash
              ->error(__('The user could not be updated. Please, try again.'));
        }
      }
    }

    $this->set(compact('user'));
    $this->set('_serialize', ['user']);
    $this->set('form', $form);
  }
}
