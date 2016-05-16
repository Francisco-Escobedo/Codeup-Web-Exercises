<?php

DEFINE ('DB_HOST', '127.0.0.1');
DEFINE ('DB_NAME', 'parks_db');
DEFINE ('DB_USER', 'parks_user');
DEFINE ('DB_PASS', 'password');

require 'db_connect.php';

$drop = 'DROP TABLE IF EXISTS national_parks';
$dbc->exec($drop);

$createTable = 'CREATE TABLE national_parks (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT, 
    PRIMARY KEY (id),
    name VARCHAR(40) NOT NULL,
    location VARCHAR(100) NOT NULL,
    date_established Year(4),
    area_in_acres Double,
    description VARCHAR(500) NOT NULL
)';
$dbc->exec($createTable);

