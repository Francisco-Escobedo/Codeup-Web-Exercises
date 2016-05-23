<?php

//create a new table called `users`
// with a name, e-mail, and password column.
require_once 'adlister_credentials.php';
require_once 'db_connect.php';

$drop = 'DROP TABLE IF EXISTS users';
$dbc->exec($drop);

$createTable = 'CREATE TABLE users (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (id),
    name VARCHAR(40) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    avatar VARCHAR (100) NOT NULL
)';

$dbc->exec($createTable);
// next, will build out the model (makeout the save method)