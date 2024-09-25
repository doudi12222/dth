<?php
// Database connection details
$servername = "localhost";
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "teste4";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture form data
    $hotel_name = $_POST['hotel_name'];
    $hotel_address = $_POST['hotel_address'];
    $ownership_rent = $_POST['ownership_rent'];
    $owner_name = $_POST['owner_name'];
    $license_number = $_POST['license_number'];
    $date_of_birth = $_POST['date_of_birth'];
    $country_of_birth = $_POST['country_of_birth'];
    $applicant_address = $_POST['applicant_address'];
    $email = $_POST['email'];
    $mobile_phone_number = $_POST['mobile_phone_number'];

    // Insert data into database
    $sql = "INSERT INTO user4 (hotel_name, hotel_address, ownership_rent, owner_name, license_number, date_of_birth, country_of_birth, applicant_address, email, mobile_phone_number)
            VALUES ('$hotel_name', '$hotel_address', '$ownership_rent', '$owner_name', '$license_number', '$date_of_birth', '$country_of_birth', '$applicant_address', '$email', '$mobile_phone_number')";

    if ($conn->query($sql) === TRUE) {
        echo "Your request has been sent successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>