<?php require 'menu.php'; ?>

<?php if (!$rows) { ?>
    No orders

    <?php exit; ?>
<?php } ?>

<form method="POST">
    <select name="order_id">
        <?php foreach($rows as $row) { ?>
            <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
        <?php } ?>
    </select>

    <p><input type="submit"></p>
</form>