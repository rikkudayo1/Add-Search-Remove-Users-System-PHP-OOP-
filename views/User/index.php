<div>
    <?php foreach($users as $user): ?>
        <h2><?= $user['first_name'] ?> <?= $user['last_name'] ?></h2>
        <h3>Age : <?= $user['age'] ?></h3>
        <form method="post">
            <input type="hidden" name="dl_fn" value="<?= $user['first_name'] ?>">
            <input type="hidden" name="dl_ln" value="<?= $user['last_name'] ?>">
            <button type="submit" name="delete_btn">Remove</button>
        </form>
        <hr>
    <?php endforeach ?>
</div>