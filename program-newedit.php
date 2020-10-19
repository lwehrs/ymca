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

    <form action="includes/program.inc.php" method="POST">
        <div class="form-group">
            <label for="prog-name">Name</label>
            <input type="text" name="prog-name" placeholder="" class="form-control"><br>
            <label for="prog-type">Program Type</label>
            <select name="prog-type" class="form-control">
                <option value=""></option>
                <option value="swimming">Swimming</option>
                <option value="personal-training">Personal Training</option>
                <option value="group-fitness">Group Fitness</option>
                <option value="special-event">Special Event</option>
            </select>
            <label for="start-date">Start Date</label>
            <input type="date" name="start-date" placeholder="" class="form-control"><br>
            <label for="end-date">End Date</label>
            <input type="date" name="end-date" placeholder="" class="form-control"><br>
            <label for="location">Location</label>
            <input type="text" name="location" placeholder="" class="form-control"><br>
            <label for="description">Description</label>
            <textarea name="description" placeholder="" class="form-control"></textarea><br>
            <label for="price">Price</label>
            <input type="text" name="price" placeholder="" class="form-control"><br>
            <label for="participants">Participants (MAX)</label>
            <input type="number" name="participants" placeholder="" class="form-control" min="1" step="1" value="0"><br>
        </div>
        <button type="submit" name="save-prog" class="btn btn-success">Save</button>
        <a href="program.php" class="btn btn-danger">Cancel</a>
    </form>
</div>

<?php include 'includes/footer.php' ?>