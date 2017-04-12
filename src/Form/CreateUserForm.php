<?php
namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;

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
        'password',
        'compareWith',
        [
          'rule' => ['compareWith', 'confirm_password'],
          'message'=>'The passwords does not match!'
        ]
      );

    return $validator;
  }

  protected function _execute(array $data) {
    return true;
  }
}
