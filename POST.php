<?php
// Database connection details
$servername = "localhost";
$username = "root";  // Change this if needed
$password = "";      // Change this if needed
$dbname = "contact";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(array("status" => "error", "message" => "Connection failed: " . $conn->connect_error)));
}

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$Object = $_POST['Object'];
$message = $_POST['message'];

// SQL query to insert the data into the database
$sql = "INSERT INTO hako (name,email,Object,message) VALUES ('$name', '$email', '$Object', '$message')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(array("status" => "success", "message" => "Message sent successfully!"));
} else {
    echo json_encode(array("status" => "error", "message" => "Error: " . $sql . "<br>" . $conn->error));
}

// Close connection
$conn->close();
?>