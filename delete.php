<?php
require_once "objects/DB.php";
require_once "messages/const.php";
$reject = $_POST['reject'];
$conn = new DB();
$delete = $conn->delete(FRIENDS,$id);
