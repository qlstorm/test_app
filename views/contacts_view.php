<?php require 'menu.php'; ?>

<div>
    <a href="/contacts/add/<?= $id ?>">edit</a>
    <a href="/contacts/delete/<?= $id ?>">delete</a>
    <a href="/contacts/addOrder/<?= $id ?>">add order</a>
</div>

<p>
    Name<br>
    <?= $row['name'] ?>
</p>

<p>
    Surname<br>
    <?= $row['surname'] ?>
</p>

Orders
<table>
    <tr>
        <th>name</th>
        <th>summ</th>
    <tr>
    <?php foreach ($orders as $order) { ?>
        <tr>
            <td><a href="/orders/list/<?= $order['id'] ?>"><?= $order['name'] ?></a></td>
            <td><?= $order['summ'] ?></td>
            <td><a href="/contacts/deleteOrder/<?= $id ?>/<?= $order['id'] ?>">delete</a></td>
        <tr>
    <?php } ?>
</table>
