<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "connection";

// Establishing connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Validating and sanitizing user input
$full_name = isset($_POST['full_name']) ? $_POST['full_name'] : '';
$email_address = isset($_POST['email_address']) ? $_POST['email_address'] : '';
$mobile_number = isset($_POST['mobile_number']) ? $_POST['mobile_number'] : '';
$birthdate = isset($_POST['birthdate']) ? $_POST['birthdate'] : '';
$gender = isset($_POST['gender']) ? $_POST['gender'] : '';
$address = isset($_POST['address']) ? $_POST['address'] : '';
$country = isset($_POST['country']) ? $_POST['country'] : '';
$pin = isset($_POST['pin']) ? $_POST['pin'] : '';

// Prepared statement to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO connection (full_name, email_address, mobile_number, birthdate, gender, address, country, pin) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssss", $full_name, $email_address, $mobile_number, $birthdate, $gender, $address, $country, $pin);

// Execute the statement
if ($stmt->execute()) {
    echo "Registration successful";
} else {
    echo "Error: " . $conn->error;
}

// Close the prepared statement and connection
$stmt->close();
$conn->close();
?>
