<nav class="terminal-menu">
    <ul>
        <p><?= $this->Html->link('>Liste des membres',['action' => 'index']) ?></p>
        <p><?= $this->Html->link('>Modifier votre profil',['action' => 'edit']) ?></p>
        <p><?= $this->Html->link('>Déconnexion',['action' => 'logout']) ?></p>
    </ul>
</nav>

<h1>liste des membres</h1>

<?php
if ($list->count() == 0) {
    echo '<p>il ny a aucun utilisateur actuellement</p>';
} else {
    echo '<ul>';
    foreach ($list as $value) {
        echo '<li>' .
            $this->Html->link($value->login, ['action' => 'view', $value->id]) . '</li>';
    }
    echo '</ul>';
}




















