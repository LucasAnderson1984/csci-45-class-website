<?php
namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;
use Cake\Utility\Security;
use Cake\ORM\TableRegistry;

class CreateUserForm extends Form {
  protected function _buildSchema(Schema $schema) {
    $schema
      ->addField('username', 'string')
      ->addField('email', 'string')
      ->addField('password_test', 'string')
      ->addField('confirm_password', 'string');

    return $schema;
  }

  protected function _buildValidator(Validator $validator) {
    $validator
      ->notEmpty('username')
      ->notEmpty('email')
      ->notEmpty('password')
      ->notEmpty('confirm_password');

    $validator
      ->add('email', 'valid', ['rule' => 'email'])
      ->add(
        'confirm_password',
        'compare',
        [
          'rule' => ['compareWith', 'password'],
          'message'=>'The passwords does not match!'
        ]
      );

    return $validator;
  }

  protected function _execute(array $data) {
    unset($data['confirm_password']);
    $data['password'] = Security::hash($data['password'], 'md5', true);

    $users = TableRegistry::get('Users');
    $user = $users->newEntity($data);

    return $users->save($user);
  }
}
