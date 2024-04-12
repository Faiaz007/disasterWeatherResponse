<?php 

include "db.php"; 

if (isset($_GET['id'])) {
    // Sanitize the input to prevent SQL injection
    $food_resource_id = $_GET['id'];
    
    // Prepare a DELETE statement
    $sql = "DELETE FROM `food` WHERE `food_resource_id`=?";
    $stmt = $conn->prepare($sql);
    
    // Bind the food resource ID parameter
    $stmt->bind_param("i", $food_resource_id); // Assuming 'food_resource_id' is an integer
    
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
