<?php
//src/Model/Table/ArticlesTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table{

    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
        $this->hasMany('Events', ['foreignKey' => 'user_id', 'dependant' => true, 'cascadeCallbacks' => true]);
        $this->hasMany('Guests', ['foreignKey' => 'user_id', 'dependant' => true, 'cascadeCallbacks' => true]);
    }

    public function validationDefault(Validator $v)
    {
        $v->notEmpty('pseudo')
            ->maxLength('pseudo',20)
            ->notEmpty('password')
            ->maxLength('password', 150)
            ->allowEmpty('avatar');
        return $v;
    }
}

















