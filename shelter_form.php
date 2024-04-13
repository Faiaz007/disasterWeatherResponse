<?php 
include "db.php";

if (isset($_POST['submit'])) {
    $shelter_name = $_POST['shelter_name'];
    $shelter_condition = $_POST['shelter_condition'];
    $shelter_capacity = $_POST['shelter_capacity'];
    $built_date = $_POST['built_date'];
    $location_id = $_POST['location_id'];

    $sql = "INSERT INTO `shelter`(`shelter_name`, `shelter_condition`, `shelter_capacity`, `built_date`, `location_id`) VALUES ('$shelter_name','$shelter_condition','$shelter_capacity','$built_date','$location_id')";

    $result = $conn->query($sql);

    if ($result === TRUE) {
        echo '<div class="alert alert-success" role="alert">New record created successfully!</div>';
        echo "<script>console.log('New record created successfully!');</script>";
        header("refresh:2; url=./shelter_view.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shelter Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Shelter Form</h2>
    <form action="" method="POST">
        <fieldset>
            <legend>Shelter Information:</legend>
            <div class="form-group">
                <label for="shelter_name">Shelter Name:</label>
                <input type="text" class="form-control" name="shelter_name" id="shelter_name">
            </div>
            <div class="form-group">
                <label for="shelter_condition">Shelter Condition:</label>
                <input type="text" class="form-control" name="shelter_condition" id="shelter_condition">
            </div>
            <div class="form-group">
                <label for="shelter_capacity">Shelter Capacity:</label>
                <input type="number" class="form-control" name="shelter_capacity" id="shelter_capacity">
            </div>
            <div class="form-group">
                <label for="built_date">Built Date:</label>
                <input type="date" class="form-control" name="built_date" id="built_date">
            </div>
            <div class="form-group">
                <label for="location_id">Location ID:</label>
                <input type="text" class="form-control" name="location_id" id="location_id">
            </div>
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        </fieldset>
    </form>
</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
