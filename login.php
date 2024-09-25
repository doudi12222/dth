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
$username = $_GET['username'];  // Changed from $_POST to $_GET
$password = $_GET['password'];  // Changed from $_POST to $_GET

// Prepare SQL statement to prevent SQL injection
$sql = "SELECT password FROM client WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();

// Check if the username exists
if ($stmt->num_rows > 0) {
    $stmt->bind_result($hashed_password);
    $stmt->fetch();

    // Debugging output
    echo "Hashed password from database: " . $hashed_password . "<br>";
    echo "Entered password: " . $password . "<br>";

    // Verify the password
    if (password_verify($password, $hashed_password)) {
        // Password is correct, redirect to the "home.html" page
        header("Location: act.html");
        exit(); // Stop the script after redirection
    } else {
        echo "Invalid password.";
    }
} else {
    echo "Username not found.";
}

// Close connection
$stmt->close();
$conn->close();
?>
