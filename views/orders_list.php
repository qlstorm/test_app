<?php require 'menu.php'; ?>

<div>
    <a href="/orders/add">add</a>
</div>

<table>
    <tr>
        <th>name</th>
        <th>summ</th>
    <tr>
    <?php foreach ($rows as $row) { ?>
        <tr>
            <td><a href="/orders/list/<?= $row['id'] ?>"><?= $row['name'] ?></a></td>
            <td><?= $row['summ'] ?></td>
        <tr>
    <?php } ?>
</table>