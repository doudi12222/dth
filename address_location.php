<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teste6";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO user6 (	hotel_establishment_Name, owner_name, license_number,hotel_establishment_accreditation_number, Agency_Branch_Agency_Headquarter, Old_address, New_address) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $hotel_establishment_Name, $owner_name, $license_number, $hotel_establishment_accreditation_number, $Agency_Branch_Agency_Headquarter, $Old_address, $New_address);

// Get form values
$hotel_establishment_Name = $_POST['hotel_establishment_Name'];
$owner_name = $_POST['owner_name'];
$license_number = $_POST['license_number'];
$hotel_establishment_accreditation_number = $_POST['hotel_establishment_accreditation_number'];
$Agency_Branch_Agency_Headquarter = $_POST['Agency_Branch_Agency_Headquarter'];
$Old_address = $_POST['Old_address'];
$New_address = $_POST['New_address'];

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