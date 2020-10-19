<?php include 'includes/header.php'; ?>

<div class="container mt-3">
    <?php
        if(isset($_SESSION['userrole'])){
            if($_SESSION['userrole'] == "admin" || $_SESSION['userrole'] == "staff"){
                echo '<h4 class="text-center">Create/Edit Programs</h4><br>';
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
                    <h5 class="card-title">Create/Edit Program</h5>
                    <p class="card-text">Create a brand new program or edit an existing one.</p>
                    <a href="#" class="btn btn-primary">Find Classes</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 admin">
            <div class="card">
                <img class="card-img-top" src="img/admin-2.jpg" alt="Admin">
                <div class="card-body text-center">
                    <h5 class="card-title">Admin Tools</h5>
                    <p class="card-text">Administrators and staff members can edit accounts and programs here.</p>
                    <a href="#" class="btn btn-primary">Admin Tools</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php' ?>