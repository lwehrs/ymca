<?php include 'includes/header.php'; ?>
<?php
    include_once 'includes/dbh.inc.php';

    $sql = "SELECT * FROM programs ORDER BY START_DATE;";
    $result = mysqli_query($conn, $sql);
?>

<div class="container mt-3">
    <h3 class="text-center">Programs</h3>
    <div class="row">     
        <?php while($row = mysqli_fetch_assoc($result)): ?>
            <?php
                $picture = "";
                $type = "";
                switch ($row['PROG_TYPE']) {
                    case 'swimming':
                        $picture = "img/pool-2.jpg";
                        $type = "Swimming";
                        break;
                    case 'personal-training':
                        $picture = "img/personal-training-2.jpg";
                        $type = "Personal Training";
                        break;
                    case 'group-fitness':
                        $picture = "img/yoga-class-2.jpg";
                        $type = "Group Fitness";
                        break;
                    case 'special-event':
                        $picture = "img/profile-2.jpg";
                        $type = "Special Event";
                        break;
                    default:
                        # code...
                        break;
                }

                if ($row['PROG_TYPE'] == "swimming") {
                    
                }
            ?>      
            <div class="col-sm-4  pt-4">
                <div class="card">
                    <img class="card-img-top" src="<?php echo $picture ?>" alt="Swimming">
                    <div class="card-body">
                        <h5 class="card-title text-center"><?php echo $row['PROG_NAME']; ?></h5>
                        <p class="card-text">
                            <b>Program Type:</b> <?php echo $type ?><br>
                            <b>Start Date:</b> <?php echo $row['START_DATE']; ?><br>
                            <b>End Date:</b> <?php echo $row['END_DATE']; ?><br>
                            <b>Location:</b> <?php echo $row['LOCATION']; ?><br>
                            <b>Description:</b> <?php echo $row['DESCRIPTION']; ?><br>
                            <b>Requirements:</b> <?php echo $row['REQUIREMENTS']; ?><br>
                            <b>Price:</b> $<?php echo $row['PRICE']; ?><br>
                            <b>Capacity:</b> <?php echo $row['PARTICIPANTS']; ?> participants<br>
                        </p>
                    </div>
                </div>
            </div>
        <?php endwhile ?>
    </div>
</div>

<?php include 'includes/footer.php' ?>