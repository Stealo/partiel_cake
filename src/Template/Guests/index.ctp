<!-- Fichier : src/Template/Events/index.ctp -->

<h1>Invitations</h1>
<table>
    <tr>
        <th>utilisateur</th>
        <th>Créé le</th>
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
                <?= $event->event_id ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>




event_id de events
user_id de users
