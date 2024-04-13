<?php 
include "db.php";

if (isset($_POST['submit'])) {
    $fab_name = $_POST['fab_name'];
    $fab_type = $_POST['fab_type'];
    $fab_condition = $_POST['fab_condition'];

    $sql = "INSERT INTO `fabric`(`fab_name`, `fab_type`, `fab_condition`) VALUES ('$fab_name','$fab_type','$fab_condition')";

    if ($conn->query($sql) === TRUE) {
        echo '<div class="alert alert-success" role="alert">New record created successfully!</div>';
        header("refresh:2; url=./fabric_view.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    } 

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Fabric</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h2>Add Fabric</h2>
    <form action="" method="POST">
      <fieldset>
        <legend>Fabric information:</legend>
        <div class="form-group">
          <label for="fab_name">Fabric Name:</label>
          <input type="text" class="form-control" name="fab_name" id="fab_name">
        </div>
        <div class="form-group">
          <label for="fab_type">Fabric Type:</label>
          <input type="text" class="form-control" name="fab_type" id="fab_type">
        </div>
        <div class="form-group">
          <label for="fab_condition">Fabric Condition:</label>
          <input type="text" class="form-control" name="fab_condition" id="fab_condition">
        </div>
        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
      </fieldset>
    </form>
  </div>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
