<?php 

include "db.php"; 

if (isset($_GET['id'])) {
    // Sanitize the input to prevent SQL injection
    $provider_id = $_GET['id'];
    
    // Prepare a DELETE statement
    $sql = "DELETE FROM `disaster_aid_provider` WHERE `provider_id`=?";
    $stmt = $conn->prepare($sql);
    
    // Bind the provider ID parameter
    $stmt->bind_param("i", $provider_id); // Assuming 'provider_id' is an integer
    
    // Execute the statement
    if ($stmt->execute()) {
        echo '<div class="alert alert-success" role="alert">Record successfully deleted!</div>';
        header("refresh:2; url=./disaster_Aid_Provider_view.php");
    } else {
        echo "Error:" . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} 

?>
