<?php 

include "db.php"; 

if (isset($_GET['id'])) {
    // Sanitize the input to prevent SQL injection
    $weather_id = $_GET['id'];
    
    // Prepare a DELETE statement
    $sql = "DELETE FROM `weather` WHERE `weather_id`=?";
    $stmt = $conn->prepare($sql);
    
    // Bind the weather ID parameter
    $stmt->bind_param("i", $weather_id); // Assuming 'weather_id' is an integer
    
    // Execute the statement
    if ($stmt->execute()) {
        echo '<div class="alert alert-success" role="alert">Record successfully deleted!</div>';
        header("refresh:2; url=./weather_view.php");
    } else {
        echo "Error:" . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} 

?>
