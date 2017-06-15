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
                     'primary_key' => ['uuid']
                   ]
                 );

        $table
          ->addColumn('uuid', 'uuid', ['default' => 'UUID()'])
          ->addColumn('username', 'string')
          ->addColumn('email', 'string')
          ->addColumn('password', 'string')
          ->addColumn('is_active', 'boolean', ['default' => true])
          ->addColumn(
            'created_at',
            'datetime',
            ['default' => 'CURRENT_TIMESTAMP']
          )
          ->addColumn(
            'updated_at',
            'datetime',
            ['default' => 'CURRENT_TIMESTAMP']
          )
          ->addIndex(
            'username',
            [
              'name' => 'UNIQUE_USERNAME',
              'unique' => true
            ]
          )
          ->addIndex('email', ['name' => 'UNIQUE_EMAIL', 'unique' => true])
          ->create();
    }
}
