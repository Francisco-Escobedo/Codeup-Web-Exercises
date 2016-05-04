<?php

session_start();

require '../Input.php';
require '../Auth.php';

if (Auth::user() == 'guest'){

} else {
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
    <p> Welcome Back <?= Auth::user(); ?> </p>
    <a href="logout.php">LOGOUT</a>
</body>
</html>
