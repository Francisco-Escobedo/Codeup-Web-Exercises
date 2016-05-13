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

  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>

</head>
<body background="img/washpark.jpg">
<h1> National Parks </h1>
<p> Page offset is: <?= $offset ?> </p>
<p> Total number of parks is: <?= count($NumberOfParks) ?> </p>

<table class="bordered highlight striped white">
    <tr> 
        <th> Name </th>
        <th> Location </th>
        <th> Date Established </th>
        <th> Area (in Acres) </th>
    </tr>
     <?php foreach($parks as $park){?> 
    <tr>
        <td> <?= $park['name']; ?> </td>
        <td> <?= $park['location']; ?> </td>
        <td> <?= $park['date_established']; ?> </td>
        <td> <?= $park['area_in_acres'];} ?> </td>
    </tr>
</table>

    <?php if($offset!=0){?> <a href="?offset=<?=$offset-4?>" class="waves-effect waves-light btn" >Previous</a><?php } ?>
    <?php if ($offset+4<count($NumberOfParks)){?><a href="?offset=<?=$offset+4?>" class="waves-effect waves-light btn">Next</a><?php } ?>
</body>
</html>

