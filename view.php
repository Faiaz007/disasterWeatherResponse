<?php 

include "./db.php";

// Define an array of table names
$tables = [
    "cyclone",
    "disaster",
    "disaster_aid_provider",
    "donor",
    "earthquake",
    "fabric",
    "flood",
    "food",
    "location",
    "medicine",
    "relief_provide",
    "resource",
    "shelter",
    "weather"
];

// Function to fetch and display table data
function displayTableData($conn, $tableName) {
    $sql = "SELECT * FROM $tableName";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>$value</td>";
            }
            echo "</tr>";
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>View Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Disasters and Resources</h2>
        <table class="table">
            <thead>
                <tr>
                    <?php foreach ($tables as $tableName): ?>
                        <th><?php echo ucfirst($tableName); ?></th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tables as $tableName): ?>
                    <tr>
                        <?php displayTableData($conn, $tableName); ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!-- Add links to other pages or forms for CRUD operations -->
        <a style="color:black;" class="btn btn-warning" href="form.php"><b>Create User</b></a>
    </div> 
</body>
</html>
