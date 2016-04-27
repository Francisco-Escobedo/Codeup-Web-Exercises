<?php

$error = '';

if (!isset($_POST['username']) && !isset($_POST['password'])){
    $username = '';
    $password = '';
} else {
    if ($_POST['username'] == 'guest' & $_POST['password'] == 'password'){
        header('location: authorized.php');
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

</body>

</html>