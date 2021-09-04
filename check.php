<?php
session_start();
require_once 'objects/DB.php';
require_once 'objects/Validator.php';
require_once 'objects/Help.php';
require_once 'messages/const.php';
if (isset($_POST['login'])) {
    //todo validation empty,

    $email = Validator::validate_email($_POST['email']);

    $conn = new DB();
    $data = $conn->find(['email' => $email], USERS, ['id' => "", 'password' => ""]);

    if (!Help::isEmpty($data)) {

        if (password_verify($_POST['password'], $data['password'])) {
            $_SESSION['user_id'] = $data['id'];
//            var_dump($_SESSION['user_id']);die;
            Help::location(ACCOUNT);

        } else {
            $_SESSION['invalid_login'] = INVALID_LOGIN;
            Help::location(LOGIN);
        }
    } else {
        $_SESSION['invalid_login'] = INVALID_LOGIN;
        Help::location(LOGIN);
    }
}
?>