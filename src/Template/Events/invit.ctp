<nav class="terminal-menu">
    <ul>
        <p><?= $this->Html->link('>Ajout d\'événement',['action' => 'add']) ?></p>
        <p><?= $this->Html->link('>Les événements',['action' => 'index']) ?></p>
        <p><?= $this->Html->link('>Se déconnecter', ['controller' => 'Users', 'action' => 'logout']) ?></p>
    </ul>
</nav>

<!-- Fichier : src/Template/Events/index.ctp -->

<!-- code test -->
    <?php foreach ($events as $event): ?>
    <?php endforeach; ?>


<!--table test de guests -->

    <?php foreach ($guests as $guest): ?>

    <?php endforeach; ?>

<!--    <?php /*foreach ($users as $user): */?>
        <tr>
            <td>
                <?/*= $guest->user_id */?>
            </td>
            <td>
                <?/*= $guest->event_id */?>
            </td>
            <td>
                <?/*= $event->title */?>
            </td>
        </tr>
    --><?php /*endforeach; */?>


</table>



<!-- Fichier : src/Template/Events/add.ctp -->

<h1>Invité une personne</h1>
<?php
echo $this->Form->create($guest);
echo $this->Form->control('user_id');
echo $this->Form->control('event_id');
echo $this->Form->control('guests_id');

echo $this->Form->button(__('Envoyer l\'invitation'));
echo $this->Form->end();

?>
<!--
<?php /*echo $guest->event_id */?>

-->


<table>
    <h1>Invitations</h1>
    <p><?= $this->Html->link("Ajouter une invitation", ['action' => 'invit']) ?></p>

    <tr>
        <th>utilisateur invité</th>
        <th>Id de l'event</th>
        <th>Pour l'événement</th>
    </tr>

    <?php foreach ($guests as $guest): ?>
        <tr>
            <td>
                <?= $guest->user_id ?>
            </td>
            <td>
                <?= $guest->event_id ?>
            </td>
            <td>
                <?= $event->title ?>
            </td>
            <!--            <td>
                <?/*= $this->Html->link('Modifier', ['action' => 'edit', $event->slug]) */?>
                <?/*= $this->Form->postLink(
                    'Supprimer',
                    ['action' => 'delete', $event->slug],
                    ['confirm' => 'Êtes-vous sûr ?'])
                */?>
            </td>-->
        </tr>
    <?php endforeach; ?>

</table>
