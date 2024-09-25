<?php
// Database connection details
$servername = "localhost";
$username = "root";  // Change this if you have a different username
$password = "";      // Change this if you have a password set for MySQL
$dbname = "teste2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$agency_name = $_POST['agency_name'];
$agency_address = $_POST['agency_address'];
$branch_name = $_POST['branch_name'];
$branch_location = $_POST['branch_location'];
$owner_name = $_POST['owner_name'];
$license_number = $_POST['license_number'];

// SQL query to insert the data into the database
$sql = "INSERT INTO user (agency_name, agency_address, branch_name, branch_location, owner_name, license_number) 
VALUES ('$agency_name', '$agency_address', '$branch_name', '$branch_location', '$owner_name', '$license_number')";

if ($conn->query($sql) === TRUE) {
    echo "Your request has been sent successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>