<?php 
include "db.php";

if (isset($_POST['update'])) {
    $cyclone_event_id = $_POST['cyclone_event_id'];
    $wind_speed = $_POST['wind_speed'];
    $center_pressure = $_POST['center_pressure'];
    $center_eye = $_POST['center_eye'];
    $radius = $_POST['radius'];
    
    $sql = "UPDATE `cyclone` SET `wind_speed`='$wind_speed', `center_pressure`='$center_pressure', `center_eye`='$center_eye', `radius`='$radius' WHERE `cyclone_event_id`='$cyclone_event_id'"; 

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
    $cyclone_event_id = $_GET['id']; 
    $sql = "SELECT * FROM `cyclone` WHERE `cyclone_event_id`='$cyclone_event_id'";
    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        
        while ($row = $result->fetch_assoc()) {
            $wind_speed = $row['wind_speed'];
            $center_pressure = $row['center_pressure'];
            $center_eye = $row['center_eye'];
            $radius = $row['radius'];
            $id = $row['cyclone_event_id'];
        } 
?>
<html>
<head>
    <title>Cyclone Update Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Cyclone Update Form</h2>
    <form action="" method="post">
        <fieldset>
            <legend>Cyclone information:</legend>
            <div class="form-group">
                <label for="wind_speed">Wind Speed:</label>
                <input type="text" class="form-control" name="wind_speed" value="<?php echo $wind_speed; ?>">
            </div>
            <input type="hidden" name="cyclone_event_id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="center_pressure">Center Pressure:</label>
                <input type="text" class="form-control" name="center_pressure" value="<?php echo $center_pressure; ?>">
            </div>
            <div class="form-group">
                <label for="center_eye">Center Eye:</label>
                <input type="text" class="form-control" name="center_eye" value="<?php echo $center_eye; ?>">
            </div>
            <div class="form-group">
                <label for="radius">Radius:</label>
                <input type="text" class="form-control" name="radius" value="<?php echo $radius; ?>">
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
