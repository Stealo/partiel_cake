<nav class="terminal-menu">
    <ul>
        <p><?= $this->Html->link('>Ajout d\'événement',['action' => 'add']) ?></p>
        <p><?= $this->Html->link('>Les événements',['action' => 'index']) ?></p>
        <p><?= $this->Html->link('>Se déconnecter', ['controller' => 'Users', 'action' => 'logout']) ?></p>
    </ul>
</nav>

<!-- Fichier : src/Template/Events/index.ctp -->

<h1>Evénements</h1>

<table>
    <tr>
        <th>Titre</th>
        <th>Créé le</th>
        <th>Par</th>
        <th>Action</th>
    </tr>

    <?php foreach ($events as $event): ?>
        <tr>
            <td>
                <?= $this->Html->link($event->title, ['action' => 'view', $event->id]) ?>
            </td>
            <td>
                <?= $event->created->format(DATE_RFC850) ?>
            </td>
            <td>
                <?= $event->user_id ?>
            </td>
            <td>
                <?= $this->Html->link('Modifier', ['action' => 'edit', $event->id]) ?>
                <?= $this->Form->postLink(
                    'Supprimer',
                    ['action' => 'delete', $event->id],
                    ['confirm' => 'Êtes-vous sûr ?'])
                ?>
            </td>
        </tr>
    <?php endforeach; ?>

</table>


<!--table test de guests -->
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

