<!-- File: templates/Messages/add.php -->

<h1>Ajouter un message</h1>
<?php
echo $this->Form->create($message);
echo $this->Form->control('sender_id');
echo $this->Form->control('receiver_id');
echo $this->Form->control('content');
echo $this->Form->button(__('Save'));
echo $this->Form->end();
?>

