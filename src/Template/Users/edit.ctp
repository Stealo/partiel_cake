<nav class="terminal-menu">
    <ul>
        <p><?= $this->Html->link('>Liste des membres',['action' => 'index']) ?></p>
        <p><?= $this->Html->link('>Modifier votre profil',['action' => 'edit']) ?></p>
        <p><?= $this->Html->link('>Déconnexion',['action' => 'logout']) ?></p>
    </ul>
</nav>

<h1>Modifier un compte</h1>
<?= $this->Form->control('login') ?>
<?= $this->Form->control('password', ['value' => '']) ?>
<?= $this->Form->input('avatar_file', ['value' => 'Votre avatar', 'type' => 'file']) ?>
<?= $this->Form->button('Modifier') ?>

<?= $this->Form->end() ?>

