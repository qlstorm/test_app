<style>
    .app-column {
        float: left;
        margin-right: 20px;
    }

    .active {
        background-color: yellow;
    }
</style>

<?php require 'menu.php'; ?>

<div>
    <div class="app-column">
        <div>Меню</div>
        <div><a href="/orders" class="<?= $ordersActive ?? '' ?>">Сделки</a></div>
        <div><a href="/contacts" class="<?= $contactsActive ?? '' ?>">Контакты</a></div>
    </div>

    <div class="app-column">
        <div>Список</div>

        <?php foreach($list as $listRow) { ?>
            <?php
                $active = '';

                if ($listRow['id'] == $id) {
                    $active = 'active';
                }
            ?>

            <div><a href="/<?= $type ?>/<?= $listRow['id'] ?>" class="<?= $active ?>"><?= $listRow['name'] ?></a></div>
        <?php } ?>
    </div>

    <div class="app-column">
        <div>Содержимое</div>
        <table>
            <?php foreach($row as $key => $value) { ?>
                <tr>
                    <td><?= $rowNames[$key] ?></td>
                    <td><?= $value ?></td>
                </tr>
            <?php } ?>

            <?php foreach($rows as $row) { ?>
                <tr>
                    <td><?= $rowsNames['id'] ?></td>
                    <td><?= $row['name']  ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>