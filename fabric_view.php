
<?php
include "./db.php";

$sql = "SELECT fab_resource_id, fab_name, fab_type, fab_condition FROM fabric";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Fabrics</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Fabrics</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Fabric Resource ID</th>
                    <th>Fabric Name</th>
                    <th>Fabric Type</th>
                    <th>Fabric Condition</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody> 
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?php echo $row['fab_resource_id']; ?></td>
                            <td><?php echo $row['fab_name']; ?></td>
                            <td><?php echo $row['fab_type']; ?></td>
                            <td><?php echo $row['fab_condition']; ?></td>
                            <td>
                                <a class="btn btn-info" href="fabric_update.php?id=<?php echo $row['fab_resource_id']; ?>">Edit</a>&nbsp;
                                <a class="btn btn-danger" href="fabric_delete.php?id=<?php echo $row['fab_resource_id']; ?>">Delete</a>
                            </td>
                        </tr>                       
                <?php   }
                } else {
                    echo "<tr><td colspan='5'>No fabrics found.</td></tr>";
                }
                $conn->close(); 
                ?>              
            </tbody>
        </table>
        <a style="color:black;" class="btn btn-warning" href="fabric_form.php"><b>Create Fabric</b></a>
    </div> 
</body>
</html>
