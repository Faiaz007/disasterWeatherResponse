<?php
include "db.php";

if (isset($_POST['submit'])) {
    $wind_speed = $_POST['wind_speed'];
    $center_pressure = $_POST['center_pressure'];
    $center_eye = $_POST['center_eye'];
    $radius = $_POST['radius'];

    $sql = "INSERT INTO cyclone(wind_speed, center_pressure, center_eye, radius) VALUES ('$wind_speed','$center_pressure','$center_eye','$radius')";

    $result = $conn->query($sql);

    if ($result === TRUE) {
        echo '<div class="alert alert-success" role="alert">New cyclone record created successfully!</div>';
        echo "<script>console.log('New cyclone record created successfully!');</script>";
        header("refresh:2; url=./cyclone_view.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Cyclone Signup Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container">
        <h2>Cyclone Form</h2>

        <form action="" method="POST">

            <fieldset>

                <legend>Cyclone information:</legend>

                <div class="form-group">
                    <label for="wind_speed">Wind Speed:</label>
                    <input type="text" class="form-control" name="wind_speed" id="wind_speed">
                </div>

                <div class="form-group">
                    <label for="center_pressure">Center Pressure:</label>
                    <input type="text" class="form-control" name="center_pressure" id="center_pressure">
                </div>

                <div class="form-group">
                    <label for="center_eye">Center Eye:</label>
                    <input type="text" class="form-control" name="center_eye" id="center_eye">
                </div>

                <div class="form-group">
                    <label for="radius">Radius:</label>
                    <input type="text" class="form-control" name="radius" id="radius">
                </div>

                <input type="submit" name="submit" value="Submit" class="btn btn-primary">

            </fieldset>

        </form>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>