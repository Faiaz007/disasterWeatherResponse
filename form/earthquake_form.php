<?php 
include "db.php";

if (isset($_POST['submit'])) {
    // Assuming you have collected the necessary form data for the earthquake table
    $magnitude = $_POST['magnitude'];
    $depth = $_POST['depth'];

    $sql = "INSERT INTO `earthquake` (`magnitude`, `depth`) VALUES ('$magnitude', '$depth')";

    $result = $conn->query($sql);

    if ($result === TRUE) {
        echo '<div class="alert alert-success" role="alert">New earthquake record created successfully!</div>';
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
    <title>Earthquake Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Earthquake Form</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label for="magnitude">Magnitude:</label>
            <input type="text" class="form-control" name="magnitude" id="magnitude">
        </div>
        <div class="form-group">
            <label for="depth">Depth:</label>
            <input type="text" class="form-control" name="depth" id="depth">
        </div>
        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
    </form>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
