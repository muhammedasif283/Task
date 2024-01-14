<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "users");

//check connection 
if ($conn->connect_error){
     die("Connection Faild".MySqli_connect_error());
}else{
     echo "Connected Successfully";
}

// Get user input
$email = $_POST["email"];
$password = $_POST["password"];

// Validate user
$query = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($query);

// Check if user exists
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    // Verify password
    if (password_verify($password, $user['password'])) {
        echo "Login successful!";
    } else {
        echo "Incorrect password";
    }
} else {
    echo "User not found";
}

$conn->close();
?>
