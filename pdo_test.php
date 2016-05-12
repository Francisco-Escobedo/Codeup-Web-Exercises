<?php 

require 'db_credentials.php';
require 'db_connect.php';

echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

$users = [
    'luis',
    'zach',
    'paul',
    'sam',
    'taylor',
    'sal',
    'colin'
];

foreach ($users as $name){
    $query = 'INSERT INTO users (name) VALUES ("'. $name . '")';
    $dbc->exec($query);
    var_dump($dbc->lastInsertId());
}