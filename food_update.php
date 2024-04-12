// Update form action: action="update_food.php"

// PHP script: update_food.php
<?php 
include "db.php";

if (isset($_POST['update'])) {
    $food_resource_id = $_POST['food_resource_id'];
    $food_name = $_POST['food_name'];
    $food_type = $_POST['food_type'];
    $mfg_date = $_POST['mfg_date'];
    $exp_date = $_POST['exp_date'];
    $age_range = $_POST['age_range'];
    
    $sql = "UPDATE `food` SET `food_name`='$food_name', `food_type`='$food_type', `mfg_date`='$mfg_date', `exp_date`='$exp_date', `age_range`='$age_range' WHERE `food_resource_id`='$food_resource_id'"; 

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
    $food_resource_id = $_GET['id']; 
    $sql = "SELECT * FROM `food` WHERE `food_resource_id`='$food_resource_id'";
    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        
        while ($row = $result->fetch_assoc()) {
            $food_name = $row['food_name'];
            $food_type = $row['food_type'];
            $mfg_date = $row['mfg_date'];
            $exp_date = $row['exp_date'];
            $age_range = $row['age_range'];
            $id = $row['food_resource_id'];
        } 
?>
<html>
<head>
    <title>Food Update Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Food Update Form</h2>
    <form action="" method="post">
        <fieldset>
            <legend>Food information:</legend>
            <div class="form-group">
                <label for="food_name">Food Name:</label>
                <input type="text" class="form-control" name="food_name" value="<?php echo $food_name; ?>">
            </div>
            <input type="hidden" name="food_resource_id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="food_type">Food Type:</label>
                <input type="text" class="form-control" name="food_type" value="<?php echo $food_type; ?>">
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
                <label for="age_range">Age Range:</label>
                <input type="text" class="form-control" name="age_range" value="<?php echo $age_range; ?>">
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
