<?php
include "./db.php";

$sql = "SELECT earthquake_event_id, magnitude, depth FROM earthquake";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Earthquakes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Earthquakes</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Earthquake Event ID</th>
                    <th>Magnitude</th>
                    <th>Depth</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody> 
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?php echo $row['earthquake_event_id']; ?></td>
                            <td><?php echo $row['magnitude']; ?></td>
                            <td><?php echo $row['depth']; ?></td>
                            <td>
                                <a class="btn btn-info" href="update_earthquake.php?id=<?php echo $row['earthquake_event_id']; ?>">Edit</a>&nbsp;
                                <a class="btn btn-danger" href="delete_earthquake.php?id=<?php echo $row['earthquake_event_id']; ?>">Delete</a>
                            </td>
                        </tr>                       
                <?php   }
                } else {
                    echo "<tr><td colspan='4'>No earthquakes found.</td></tr>";
                }
                $conn->close(); 
                ?>              
            </tbody>
        </table>
        <a style="color:black;" class="btn btn-warning" href="earthquake_form.php"><b>Create Earthquake</b></a>
    </div> 
</body>
</html>
