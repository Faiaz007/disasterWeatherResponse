<?php
include "./db.php";

$sql = "SELECT med_resource_id, med_name, med_group_name, mfg_date, exp_date, batch_no, med_type, agea_range, doses,side_effects FROM medicine";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Medicines</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Medicines</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Medicine Resource ID</th>
                    <th>Medicine Name</th>
                    <th>Medicine Group</th>
                    <th>Manufacture Date</th>
                    <th>Expiry Date</th>
                    <th>Batch Number</th>
                    <th>Medicine Type</th>
                    <th>Age Range</th>
                    <th>Doses</th>
                    <th>Side Effects</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody> 
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?php echo $row['med_resource_id']; ?></td>
                            <td><?php echo $row['med_name']; ?></td>
                            <td><?php echo $row['med_group_name']; ?></td>
                            <td><?php echo $row['mfg_date']; ?></td>
                            <td><?php echo $row['exp_date']; ?></td>
                            <td><?php echo $row['batch_no']; ?></td>
                            <td><?php echo $row['med_type']; ?></td>
                            <td><?php echo $row['agea_range']; ?></td>
                            <td><?php echo $row['doses']; ?></td>
                            <td><?php echo $row['side_effects']; ?></td>
                            <td>
                                <a class="btn btn-info" href="update_medicine.php?id=<?php echo $row['med_resource_id']; ?>">Edit</a>&nbsp;
                                <a class="btn btn-danger" href="delete_medicine.php?id=<?php echo $row['med_resource_id']; ?>">Delete</a>
                            </td>
                        </tr>                       
                <?php   }
                } else {
                    echo "<tr><td colspan='10'>No medicines found.</td></tr>";
                }
                $conn->close(); 
                ?>              
            </tbody>
        </table>
        <a style="color:black;" class="btn btn-warning" href="create_medicine.php"><b>Add Medicine</b></a>
    </div> 
</body>
</html>
