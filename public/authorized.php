<?php

session_start();

require 'functions.php';

if (inputHas('logged_in_user')){
    header('location: login.php');
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>POST Example</title>
</head>
<body>
    <h2>Authorized </h2>
    <p> Welcome Back <?=escape('logged_in_user')?> </p>
    <a href="logout.php">LOGOUT</a>
</body>
</html>
