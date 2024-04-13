<?php
include "./db.php";

$sql = "SELECT food_resource_id, food_name, food_type, mfg_date, exp_date, age_range FROM food";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Food Items</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Food Items</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Food Resource ID</th>
                    <th>Food Name</th>
                    <th>Food Type</th>
                    <th>Manufacture Date</th>
                    <th>Expiry Date</th>
                    <th>Age Range</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody> 
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?php echo $row['food_resource_id']; ?></td>
                            <td><?php echo $row['food_name']; ?></td>
                            <td><?php echo $row['food_type']; ?></td>
                            <td><?php echo $row['mfg_date']; ?></td>
                            <td><?php echo $row['exp_date']; ?></td>
                            <td><?php echo $row['age_range']; ?></td>
                            <td>
                                <a class="btn btn-info" href="food_update.php?id=<?php echo $row['food_resource_id']; ?>">Edit</a>&nbsp;
                                <a class="btn btn-danger" href="food_delete.php?id=<?php echo $row['food_resource_id']; ?>">Delete</a>
                            </td>
                        </tr>                       
                <?php   }
                } else {
                    echo "<tr><td colspan='7'>No food items found.</td></tr>";
                }
                $conn->close(); 
                ?>              
            </tbody>
        </table>
        <a style="color:black;" class="btn btn-warning" href="food_form.php"><b>Create Food Item</b></a>
    </div> 
</body>
</html>
