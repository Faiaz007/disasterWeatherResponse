<?php
include "./db.php";

$sql = "SELECT event_id, provider_id, relief_name, quantity FROM relief_provide";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Relief Provided</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Relief Provided</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Event ID</th>
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
                            <td><?php echo $row['event_id']; ?></td>
                            <td><?php echo $row['provider_id']; ?></td>
                            <td><?php echo $row['relief_name']; ?></td>
                            <td><?php echo $row['quantity']; ?></td>
                            <td>
                                <a class="btn btn-info" href="relief_provide_update.php?event_id=<?php echo $row['event_id']; ?>&provider_id=<?php echo $row['provider_id']; ?>">Edit</a>&nbsp;
                                <a class="btn btn-danger" href="relief_provider_delete.php?event_id=<?php echo $row['event_id']; ?>&provider_id=<?php echo $row['provider_id']; ?>">Delete</a>
                            </td>
                        </tr>                       
                <?php   }
                } else {
                    echo "<tr><td colspan='5'>No relief provided found.</td></tr>";
                }
                $conn->close(); 
                ?>              
            </tbody>
        </table>
        <a style="color:black;" class="btn btn-warning" href="relief_provide_form.php"><b>Add Relief</b></a>
    </div> 
</body>
</html>
