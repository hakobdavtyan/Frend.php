<?php

require_once "DB.php";

class  User
{
    public $user_name;
    public $email;
    public $phone;
    public $gender;
    public $avatar;
    public $password;
    public $table = USERS;
    public $conn;

    /**
     * User constructor.
     */
    public function __construct($name, $email, $password, $phone, $avatar, $gender)
    {
        $this->user_name = $name;
        $this->email = $email;
        $password = password_hash($password, PASSWORD_DEFAULT);
        $this->password = $password;
        $this->phone = $phone;
        $this->gender = $gender;
        $this->avatar = $avatar;//$gender.".png";
        $this->conn = new DB();
    }

    public function create_user($obj)
    {
        $this->conn->create($obj, $this->table);
    }

    public function show_all_users()
    {
       return $this->conn->all($this->table);
    }
}