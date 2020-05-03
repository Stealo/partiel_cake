<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('terminal.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

</head>
<body>

<div class="terminal-nav container clearfix">
    <div class="terminal-logo">
        <div class="logo terminal-prompt"><a href=""><?= $this->fetch('title') ?></a>
        </div>
    </div>
    <nav class="terminal-menu">
        <ul>
            <li><?= $this->Form->postLink('Evénements', ['controller' => 'Events', 'action' => 'index']) ?></li>
            <li><?= $this->Form->postLink('Mon compte', ['controller' => 'Users', 'action' => 'index']) ?></li>
            <li><?= $this->Form->postLink('Messagerie', ['controller' => 'Messages', 'action' => 'index']) ?></li>
        </ul>
    </nav>
</div>

<?= $this->Flash->render() ?>
<div class="container clearfix">
    <?= $this->fetch('content') ?>
</div>
<footer>
</footer>
</body>
</html>



