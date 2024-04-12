// Update form action: action="update_flood.php"

// PHP script: update_flood.php
<?php 
include "db.php";

if (isset($_POST['update'])) {
    $flood_event_id = $_POST['flood_event_id'];
    $water_level = $_POST['water_level'];
    $flow_rate = $_POST['flow_rate'];
    
    $sql = "UPDATE `flood` SET `water_level`='$water_level', `flow_rate`='$flow_rate' WHERE `flood_event_id`='$flood_event_id'"; 

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

if (isset($_GET['id'])) {
    $flood_event_id = $_GET['id']; 
    $sql = "SELECT * FROM `flood` WHERE `flood_event_id`='$flood_event_id'";
    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        
        while ($row = $result->fetch_assoc()) {
            $water_level = $row['water_level'];
            $flow_rate = $row['flow_rate'];
            $id = $row['flood_event_id'];
        } 
?>
<html>
<head>
    <title>Flood Update Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Flood Update Form</h2>
    <form action="" method="post">
        <fieldset>
            <legend>Flood information:</legend>
            <div class="form-group">
                <label for="water_level">Water Level:</label>
                <input type="text" class="form-control" name="water_level" value="<?php echo $water_level; ?>">
            </div>
            <input type="hidden" name="flood_event_id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="flow_rate">Flow Rate:</label>
                <input type="text" class="form-control" name="flow_rate" value="<?php echo $flow_rate; ?>">
            </div>
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
