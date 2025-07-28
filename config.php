<?php
$servername = "localhost";
$username = "root"; // Default WAMP username
$password = ""; // Default WAMP password
$dbname = "gym_fitness"; // Change to your actual database name

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
