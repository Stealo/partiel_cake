<?php
// src/Controller/MessagesController.php

namespace App\Controller;

class MessagesController extends AppController
{
    public function index()
    {
        $this->loadComponent('Paginator');
        $messages = $this->Paginator->paginate($this->Messages->find());
        $this->set(compact('messages'));
    }

    public function add()
    {
        $message = $this->Messages->newEntity();
        if ($this->request->is('post')) {
            $message = $this->Messages->patchEntity($message, $this->request->getData());

            $message->user_id = $this->Auth->user('id');

            if ($this->Messages->save($message)) {
                $this->Flash->success(__('Votre événement a été crée.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Impossible d\'ajouter votre événement.'));
        }
        /*        $guest = $this->Events->Guests->find('list');

                $this->set('guest', $guest);*/

        $this->set('message', $message);
    }

}


