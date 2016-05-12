<?php
    
    session_start();

    if (!isset($_SESSION['number'])){
    $_SESSION['number'] = mt_rand(1, 100);
    }

    echo $_SESSION['number'];

    if (isset($_REQUEST['guess'])){
        if ($_REQUEST['guess'] > $_SESSION['number']){
            $display = "LOWER\n";
        } elseif ($_REQUEST['guess'] < $_SESSION['number']) {
            $display = "HIGHER\n";
        } elseif ($_REQUEST['guess'] == $_SESSION['number']){
            $display = "GOOD GUESS!\n";
            session_unset();
        }
    } else {
        $display = 'You haven\'t guesses yet.';
    }
        
?>

<!DOCTYPE html>
<html>
<head>
    <title>High Low Game</title>
</head>
<body>
<h1> High Low Game </h1>
<h2> Guess a number between 1 and 200 </h2>
    <p> <?= $display ?> </p>

<form method="POST">
    <label> <strong>Your Guess</strong> </label>
    <div><input type="text" name="guess"></div>
    <input type='submit'>
    <button type='button' href="highlowbrowser.php" name="new">New Game</button>
</form>

</body>
</html>