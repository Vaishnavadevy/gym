<?php
include 'config.php';
session_start();

if (!isset($_SESSION['staff_id'])) {
    die("You need to log in first.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $query_id = $_POST['query_id'];
    $response = $_POST['response'];

    // Ensure the query ID is valid and the staff is authorized to respond
    $staff_id = $_SESSION['staff_id'];

    $sql = "UPDATE customer_queries SET response = '$response' WHERE id = $query_id AND staff_id = $staff_id";

    if (mysqli_query($conn, $sql)) {
        echo "Response sent successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
