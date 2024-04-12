// Update form action: action="update_resource.php"

// PHP script: update_resource.php
<?php 
include "db.php";

if (isset($_POST['update'])) {
    $resource_id = $_POST['resource_id'];
    $resource_quantity = $_POST['resource_quantity'];
    $provider_id = $_POST['provider_id'];
    
    $sql = "UPDATE `resource` SET `resource_quantity`='$resource_quantity' WHERE `resource_id`='$resource_id' AND `provider_id`='$provider_id'"; 

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

if (isset($_GET['resource_id']) && isset($_GET['provider_id'])) {
    $resource_id = $_GET['resource_id']; 
    $provider_id = $_GET['provider_id'];
    $sql = "SELECT * FROM `resource` WHERE `resource_id`='$resource_id' AND `provider_id`='$provider_id'";
    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        
        while ($row = $result->fetch_assoc()) {
            $resource_quantity = $row['resource_quantity'];
            $resource_id = $row['resource_id'];
            $provider_id = $row['provider_id'];
        } 
?>
<html>
<head>
    <title>Resource Update Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Resource Update Form</h2>
    <form action="" method="post">
        <fieldset>
            <legend>Resource information:</legend>
            <div class="form-group">
                <label for="resource_quantity">Resource Quantity:</label>
                <input type="text" class="form-control" name="resource_quantity" value="<?php echo $resource_quantity; ?>">
            </div>
            <input type="hidden" name="resource_id" value="<?php echo $resource_id; ?>">
            <input type="hidden" name="provider_id" value="<?php echo $provider_id; ?>">
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
