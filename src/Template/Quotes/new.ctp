<?php //src/Template/Quotes/content.ctp ?>

<?= $this->Form->create($new) ?>

    <?= $this->Form->control('content') ?>
    <?= $this->Form->control('author') ?>

    <?= $this->Form->button('Ajouter') ?>

<?= $this->Form->end() ?>
