<?php
$host = "localhost";
$user = "keneu85_ken";
$pass = "Kameleon4!_";
$database = "keneu85_time_managment";
$link = mysqli_connect($host, $user, $pass, $database) or die("Can't access database");
mysqli_set_charset($link, "utf8");
?>