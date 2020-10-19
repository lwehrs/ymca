<?php include 'includes/header.php'; ?>

<div class="container mt-3">
    <h2 class="text-center">Log In</h2>
    <form action="includes/login.inc.php" method="post">
    <div class="form-group">

        <label for="uid">Username</label>
        <input type="text" name="username" placeholder="Username/Email..." class="form-control"><br>
        <label for="pass">Password</label>
        <input type="password" name="pass" placeholder="Password..." class="form-control"><br>
    </div>
        <button type="submit" name="submit" class="btn">Log In</button>
    </form>

    <?php
        if(isset($_GET['error'])){
            if($_GET['error'] == "emptyinput"){
                echo "<script>alert('Fill in all fields!')</script>";
            } elseif($_GET['error'] == "wronglogin"){
                echo "<script>alert('Invalid Username or Password')</script>";
            }
        }
    ?>

</div>

<?php include 'includes/footer.php' ?>