<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "db.php";

if (isset($_POST['update'])) {
    $weather_id = $_POST['weather_id'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $temperature = $_POST['temperature'];
    $humidity = $_POST['humidity'];
    $wind_speed = $_POST['wind_speed'];
    $precipitation = $_POST['precipitation'];
    $location_id = $_POST['location_id'];
    
    $sql = "UPDATE `weather` SET `date`='$date', `time`='$time', `temperature`='$temperature', `humidity`='$humidity', `wind_speed`='$wind_speed', `precipitation`='$precipitation', `location_id`='$location_id' WHERE `weather_id`='$weather_id'"; 

    $result = $conn->query($sql); 

    if ($result == TRUE) {
        echo '<div class="alert alert-success" role="alert">';
        echo 'Record updated successfully.';
        echo '</div>';
        echo "<script>console.log('Record updated successfully.');</script>";
        header( "refresh:2; url=./weather_view.php" ); 
    } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
} 

if (isset($_GET['id'])) {
    $weather_id = $_GET['id']; 
    $sql = "SELECT * FROM `weather` WHERE `weather_id`='$weather_id'";
    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        
        while ($row = $result->fetch_assoc()) {
            $date = $row['date'];
            $time = $row['time'];
            $temperature = $row['temperature'];
            $humidity = $row['humidity'];
            $wind_speed = $row['wind_speed'];
            $precipitation = $row['precipitation'];
            $location_id = $row['location_id'];
        } 
?>
<html>
<head>
    <title>Weather Update Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Weather Update Form</h2>
    <form action="" method="post">
        <fieldset>
            <legend>Weather information:</legend>
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" class="form-control" name="date" value="<?php echo $date; ?>">
            </div>
            <input type="hidden" name="weather_id" value="<?php echo $weather_id; ?>">
            <div class="form-group">
                <label for="time">Time:</label>
                <input type="time" class="form-control" name="time" value="<?php echo $time; ?>">
            </div>
            <div class="form-group">
                <label for="temperature">Temperature:</label>
                <input type="text" class="form-control" name="temperature" value="<?php echo $temperature; ?>">
            </div>
            <div class="form-group">
                <label for="humidity">Humidity:</label>
                <input type="text" class="form-control" name="humidity" value="<?php echo $humidity; ?>">
            </div>
            <div class="form-group">
                <label for="wind_speed">Wind Speed:</label>
                <input type="text" class="form-control" name="wind_speed" value="<?php echo $wind_speed; ?>">
            </div>
            <div class="form-group">
                <label for="precipitation">Precipitation:</label>
                <input type="text" class="form-control" name="precipitation" value="<?php echo $precipitation; ?>">
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
        header('Location:weather_view.php');
    } 
}
?>