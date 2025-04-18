<?php require 'menu.php'; ?>

<div>
    <a href="/contacts/add">add</a>
</div>

<table>
    <tr>
        <th>name</th>
        <th>surname</th>
    <tr>
    <?php foreach ($rows as $row) { ?>
        <tr>
            <td><a href="/contacts/list/<?= $row['id'] ?>"><?= $row['name'] ?></a></td>
            <td><?= $row['surname'] ?></td>
        <tr>
    <?php } ?>
</table>