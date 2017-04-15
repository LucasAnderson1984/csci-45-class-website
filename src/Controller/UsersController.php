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

  public function view($id = null) {
    $user = $this->Users->get($id, ['contain' => []]);

    $this->set('user', $user);
    $this->set('_serialize', ['user']);
  }

  public function add() {
    $form = new CreateUserForm();

    if ($this->request->is('post')) {
      $data = $this->request->getData();

      if ($form->validate($data)) {
        if ($form->execute($data)) {
          $this->Flash->success(__('The user has been saved.'));

          return $this->redirect(['action' => 'view']);
        } else {
          $this
            ->Flash
              ->error(__('The user could not be saved. Please, try again.'));
        }
      }
    }

    $this->set('form', $form);
  }

  public function edit($id = null) {
    $user = $this->Users->get($id, ['contain' => []]);
    $form = new UpdateUserForm();

    if ($this->request->is(['patch', 'post', 'put'])) {
      $data = $this->request->getData();

      if ($form->validate($data)) {
        $data['id'] = $user->id;
        $data['updated_at'] = time();

        if ($form->execute($data)) {
          $this->Flash->success(__('The user has been upated.'));

          return $this->redirect(['action' => 'view', $user->id]);
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
