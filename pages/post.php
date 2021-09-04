<form action="result.php" method="post">
    <label for="title">
        <?php if (!empty($_SESSION['title_error'])): ?>
            <?= $_SESSION['title_error']?>
        <?php endif; ?>
    </label>
    <input type="text" name="title" id="title"
           value="<?php if (!empty($_SESSION['title']))echo $_SESSION['title']?>" placeholder="Title"><br>
    <label for="desc">
        <?php if (!empty($_SESSION['desc_error'])): ?>
            <?= $_SESSION['desc_error']?>
        <?php endif; ?>
    </label>
    <input type="text" name="desc" id="desc"
           value="<?php if (!empty($_SESSION['desc']))echo $_SESSION['desc']?>" placeholder="Description"><br>
    <button type="submit" name="post">SAVE</button>
</form>