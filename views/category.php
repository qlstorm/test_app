<?php

    include 'head.php';

    $row = models\Categories::getList($_GET)[0];

    $articles = models\Articles::getList([
        'category' => $_GET['id'],
        'order' => 'articles.views desc, articles.id desc'
    ]);

?>

<div><?= $row['name'] ?></div>

<div><?= $row['description'] ?></div>

<div style="margin-top: 10px;">Articles</div>

<table>
    <?php foreach ($articles as $row) { ?>
        <tr>
            <td><a href="/<?= $row['id'] ?>"><?= $row['name'] ?></a></td>
        </tr>
    <?php } ?>
</table>
