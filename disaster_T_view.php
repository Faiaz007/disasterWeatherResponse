<?php 

include "./db.php";

// Fetch data from cyclone table
$sql_cyclone = "SELECT * FROM cyclone";
$result_cyclone = $conn->query($sql_cyclone);

// Fetch data from disaster table
$sql_disaster = "SELECT * FROM disaster";
$result_disaster = $conn->query($sql_disaster);

// Fetch data from disaster_aid_provider table
$sql_provider = "SELECT * FROM disaster_aid_provider";
$result_provider = $conn->query($sql_provider);

// Fetch data from donor table
$sql_donor = "SELECT * FROM donor";
$result_donor = $conn->query($sql_donor);

// Fetch data from earthquake table
$sql_earthquake = "SELECT * FROM earthquake";
$result_earthquake = $conn->query($sql_earthquake);

// Fetch data from fabric table
$sql_fabric = "SELECT * FROM fabric";
$result_fabric = $conn->query($sql_fabric);

// Fetch data from flood table
$sql_flood = "SELECT * FROM flood";
$result_flood = $conn->query($sql_flood);

// Fetch data from food table
$sql_food = "SELECT * FROM food";
$result_food = $conn->query($sql_food);

// Fetch data from location table
$sql_location = "SELECT * FROM location";
$result_location = $conn->query($sql_location);

// Fetch data from medicine table
$sql_medicine = "SELECT * FROM medicine";
$result_medicine = $conn->query($sql_medicine);

// Fetch data from relief_provide table
$sql_relief = "SELECT * FROM relief_provide";
$result_relief = $conn->query($sql_relief);

// Fetch data from resource table
$sql_resource = "SELECT * FROM resource";
$result_resource = $conn->query($sql_resource);

// Fetch data from shelter table
$sql_shelter = "SELECT * FROM shelter";
$result_shelter = $conn->query($sql_shelter);

// Fetch data from weather table
$sql_weather = "SELECT * FROM weather";
$result_weather = $conn->query($sql_weather);

?>

<!DOCTYPE html>

<html>

<head>

    <title>View Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

</head>

<body>

    <div class="container">

        <h2>Disasters and Resources</h2>

<table class="table">

    <thead>

    <tr>
        <th>Event ID</th>
        <th>Start Date Time</th>
        <th>End Date Time</th>
        <th>Severity</th>
        <th>Location ID</th>
        <th>Weather ID</th>
    </tr>

    </thead>

    <tbody> 

        <?php

        // Display disaster table data
        if ($result_disaster->num_rows > 0) {
            while ($row = $result_disaster->fetch_assoc()) {
        ?>

            <tr>
                <td><?php echo $row['event_id']; ?></td>
                <td><?php echo $row['start_date_time']; ?></td>
                <td><?php echo $row['end_date_time']; ?></td>
                <td><?php echo $row['severity']; ?></td>
                <td><?php echo $row['location_id']; ?></td>
                <td><?php echo $row['weather_id']; ?></td>
            </tr>                       

        <?php
            }
        }
        ?>              

    </tbody>

</table>

<!-- Repeat the above block for other tables (cyclone, disaster_aid_provider, donor, etc.) -->

<!-- Add links to other pages or forms for CRUD operations -->

<a style="color:black;" class="btn btn-warning" href="form.php"><b>Create User</b></a>
    </div> 

</body>

</html>
