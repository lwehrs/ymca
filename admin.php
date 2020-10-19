<?php include 'includes/header.php'; ?>

<div class="container mt-3">
    <?php
        if(isset($_SESSION['userrole'])){
            if($_SESSION['userrole'] == "admin" || $_SESSION['userrole'] == "staff"){
                echo '<h4 class="text-center">Admin Tools</h4><br>';
            } else {
                
                header("location: index.php");
            }
        } else {
            header("location: index.php");
        }
    ?>

    <div class="row justify-content-center">
        <div class="col-sm-4">
            <div class="card">
                <img class="card-img-top" src="img/yoga-class-2.jpg" alt="Classes">
                <div class="card-body text-center">
                    <h5 class="card-title">Create/Edit Programs</h5>
                    <p class="card-text">Create a brand new program or edit an existing one.</p>
                    <a href="program.php" class="btn btn-primary">Create/Edit Programs</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 admin">
            <div class="card">
                <img class="card-img-top" src="img/admin-2.jpg" alt="Admin">
                <div class="card-body text-center">
                    <h5 class="card-title">Create/Edit Users</h5>
                    <p class="card-text">Create a brand new user or edit an existing one.</p>
                    <a href="user.php" class="btn btn-primary">Create/Edit Users</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php' ?>