<?php
include "./db.php";

$sql = "SELECT resource_id, provider_id, relief_name, quantity FROM donor";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Donors</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Donors</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Resource ID</th>
                    <th>Provider ID</th>
                    <th>Relief Name</th>
                    <th>Quantity</th>
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
                            <td><?php echo $row['provider_id']; ?></td>
                            <td><?php echo $row['relief_name']; ?></td>
                            <td><?php echo $row['quantity']; ?></td>
                            <td>
                                <a class="btn btn-info" href="update_donor.php?id=<?php echo $row['resource_id']; ?>&provider_id=<?php echo $row['provider_id']; ?>">Edit</a>&nbsp;
                                <a class="btn btn-danger" href="delete_donor.php?id=<?php echo $row['resource_id']; ?>&provider_id=<?php echo $row['provider_id']; ?>">Delete</a>
                            </td>
                        </tr>                       
                <?php   }
                } else {
                    echo "<tr><td colspan='5'>No donors found.</td></tr>";
                }
                $conn->close(); 
                ?>              
            </tbody>
        </table>
        <a style="color:black;" class="btn btn-warning" href="create_donor.php"><b>Create Donor</b></a>
    </div> 
</body>
</html>
