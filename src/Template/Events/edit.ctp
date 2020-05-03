
 <h1>Modifier un article</h1>
 <?php
 echo $this->Form->create($event);
 echo $this->Form->control('user_id', ['type' => 'hidden']);
 echo $this->Form->control('title');
 echo $this->Form->button(__('Sauvegarder l\'article'));
 echo $this->Form->end();
 ?>
