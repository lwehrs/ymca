<?php
    session_start();
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title>YMCA</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="#"><img src="img/ymca-logo-tiny.png" width="30" height="30" class="d-inline-block align-top" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <?php
                        if(isset($_SESSION['useruid'])){
                            if($_SESSION['userrole'] == "admin" || $_SESSION['userrole'] == "staff"){
                                echo '<li class="nav-item active"><a class="nav-link" href="program.php">Programs</a></li>';
                                echo '<li class="nav-item active"><a class="nav-link" href="admin.php">Admin Tools</a></li>';
                            } else {
                                echo '<li class="nav-item active"><a class="nav-link" href="profile.php">Profile</a></li>';
                                echo '<li class="nav-item active"><a class="nav-link" href="program-view.php">Programs</a></li>';
                            }
                            echo '<li class="nav-item active"><a class="nav-link" href="includes/logout.inc.php">Log Out</a></li>';
                        } else {
                            echo '<li class="nav-item active"><a class="nav-link" href="program-view.php">Programs</a></li>';
                            echo '<li class="nav-item active"><a class="nav-link" href="signup.php">Sign Up</a></li>';
                            echo '<li class="nav-item active"><a class="nav-link" href="login.php">Login</a></li>';
                        }
                    ?>                    
                </ul>
            </div>
        </nav>