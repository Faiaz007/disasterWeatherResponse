<?php 
include "db.php";

if (isset($_POST['submit'])) {
    $organization_name = $_POST['organization_name'];
    $person_name = $_POST['person_name'];
    $person_email = $_POST['person_email'];
    $person_contact_no = $_POST['person_contact_no'];
    $event_id = $_POST['event_id']; // Assuming this is the event ID related to the disaster

    $sql = "INSERT INTO `disaster_aid_provider` (`organization_name`, `person_name`, `person_email`, `person_contact_no`, `event_id`) VALUES ('$organization_name', '$person_name', '$person_email', '$person_contact_no', '$event_id')";

    $result = $conn->query($sql);

    if ($result === TRUE) {
        echo '<div class="alert alert-success" role="alert">New disaster aid provider record created successfully!</div>';
        header("refresh:2; url=./disaster_Aid_Provider_view.php");
    } else {
        echo '<div class="alert alert-danger" role="alert">Error: ' . $sql . "<br>" . $conn->error . '</div>';
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Disaster Aid Provider Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Disaster Aid Provider Form</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label for="organization_name">Organization Name:</label>
            <input type="text" class="form-control" name="organization_name" id="organization_name">
        </div>
        <div class="form-group">
            <label for="person_name">Person Name:</label>
            <input type="text" class="form-control" name="person_name" id="person_name">
        </div>
        <div class="form-group">
            <label for="person_email">Email:</label>
            <input type="email" class="form-control" name="person_email" id="person_email">
        </div>
        <div class="form-group">
            <label for="person_contact_no">Contact Number:</label>
            <input type="text" class="form-control" name="person_contact_no" id="person_contact_no">
        </div>
        <div class="form-group">
            <label for="event_id">Event ID:</label>
            <input type="text" class="form-control" name="event_id" id="event_id">
        </div>
        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
    </form>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
