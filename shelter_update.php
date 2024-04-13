
// Update form action: action="update_shelter.php"

// PHP script: update_shelter.php
<?php 
include "db.php";

if (isset($_POST['update'])) {
    $shelter_id = $_POST['shelter_id'];
    $shelter_name = $_POST['shelter_name'];
    $shelter_condition = $_POST['shelter_condition'];
    $shelter_capacity = $_POST['shelter_capacity'];
    $built_date = $_POST['built_date'];
    $location_id = $_POST['location_id'];
    
    $sql = "UPDATE `shelter` SET `shelter_name`='$shelter_name', `shelter_condition`='$shelter_condition', `shelter_capacity`='$shelter_capacity', `built_date`='$built_date', `location_id`='$location_id' WHERE `shelter_id`='$shelter_id'"; 

    $result = $conn->query($sql); 

    if ($result == TRUE) {
        echo '<div class="alert alert-success" role="alert">';
        echo 'Record updated successfully.';
        echo '</div>';
        echo "<script>console.log('Record updated successfully.');</script>";
        header( "refresh:2; url=./shelter_view.php" ); 
    } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
} 

if (isset($_GET['id'])) {
    $shelter_id = $_GET['id']; 
    $sql = "SELECT * FROM `shelter` WHERE `shelter_id`='$shelter_id'";
    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        
        while ($row = $result->fetch_assoc()) {
            $shelter_name = $row['shelter_name'];
            $shelter_condition = $row['shelter_condition'];
            $shelter_capacity = $row['shelter_capacity'];
            $built_date = $row['built_date'];
            $location_id = $row['location_id'];
        } 
?>
<html>
<head>
    <title>Shelter Update Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Shelter Update Form</h2>
    <form action="" method="post">
        <fieldset>
            <legend>Shelter information:</legend>
            <div class="form-group">
                <label for="shelter_name">Shelter Name:</label>
                <input type="text" class="form-control" name="shelter_name" value="<?php echo $shelter_name; ?>">
            </div>
            <input type="hidden" name="shelter_id" value="<?php echo $shelter_id; ?>">
            <div class="form-group">
                <label for="shelter_condition">Shelter Condition:</label>
                <input type="text" class="form-control" name="shelter_condition" value="<?php echo $shelter_condition; ?>">
            </div>
            <div class="form-group">
                <label for="shelter_capacity">Shelter Capacity:</label>
                <input type="text" class="form-control" name="shelter_capacity" value="<?php echo $shelter_capacity; ?>">
            </div>
            <div class="form-group">
                <label for="built_date">Built Date:</label>
                <input type="date" class="form-control" name="built_date" value="<?php echo $built_date; ?>">
            </div>
            <div class="form-group">
                <label for="location_id">Location ID:</label>
                <input type="text" class="form-control" name="location_id" value="<?php echo $location_id; ?>">
            </div>
            <input type="submit" class="btn btn-primary" value="Update" name="update">
        </fieldset>
    </form> 
</div>
</body>
</html> 
<?php
    } else { 
        header('Location: shelter_view.php');
    } 
}
?>
