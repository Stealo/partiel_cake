<?php
// src/Model/Table/MessagesTable.php
namespace App\Model\Table;

use Cake\ORM\Table;

class MessagesTable extends Table
{
    public function initialize(array $config): void
    {
        $this->addBehavior('Timestamp');
    }
}
