<?php

namespace App\model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

class User extends Entity{

    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    protected function _setPassword($value){
        if(strlen($value)){
            $hash = new DefaultPasswordHasher();
            return $hash->hash($value);
        }
    }
}
