<?php 
include "db.php";

if (isset($_POST['update'])) {
    $event_id = $_POST['event_id'];
    $start_date_time = $_POST['start_date_time'];
    $end_date_time = $_POST['end_date_time'];
    $severity = $_POST['severity'];
    $location_id = $_POST['location_id'];
    $weather_id = $_POST['weather_id'];
    
    $sql = "UPDATE `disaster` SET `start_date_time`='$start_date_time', `end_date_time`='$end_date_time', `severity`='$severity', `location_id`='$location_id', `weather_id`='$weather_id' WHERE `event_id`='$event_id'"; 

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
    $event_id = $_GET['id']; 
    $sql = "SELECT * FROM `disaster` WHERE `event_id`='$event_id'";
    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        
        while ($row = $result->fetch_assoc()) {
            $start_date_time = $row['start_date_time'];
            $end_date_time = $row['end_date_time'];
            $severity = $row['severity'];
            $location_id = $row['location_id'];
            $weather_id = $row['weather_id'];
            $id = $row['event_id'];
        } 
?>
<html>
<head>
    <title>Disaster Update Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Disaster Update Form</h2>
    <form action="" method="post">
        <fieldset>
            <legend>Disaster information:</legend>
            <div class="form-group">
                <label for="start_date_time">Start Date Time:</label>
                <input type="datetime-local" class="form-control" name="start_date_time" value="<?php echo $start_date_time; ?>">
            </div>
            <input type="hidden" name="event_id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="end_date_time">End Date Time:</label>
                <input type="datetime-local" class="form-control" name="end_date_time" value="<?php echo $end_date_time; ?>">
            </div>
            <div class="form-group">
                <label for="severity">Severity:</label>
                <input type="text" class="form-control" name="severity" value="<?php echo $severity; ?>">
            </div>
            <div class="form-group">
                <label for="location_id">Location ID:</label>
                <input type="text" class="form-control" name="location_id" value="<?php echo $location_id; ?>">
            </div>
            <div class="form-group">
                <label for="weather_id">Weather ID:</label>
                <input type="text" class="form-control" name="weather_id" value="<?php echo $weather_id; ?>">
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
