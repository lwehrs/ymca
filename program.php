<?php include 'includes/header.php'; ?>
<?php
    include_once 'includes/dbh.inc.php';

    $sql = "SELECT * FROM programs ORDER BY START_DATE;";
    $result = mysqli_query($conn, $sql);
?>

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

        <a href="program-newedit.php" class="btn btn-success btn-block">New Program</a>

        <table class='table'>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                </tr>
            </thead>
            
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['PROG_NAME']; ?></td>
                    <td><?php echo $row['PROG_TYPE']; ?></td>
                    <td><?php echo $row['START_DATE']; ?></td>
                    <td><?php echo $row['END_DATE']; ?></td>
                </tr>
                
            <?php endwhile ?>
        </table>
    </div>
</div>

<?php include 'includes/footer.php' ?>