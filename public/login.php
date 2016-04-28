<?php

session_start();

require 'functions.php';

$error = '';

if (isset($_SESSION['logged_in_user'])){
    header('location: authorized.php');
}

if (!inputHas('username') && !inputHas('password')){
    $username = '';
    $password = '';
} else {
    if ($_POST['username'] == 'guest' && $_POST['password'] == 'password'){
        header('location: authorized.php');
        $logged_in_user = $_POST['username'];
        $_SESSION['logged_in_user'] = $logged_in_user;
        exit();
    } else {
        $error = 'login failed';
    }
}

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

    <div><font color="red"><?= $error ?></font><div>

    <input type="submit"> 

</form>

<a href="logout.php"> LOGOUT </a>

</body>

</html>