<?php
use Migrations\AbstractMigration;

class CreateUsers extends AbstractMigration
{

    public $autoId = false;

    public function change()
    {
        $table = $this->table(
                   'users',
                   [
                     'id' => false,
                     'primary_key' => ['id']
                   ]
                 );

        $table
          ->addColumn('id', 'uuid')
          ->addColumn('username', 'string')
          ->addColumn('email', 'string')
          ->addColumn('password', 'string')
          ->addColumn('is_active', 'boolean', ['default' => true])
          ->addColumn('created_at', 'datetime')
          ->addColumn('updated_at', 'datetime')
          ->addIndex(
            'username',
            [
              'name' => 'UNIQUE_USERNAME',
              'unique' => true
            ]
          )
          ->addIndex('email', ['name' => 'UNIQUE_EMAIL', 'unique' => true])
          ->addPrimaryKey('id')
          ->create();
    }
}
