<?php

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $passrepeat = $_POST['pass-repeat'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputSignup($name, $email, $username, $pass, $passrepeat) != false){
        header('location: ../signup.php?error=emptyinput');
        exit();
    }
    if(invalidUsername($username) != false){
        header('location: ../signup.php?error=invaliduid');
        exit();
    }
    if(invalidEmail($email) != false){
        header('location: ../signup.php?error=invalidemail');
        exit();
    }
    if(passMatch($pass, $passrepeat) != false){
        header('location: ../signup.php?error=passwordsdontmatch');
        exit();
    }
    if(uidExists($conn, $username, $email) != false){
        header('location: ../signup.php?error=usernametaken');
        exit();
    }

    createUser($conn, $name, $email, $username, $pass);
}
else {
    header('location: ../signup.php');
    exit();
}