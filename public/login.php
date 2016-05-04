<?php

session_start();

require 'functions.php';
require_once '../Auth.php';

$error = '';

Auth::Check();

if (null == isset($_REQUEST['username'])
    && null == isset($_REQUEST['password'])){
    $_REQUEST['username'] = '';
    $_REQUEST['password'] = '';
} 

Auth::Attempt($_REQUEST['username'], $_REQUEST['password']);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<form method="POST">

    <label>Username</label>

    <div><input type="text" name="username"></div>

    <label>Password</label>

    <div><input type="password" name="password"></div> <br>

    <div><font color="red"><?= Auth::$error ?></font><div>

    <input type="submit"> 

</form>

<a href="logout.php"> LOGOUT </a>

</body>

</html>