<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "gym_fitness");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Update gym preferences
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $preferences = $_POST['preferences'];

    $sql = "UPDATE gym_preferences SET preferences = '$preferences' WHERE id = 1";

    if ($conn->query($sql) === TRUE) {
        echo "Gym preferences updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
