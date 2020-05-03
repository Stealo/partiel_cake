<!-- File: templates/Articles/index.php -->

<h1>Messages</h1>
<table>
    <tr>
        <th>Title</th>
        <th>Created</th>
        <th>Envoyeur</th>
        <th>Receveur</th>
        <th>Contenue</th>
        <th>Lu à</th>
    </tr>

    <!-- Here is where we iterate through our $articles query object, printing out article info -->

    <?php foreach ($messages as $message): ?>
        <tr>
            <td>
                <?= $message->id ?>
            </td>
            <td>
                <?= $message->created->format(DATE_RFC850) ?>
            </td>
            <td>
                <?= $message->sender_id ?>
            </td>
            <td>
                <?= $message->receiver_id ?>
            </td>
            <td>
                <?= $message->content ?>
            </td>
            <td>
                <?= $message->readstatus ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
