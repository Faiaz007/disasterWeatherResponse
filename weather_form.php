<?php 
include "db.php";

if (isset($_POST['submit'])) {
    $date = $_POST['date'];
    $time = $_POST['time'];
    $temperature = $_POST['temperature'];
    $humidity = $_POST['humidity'];
    $wind_speed = $_POST['wind_speed'];
    $precipitation = $_POST['precipitation'];
    $location_id = $_POST['location_id'];

    $sql = "INSERT INTO `weather`(`date`, `time`, `temperature`, `humidity`, `wind_speed`, `precipitation`, `location_id`) VALUES ('$date','$time','$temperature','$humidity','$wind_speed','$precipitation','$location_id')";

    $result = $conn->query($sql);

    if ($result === TRUE) {
        echo '<div class="alert alert-success" role="alert">New record created successfully!</div>';
        echo "<script>console.log('New record created successfully!');</script>";
        header("refresh:2; url=./view.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Weather Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Weather Form</h2>
    <form action="" method="POST">
        <fieldset>
            <legend>Weather Information:</legend>
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" class="form-control" name="date" id="date">
            </div>
            <div class="form-group">
                <label for="time">Time:</label>
                <input type="time" class="form-control" name="time" id="time">
            </div>
            <div class="form-group">
                <label for="temperature">Temperature:</label>
                <input type="number" class="form-control" name="temperature" id="temperature">
            </div>
            <div class="form-group">
                <label for="humidity">Humidity:</label>
                <input type="number" class="form-control" name="humidity" id="humidity">
            </div>
            <div class="form-group">
                <label for="wind_speed">Wind Speed:</label>
                <input type="number" class="form-control" name="wind_speed" id="wind_speed">
            </div>
            <div class="form-group">
                <label for="precipitation">Precipitation:</label>
                <input type="number" class="form-control" name="precipitation" id="precipitation">
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
