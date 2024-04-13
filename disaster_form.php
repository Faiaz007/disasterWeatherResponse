<?php
include "db.php";

if (isset($_POST['submit'])) {
    $start_date_time = $_POST['start_date_time'];
    $end_date_time = $_POST['end_date_time'];
    $severity = $_POST['severity'];
    $location_id = $_POST['location_id'];
    $weather_id = $_POST['weather_id'];

    $sql = "INSERT INTO disaster(start_date_time, end_date_time, severity, location_id, weather_id) VALUES ('$start_date_time','$end_date_time','$severity','$location_id','$weather_id')";

    $result = $conn->query($sql);

    if ($result === TRUE) {
        echo '<div class="alert alert-success" role="alert">New disaster record created successfully!</div>';
        echo "<script>console.log('New disaster record created successfully!');</script>";
        header("refresh:2; url=./disaster_view.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Disaster Signup Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container">
        <h2>Disaster Signup Form</h2>

        <form action="" method="POST">

            <fieldset>

                <legend>Disaster information:</legend>

                <div class="form-group">
                    <label for="start_date_time">Start Date and Time:</label>
                    <input type="datetime-local" class="form-control" name="start_date_time" id="start_date_time">
                </div>

                <div class="form-group">
                    <label for="end_date_time">End Date and Time:</label>
                    <input type="datetime-local" class="form-control" name="end_date_time" id="end_date_time">
                </div>

                <div class="form-group">
                    <label for="severity">Severity:</label>
                    <input type="text" class="form-control" name="severity" id="severity">
                </div>

                <div class="form-group">
                    <label for="location_id">Location ID:</label>
                    <input type="text" class="form-control" name="location_id" id="location_id">
                </div>

                <div class="form-group">
                    <label for="weather_id">Weather ID:</label>
                    <input type="text" class="form-control" name="weather_id" id="weather_id">
                </div>

                <input type="submit" name="submit" value="Submit" class="btn btn-primary">

            </fieldset>

        </form>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>