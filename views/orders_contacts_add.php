<?php require 'menu.php'; ?>

<?php if (!$rows) { ?>
    No contacts

    <?php exit; ?>
<?php } ?>

<form method="POST">
    <select name="contact_id">
        <?php foreach($rows as $row) { ?>
            <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
        <?php } ?>
    </select>

    <p><input type="submit"></p>
</form>