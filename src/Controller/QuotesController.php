<?php

//src/Controller/QuotesController.php

namespace App\Controller;

class QuotesController extends AppController{

    public function hello(){

    }

    public function content(){
        $c = 'Bonjour';

        //on transmet une variable
        $this->set('data', $c);
    }

    public function index(){
        //on récupére tous les élémentsde la base
        $list = $this->Quotes->find();

        //balance les infos à la vue
        $this->set('list', $list);

    }

    public function view($id){
        $quote = $this->Quotes->get($id);

        $this->set('quote', $quote);
    }

    public function new(){
        $new = $this->Quotes->newEntity();


        //si on est en méthode post
        if($this->request->is('post')){

            //on récupére le contenu des case s du forumalaire pour les placer dans l'entité vide
            $new = $this->Quotes->patchEntity($new, $this->request->getData());
            //si la sauvregarde réussi
            if($this->Quotes->save($new)){
                //on cree un message de succes
                $this->Flash->success('ok, citation enregistré');
                //on redirige vers la liste global des citation
                return $this->redirect(['action' => 'index']);
            }
            //message de plantage
            $this->Flash->error('Plantage');
        }//fin du test

/*        $this->set('new', $new);*/
        //equivalent (puiqsue la varialbe transmise aura le méme nom que celle du controller
        $this->set(compact('new'));
    }

    public function delete($id){
        //on autorise que les méthodes post et delete pour la suppression
        //si c'est autre chose ça plantera
        $this->request->allowMethod(['post', 'delete']);

        $q = $this->Quotes->get($id);

        if($this->Quotes->delete($quotes)){
            $this->Flash->success('supprimé');
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error('Suppression planté');
        return $this->redirect(['action' => 'view', $id]);
    }

    public function edit ($id){


        //on recupere les donnes lie a l'id
        $e = $this->Quotes->find()->where(['id' => $id]);

/*        var_dump($e);*/

        //si l'ensemble de resultat est vide on redirige
        if($e->isEmpty()){
            $this->Flash->error('Citation introuvable');
            return $this->redirect(['action' => 'index']);
        }
        // on passe le premier element de l'ensemble dans la uve
        $firstElement = $e->first();

        $this->set('elmt', $firstElement);

        // si on à reçu le formualire de momdif
        if($this->request->is(['post', 'put'])){
            $this->Quotes->patchEntity($firstElement, $this->request->getData());

            if ($this->Quotes->save($firstElement)){
                $this->Flash->success('Modification Ok');
                return $this->redirect(['action' => 'view', $id]);
        }
        $this->Flash->error('Modification plantage');
        }
    }


}





















