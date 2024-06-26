<?php 

include "db.php"; 

if (isset($_GET['id'])) {
    // Sanitize the input to prevent SQL injection
    $event_id = $_GET['id'];
    
    // Prepare a DELETE statement
    $sql = "DELETE FROM `relief_provider` WHERE `event_id`=?";
    $stmt = $conn->prepare($sql);
    
    // Bind the event ID parameter
    $stmt->bind_param("i", $event_id); // Assuming 'event_id' is an integer
    
    // Execute the statement
    if ($stmt->execute()) {
        echo '<div class="alert alert-success" role="alert">Record successfully deleted!</div>';
        header("refresh:2; url=./relief_provider_view.php");
    } else {
        echo "Error:" . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} 

?>
