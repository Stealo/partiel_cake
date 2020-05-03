<?= $this->Form->create($modif, ['enctype' => 'multipart/form-data']) ?>
    <?= $this->Form->control('avatar',['type' => 'file']) ?>
    <?= $this->Form->button('valider') ?>
<?= $this->Form->end() ?>
