<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "hostel";

try {
    // create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Validate and sanitize input
    $user_name = $_POST['user_name'] ?? '';
    $password = $_POST['password'] ?? '';

    // Prepare and bind statement
    $stmt = $conn->prepare("INSERT INTO login (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $user_name, $password);
    
    // Execute statement
    if ($stmt->execute()) {
        echo "Login successful";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    // Close statement and connection
    $stmt->close();
    $conn->close();
        
} catch (\Throwable $th) {
    echo $th;
}


?>
