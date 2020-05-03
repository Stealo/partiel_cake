<nav class="terminal-menu">
    <ul>
        <p><?= $this->Html->link('>Ajout d\'événement',['action' => 'add']) ?></p>
        <p><?= $this->Html->link('>Les événements',['action' => 'index']) ?></p>
        <p><?= $this->Html->link('>Se déconnecter', ['controller' => 'Users', 'action' => 'logout']) ?></p>
    </ul>
</nav>

<!-- Fichier : src/Template/Events/add.ctp -->

<h1>Ajouter un événement</h1>
<?php
echo $this->Form->create($event);
echo $this->Form->control('title');
echo $this->Form->control('created');
echo $this->Form->control('beginning');
echo $this->Form->control('location');
echo $this->Form->control('description');
echo $this->Form->control('modified');
echo $this->Form->button(__('Sauvegarder l\'article'));
echo $this->Form->end();

?>
<!--
<?php /*echo $guest->event_id */?>

-->


