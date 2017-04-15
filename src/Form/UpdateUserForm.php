<?php
namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

class UpdateUserForm extends Form
{
  protected function _buildSchema(Schema $schema) {
    $schema
      ->addField('username', 'string')
      ->addField('email', 'string')
      ->addField('is_active', 'boolean');

    return $schema;
  }

  protected function _buildValidator(Validator $validator) {
    $validator
      ->notEmpty('username')
      ->notEmpty('email');

    $validator
      ->boolean('is_active');

    return $validator;
  }

  protected function _execute(array $data) {
    $users = TableRegistry::get('Users');
    $user = $users->get($data['id']);
    $user = $users->patchEntity($user, $data);

    return $users->save($user);
  }
}
