<?php
// src/Model/Table/GuestsTable.php
namespace App\Model\Table;

use Cake\ORM\Table;

class EventsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
        $this->hasMany('Guests', ['foreignKey' => 'event_id']);
        $this->belongsTo('Users', ['foreignKey' => 'id']);
    }
}
