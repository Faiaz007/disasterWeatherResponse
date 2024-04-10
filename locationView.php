<?php 

include "db.php";

$sql = "SELECT location_id, latitude, longitude, city_name, country, population_demographic FROM location";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Locations</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Locations</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Location ID</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>City Name</th>
                    <th>Country</th>
                    <th>Population Demographic</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody> 
                <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                ?>
                            <tr>
                                <td><?php echo $row['location_id']; ?></td>
                                <td><?php echo $row['latitude']; ?></td>
                                <td><?php echo $row['longitude']; ?></td>
                                <td><?php echo $row['city_name']; ?></td>
                                <td><?php echo $row['country']; ?></td>
                                <td><?php echo $row['population_demographic']; ?></td>
                                <td>
                                    <a class="btn btn-info" href="update_location.php?id=<?php echo $row['location_id']; ?>">Edit</a>
                                </td>
                            </tr>                       
                <?php   }
                    } else {
                        echo "<tr><td colspan='7'>No locations found.</td></tr>";
                    }
                    $conn->close(); 
                ?>              
            </tbody>
        </table>
        <a class="btn btn-primary" href="create_location.php">Add New Location</a>
    </div> 
</body>
</html>