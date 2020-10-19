<?php

if(isset($_POST['save-prog'])){
    $progName = $_POST['prog-name'];
    $progType = $_POST['prog-type'];
    $startDate = $_POST['start-date'];
    $endDate = $_POST['end-date'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $participants = $_POST['participants'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputProgram($progName, $progType, $startDate, $endDate, $location, $description, $price, $participants) != false){
        header('location: ../program-newedit.php?error=emptyinput');
        exit();
    }

    createProgram($conn, $progName, $progType, $startDate, $endDate, $location, $description, $price, $participants);
}
else {
    header('location: ../program.php');
    exit();
}