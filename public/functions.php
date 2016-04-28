<?php

function inputHas($key){
    return isset($_REQUEST[$key]);
}

function inputGet($key){
   return inputHas($key) ? $_REQUEST[$key] : null;
}

function escape($input){
    return strip_tags($_SESSION[$input]);
}