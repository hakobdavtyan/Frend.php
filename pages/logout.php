<?php
require_once 'messages/const.php';
require_once 'objects/Help.php';
if(session_destroy()){
    Help::location(LOGIN);
}
?>