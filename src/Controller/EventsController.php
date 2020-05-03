<?php
// src/Controller/EventsController.php

namespace App\Controller;

use App\Controller\AppController;

class EventsController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Inclusion du FlashComponent
    }

    public function index()
    {
        $events = $this->Paginator->paginate($this->Events->find());
        $this->set(compact('events'));

        $guests = $this->Paginator->paginate($this->Events->Guests->find());
        $this->set(compact('guests'));
    }

/*    public function view()
    {
        $events = $this->Paginator->paginate($this->Events->find());
        $this->set(compact('events'));
    }*/

/*    public function view($slug = null)
    {
        $event = $this->Events->findBySlug($slug)->firstOrFail();
        $this->set(compact('event'));
    }*/

    public function view($id)
    {
/*        $events = $this->Events->get($id);
        $this->set(compact('events'));*/

/*        $events = $this->Paginator->paginate($this->Events->find());
        $this->set(compact('events'));*/

        $events = $this->Events->get($id);
        $this->set('event', $events);

    }

    public function invit(){
        $events = $this->Paginator->paginate($this->Events->find());
        $this->set(compact('events'));

        $guests = $this->Paginator->paginate($this->Events->Guests->find());
        $this->set(compact('guests'));

        $users = $this->Paginator->paginate($this->Events->Users->find());
        $this->set(compact('users'));


        //test
        $guest = $this->Events->newEntity();
        if ($this->request->is('post')) {
            $guest = $this->Guests->patchEntity($guest, $this->request->getData());

            $guest->user_id = $this->Auth->user('id');

            if ($this->Guests->save($guest)) {
                $this->Flash->success(__('Votre événement a été crée.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Impossible d\'ajouter votre événement.'));
        }
        /*        $guest = $this->Events->Guests->find('list');

                $this->set('guest', $guest);*/

        $this->set('$guest', $guest);
    }

/*    public function invit(){

        $events = $this->Events->find();
        $this->set('lesEvents', $events);

        $guests = $this->Guests->find();
        $this->set('lesGuests', $guests);

    }*/

/*    public function view($e)
    {
        $event = $this->Events->get($e);
        $this->set(compact('event'));
    }*/

    public function add()
    {
        $event = $this->Events->newEntity();
        if ($this->request->is('post')) {
            $event = $this->Events->patchEntity($event, $this->request->getData());

            $event->user_id = $this->Auth->user('id');

            if ($this->Events->save($event)) {
                $this->Flash->success(__('Votre événement a été crée.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Impossible d\'ajouter votre événement.'));
        }
/*        $guest = $this->Events->Guests->find('list');

        $this->set('guest', $guest);*/

        $this->set('event', $event);
    }

    public function edit($id)
    {
        $events = $this->Events->get($id);

        if ($this->request->is(['post', 'put'])) {
            $this->Events->patchEntity($events, $this->request->getData());
            if ($this->Events->save($events)) {
                $this->Flash->success(__('Your article has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your article.'));
        }

        $this->set('event', $events);
    }

    public function delete($slug)
    {
        $this->request->allowMethod(['post', 'delete']);

        $event = $this->Events->findBySlug($slug)->firstOrFail();
        if ($this->Events->delete($event)) {
            $this->Flash->success(__('L\'événement {0} a été supprimé.', $event->title));
            return $this->redirect(['action' => 'index']);
        }
    }

}




