<?php

class Validator
{
public static function validate_gender($gender){
    if($gender !== 'male' || $gender !== 'female'){
        $_SESSION['validate_gender'] = VALID_GENDER;
        self::location('index.php');
    }
    return $gender;
}

    public static function validate_email($e_mail)
    {
        $e_mail = filter_var($e_mail, FILTER_SANITIZE_EMAIL);


        if (filter_var($e_mail, FILTER_VALIDATE_EMAIL)
            === false) {
            $_SESSION['validate_email'] = VALID_EMAIL;
            self::location('index.php');
        }
        return $e_mail;
    }

    public static function vcp($pass, $re_pass)
    {
        return (($pass <=> $re_pass) == 0) ? $pass : false;

    }

    public static function location($page)
    {
        header('Location:' . $page);
    }

   public static function validate_phone($phn)
    {
        if (!filter_var($phn, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/^\(?[0-9]{3}\)?(-?[0-9]{2}){3}$/'))) !== false) {
            $_SESSION['validate_phone'] = VALID_PHONE;
            self::location(REGISTER);

        }
        return $phn;
    }

    public static function validate_string($str)
    {
        return filter_var($str, FILTER_SANITIZE_STRING);
    }
}