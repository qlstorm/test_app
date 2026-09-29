<?php

    include 'head.php';

    $row = models\Articles::getList($_GET)[0];

    $categories = models\Categories::getList([
        'article' => $_GET['id']
    ]);

?>

<div><?= $row['name'] ?></div>

<div><?= $row['description'] ?></div>

<div>views count: <?= $row['views'] ?></div>

<div style="margin-top: 10px;">Categories</div>

<table>
    <?php foreach ($categories as $row) { ?>
        <tr>
            <td><?= $row['name'] ?></td>
        </tr>
    <?php } ?>
</table>
