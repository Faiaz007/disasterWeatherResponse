<?php 

include "db.php"; 

if (isset($_GET['id'])) {
    // Sanitize the input to prevent SQL injection
    $location_id = $_GET['id'];
    
    // Prepare a DELETE statement
    $sql = "DELETE FROM `location` WHERE `location_id`=?";
    $stmt = $conn->prepare($sql);
    
    // Bind the location ID parameter
    $stmt->bind_param("i", $location_id); // Assuming 'location_id' is an integer
    
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
