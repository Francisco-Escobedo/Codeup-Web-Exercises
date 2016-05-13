<?php

require '../db_credentials.php';
require '../db_connect.php';

if (isset($_GET['offset'])){
    $offset=$_GET['offset'];
} else {
    $offset=0;
}

function parksCounter($dbc){
    $parkCount=[];
    $total = $dbc->query('SELECT * FROM national_parks');
    $parkCount['NumberOfParks']=$total->fetchAll(PDO::FETCH_ASSOC);

    return $parkCount;
}

function pageController($dbc, $offset)
{
    $data = [];
    $stmt = $dbc->query('SELECT * FROM national_parks LIMIT 4 OFFSET '.$offset);
    $data['parks']=$stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $data;
}

extract(pageController($dbc, $offset));
extract(parksCounter($dbc));

?>

<!DOCTYPE html>
<html>
<head>
    <title>National Parks</title>
</head>
<body>
<h1> National Parks </h1>
<p> Page offset is: <?= $offset ?> </p>
<p> Total number of parks is: <?= count($NumberOfParks) ?> </p>
<?php foreach($parks as $park){?> 
    <h2> <?= $park['name']; ?> </h2>
    <p> Location: <?= $park['location']; ?></p>
    <p>Date Established: <?= $park['date_established']; ?></p>
    <p>Area (in Acres): <?= $park['area_in_acres'];} ?></p>
    <?php if($offset!=0){?> <a href="?offset=<?=$offset-4?>">Previous</a><?php } ?>
    <?php if ($offset+4<count($NumberOfParks)){?><a href="?offset=<?=$offset+4?>">Next</a><?php } ?>
</body>
</html>