<?php

require_once 'User.php';

// $user=new User();
// $user->name = "diego";
// $user->email = "diego@gmail.edu";
// $user->password = "something";
// $user->avatar = "picture";
// $user->save();

// echo "the id of the last inserted row in the db is" . $user->id.PHP_EOL;

// echo "all users below" . PHP_EOL;
// $allUsers=User::all();
// var_dump($allUsers);

// echo "first user below" . PHP_EOL;
// $result = User::find(1);
// var_dump($result);
// $user->email = "pancho@gmail.com";
// $user->save();

$user = User::find(3);
$user->delete(3);
var_dump($user);