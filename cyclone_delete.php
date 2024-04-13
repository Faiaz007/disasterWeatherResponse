<?php 

include "db.php"; 

if (isset($_GET['id'])) {
    // Sanitize the input to prevent SQL injection
    $cyclone_event_id = $_GET['id'];
    
    // Prepare a DELETE statement
    $sql = "DELETE FROM `cyclone` WHERE `cyclone_event_id`=?";
    $stmt = $conn->prepare($sql);
    
    // Bind the cyclone event ID parameter
    $stmt->bind_param("i", $cyclone_event_id); // Assuming 'cyclone_event_id' is an integer
    
    // Execute the statement
    if ($stmt->execute()) {
        echo '<div class="alert alert-success" role="alert">Record successfully deleted!</div>';
        header("refresh:2; url=./cyclone_view.php");
    } else {
        echo "Error:" . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} 

?>
