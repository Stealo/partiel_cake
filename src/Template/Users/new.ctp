<?= $this->Form->create($n) ?>
<h1>Créer un compte</h1>
<?= $this->Form->control('login') ?>
<?= $this->Form->control('password') ?>
<?= $this->Form->button('Créer le compte') ?>
<?= $this->Form->end() ?>

