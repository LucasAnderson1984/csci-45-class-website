<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table {
  public function initialize(array $config) {
    parent::initialize($config);

    $this
      ->setTable('users')
      ->setDisplayField('id')
      ->setPrimaryKey('id')
      ->addBehavior('Timestamp');
  }

  public function validationDefault(Validator $validator) {
      $validator
        ->requirePresence('username', 'create')
        ->notEmpty('username')
        ->add(
          'username',
          'unique',
          ['rule' => 'validateUnique', 'provider' => 'table']
        );

      $validator
        ->email('email')
        ->requirePresence('email', 'create')
        ->notEmpty('email')
        ->add(
          'email',
          'unique',
          ['rule' => 'validateUnique', 'provider' => 'table']
        );

      $validator
        ->requirePresence('password', 'create')
        ->notEmpty('password');

      $validator
        ->boolean('is_active')
        ->requirePresence('is_active', 'create')
        ->notEmpty('is_active');

      return $validator;
  }

  public function buildRules(RulesChecker $rules) {
    $rules
      ->add($rules->isUnique(['username']))
      ->add($rules->isUnique(['email']));

    return $rules;
  }
}
