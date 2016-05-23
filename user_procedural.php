<?php

require_once 'User.php';

$user=new User();
$user->name = "Caleb";
$user->email = "caleb@wisc.edu";
$user->password = "password";
$user->avatar = "imageUrl";
$user->save();
