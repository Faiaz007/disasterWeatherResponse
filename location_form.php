<?php 
include "db.php";

if (isset($_POST['submit'])) {

    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $city_name = $_POST['cityname'];
    $country = $_POST['country'];
    $population_demographic = $_POST['population'];

    $sql = "INSERT INTO location (latitude, longitude, city_name, country, population_demographic) 
            VALUES ('$latitude', '$longitude', '$city_name', '$country', '$population_demographic')";

    $result = $conn->query($sql);

    if ($result == TRUE) {
        echo '<div class="alert alert-success" role="alert">New record created successfully!</div>';
        echo "<script>console.log('New record created successfully!');</script>";
        header("refresh:2; url=./view.php");
        exit; // Added exit to stop further execution after redirection
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    } 

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Location Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Location Form</h2>

    <form action="" method="POST">
        <fieldset>
            <legend>Location information:</legend>
            <div class="form-group">
                <label for="latitude">Latitude:</label>
                <input type="text" class="form-control" name="latitude" id="latitude">
            </div>
            <div class="form-group">
                <label for="longitude">Longitude:</label>
                <input type="text" class="form-control" name="longitude" id="longitude">
            </div>
            <div class="form-group">
                <label for="cityname">City Name:</label>
                <input type="text" class="form-control" name="cityname" id="cityname">
            </div>
            <div class="form-group">
                <label for="country">Country:</label>
                <input type="text" class="form-control" name="country" id="country">
            </div>
            <div class="form-group">
                <label for="population">Population Demographic:</label>
                <input type="text" class="form-control" name="population" id="population">
            </div>
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        </fieldset>
    </form>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/js/bootstrap.min.js"></script>
</body>
</html>
