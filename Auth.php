<?php

require_once 'Log.php';

class Auth{
    public static $password = '$2y$10$SLjwBwdOVvnMgWxvTI4Gb.YVcmDlPTpQystHMO2Kfyi/DS8rgA0Fm';

    public static $error = '';

    public static function Attempt($username, $password){
        if(!empty($_REQUEST)
            && $_REQUEST['username'] === 'guest'
            && password_verify($password, Auth::$password)) {
            $_SESSION['logged_in_user'] = $_REQUEST['username'];
            header('Location: authorized.php');
        } else {
            self::$error = 'login failed';
        }

    }

    public static function Check(){
        if (isset($_SESSION['logged_in_user'])){
            header('location: authorized.php');
        }
    }

    public static function User (){
        return $_SESSION['logged_in_user'];
    }

    public static function Logout (){
        session_unset();

        session_destroy();

        header('location: login.php');
    }

}