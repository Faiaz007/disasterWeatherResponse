// Update form action: action="update_earthquake.php"

// PHP script: update_earthquake.php
<?php 
include "db.php";

if (isset($_POST['update'])) {
    $earthquake_event_id = $_POST['earthquake_event_id'];
    $magnitude = $_POST['magnitude'];
    $depth = $_POST['depth'];
    
    $sql = "UPDATE `earthquake` SET `magnitude`='$magnitude', `depth`='$depth' WHERE `earthquake_event_id`='$earthquake_event_id'"; 

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
    $earthquake_event_id = $_GET['id']; 
    $sql = "SELECT * FROM `earthquake` WHERE `earthquake_event_id`='$earthquake_event_id'";
    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        
        while ($row = $result->fetch_assoc()) {
            $magnitude = $row['magnitude'];
            $depth = $row['depth'];
            $id = $row['earthquake_event_id'];
        } 
?>
<html>
<head>
    <title>Earthquake Update Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Earthquake Update Form</h2>
    <form action="" method="post">
        <fieldset>
            <legend>Earthquake information:</legend>
            <div class="form-group">
                <label for="magnitude">Magnitude:</label>
                <input type="text" class="form-control" name="magnitude" value="<?php echo $magnitude; ?>">
            </div>
            <input type="hidden" name="earthquake_event_id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="depth">Depth:</label>
                <input type="text" class="form-control" name="depth" value="<?php echo $depth; ?>">
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
