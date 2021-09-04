<?php
session_start();
require_once "inc/head.php";

require_once "inc/header.php";
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
if (isset($_GET['page'])) {
    $page = $_GET['page'];
//    var_dump($page);
    switch ($page) {
        case 'registration':
            require_once "pages/register.php";
            break;
        case 'login':
            require_once "pages/login.php";
            break;
        case 'posts':
            require_once "pages/post.php";
            break;
        case 'account':
            require_once "pages/account.php";
            break;
        case 'logout':
            require_once "pages/login.php";
            break;
        default:
            require_once "pages/login.php";
    }
} else {
    require_once "pages/register.php";
}
if(empty($_SESSION['user_id']))
    session_unset();
require_once "inc/footer.php";
?>
