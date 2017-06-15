<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class User extends Entity
{
    protected $_accessible = [
        '*' => true,
        'uuid' => false
    ];

    protected $_hidden = [
        'password'
    ];
}
