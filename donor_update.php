// Update form action: action="update_donor.php"

// PHP script: update_donor.php
<?php 
include "db.php";

if (isset($_POST['update'])) {
    $resource_id = $_POST['resource_id'];
    $provider_id = $_POST['provider_id'];
    $relief_name = $_POST['relief_name'];
    $quantity = $_POST['quantity'];
    
    $sql = "UPDATE `donor` SET `provider_id`='$provider_id', `relief_name`='$relief_name', `quantity`='$quantity' WHERE `resource_id`='$resource_id'"; 

    $result = $conn->query($sql); 

    if ($result == TRUE) {
        echo '<div class="alert alert-success" role="alert">';
        echo 'Record updated successfully.';
        echo '</div>';
        echo "<script>console.log('Record updated successfully.');</script>";
        header( "refresh:2; url=./Donor_view" ); 
    } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
} 

if (isset($_GET['id'])) {
    $resource_id = $_GET['id']; 
    $sql = "SELECT * FROM `donor` WHERE `resource_id`='$resource_id'";
    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        
        while ($row = $result->fetch_assoc()) {
            $provider_id = $row['provider_id'];
            $relief_name = $row['relief_name'];
            $quantity = $row['quantity'];
            $id = $row['resource_id'];
        } 
?>
<html>
<head>
    <title>Donor Update Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Donor Update Form</h2>
    <form action="" method="post">
        <fieldset>
            <legend>Donor information:</legend>
            <div class="form-group">
                <label for="provider_id">Provider ID:</label>
                <input type="text" class="form-control" name="provider_id" value="<?php echo $provider_id; ?>">
            </div>
            <input type="hidden" name="resource_id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="relief_name">Relief Name:</label>
                <input type="text" class="form-control" name="relief_name" value="<?php echo $relief_name; ?>">
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="text" class="form-control" name="quantity" value="<?php echo $quantity; ?>">
            </div>
            <input type="submit" class="btn btn-primary" value="Update" name="update">
        </fieldset>
    </form> 
</div>
</body>
</html> 
<?php
    } else { 
        header('Location: Donor_view.php');
    } 
}
?>
