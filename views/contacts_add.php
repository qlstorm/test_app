<?php require 'menu.php'; ?>

<form method="POST">
    <?php if ($id) { ?>
        <input type="hidden" name="id" value="<?= $id ?>">
    <?php } ?>

    <p>
        Name<br>
        <input name="name" value="<?= $row['name'] ?? '' ?>">
    </p>
    <p>
        Surname<br>
        <input name="surname" value="<?= $row['surname'] ?? '' ?>">
    </p>
    <input type="submit">
</form>