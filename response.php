<?php
require_once "objects/DB.php";
require_once "objects/Friends.php";
require_once "objects/Help.php";


function send()
{
    var_dump($_POST);
    $user_id = $_POST['user_id'];
    $friends_id = $_POST['friends_id'];
    $fr = new Friends($user_id, $friends_id);
    $obj = Help::convert_to_array($fr);
    $fr->create_friends($obj);
}

send();
?>

