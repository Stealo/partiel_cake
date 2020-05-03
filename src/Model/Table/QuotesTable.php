<?php

// src/Model/Table/QuotesTable.php

Namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class QuotesTable extends Table
{

    public function initialize(array $config)
    {
        //permet que l'app gere toute suel les champs created et modified
        $this->addBehavior('Timestamp');
    }

    public function validationDefault(Validator $v)
    {
        $v->notEmpty('content');

        $v->allowEmpty('author')->maxLength('author', 30);

        return $v;
    }

}


















