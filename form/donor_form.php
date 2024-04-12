<?php 
include "db.php";

if (isset($_POST['submit'])) {
    // Assuming you have collected the necessary form data for the donor table
    $resource_id = $_POST['resource_id'];
    $provider_id = $_POST['provider_id'];
    $relief_name = $_POST['relief_name'];
    $quantity = $_POST['quantity'];

    $sql = "INSERT INTO `donor` (`resource_id`, `provider_id`, `relief_name`, `quantity`) VALUES ('$resource_id', '$provider_id', '$relief_name', '$quantity')";

    $result = $conn->query($sql);

    if ($result === TRUE) {
        echo '<div class="alert alert-success" role="alert">New donor record created successfully!</div>';
        header("refresh:2; url=./view.php");
    } else {
        echo '<div class="alert alert-danger" role="alert">Error: ' . $sql . "<br>" . $conn->error . '</div>';
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Donor Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Donor Form</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label for="resource_id">Resource ID:</label>
            <input type="text" class="form-control" name="resource_id" id="resource_id">
        </div>
        <div class="form-group">
            <label for="provider_id">Provider ID:</label>
            <input type="text" class="form-control" name="provider_id" id="provider_id">
        </div>
        <div class="form-group">
            <label for="relief_name">Relief Name:</label>
            <input type="text" class="form-control" name="relief_name" id="relief_name">
        </div>
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="text" class="form-control" name="quantity" id="quantity">
        </div>
        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
    </form>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
