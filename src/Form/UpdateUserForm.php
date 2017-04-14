<?php
namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;

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
    return true;
  }
}
