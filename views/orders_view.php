<?php require 'menu.php'; ?>

<div>
    <a href="/orders/add/<?= $id ?>">edit</a>
    <a href="/orders/delete/<?= $id ?>">delete</a>
    <a href="/orders/addContact/<?= $id ?>">add contact</a>
</div>

<p>
    Name<br>
    <?= $row['name'] ?>
</p>

<p>
    Summ<br>
    <?= $row['summ'] ?>
</p>

Contacts
<table>
    <tr>
        <th>name</th>
        <th>surname</th>
    <tr>
    <?php foreach ($contacts as $contact) { ?>
        <tr>
            <td><a href="/contacts/list/<?= $contact['id'] ?>"><?= $contact['name'] ?></a></td>
            <td><?= $contact['surname'] ?></td>
            <td><a href="/orders/deleteContact/<?= $id ?>/<?= $contact['id'] ?>">delete</a></td>
        <tr>
    <?php } ?>
</table>
