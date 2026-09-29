<?php include 'head.php'; ?>

<?php foreach (models\Categories::getList(['with_articles' => true]) as $row) { ?>
    <div>
        <a href="/category/<?= $row['id'] ?>"><?= $row['name'] ?></a>
        <div>
            <?= $row['description'] ?>
        </div>
    </div>
<?php } ?>

<div style="margin-top: 10px;">Last articles</div>

<table>
    <?php foreach (models\Articles::getList(['limit' => 3]) as $row) { ?>
        <tr>
            <td><a href="/<?= $row['id'] ?>"><?= $row['name'] ?></a></td>
        </tr>
    <?php } ?>
</table>