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
$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Use password_hash for security
$address = $_POST['address'];
$phone = $_POST['phone'];

// Insert user data into the database
$query = "INSERT INTO users (name, email, password, address, phone_number) VALUES ('$name', '$email', '$password', '$address', '$phone')";
$result = $conn->query($query);

// Check if the query was successful
if ($result) {
    echo "Registration successful!";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
