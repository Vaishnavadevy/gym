<?php
$conn = new mysqli("localhost", "root", "", "gym_fitness");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM members WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Member deleted successfully";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
