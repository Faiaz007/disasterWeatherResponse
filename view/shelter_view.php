<?php
include "./db.php";

$sql = "SELECT shelter_id, shelter_name, shelter_condition, shelter_capacity, built_date, location_id FROM shelter";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Shelters</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Shelters</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Shelter ID</th>
                    <th>Shelter Name</th>
                    <th>Condition</th>
                    <th>Capacity</th>
                    <th>Built Date</th>
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
                            <td><?php echo $row['shelter_id']; ?></td>
                            <td><?php echo $row['shelter_name']; ?></td>
                            <td><?php echo $row['shelter_condition']; ?></td>
                            <td><?php echo $row['shelter_capacity']; ?></td>
                            <td><?php echo $row['built_date']; ?></td>
                            <td><?php echo $row['location_id']; ?></td>
                            <td>
                                <a class="btn btn-info" href="update_shelter.php?id=<?php echo $row['shelter_id']; ?>">Edit</a>&nbsp;
                                <a class="btn btn-danger" href="delete_shelter.php?id=<?php echo $row['shelter_id']; ?>">Delete</a>
                            </td>
                        </tr>                       
                <?php   }
                } else {
                    echo "<tr><td colspan='7'>No shelters found.</td></tr>";
                }
                $conn->close(); 
                ?>              
            </tbody>
        </table>
        <a style="color:black;" class="btn btn-warning" href="create_shelter.php"><b>Add Shelter</b></a>
    </div> 
</body>
</html>
