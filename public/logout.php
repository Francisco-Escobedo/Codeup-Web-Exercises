<?php

function clearSession(){

    session_unset();

    session_destroy();

    header('location: login.php');
}

clearSession();

?>