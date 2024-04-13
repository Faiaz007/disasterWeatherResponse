<?php 
include "db.php";

if (isset($_POST['submit'])) {
    $water_level = $_POST['water_level'];
    $flow_rate = $_POST['flow_rate'];

    $sql = "INSERT INTO `flood` (`water_level`, `flow_rate`) VALUES ('$water_level', '$flow_rate')";

    $result = $conn->query($sql);

    if ($result === TRUE) {
        echo '<div class="alert alert-success" role="alert">New flood record created successfully!</div>';
        header("refresh:2; url=./flood_view.php");
    } else {
        echo '<div class="alert alert-danger" role="alert">Error: ' . $sql . "<br>" . $conn->error . '</div>';
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Flood Form</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
  <h2>Flood Form</h2>
  <form action="" method="POST">
    <fieldset>
      <legend>Flood Information:</legend>
      <div class="form-group">
        <label for="water_level">Water Level:</label>
        <input type="text" class="form-control" name="water_level" id="water_level">
      </div>
      <div class="form-group">
        <label for="flow_rate">Flow Rate:</label>
        <input type="text" class="form-control" name="flow_rate" id="flow_rate">
      </div>
      <input type="submit" name="submit" value="Submit" class="btn btn-primary">
    </fieldset>
  </form>
</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
