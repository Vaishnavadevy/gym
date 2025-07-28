<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "gym_fitness");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert new staff data into database
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $sql = "INSERT INTO staff (name, email, role) VALUES ('$name', '$email', '$role')";

    if ($conn->query($sql) === TRUE) {
        echo "New staff added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
