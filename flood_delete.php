<?php 

include "db.php"; 

if (isset($_GET['id'])) {
    // Sanitize the input to prevent SQL injection
    $flood_event_id = $_GET['id'];
    
    // Prepare a DELETE statement
    $sql = "DELETE FROM `flood` WHERE `flood_event_id`=?";
    $stmt = $conn->prepare($sql);
    
    // Bind the flood event ID parameter
    $stmt->bind_param("i", $flood_event_id); // Assuming 'flood_event_id' is an integer
    
    // Execute the statement
    if ($stmt->execute()) {
        echo '<div class="alert alert-success" role="alert">Record successfully deleted!</div>';
        header("refresh:2; url=./view.php");
    } else {
        echo "Error:" . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} 

?>
