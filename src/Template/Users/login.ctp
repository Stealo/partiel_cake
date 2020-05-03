<?= $this->Form->create() ?>
<h1>Connexion</h1>

<?= $this->Form->control('login') ?>
<?= $this->Form->control('password') ?>

<div class="terminal-nav">
    <?= $this->Form->button('Se connecter') ?>
    <?= $this->Form->end() ?>
    <button>
        <?= $this->Html->link('S\'inscrire', ['action' => 'new']) ?>
    </button>
</div>
