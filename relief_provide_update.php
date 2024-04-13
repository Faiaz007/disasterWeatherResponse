// Update form action: action="update_relief_provide.php"

// PHP script: update_relief_provide.php
<?php 
include "db.php";

if (isset($_POST['update'])) {
    $event_id = $_POST['event_id'];
    $provider_id = $_POST['provider_id'];
    $relief_name = $_POST['relief_name'];
    $quantity = $_POST['quantity'];
    
    $sql = "UPDATE `relief_provide` SET `relief_name`='$relief_name', `quantity`='$quantity' WHERE `event_id`='$event_id' AND `provider_id`='$provider_id'"; 

    $result = $conn->query($sql); 

    if ($result == TRUE) {
        echo '<div class="alert alert-success" role="alert">';
        echo 'Record updated successfully.';
        echo '</div>';
        echo "<script>console.log('Record updated successfully.');</script>";
        header( "refresh:2; url=./relief_provider_view.php" ); 
    } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
} 

if (isset($_GET['event_id']) && isset($_GET['provider_id'])) {
    $event_id = $_GET['event_id']; 
    $provider_id = $_GET['provider_id']; 
    $sql = "SELECT * FROM `relief_provide` WHERE `event_id`='$event_id' AND `provider_id`='$provider_id'";
    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        
        while ($row = $result->fetch_assoc()) {
            $relief_name = $row['relief_name'];
            $quantity = $row['quantity'];
        } 
?>
<html>
<head>
    <title>Relief Provide Update Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Relief Provide Update Form</h2>
    <form action="" method="post">
        <fieldset>
            <legend>Relief Provide information:</legend>
            <div class="form-group">
                <label for="relief_name">Relief Name:</label>
                <input type="text" class="form-control" name="relief_name" value="<?php echo $relief_name; ?>">
            </div>
            <input type="hidden" name="event_id" value="<?php echo $event_id; ?>">
            <input type="hidden" name="provider_id" value="<?php echo $provider_id; ?>">
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
        header('Location: relief_provider_view.php');
    } 
}
?>
