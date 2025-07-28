<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "gym_fitness");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch staff data
$query = "SELECT * FROM staff";
$result = $conn->query($query);

// Check if the query was successful
if ($result === false) {
    die("Error in query: " . $conn->error);
}

// Fetch and display staff data
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['email']}</td><td>{$row['role']}</td><td>{$row['created_at']}</td></tr>";
}

// Close the database connection
$conn->close();
?>
