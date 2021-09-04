<form action="result.php" method="post">
    <label for="name">
        <?php if (!empty($_SESSION['user_error'])): ?>
            <?= $_SESSION['user_error']?>

        <?php endif; ?>
    </label>
    <input type="text" name="user" id="name"
           value="<?php if (!empty($_SESSION['user']))echo $_SESSION['user']?>" placeholder="User name, surname"><br>
    <label for="phn">
        <?php if (!empty($_SESSION['phone_error'])): ?>
            <?= $_SESSION['phone_error']?>
        <?php elseif (!empty($_SESSION['validate_phone'])) :?>
            <?= $_SESSION['validate_phone']?>
        <?php endif; ?>
    </label>
    <input type="text" name="phone" id="phn"
           value="<?php if (!empty($_SESSION['phone']))echo $_SESSION['phone']?>" placeholder="Phone"><br>
    <label for="gender">
        <?php if (!empty($_SESSION['gender'])): ?>
            <?= $_SESSION['gender']?>
        <?php elseif (!empty($_SESSION['validate_gender'])) :?>
            <?= $_SESSION['validate_gender']?>
        <?php elseif (!empty($_SESSION['gender_error'])) :?>
            <?= $_SESSION['gender_error']?>
        <?php endif; ?>Gender
    </label>
    <input type="radio" name="gender" id="gender"
           value="male" <?php if (!empty($_SESSION['gender']) && $_SESSION['gender'] == 'male') {echo "checked";} ?>>Male
    <input type="radio" name="gender" id="gender"
           value="female" <?php if (!empty($_SESSION['gender']) && $_SESSION['gender'] == 'female') echo "checked"?>>Female
    <br>
    <label for="eml">
        <?php if (!empty($_SESSION['email_error'])): ?>
            <?= $_SESSION['email_error']?>
        <?php elseif (!empty($_SESSION['validate_email'])) :?>
            <?= $_SESSION['validate_email']?>
        <?php endif; ?>
    </label>

    <input type="email" name="email" id="eml"
           value="<?php if (!empty($_SESSION['email'])) echo $_SESSION['email']?>" placeholder="Email"><br>

    <label for="pass"></label>
    <?php if(!empty($_SESSION['pass_error'])) :?>
        <?=$_SESSION['pass_error']?>
    <?php elseif (!empty($_SESSION['pass_val'])):?>
        <?=$_SESSION['pass_val']?>
    <?php endif;?>
    <input placeholder="Password" type="password" name="password" id="pass"><br>
    <label for="re-pass"></label>
    <input placeholder="Confirm password" type="password" name="re_password" id="re-pass">
    <button type="submit" name="register">SAVE</button>
</form>




