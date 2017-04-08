<?php
use Migrations\AbstractMigration;
class CreateHouse extends AbstractMigration
{
    public $autoId = false;
    public function change()
    {
        $table = $this->table(
                   'houses',
                   [
                     'id' => false,
                     'primary_key' => ['id']
                   ]
                 );
        $table
          ->addColumn('id', 'uuid')
          ->addColumn('house_name', 'string')
          ->addColumn('created_at', 'datetime')
          ->addColumn('updated_at', 'datetime')
          ->create();
    }
}
