<!-- Fichier : src/Template/Events/index.ctp -->

<h1>Evenements</h1>
<p><?= $this->Html->link("Ajouter un événement", ['action' => 'add']) ?></p>
<table>
    <tr>
        <th>Titre</th>
        <th>Créé le</th>
        <th>Par</th>
        <th>Date</th>
        <th>Lieux</th>
        <th>Description</th>
    </tr>

    <tr>
        <td>
            <?= $event->title ?>
        </td>
        <td>
            <?= $event->created->i18nFormat('dd/MM/yyyy HH:mm:ss') ?>
        </td>
        <td>
            <?= $event->user_id ?>
        </td>
        <td>
            <?= $event->beginning->i18nFormat('dd/MM/yyyy HH:mm:ss') ?>
        </td>
        <td>
            <?= $event->location ?>
        </td>
        <td>
            <?= $event->description ?>
        </td>
    </tr>
</table>

