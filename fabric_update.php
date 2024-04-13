// Update form action: action="update_fabric.php"

// PHP script: update_fabric.php
<?php 
include "db.php";

if (isset($_POST['update'])) {
    $fab_resource_id = $_POST['fab_resource_id'];
    $fab_name = $_POST['fab_name'];
    $fab_type = $_POST['fab_type'];
    $fab_condition = $_POST['fab_condition'];
    
    $sql = "UPDATE `fabric` SET `fab_name`='$fab_name', `fab_type`='$fab_type', `fab_condition`='$fab_condition' WHERE `fab_resource_id`='$fab_resource_id'"; 

    $result = $conn->query($sql); 

    if ($result == TRUE) {
        echo '<div class="alert alert-success" role="alert">';
        echo 'Record updated successfully.';
        echo '</div>';
        echo "<script>console.log('Record updated successfully.');</script>";
        header( "refresh:2; url=./fabric_view.php" ); 
    } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
} 

if (isset($_GET['id'])) {
    $fab_resource_id = $_GET['id']; 
    $sql = "SELECT * FROM `fabric` WHERE `fab_resource_id`='$fab_resource_id'";
    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        
        while ($row = $result->fetch_assoc()) {
            $fab_name = $row['fab_name'];
            $fab_type = $row['fab_type'];
            $fab_condition = $row['fab_condition'];
            $id = $row['fab_resource_id'];
        } 
?>
<html>
<head>
    <title>Fabric Update Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Fabric Update Form</h2>
    <form action="" method="post">
        <fieldset>
            <legend>Fabric information:</legend>
            <div class="form-group">
                <label for="fab_name">Fabric Name:</label>
                <input type="text" class="form-control" name="fab_name" value="<?php echo $fab_name; ?>">
            </div>
            <input type="hidden" name="fab_resource_id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="fab_type">Fabric Type:</label>
                <input type="text" class="form-control" name="fab_type" value="<?php echo $fab_type; ?>">
            </div>
            <div class="form-group">
                <label for="fab_condition">Fabric Condition:</label>
                <input type="text" class="form-control" name="fab_condition" value="<?php echo $fab_condition; ?>">
            </div>
            <input type="submit" class="btn btn-primary" value="Update" name="update">
        </fieldset>
    </form> 
</div>
</body>
</html> 
<?php
    } else { 
        header('Location: fabric_view.php');
    } 
}
?>
