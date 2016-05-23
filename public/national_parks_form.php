<?php

require '../db_credentials.php';
require '../db_connect.php';
require_once '../Input.php';

function pageController($dbc) {

  $message=[];

  try{
    $parkName=Input::getString('park_name', 3, 200);
  } catch (InvalidArgumentException $e){
    $message[]=$e->getMessage();
  } catch (OutOfRangeException $e){
    $message[]=$e->getMessage();
  } catch (DomainException $e){
    $message[]=$e->getMessage();
  } catch (LengthException $e){
    $message[]=$e->getMessage();
  } catch (Exception $e){
    $message[]=$e->getMessage();
  }

  try{
    $location=Input::getString('location', 3, 200);
  } catch (InvalidArgumentException $e){
    $message[]=$e->getMessage();
  } catch (OutOfRangeException $e){
    $message[]=$e->getMessage();
  } catch (DomainException $e){
    $message[]=$e->getMessage();
  } catch (LengthException $e){
    $message[]=$e->getMessage();
  } catch (Exception $e){
    $message[]=$e->getMessage();
  }

  try{
    $textArea=Input::getString('textarea', 3, 2000);
  } catch (InvalidArgumentException $e){
    $message[]=$e->getMessage();
  } catch (OutOfRangeException $e){
    $message[]=$e->getMessage();
  } catch (DomainException $e){
    $message[]=$e->getMessage();
  } catch (LengthException $e){
    $message[]=$e->getMessage();
  } catch (Exception $e){
    $message[]=$e->getMessage();
  }

  try{
    $areaInAcres=Input::getNumber('area_in_acres', 1, 9999999999);
  } catch (InvalidArgumentException $e){
    $message[]=$e->getMessage();
  } catch (OutOfRangeException $e){
    $message[]=$e->getMessage();
  } catch (DomainException $e){
    $message[]=$e->getMessage();
  } catch (RangeException $e){
    $message[]=$e->getMessage();
  } catch (Exception $e){
    $message[]=$e->getMessage();
  }

  try{
    $dateEstablished=Input::getNumber('date_established', 1800, 9999);
  } catch (InvalidArgumentException $e){
    $message[]=$e->getMessage();
  } catch (OutOfRangeException $e){
    $message[]=$e->getMessage();
  } catch (DomainException $e){
    $message[]=$e->getMessage();
  } catch (RangeException $e){
    $message[]=$e->getMessage();
  } catch (Exception $e){
    $message[]=$e->getMessage();
  }

  if(empty($message)){
        $stmt = $dbc->prepare('INSERT INTO national_parks (name, location, date_established, area_in_acres, description) VALUES (:name, :location, :date_established, :area_in_acres, :description)');

        $stmt->bindValue(':name', htmlspecialchars($parkName), PDO::PARAM_STR);
        $stmt->bindValue(':location', htmlspecialchars($location), PDO::PARAM_STR);
        $stmt->bindValue(':date_established', (int) htmlspecialchars($dateEstablished), PDO::PARAM_INT);
        $stmt->bindValue(':area_in_acres', (float) htmlspecialchars($areaInAcres), PDO::PARAM_STR);
        $stmt->bindValue(':description', htmlspecialchars($textArea), PDO::PARAM_STR);

        $stmt->execute();

        header('location: national_parks.php');
        die();
  }

  return [
  'message'=>$message
  ];

}

$message=[];
if(!empty($_POST)){
  extract(pageController($dbc));
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>National Park Entry Form</title>
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>

  <link rel="icon" href="/img/weatheri.png">

</head>
<body class = "container">
<h1> New National Park <img src="img/mountain.png" height="60" width="60"> </h1>
<p> <?php foreach($message as $error): ?></p>
<p class="card-panel red"> <?= $error ?> </p>
<p> <?php endforeach; ?>

    <div class="row">
        <form class="col s12" action="national_parks_form.php" method="POST">
            <div class="row">
                <div class="input-field col s6">
                  <input placeholder="National Park Name" 
                  name="park_name" 
                  type="text" 
                  class="validate" 
                  value="<?php if(!empty($message)){echo Input::get('park_name');} ?>">
                </div>
                <div class="input-field col s6">
                  <input placeholder="Location" 
                  name="location" 
                  type="text" 
                  class="validate" 
                  value="<?php if(!empty($message)){echo Input::get('location');} ?>">
                </div>
                <div class="input-field col s6">
                  <input placeholder="Date Established (in YYYY format)" 
                  name="date_established" 
                  type="text" 
                  class="validate" 
                  value="<?php if(!empty($message)){echo Input::get('date_established');} ?>">
                </div>
                <div class="input-field col s6">
                  <input placeholder="Area in Acres (no commas eg. 2903.20)" 
                  name="area_in_acres" 
                  type="text" 
                  class="validate" 
                  value="<?php if(!empty($message)){echo Input::get('area_in_acres');} ?>">
                </div>
                <div class="input-field col s12">
                  <textarea name="textarea" 
                  class="materialize-textarea" 
                  > <?php if(!empty($message)){echo Input::get('textarea');} ?> </textarea>
                  <label for="textarea">Park Description</label>
                </div>
            </div>

            <button href="national_parks.php" class="btn waves-effect waves-light">Back to National Parks Table
            </button>

            <button class="btn waves-effect waves-light" type="submit">Submit
            </button>

        </form>
    </div>

</body>
</html>