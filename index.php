<?php include 'includes/header.php'; ?>

<div class="container mt-3">

    <?php
        if(isset($_SESSION['useruid'])){
            echo '<h4 class="text-center">Welcome '.$_SESSION['username'].'!</h4>';
            echo "<p class='text-center'>User Role: ".strtoupper($_SESSION['userrole'])."</p><br>";
        } else{
            echo '<h4 class="text-center">Welcome Guest!</h4><br>';
        }
    ?>

    <div class="row justify-content-center">
        <div class="col-sm-4">
            <div class="card">
                <img class="card-img-top" src="img/pool-2.jpg" alt="Swimming">
                <div class="card-body text-center">
                    <h5 class="card-title">Pool Schedule</h5>
                    <p class="card-text">Check times for lap swimming and other aquatic activities.</p>
                    <a href="#" class="btn btn-primary">Pool Schedule</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <img class="card-img-top" src="img/yoga-class-2.jpg" alt="Classes">
                <div class="card-body text-center">
                    <h5 class="card-title">Class Schedule</h5>
                    <p class="card-text">Find the perfect class or activity for your goals and fitness level.</p>
                    <a href="#" class="btn btn-primary">Find Classes</a>
                </div>
            </div>
        </div>

        <?php
            if(isset($_SESSION['userrole'])){
                if($_SESSION['userrole'] == "admin" || $_SESSION['userrole'] == "staff"){
                    echo '<div class="col-sm-4 admin">';
                    echo '<div class="card">';
                    echo '<img class="card-img-top" src="img/admin-2.jpg" alt="Admin">';
                    echo '<div class="card-body text-center">';
                    echo '<h5 class="card-title">Admin Tools</h5>';
                    echo '<p class="card-text">Administrators and staff members can edit accounts and programs here.</p>';
                    echo '<a href="admin.php" class="btn btn-primary">Admin Tools</a></div></div></div>';
                }elseif($_SESSION['userrole'] == "member"){
                    echo '<div class="col-sm-4 admin">';
                    echo '<div class="card">';
                    echo '<img class="card-img-top" src="img/profile-2.jpg" alt="Profile">';
                    echo '<div class="card-body text-center">';
                    echo '<h5 class="card-title">Your Profile</h5>';
                    echo '<p class="card-text">View your profile and what classes you are already signed up for.</p>';
                    echo '<a href="#" class="btn btn-primary">View Profile</a></div></div></div>';
                }
            } else {
                echo '<div class="col-sm-4 admin">';
                echo '<div class="card">';
                echo '<img class="card-img-top" src="img/join-2.jpg" alt="Classes">';
                echo '<div class="card-body text-center">';
                echo '<h5 class="card-title">Sign Up</h5>';
                echo '<p class="card-text">Join the fun and sign up for your local YMCA.</p>';
                echo '<a href="signup.php" class="btn btn-primary">Sign Up</a></div></div></div>';
            }
        ?>
    </div>
</div>

<?php include 'includes/footer.php' ?>