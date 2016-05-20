<?php

require '../db_credentials.php';
require '../db_connect.php';
require '../Input.php';

if (Input::has('offset')){
    $offset=Input::get('offset');
} else {
    $offset=0;
}

function parksCounter($dbc){
    $parkCount=[];
    $total = $dbc->prepare('SELECT * FROM national_parks');
    $total->execute();
    $parkCount['NumberOfParks']=$total->fetchAll(PDO::FETCH_ASSOC);

    return $parkCount;
}

function pageController($dbc, $offset){
    $data = [];
    $stmt = $dbc->prepare('SELECT * FROM national_parks LIMIT :limCount OFFSET :offCount');
    $stmt->bindValue(':limCount', 4, PDO::PARAM_INT);
    $stmt->bindValue(':offCount', (int) $offset, PDO::PARAM_INT);
    $stmt->execute();

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

  <link rel="icon" href="/img/weatheri.png">

</head>
<body background="img/washpark.jpg" class="container">

<h1> National Parks </h1>

    <table class="bordered highlight striped white">
        <tr> 
            <th> Name </th>
            <th> Location </th>
            <th> Date Established </th>
            <th> Area (in Acres) </th>
            <th> Description </th>
        </tr>
         <?php foreach($parks as $park){?> 
        <tr>
            <td> <?= $park['name']; ?> </td>
            <td> <?= $park['location']; ?> </td>
            <td> <?= $park['date_established']; ?> </td>
            <td> <?= $park['area_in_acres']; ?> </td>
            <td> <?=$park['description'];} ?> </td>
        </tr>
    </table>

    <?php if($offset!=0){?> <a href="?offset=<?=$offset-4?>" class="waves-effect waves-light btn" >Previous</a><?php } ?> 

    <a href="national_parks_form.php" class="waves-effect waves-light btn">Add New Park</a>

    <?php if ($offset+4<count($NumberOfParks)){?><a href="?offset=<?=$offset+4?>" class="waves-effect waves-light btn">Next</a><?php } ?>


</body>
</html>

