<?php
include "./db.php";

$sql = "SELECT cyclone_event_id, wind_speed, center_pressure, center_eye, radius FROM cyclone";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Cyclones</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Cyclones</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Cyclone Event ID</th>
                    <th>Wind Speed</th>
                    <th>Center Pressure</th>
                    <th>Center Eye</th>
                    <th>Radius</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody> 
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?php echo $row['cyclone_event_id']; ?></td>
                            <td><?php echo $row['wind_speed']; ?></td>
                            <td><?php echo $row['center_pressure']; ?></td>
                            <td><?php echo $row['center_eye']; ?></td>
                            <td><?php echo $row['radius']; ?></td>
                            <td>
                                <a class="btn btn-info" href="cyclone_update.php?id=<?php echo $row['cyclone_event_id']; ?>">Edit</a>&nbsp;
                                <a class="btn btn-danger" href="cyclone_delete.php?id=<?php echo $row['cyclone_event_id']; ?>">Delete</a>
                            </td>
                        </tr>                       
                <?php   }
                } else {
                    echo "<tr><td colspan='6'>No cyclones found.</td></tr>";
                }
                $conn->close(); 
                ?>              
            </tbody>
        </table>
        <a style="color:black;" class="btn btn-warning" href="cyclone_form.php"><b>Create Cyclone</b></a>
    </div> 
</body>
</html>
