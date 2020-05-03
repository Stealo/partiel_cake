<?php
// src/Controller/GuestsController.php

namespace App\Controller;

class GuestsController extends AppController
{

    public function index()
    {
        $this->loadComponent('Paginator');
        $guests = $this->Paginator->paginate($this->Guests->find());
        $this->set(compact('guests'));

        $users = $this->Paginator->paginate($this->Guests->Users->find());
        $this->set(compact('users'));
    }


/*    public function index() {
        $guests = $this->Paginator->paginate($this->Guests->find());
        $this->set(compact('guests'));
    }*/


/*
    public function add()
    {
        $this->loadComponent('Paginator');
        $events = $this->Paginator->paginate($this->Events->find());
        $this->set(compact('events'));
    }*/

}
