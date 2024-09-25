<?php
// Database connection parameters
$servername = "localhost";
$username = "root"; // Adjust if using different credentials
$password = "";
$dbname = "teste5";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from the form
$hotel_establishment_Name = $_POST['hotel_establishment_Name'];
$hotel_establishment_address = $_POST['hotel_establishment_address'];
$ownership_rent = $_POST['Ownership_rent'];
$hotel_branch_name = $_POST['hotel_Branch_Name'];
$branch_location = $_POST['Branch_Location'];
$owner_name = $_POST['owner_name'];
$license_number = $_POST['license_number'];

// SQL query to insert data
$sql = "INSERT INTO user5 (hotel_establishment_name, hotel_establishment_address, ownership_rent, hotel_branch_name, branch_location, owner_name, license_number)
VALUES ('$hotel_establishment_Name', '$hotel_establishment_address', '$ownership_rent', '$hotel_branch_name', '$branch_location', '$owner_name', '$license_number')";

// Execute query
if ($conn->query($sql) === TRUE) {
    echo "New branch added successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>