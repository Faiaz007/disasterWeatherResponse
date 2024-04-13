
<?php
include "./db.php";

$sql = "SELECT provider_id, organization_name, person_name, person_email, person_contact_no, event_id FROM disaster_aid_provider";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Disaster Aid Providers</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Disaster Aid Providers</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Provider ID</th>
                    <th>Organization Name</th>
                    <th>Person Name</th>
                    <th>Person Email</th>
                    <th>Contact Number</th>
                    <th>Event ID</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody> 
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?php echo $row['provider_id']; ?></td>
                            <td><?php echo $row['organization_name']; ?></td>
                            <td><?php echo $row['person_name']; ?></td>
                            <td><?php echo $row['person_email']; ?></td>
                            <td><?php echo $row['person_contact_no']; ?></td>
                            <td><?php echo $row['event_id']; ?></td>
                            <td>
                                <a class="btn btn-info" href="disaster_aid_provider_update.php?id=<?php echo $row['provider_id']; ?>">Edit</a>&nbsp;
                                <a class="btn btn-danger" href="disaster_aid_provider_delete.php?id=<?php echo $row['provider_id']; ?>">Delete</a>
                            </td>
                        </tr>                       
                <?php   }
                } else {
                    echo "<tr><td colspan='7'>No disaster aid providers found.</td></tr>";
                }
                $conn->close(); 
                ?>              
            </tbody>
        </table>
        <a style="color:black;" class="btn btn-warning" href="disaster_aid_provider_form.php"><b>Create Disaster Aid Provider</b></a>
    </div> 
</body>
</html>
