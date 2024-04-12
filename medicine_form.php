<?php 
include "db.php";

if (isset($_POST['submit'])) {
    $med_name = $_POST['med_name'];
    $med_group_name = $_POST['med_group_name'];
    $mfg_date = $_POST['mfg_date'];
    $exp_date = $_POST['exp_date'];
    $batch_no = $_POST['batch_no'];
    $med_type = $_POST['med_type'];
    $age_range = $_POST['age_range'];
    $doses = $POST['doses'];
    $side_effects = $POST['side_effects'];

    $sql = "INSERT INTO `medicine`('med_name','med_group_name','mfg_date','exp_date','batch_no','med_type','age_range','doses','side_effects') VALUES ('$medicine_name','$quantity','$expiry_date','$manufacturer','$price')";

    if ($conn->query($sql) === TRUE) {
        echo '<div class="alert alert-success" role="alert">New record created successfully!</div>';
        header("refresh:2; url=./view_medicine.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    } 

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Medicine</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h2>Add Medicine</h2>
    <form action="" method="POST">
      <fieldset>
        <legend>Medicine information:</legend>
        <div class="form-group">
          <label for="med_name">Medicine Name:</label>
          <input type="text" class="form-control" name="med_name" id="med_name">
        </div>
        <div class="form-group">
          <label for="med_group_name">Medicine Group Name:</label>
          <input type="text" class="form-control" name="med_group_name" id="med_group_name">
        </div>
        <div class="form-group">
          <label for="mfg_date">Manufacturer Date:</label>
          <input type="text" class="form-control" name="mfg_date" id="mfg_date">
        </div>
        <div class="form-group">
          <label for="exp_date">Expiry Date:</label>
          <input type="date" class="form-control" name="exp_date" id="exp_date">
        </div>
        <div class="form-group">
          <label for="batch_no">Batch No:</label>
          <input type="text" class="form-control" name="batch_no" id="batch_no">
        </div>
        <div class="form-group">
          <label for="med_type">Medecine Type:</label>
          <input type="text" class="form-control" name="med_type" id="med_type">
        </div>
        <div class="form-group">
          <label for="age_range">Age Range:</label>
          <input type="text" class="form-control" name="age_range" id="age_range">
        </div>
        <div class="form-group">
          <label for="doses">Doses:</label>
          <input type="text" class="form-control" name="doses" id="doses">
        </div>
        <div class="form-group">
          <label for="side_effects">Side Effects:</label>
          <input type="text" class="form-control" name="side_effects" id="side_effects">
        </div>
        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
      </fieldset>
    </form>
  </div>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

