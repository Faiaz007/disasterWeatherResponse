<?php 
include "db.php";

if (isset($_POST['submit'])) {
    $event_id = $_POST['event_id'];
    $start_date_time = $_POST['start_date_time'];
    $end_date_time = $_POST['end_date_time'];
    $severity = $_POST['severity'];
    $location_id = $_POST['location_id'];
    $weather_id = $_POST['weather_id'];

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO `disaster` (`event_id`, `start_date_time`, `end_date_time`, `severity`, `location_id`, `weather_id`) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $event_id, $start_date_time, $end_date_time, $severity, $location_id, $weather_id);

    // Execute the statement
    if ($stmt->execute()) {
        echo '<div class="alert alert-success" role="alert">New disaster record created successfully!</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Error: ' . $stmt->error . '</div>';
    }

    // Close the statement
    $stmt->close();

    // Handle other tables similarly for insertion

    // Repeat this process for other tables...

    $conn->close();
}
?>
