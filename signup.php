<?php include 'includes/header.php'; ?>

<div class="container mt-3">
    <h2 class="text-center">Sign Up</h2>
    <form action="includes/signup.inc.php" method="post">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="Full Name..." class="form-control"><br>
            <label for="email">Email</label>
            <input type="text" name="email" placeholder="Email..." class="form-control"><br>
            <label for="uid">Username</label>
            <input type="text" name="username" placeholder="Username..." class="form-control"><br>
            <label for="pass">Password</label>
            <input type="password" name="pass" placeholder="Password..." class="form-control">
            <br>
            <input type="password" name="pass-repeat" placeholder="Repeat Password..." class="form-control">
        </div>
        <button type="submit" name="submit" class="btn">Sign Up</button>
    </form>

    <?php
        if(isset($_GET['error'])){
            if($_GET['error'] == "emptyinput"){
                echo "<script>alert('Fill in all fields!')</script>";
            } elseif($_GET['error'] == "invaliduid"){
                echo "<script>alert('Invalid Username!')</script>";
            } elseif($_GET['error'] == "invalidemail"){
                echo "<script>alert('Invalid Email!')</script>";
            } elseif($_GET['error'] == "passwordsdontmatch"){
                echo "<script>alert('Passwords don't match!')</script>";
            } elseif($_GET['error'] == "stmtfailed"){
                echo "<script>alert('Something went wrong, try again!')</script>";
            } elseif($_GET['error'] == "usernametaken"){
                echo "<script>alert('Username already in use!')</script>";
            } elseif($_GET['error'] == "none") {
                echo "<script>alert('Account created!')</script>";
            }
        }
    ?>
</div>



<?php include 'includes/footer.php' ?>