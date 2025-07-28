<?php
$conn = new mysqli("localhost", "root", "", "gym_fitness");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['id'], $_POST['name'], $_POST['email'], $_POST['phone'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // SQL query to update member details
    $sql = "UPDATE members SET name='$name', email='$email', phone='$phone' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Member updated successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
