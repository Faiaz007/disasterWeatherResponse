
<?php
include "./db.php";

$sql = "SELECT event_id, start_date_time, end_date_time, severity, location_id, weather_id FROM disaster";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Disasters</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Disasters</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Event ID</th>
                    <th>Start Date/Time</th>
                    <th>End Date/Time</th>
                    <th>Severity</th>
                    <th>Location ID</th>
                    <th>Weather ID</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody> 
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?php echo $row['event_id']; ?></td>
                            <td><?php echo $row['start_date_time']; ?></td>
                            <td><?php echo $row['end_date_time']; ?></td>
                            <td><?php echo $row['severity']; ?></td>
                            <td><?php echo $row['location_id']; ?></td>
                            <td><?php echo $row['weather_id']; ?></td>
                            <td>
                                <a class="btn btn-info" href="update_disaster.php?id=<?php echo $row['event_id']; ?>">Edit</a>&nbsp;
                                <a class="btn btn-danger" href="delete_disaster.php?id=<?php echo $row['event_id']; ?>">Delete</a>
                            </td>
                        </tr>                       
                <?php   }
                } else {
                    echo "<tr><td colspan='7'>No disasters found.</td></tr>";
                }
                $conn->close(); 
                ?>              
            </tbody>
        </table>
        <a style="color:black;" class="btn btn-warning" href="disaster_form.php"><b>Create Disaster</b></a>
    </div> 
</body>
</html>
