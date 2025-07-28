<?php
$servername = "localhost";
$username = "root"; // Default WAMP username
$password = ""; // Default WAMP password
$dbname = "gym_fitness"; // Change to your actual database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully";

// Test a simple query
$sql = "SELECT * FROM appointments LIMIT 5"; // Adjust the table name as needed
$result = mysqli_query($conn, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            print_r($row); // Print each row
        }
    } else {
        echo "No records found.";
    }
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>