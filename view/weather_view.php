
<?php
include "./db.php";

$sql = "SELECT weather_id, date, time, temperature, humidity, wind_speed, precipitation, location_id FROM weather";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Weather</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Weather</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Weather ID</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Temperature</th>
                    <th>Humidity</th>
                    <th>Wind Speed</th>
                    <th>Precipitation</th>
                    <th>Location ID</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody> 
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?php echo $row['weather_id']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo $row['time']; ?></td>
                            <td><?php echo $row['temperature']; ?></td>
                            <td><?php echo $row['humidity']; ?></td>
                            <td><?php echo $row['wind_speed']; ?></td>
                            <td><?php echo $row['precipitation']; ?></td>
                            <td><?php echo $row['location_id']; ?></td>
                            <td>
                                <a class="btn btn-info" href="update_weather.php?id=<?php echo $row['weather_id']; ?>">Edit</a>&nbsp;
                                <a class="btn btn-danger" href="delete_weather.php?id=<?php echo $row['weather_id']; ?>">Delete</a>
                            </td>
                        </tr>                       
                <?php   }
                } else {
                    echo "<tr><td colspan='9'>No weather data found.</td></tr>";
                }
                $conn->close(); 
                ?>              
            </tbody>
        </table>
        <a style="color:black;" class="btn btn-warning" href="create_weather.php"><b>Add Weather Data</b></a>
    </div> 
</body>
</html>
