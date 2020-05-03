<?php

namespace App\Controller;

class UsersController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        //autorise l'action logout(meme en cours de deconnexion)
        $this->Auth->allow(['logout', 'new']);
    }

    public function login()
    {
        //var_dump($this->Auth);
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                $this->Flash->success('Bienvenue');
                return $this->redirect($this->request->getQuery('redirect', [
                    'controller' => 'Events',
                    'action' => 'index',
                ]));
            }
            $this->Flash->error('connexion impossible, verifié les données');
        }
    }

    public function logout()
    {
        $this->Flash->success('Bye bye');
        return $this->redirect($this->Auth->logout());
    }

    public function index()
    {
        //var_dump($this->Auth);
        $list = $this->Users->find();
        $this->set(compact('list'));
    }

    public function view($id)
    {
        $user = $this->Users->get($id);
        $this->set(compact('user'));
    }

    public function new()
    {
        $n = $this->Users->newEntity();
        $this->set(compact('n'));
        if ($this->request->is('post')) {
            $n = $this->Users->patchentity($n, $this->request->getData());
            if ($this->Users->save($n)) {
                $this->Flash->success('Bienvenue');
                return $this->redirect(['action' => 'login', $n->id]);
            }
            $this->Flash->error('Création de compte impossible');
        }
    }

    public function edit()
    {
        //var_dump($this->Auth->user());
        $u = $this->Auth->user();
        $e = $this->Users->find()->where(['id' => $u['id']]);
        if ($e->isEmpty()) {
            $this->flash->error('utilisateur introuvable');
            return $this->redirect(['action' => 'new']);
        }
        $fe = $e->first();
        $this->set('e', $fe);
        if ($this->request->is(['post', 'put'])) {
            $this->Users->patchEntity($fe, $this->request->getData());
            if ($this->Users->save($fe)) {
                $this->Flash->success('compte modifié');
                return $this->redirect(['action' => 'view', $fe->id]);
            }
            $this->Flash->error('Modif impossible');
        }
    }//fin edit

    public function editavatar()
    {
        //on récupére les info du connécté
        $modif = $this->Users->get($this->Auth->user('id'));
        //on les passe à la vue pour faire les form
        $this->set(compact('modif'));
        //on copie en mémoire le nom de l'ancien fichier
        $ancienNom = $modif->avatar;
        //si on reçoit un nouveau form
        if ($this->request->is(['post', 'put'])) {
            //on patch les données
            $this->Users->patchEntity($modif, $this->request->getData());
            //si on a pas reçu le fichier ou le format de l'image n'est pas le bon
            if (empty($this->request->getData()['avatar']['name']) ||
            !in_array($this->request->getData()['avatar']['type'], ['image/png', 'image/jpg', 'image/jpeg', 'image/gif'])){
                //flash error
                $this->Flash->error('format erronné. png jpg jpeg gif');
            }else{//sinon
                //on récupéré l'extension > pathInfo(nom, PATHINFO_EXTENSION)
                $ext = pathinfo($this->request->getData()['avatar']['name'], PATHINFO_EXTENSION);
                //on crée le nouveaux nom qui nous intéresse (id + timestamp
                $newName = 'user-' . $modif->id . '-' . time() . '.' . $ext;
                //on déplace le ficheir de la mémoire temporaire vers le dossier avatar --> move_uploaded_file(emplacement tmp, WWW_root.'img/avatar/'.NV_NOM
                move_uploaded_file($this->request->getData()['avatar']['tmp_name'],
                    WWW_ROOT . 'img/avatars/' . $newName);
                //on remplace le nom dans l'objet à sauvegardé
                $modif->avatar = $newName;
                //on essaie la sauvegarde (if else)
                if ($this->Users->save($modif)) {
                    $this->Flash->success('image uploadé');
                    //si l'ancien fichier existe --> !empty & file_exists
                    if (!empty($ancienNom) && file_exists(WWW_ROOT . 'img/avatars/' . $ancienNom))
                        //on le supprime --> unlink
                        unlink(WWW_ROOT . 'img/avatars/' . $ancienNom);

                    return $this->redirect(['action' => 'view', $modif->id]);

                } else {
                    $this->Flash->error('Modification impossible');
                }
            }
        }
    }

    public function delete()
    {
        $u = $this->Auth->user();
        $this->request->allowMethod(['delete', 'post']);
        $d = $this->Users->get($u['$id']);
        if ($this->Users->delete($d)) {
            $this->Flash->success('compte supprimé');
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error('suppression impossible');
        return $this->redirect(['action' => 'view', $u['$id']]);
    }
}
