<?php

$serverName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "ymca";

$conn = mysqli_connect($serverName, $dbUserName, $dbPassword, $dbName);

if(!$conn){
    die("Connection failled: " . mysqli_connect_error());
}