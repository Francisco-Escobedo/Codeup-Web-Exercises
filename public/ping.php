<?php 

require 'functions.php';

function pageController(){

    if (!inputHas('count')){
        $count = 0;
    } else {
        $count = $_GET['count'];
    }

    return ['count' => $count];

}

extract(pageController());

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<div>Hit Count: <?= $count ?></div>

<div><a href="pong.php?count=<?=$count+1?>">Hit</a></div>

<div><a href="pong.php?count=<?=$count='YOU LOSE'?>">Miss</a></div>

</body>
</html>
