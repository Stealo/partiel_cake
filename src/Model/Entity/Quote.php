<?php
// src/Model/Entity/Quote.php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Quote extends  Entity{

    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
