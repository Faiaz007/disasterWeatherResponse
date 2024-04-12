<?php 
include "db.php";

if (isset($_POST['submit'])) {
    $resource_quantity = $_POST['resource_quantity'];
    $provider_id = $_POST['provider_id'];

    // Assuming you have received other fields from the form or you can add them accordingly

    $sql = "INSERT INTO `resource`(`resource_quantity`, `provider_id`) VALUES ('$resource_quantity','$provider_id')";

    $result = $conn->query($sql);

    if ($result === TRUE) {
        echo '<div class="alert alert-success" role="alert">New record created successfully!</div>';
        echo "<script>console.log('New record created successfully!');</script>";
        header("refresh:2; url=./view.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Resource Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Resource Form</h2>
    <form action="" method="POST">
        <fieldset>
            <legend>Resource information:</legend>
            <div class="form-group">
                <label for="resource_quantity">Resource Quantity:</label>
                <input type="text" class="form-control" name="resource_quantity" id="resource_quantity">
            </div>
            <div class="form-group">
                <label for="provider_id">Provider ID:</label>
                <input type="text" class="form-control" name="provider_id" id="provider_id">
            </div>
            <!-- You can add more fields here if needed -->
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        </fieldset>
    </form>
</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
