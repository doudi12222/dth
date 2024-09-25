<?php
// Database configuration
$servername = "localhost"; // Change if necessary
$username = "root"; // Change if necessary
$password = ""; // Change if necessary
$dbname = "tourism";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Get form data
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
if ($password !== $confirm_password) {
    echo "Passwords do not match.";
    exit();
}
// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert data into database
$sql = "INSERT INTO client (email, username, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $email, $username, $hashed_password);

if ($stmt->execute()) {
    // Redirect to login page after successful registration
    header("Location: login.html");
    exit(); // Ensure script stops after redirection
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>