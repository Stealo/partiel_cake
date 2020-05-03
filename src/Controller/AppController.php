<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    public function beforeRender(Event $e)
    {
        //transmet les données de connexion dans n'importe quelle vue
        $this->set('Auth', $this->Auth);
    }
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');

        // Partie gerant la connexion
        $this->loadComponent('Auth', [
            // Dit de quelle manirere on se connecte
            'authenticate' => [
                // Type de methode ( form / facebookConnect etc... )
                'Form' => [
                    // Champs qui vont nous servir
                    'fields' => [
                        'username' => 'login',
                        // 'password' => 'fieldname_from_db'
                        'password' => 'password'
                    ]
                ]
            ],
            // Sur quel emplacement
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            // Où redirige-t'on si on a été bloqué
            'unauthorizedRedirect' => $this->referer()
        ]);

        // Actions qu'on a le droit de faire sans être loggué
        // Autorise toutes les actions listées
        // Actions [display et login ] de tous les controllers pas d'un Controller spécifique
        $this->Auth->allow(['display', 'login', 'new']);

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
    }
}
