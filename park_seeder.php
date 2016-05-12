<?php

DEFINE ('DB_HOST', '127.0.0.1');
DEFINE ('DB_NAME', 'parks_db');
DEFINE ('DB_USER', 'parks_user');
DEFINE ('DB_PASS', 'password');

require 'db_connect.php';

$delete = 'TRUNCATE TABLE national_parks;';
$dbc->exec($delete); 

$parks = [
// Park 1
    ['name' => 'Acadia', 
    'location' => 'Maine', 
    'date_established' => '1919', 
    'area_in_acres' => '47389.67'],
// Park 2
    ['name' => 'American Samoa',
    'location' => 'American Samoa',
    'date_established' => '1988', 
    'area_in_acres' => '9000.00'],
// Park 3 
    ['name' => 'Arches',
    'location' => 'Utah',
    'date_established' => '1929',
    'area_in_acres' => '76518.98'],
// Park 4  
    ['name' => 'Badlands',
    'location' => 'South Dakota',
    'date_established' => '1978',
    'area_in_acres' => '242755.94'],
// Park 5   
    ['name' => 'Big Bend',
    'location' => 'Texas',
    'date_established' => '1944',
    'area_in_acres' => '801163.21'],
// Park 6
    ['name' => 'Biscayne',
    'location' => 'Florida',
    'date_established' => '1980',
    'area_in_acres' => '172924.07'],
// Park 7
    ['name' => 'Black Canyon of the Gunnison',
    'location' => 'Colorado',
    'date_established' => '1999',
    'area_in_acres' => '32950.03'],
// Park 8
    ['name' => 'Bryce Canyon',
    'location' => 'Utah',
    'date_established' => '1928',
    'area_in_acres' => '35835.08'],
// Park 9
    ['name' => 'Canyonlands',
    'location' => 'Utah',
    'date_established' => '1964',
    'area_in_acres' => '337597.83'],
// Park 10
    ['name' => 'Capitol Reef',
    'location' => 'Utah',
    'date_established' => '1971',
    'area_in_acres' => '241904.26']
];

foreach ($parks as $park){
    $insertParks = "INSERT INTO national_parks (name, location, date_established, area_in_acres) 
    VALUES ('{$park['name']}', '{$park['location']}', '{$park['date_established']}', '{$park['area_in_acres']}')";
    $dbc->exec($insertParks);
    echo "Inserted ID:" . $dbc->lastInsertId() . PHP_EOL;
}