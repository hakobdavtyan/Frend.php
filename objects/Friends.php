<?php
require_once 'objects/DB.php';

class Friends
{
    public $user_id;
    public $friends_id;
    public $table = 'friends';
    public $conn;

    public function __construct($user_id,$friends_id)
    {
        $this->user_id = $user_id;
        $this->friends_id = $friends_id;
        $this->conn = new DB();
    }
    public function create_friends($obj)
    {
        $this->conn->create($obj, $this->table);
    }
}
