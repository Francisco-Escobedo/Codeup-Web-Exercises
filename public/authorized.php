<?php

$username = isset($_POST['username']) ? $_POST['username'] : '';

$password = isset($_POST['password']) ? $_POST['password'] : '';

?>

<!DOCTYPE html>
<html>
<head>
    <title>POST Example</title>
</head>
<body>
    <h2>Username</h2>
    <p><?php echo $username; ?></p>
    <h2>Password</h2>
    <p><?php echo $password; ?></p>
    <a href="login.php">Back</a>
</body>
</html>
