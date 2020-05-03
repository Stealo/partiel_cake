<?php //src/Template/Quotes/content.ctp ?>

<p>id : <?= $quote->id ?></p>
<p>content : <?= $quote->content ?></p>
<p>author : <?= $quote->author ?></p>
<p>created : <?= $quote->created->i18nFormat('dd/MM/yyyy HH:mm:ss') ?></p>
<p>modified : <?= $quote->modified->i18nFormat('dd/MM/yyyy HH:mm:ss') ?></p>


<p>
    <?= $this->Form->postLink('Supprimer cette citation', ['action' => 'delete', $quote->id]) ?>
</p>

<p>
    <?= $this->Html->link('Modification de la citation', ['action'=>'edit', $quote->id]) ?>
</p>

<p>
    <?= $this->Html->link('retour a la liste', ['action'=>'index']) ?>
</p>

