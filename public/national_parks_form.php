<?php

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
<p> *Please note: All fields must be populated for park to submit.</p>
<p> *If Date Established or Areas are not entered as numerical values, they will display as zeros in National Parks table.</p>

    <div class="row">
        <form class="col s12" action="national_parks.php" method="GET">
            <div class="row">
                <div class="input-field col s6">
                  <input placeholder="National Park Name" name="park_name" type="text" class="validate">
                </div>
                <div class="input-field col s6">
                  <input placeholder="Location" name="location" type="text" class="validate">
                </div>
                <div class="input-field col s6">
                  <input placeholder="Date Established (in YYYY format)" name="date_established" type="text" class="validate">
                </div>
                <div class="input-field col s6">
                  <input placeholder="Area in Acres (no commas eg. 2903.20)" name="area_in_acres" type="text" class="validate">
                </div>
                <div class="input-field col s12">
                  <textarea name="textarea" class="materialize-textarea"></textarea>
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