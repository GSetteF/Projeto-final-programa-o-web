<?php

if(empty($_SERVER["QUERY_STRING"])){
    $var = "menu.php";
    include_once("$var");
}else{
    $pg = $_GET['pg'];
    include_once("$pg.php");
}

?>