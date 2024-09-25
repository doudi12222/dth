<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teste7";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO user7 (	full_name, date_of_birth, nationality,id_number, contact_info, education_level, languages) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $full_name, $date_of_birth, $nationality, $id_number, $contact_info, $education_level, $languages);

// Get form valueshotel_establishment_Name
$full_name = $_POST['full_name'];
$date_of_birth = $_POST['date_of_birth'];
$nationality = $_POST['nationality'];
$id_number = $_POST['id_number'];
$contact_info = $_POST['contact_info'];
$education_level = $_POST['education_level'];
$languages = $_POST['languages'];

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