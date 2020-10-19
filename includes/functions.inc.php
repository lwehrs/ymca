<?php

function emptyInputSignup($name, $email, $username, $pass, $passrepeat){
    $result;
    if(empty($name) || empty($email) || empty($username) || empty($pass) || empty($passrepeat)){
        $result = true;
    }else{
        $result = false;
    }

    return $result;
}

function invalidUsername($username){
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }else{
        $result = false;
    }
}

function invalidEmail($email){
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }else{
        $result = false;
    }
}

function passMatch($pass, $passrepeat){
    $result;
    if($pass !== $passrepeat){
        $result = true;
    }else{
        $result = false;
    }
}

function uidExists($conn, $username, $email){
    $sql = "SELECT * FROM users WHERE USER_UID = ? OR USER_EMAIL = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header('location: ../signup.php?error=stmtfailed');
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqil_stmt_close($stmt);
}

function createUser($conn, $name, $email, $username, $pass){
    $sql = "INSERT INTO users (USER_NAME, USER_EMAIL, USER_UID, USER_PASS, USER_ROLE) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    $userRole = "member";

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header('location: ../signup.php?error=stmtfailed');
        exit();
    }

    $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, 'sssss', $name, $email, $username, $hashedPass, $userRole);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    loginUser($conn, $username, $pass);
    exit();
}

function emptyInputLogin($username, $pass){
    $result;
    if(empty($username) || empty($pass)){
        $result = true;
    }else{
        $result = false;
    }

    return $result;
}

function loginUser($conn, $username, $pass){
    $uidExists = uidExists($conn, $username, $username);

    if($uidExists === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $passHashed = $uidExists['USER_PASS'];
    $checkPass = password_verify($pass, $passHashed);

    if($checkPass === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    } elseif($checkPass === true){
        session_start();
        $_SESSION['userid'] = $uidExists['USER_ID'];
        $_SESSION['useruid'] = $uidExists['USER_UID'];
        $_SESSION['userrole'] = $uidExists['USER_ROLE'];
        $_SESSION['username'] = $uidExists['USER_NAME'];
        header("location: ../index.php");
        exit();
    }
}

function emptyInputProgram($progName, $progType, $startDate, $endDate, $location, $description, $price, $participants){
    $result;
    if(empty($progName) || empty($progType) || empty($startDate) || empty($endDate) || empty($location) || empty($description) || empty($price) || empty($participants)){
        $result = true;
    }else{
        $result = false;
    }

    return $result;
}

function createProgram($conn, $progName, $progType, $startDate, $endDate, $location, $description, $price, $participants){
    // $sql = "INSERT INTO programs (PROG_NAME, PROG_TYPE, START_DATE, END_DATE, LOCATION, DESCRIPTION, PRICE, PARTICIPANTS) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
    // $stmt = mysqli_stmt_init($conn);


    // if(!mysqli_stmt_prepare($stmt, $sql)){
    //     header('location: ../signup.php?error=stmtfailed');
    //     exit();
    // }

    // mysqli_stmt_bind_param($stmt, 'ssssssss', $progName, $progType, $startDate, $endDate, $location, $description, $price, $participants);
    // mysqli_stmt_execute($stmt);
    // mysqli_stmt_close($stmt);
    
    $sql = "INSERT INTO programs (PROG_NAME, PROG_TYPE, START_DATE, END_DATE, LOCATION, DESCRIPTION, PRICE, PARTICIPANTS) VALUES ('$progName', '$progType', '$startDate', '$endDate', '$location', '$description', '$price', '$participants');";

    if(mysqli_query($conn, $sql)){
        echo "New program created.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
    header("location: ../program.php");
    exit();
}