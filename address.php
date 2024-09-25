<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teste3";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO user3 (Agency_Name, owner_name, license_number,Agency_accreditation_number, Agency, old_address, new_address) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $agency_name, $owner_name, $license_number, $accreditation_number, $Agency, $old_address, $new_address);

// Get form values
$agency_name = $_POST['Agency_Name'];
$owner_name = $_POST['owner-name'];
$license_number = $_POST['license-number'];
$accreditation_number = $_POST['Agency_accreditation_number'];
$Agency = $_POST['Agency'];
$old_address = $_POST['old_address'];
$new_address = $_POST['new_address'];

// Execute the prepared statement
if ($stmt->execute()) {
    echo "Your request has been sent successfully.";
} else {
    echo "Error: " . $stmt->error;
}

// Close the connection
$stmt->close();
$conn->close();
?>