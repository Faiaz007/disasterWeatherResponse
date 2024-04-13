<?php 

include "./db.php";

$sql = "SELECT resource_id, resource_quantity, provider_id FROM resource";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Resource View Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Resources</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Resource ID</th>
                    <th>Quantity</th>
                    <th>Provider ID</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody> 
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $row['resource_id']; ?></td>
                        <td><?php echo $row['resource_quantity']; ?></td>
                        <td><?php echo $row['provider_id']; ?></td>
                        <td>
                            <a class="btn btn-info" href="resource_update.php?id=<?php echo $row['resource_id']; ?>">Edit</a>&nbsp;
                            <a class="btn btn-danger" href="resource_delete.php?id=<?php echo $row['resource_id']; ?>">Delete</a>
                        </td>
                    </tr>                       
                <?php
                    }
                }
                $conn->close(); 
                ?>              
            </tbody>
        </table>
        <a style="color:black;" class="btn btn-warning" href="resource_form.php"><b>Create Resource</b></a>
    </div> 
</body>
</html>