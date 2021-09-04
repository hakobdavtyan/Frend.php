<form action="check.php" method="post">
    <label for="eml">
        <?php if (!empty($_SESSION['email_error'])): ?>
            <?= $_SESSION['email_error'] ?>
        <?php elseif (!empty($_SESSION['validate_email'])) : ?>
            <?= $_SESSION['invalid_login'] ?>
        <?php elseif (!empty($_SESSION['invalid_login'])) : ?>
            <?= $_SESSION['invalid_login'] ?>
        <?php endif; ?>
    </label>
    <input type="email" name="email" id="eml"
           value="<?php if (!empty($_SESSION['email'])) echo $_SESSION['email'] ?>" placeholder="Email"><br>
    <label for="pass"></label>
    <input placeholder="Password" type="password" name="password" id="pass"><br>
    <button type="submit" name="login">SAVE</button>
</form>
<a href="index.php?page=registration">Register</a>



