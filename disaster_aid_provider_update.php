<?php 
include "db.php";

if (isset($_POST['update'])) {
    $provider_id = $_POST['provider_id'];
    $organization_name = $_POST['organization_name'];
    $person_name = $_POST['person_name'];
    $person_email = $_POST['person_email'];
    $person_contact_no = $_POST['person_contact_no'];
    $event_id = $_POST['event_id'];
    
    $sql = "UPDATE `disaster_aid_provider` SET `organization_name`='$organization_name', `person_name`='$person_name', `person_email`='$person_email', `person_contact_no`='$person_contact_no', `event_id`='$event_id' WHERE `provider_id`='$provider_id'"; 

    $result = $conn->query($sql); 

    if ($result == TRUE) {
        echo '<div class="alert alert-success" role="alert">';
        echo 'Record updated successfully.';
        echo '</div>';
        echo "<script>console.log('Record updated successfully.');</script>";
        header( "refresh:2; url=./disaster_Aid_Provider_view.php" ); 
    } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
} 

if (isset($_GET['id'])) {
    $provider_id = $_GET['id']; 
    $sql = "SELECT * FROM `disaster_aid_provider` WHERE `provider_id`='$provider_id'";
    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        
        while ($row = $result->fetch_assoc()) {
            $organization_name = $row['organization_name'];
            $person_name = $row['person_name'];
            $person_email = $row['person_email'];
            $person_contact_no = $row['person_contact_no'];
            $event_id = $row['event_id'];
            $id = $row['provider_id'];
        } 
?>
<html>
<head>
    <title>Disaster Aid Provider Update Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Disaster Aid Provider Update Form</h2>
    <form action="" method="post">
        <fieldset>
            <legend>Provider information:</legend>
            <div class="form-group">
                <label for="organization_name">Organization Name:</label>
                <input type="text" class="form-control" name="organization_name" value="<?php echo $organization_name; ?>">
            </div>
            <input type="hidden" name="provider_id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="person_name">Person Name:</label>
                <input type="text" class="form-control" name="person_name" value="<?php echo $person_name; ?>">
            </div>
            <div class="form-group">
                <label for="person_email">Person Email:</label>
                <input type="email" class="form-control" name="person_email" value="<?php echo $person_email; ?>">
            </div>
            <div class="form-group">
                <label for="person_contact_no">Person Contact No:</label>
                <input type="text" class="form-control" name="person_contact_no" value="<?php echo $person_contact_no; ?>">
            </div>
            <div class="form-group">
                <label for="event_id">Event ID:</label>
                <input type="text" class="form-control" name="event_id" value="<?php echo $event_id; ?>">
            </div>
            <input type="submit" class="btn btn-primary" value="Update" name="update">
        </fieldset>
    </form> 
</div>
</body>
</html> 
<?php
    } else { 
        header('Location: disaster_Aid_Provider_view.php');
    } 
}
?>
