// Update form action: action="update_medicine.php"

// PHP script: update_medicine.php
<?php 
include "db.php";

if (isset($_POST['update'])) {
    $med_resource_id = $_POST['med_resource_id'];
    $med_name = $_POST['med_name'];
    $med_group_name = $_POST['med_group_name'];
    $mfg_date = $_POST['mfg_date'];
    $exp_date = $_POST['exp_date'];
    $batch_no = $_POST['batch_no'];
    $med_type = $_POST['med_type'];
    $age_range = $_POST['age_range'];
    $doses = $_POST['doses'];
    
    $sql = "UPDATE `medicine` SET `med_name`='$med_name', `med_group_name`='$med_group_name', `mfg_date`='$mfg_date', `exp_date`='$exp_date', `batch_no`='$batch_no', `med_type`='$med_type', `age_range`='$age_range', `doses`='$doses' WHERE `med_resource_id`='$med_resource_id'"; 

    $result = $conn->query($sql); 

    if ($result == TRUE) {
        echo '<div class="alert alert-success" role="alert">';
        echo 'Record updated successfully.';
        echo '</div>';
        echo "<script>console.log('Record updated successfully.');</script>";
        header( "refresh:2; url=./view.php" ); 
    } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
} 

if (isset($_GET['id'])) {
    $med_resource_id = $_GET['id']; 
    $sql = "SELECT * FROM `medicine` WHERE `med_resource_id`='$med_resource_id'";
    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        
        while ($row = $result->fetch_assoc()) {
            $med_name = $row['med_name'];
            $med_group_name = $row['med_group_name'];
            $mfg_date = $row['mfg_date'];
            $exp_date = $row['exp_date'];
            $batch_no = $row['batch_no'];
            $med_type = $row['med_type'];
            $age_range = $row['age_range'];
            $doses = $row['doses'];
            $id = $row['med_resource_id'];
        } 
?>
<html>
<head>
    <title>Medicine Update Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Medicine Update Form</h2>
    <form action="" method="post">
        <fieldset>
            <legend>Medicine information:</legend>
            <div class="form-group">
                <label for="med_name">Medicine Name:</label>
                <input type="text" class="form-control" name="med_name" value="<?php echo $med_name; ?>">
            </div>
            <input type="hidden" name="med_resource_id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="med_group_name">Medicine Group Name:</label>
                <input type="text" class="form-control" name="med_group_name" value="<?php echo $med_group_name; ?>">
            </div>
            <div class="form-group">
                <label for="mfg_date">Manufacturing Date:</label>
                <input type="date" class="form-control" name="mfg_date" value="<?php echo $mfg_date; ?>">
            </div>
            <div class="form-group">
                <label for="exp_date">Expiry Date:</label>
                <input type="date" class="form-control" name="exp_date" value="<?php echo $exp_date; ?>">
            </div>
            <div class="form-group">
                <label for="batch_no">Batch Number:</label>
                <input type="text" class="form-control" name="batch_no" value="<?php echo $batch_no; ?>">
            </div>
            <div class="form-group">
                <label for="med_type">Medicine Type:</label>
                <input type="text" class="form-control" name="med_type" value="<?php echo $med_type; ?>">
            </div>
            <div class="form-group">
                <label for="age_range">Age Range:</label>
                <input type="text" class="form-control" name="age_range" value="<?php echo $age_range; ?>">
            </div>
            <div class="form-group">
                <label for="doses">Doses:</label>
                <input type="text" class="form-control" name="doses" value="<?php echo $doses; ?>">
            </div>
            <input type="submit" class="btn btn-primary" value="Update" name="update">
        </fieldset>
    </form> 
</div>
</body>
</html> 
<?php
    } else { 
        header('Location: view.php');
    } 
}
?>
