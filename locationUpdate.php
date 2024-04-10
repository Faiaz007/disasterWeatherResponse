<?php 

include "db.php";

if (isset($_POST['update'])) {

    $location_id = $_POST['location_id'];

    $latitude = $_POST['latitude'];

    $longitude = $_POST['longitude'];

    $city_name = $_POST['city_name'];

    $country = $_POST['country'];

    $population_demographic = $_POST['population_demographic'];

    $sql = "UPDATE `location` SET `latitude`='$latitude', `longitude`='$longitude', `city_name`='$city_name', `country`='$country', `population_demographic`='$population_demographic' WHERE `location_id`='$location_id'"; 

    $result = $conn->query($sql); 

    if ($result === TRUE) {

        echo '<div class="alert alert-success" role="alert">';
        echo 'Record updated successfully.';
        echo '</div>';
        echo "<script>console.log('Record updated successfully.');</script>";
        header("refresh:2; url=./view.php");

    } else {

        echo "Error: " . $sql . "<br>" . $conn->error;

    }

} 

if (isset($_GET['id'])) {

    $location_id = $_GET['id']; 

    $sql = "SELECT * FROM `location` WHERE `location_id`='$location_id'";

    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {

            $latitude = $row['latitude'];

            $longitude = $row['longitude'];

            $city_name = $row['city_name'];

            $country = $row['country'];

            $population_demographic = $row['population_demographic'];

        } 

    ?>

    <html>
    <head>
        <title>Location Update Form</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>

    <div class="container">
        <h2>Location Update Form</h2>

        <form action="" method="post">

          <fieldset>

            <legend>Location information:</legend>

            <div class="form-group">
                <label for="latitude">Latitude:</label>
                <input type="text" class="form-control" name="latitude" value="<?php echo $latitude; ?>">
            </div>

            <input type="hidden" name="location_id" value="<?php echo $location_id; ?>">

            <div class="form-group">
                <label for="longitude">Longitude:</label>
                <input type="text" class="form-control" name="longitude" value="<?php echo $longitude; ?>">
            </div>

            <div class="form-group">
                <label for="city_name">City Name:</label>
                <input type="text" class="form-control" name="city_name" value="<?php echo $city_name; ?>">
            </div>

            <div class="form-group">
                <label for="country">Country:</label>
                <input type="text" class="form-control" name="country" value="<?php echo $country; ?>">
            </div>

            <div class="form-group">
                <label for="population_demographic">Population Demographic:</label>
                <input type="text" class="form-control" name="population_demographic" value="<?php echo $population_demographic; ?>">
            </div>

            <input type="submit" class="btn btn-primary" value="Update" name="update">

          </fieldset>

        </form> 
    </div>

    </body>
    </html> 

    <?php

    } else { 

        header('Location: view.php');

    } 

}

?>