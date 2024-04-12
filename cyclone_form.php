<?php 
include "db.php";

if (isset($_POST['submit'])) {
    // Assuming you have collected the necessary form data for each table
    // Adjust variable names and values accordingly

    // Insert into cyclone table
    $cyclone_event_id = $_POST['cyclone_event_id'];
    $wind_speed = $_POST['wind_speed'];
    $center_pressure = $_POST['center_pressure'];
    $center_eye = $_POST['center_eye'];
    $radius = $_POST['radius'];

    $stmt_cyclone = $conn->prepare("INSERT INTO `cyclone` (`cyclone_event_id`, `wind_speed`, `center_pressure`, `center_eye`, `radius`) VALUES (?, ?, ?, ?, ?)");
    $stmt_cyclone->bind_param("sssss", $cyclone_event_id, $wind_speed, $center_pressure, $center_eye, $radius);

    if ($stmt_cyclone->execute()) {
        echo '<div class="alert alert-success" role="alert">New cyclone record created successfully!</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Error: ' . $stmt_cyclone->error . '</div>';
    }
    $stmt_cyclone->close();

    // Insert into disaster_aid_provider table
    $provider_id = $_POST['provider_id'];
    $organization_name = $_POST['organization_name'];
    $person_name = $_POST['person_name'];
    $person_email = $_POST['person_email'];
    $person_contact_no = $_POST['person_contact_no'];
    $event_id_disaster_aid = $_POST['event_id_disaster_aid'];

    $stmt_disaster_aid_provider = $conn->prepare("INSERT INTO `disaster_aid_provider` (`provider_id`, `organization_name`, `person_name`, `person_email`, `person_contact_no`, `event_id`) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt_disaster_aid_provider->bind_param("ssssss", $provider_id, $organization_name, $person_name, $person_email, $person_contact_no, $event_id_disaster_aid);

    if ($stmt_disaster_aid_provider->execute()) {
        echo '<div class="alert alert-success" role="alert">New disaster aid provider record created successfully!</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Error: ' . $stmt_disaster_aid_provider->error . '</div>';
    }
    $stmt_disaster_aid_provider->close();

    // Handle insertion for other tables in a similar manner

    // Close the database connection
    $conn->close();
}
?>
