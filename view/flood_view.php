<?php
include "./db.php";

$sql = "SELECT flood_event_id, water_level, flow_rate FROM flood";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Floods</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Floods</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Flood Event ID</th>
                    <th>Water Level</th>
                    <th>Flow Rate</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody> 
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?php echo $row['flood_event_id']; ?></td>
                            <td><?php echo $row['water_level']; ?></td>
                            <td><?php echo $row['flow_rate']; ?></td>
                            <td>
                                <a class="btn btn-info" href="update_flood.php?id=<?php echo $row['flood_event_id']; ?>">Edit</a>&nbsp;
                                <a class="btn btn-danger" href="delete_flood.php?id=<?php echo $row['flood_event_id']; ?>">Delete</a>
                            </td>
                        </tr>                       
                <?php   }
                } else {
                    echo "<tr><td colspan='4'>No floods found.</td></tr>";
                }
                $conn->close(); 
                ?>              
            </tbody>
        </table>
        <a style="color:black;" class="btn btn-warning" href="create_flood.php"><b>Create Flood</b></a>
    </div> 
</body>
</html>
