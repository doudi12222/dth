<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teste";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$agency_name = $_POST['agency_name'];
$agency_address = $_POST['agency_address'];
$owner_name = $_POST['owner_name'];
$license_number = $_POST['license_number'];
$date_of_birth = $_POST['date_of_birth'];
$country_of_birth = $_POST['country_of_birth'];
$applicant_address = $_POST['applicant_address'];
$email = $_POST['email'];
$mobile_phone_number = $_POST['mobile_phone_number'];

// Insert data into database
$sql = "INSERT INTO user (agency_name, agency_address, owner_name, license_number, date_of_birth, country_of_birth, applicant_address, email, mobile_phone_number)
VALUES ('$agency_name', '$agency_address', '$owner_name', '$license_number', '$date_of_birth', '$country_of_birth', '$applicant_address', '$email', '$mobile_phone_number')";

if ($conn->query($sql) === TRUE) {
    echo "Your request has been sent successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>