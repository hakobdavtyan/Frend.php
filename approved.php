<?php
require_once "objects/DB.php";
require_once "objects/Friends.php";
require_once "objects/Help.php";
$id = $_POST['friends_id'];
$del = $_POST['delete'];
$conn = new DB();
$update = $conn->update($id,$del);