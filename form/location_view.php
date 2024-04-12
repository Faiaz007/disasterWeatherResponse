<?php 
include "db.php";

if (isset($_POST['submit'])) {
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $city_name = $_POST['city_name'];
    $country = $_POST['country'];
    $population_demographic = $_POST['population_demographic'];

    $sql = "INSERT INTO `location`(`latitude`, `longitude`, `city_name`, `country`, `population_demographic`) VALUES ('$latitude','$longitude','$city_name','$country','$population_demographic')";

    if ($conn->query($sql) === TRUE) {
        echo '<div class="alert alert-success" role="alert">New record created successfully!</div>';
        header("refresh:2; url=./view_location.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    } 

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Location</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h2>Add Location</h2>
    <form action="" method="POST">
      <fieldset>
        <legend>Location information:</legend>
        <div class="form-group">
          <label for="latitude">Latitude:</label>
          <input type="text" class="form-control" name="latitude" id="latitude">
        </div>
        <div class="form-group">
          <label for="longitude">Longitude:</label>
          <input type="text" class="form-control" name="longitude" id="longitude">
        </div>
        <div class="form-group">
          <label for="city_name">City Name:</label>
          <input type="text" class="form-control" name="city_name" id="city_name">
        </div>
        <div class="form-group">
          <label for="country">Country:</label>
          <input type="text" class="form-control" name="country" id="country">
        </div>
        <div class="form-group">
          <label for="population_demographic">Population Demographic:</label>
          <input type="text" class="form-control" name="population_demographic" id="population_demographic">
        </div>
        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
      </fieldset>
    </form>
  </div>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
