<?php 
include "db.php";

if (isset($_POST['submit'])) {
    $food_name = $_POST['food_name'];
    $food_type = $_POST['food_type'];
    $mfg_date = $_POST['mfg_date'];
    $exp_date = $_POST['exp_date'];
    $age_range = $_POST['age_range'];

    $sql = "INSERT INTO `food`(`food_name`, `food_type`, `mfg_date`, `exp_date`, `age_range`) VALUES ('$food_name','$food_type','$mfg_date','$exp_date','$age_range')";

    if ($conn->query($sql) === TRUE) {
        echo '<div class="alert alert-success" role="alert">New record created successfully!</div>';
        header("refresh:2; url=./view_food.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    } 

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Food</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h2>Add Food</h2>
    <form action="" method="POST">
      <fieldset>
        <legend>Food information:</legend>
        <div class="form-group">
          <label for="food_name">Food Name:</label>
          <input type="text" class="form-control" name="food_name" id="food_name">
        </div>
        <div class="form-group">
          <label for="food_type">Food Type:</label>
          <input type="text" class="form-control" name="food_type" id="food_type">
        </div>
        <div class="form-group">
          <label for="mfg_date">Manufacturing Date:</label>
          <input type="date" class="form-control" name="mfg_date" id="mfg_date">
        </div>
        <div class="form-group">
          <label for="exp_date">Expiry Date:</label>
          <input type="date" class="form-control" name="exp_date" id="exp_date">
        </div>
        <div class="form-group">
          <label for="age_range">Age Range:</label>
          <input type="text" class="form-control" name="age_range" id="age_range">
        </div>
        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
      </fieldset>
    </form>
  </div>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/js/bootstrap.min.js"></script>
</body>
</html>
