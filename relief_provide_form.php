
<?php 
include "db.php";

if (isset($_POST['submit'])) {
    $event_id = $_POST['event_id'];
    $provider_id = $_POST['provider-id'];
    $relief_name = $_POST['relief_name'];
    $quantity = $_POST['quantity'];

    $sql = "INSERT INTO `relief_provide`('event_id','provider_id','relief_name','quantity') VALUES ('$event_id','$provider_id','$relief_name','$quantity')";

    if ($conn->query($sql) === TRUE) {
        echo '<div class="alert alert-success" role="alert">New record created successfully!</div>';
        header("refresh:2; url=./view_relief_provide.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    } 

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Relief Provider Form</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h2>Relief Provider Form</h2>
    <form action="" method="POST">
      <fieldset>
        <legend>Provider Information:</legend>
        <div class="form-group">
          <label for="event_id">Provider Name:</label>
          <input type="text" class="form-control" name="provider_name" id="provider_name">
        </div>
        <div class="form-group">
          <label for="location">Location:</label>
          <input type="text" class="form-control" name="location" id="location">
        </div>
        <div class="form-group">
          <label for="contact">Contact:</label>
          <input type="text" class="form-control" name="contact" id="contact">
        </div>
        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
      </fieldset>
    </form>
  </div>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/js/bootstrap.min.js"></script>
</body>
</html>
