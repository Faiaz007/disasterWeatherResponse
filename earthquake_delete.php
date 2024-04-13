<?php 

include "db.php"; 

if (isset($_GET['id'])) {
    // Sanitize the input to prevent SQL injection
    $earthquake_event_id = $_GET['id'];
    
    // Prepare a DELETE statement
    $sql = "DELETE FROM `earthquake` WHERE `earthquake_event_id`=?";
    $stmt = $conn->prepare($sql);
    
    // Bind the earthquake event ID parameter
    $stmt->bind_param("i", $earthquake_event_id); // Assuming 'earthquake_event_id' is an integer
    
    // Execute the statement
    if ($stmt->execute()) {
        echo '<div class="alert alert-success" role="alert">Record successfully deleted!</div>';
        header("refresh:2; url=./earthquake_view");
    } else {
        echo "Error:" . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} 

?>
