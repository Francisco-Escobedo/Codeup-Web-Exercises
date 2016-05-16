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
    'area_in_acres' => '47389.67',
    'description' => 'Home to many plants and animals, this par contains the tallest mountain on the U.S. Atlantic coast.'],
// Park 2
    ['name' => 'American Samoa',
    'location' => 'American Samoa',
    'date_established' => '1988', 
    'area_in_acres' => '9000.00',
    'description' => 'Welcoming you to the heart of the South Pacific, this park is a world of sights, sounds, and experiences that you will find in no other national park in the United States. Enjoy this unique national park and the welcoming people of American Samoa.'],
// Park 3 
    ['name' => 'Arches',
    'location' => 'Utah',
    'date_established' => '1929',
    'area_in_acres' => '76518.98',
    'description' => 'Visit Arches and discover a landscape of contrasting colors, landforms, and textures unlike any other in the world. This park has over 2,000 natural stone arches, in addition to hundreds of soaring pinnacles, massive fins, and giant balanced rocks.'],
// Park 4  
    ['name' => 'Badlands',
    'location' => 'South Dakota',
    'date_established' => '1978',
    'area_in_acres' => '242755.94',
    'description' => 'The rugged beauty of the badlands draws visitors from around the world. These striking geologic deposits comtain one of the world\'s richest fossil beds. Ancient mannals such as the rhino, horse, and sabre-toothed cat once roamed here.'],
// Park 5   
    ['name' => 'Big Bend',
    'location' => 'Texas',
    'date_established' => '1944',
    'area_in_acres' => '801163.21',
    'description' => 'There is a place in Far West Texas where night skies are dark as coal and rivers carve temple-like canyons in ancient limestone. Here, at the end of the road, hundreds o bird species take refuge in a solitary mountain range surrounding by weather-beaten deserts. Tenacious cactus bloom in sublime southwestern sun, and diversity of species is the best in the country. This magical place is Big Bend.'],
// Park 6
    ['name' => 'Biscayne',
    'location' => 'Florida',
    'date_established' => '1980',
    'area_in_acres' => '172924.07',
    'description' => 'Home to many plants and animals, this par contains the tallest mountain on the U.S. Atlantic coast.'],
// Park 7
    ['name' => 'Black Canyon of the Gunnison',
    'location' => 'Colorado',
    'date_established' => '1999',
    'area_in_acres' => '32950.03',
    'description' => 'Home to many plants and animals, this par contains the tallest mountain on the U.S. Atlantic coast.'],
// Park 8
    ['name' => 'Bryce Canyon',
    'location' => 'Utah',
    'date_established' => '1928',
    'area_in_acres' => '35835.08',
    'description' => 'Within sight of downtown Miami, yet worlds away, Biscayne protects a rare combination of aquamarine waters, emerald islands, and fish-bejeweled coral reefs. Here too is evidence of 10,000 years of human history, from pirates and shipwrecks to pineapple farmers and presidents. Outdoors enthusiasts can boat, snorkel, camp, watch wildlife... or simply relax in a rocking chair gazing out over the bay.'],
// Park 9
    ['name' => 'Canyonlands',
    'location' => 'Utah',
    'date_established' => '1964',
    'area_in_acres' => '337597.83',
    'description' => 'Canyonlands invites you to explore a wilderness of countless canyons and fantastically formed buttes carved by the Colorado River and its tributaries. Rivers divide the park into four districts: the Island in the Sky, the Needles, the Maze, and the rivers themselves. These areas share a primitive desert atmosphere, but each offers different opportunities for sightseeing and adventure.'],
// Park 10
    ['name' => 'Capitol Reef',
    'location' => 'Utah',
    'date_established' => '1971',
    'area_in_acres' => '241904.26',
    'description' => 'Located in south-central Utah in the heart of red rock country, Capitol Reef National Park is a hidden treasure filled with cliffs, canyons, domes and bridges in the Waterpocket Fold, a geologic monocline (a wrinkle on the earth) extending almost 100 miles.']
];

$stmt = $dbc->prepare('INSERT INTO national_parks (name, location, date_established, area_in_acres, description) VALUES (:name, :location, :date_established, :area_in_acres, :description)');

foreach ($parks as $park){
    $stmt->bindValue(':name', $park['name'], PDO::PARAM_STR);
    $stmt->bindValue(':location', $park['location'], PDO::PARAM_STR);
    $stmt->bindValue(':date_established', $park['date_established'], PDO::PARAM_INT);
    $stmt->bindValue(':area_in_acres', $park['area_in_acres'], PDO::PARAM_STR);
    $stmt->bindValue(':description', $park['description'], PDO::PARAM_STR);

    $stmt->execute();

    echo "Inserted ID:" . $dbc->lastInsertId() . PHP_EOL;
}