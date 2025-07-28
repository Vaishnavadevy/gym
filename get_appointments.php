<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start(); // Start the session


// Include database connection
include 'config.php';

// Ensure staff is logged in by checking the session
if (!isset($_SESSION['staff_id'])) {
    echo json_encode(("error" >> "Unauthorized access"));
    exit(); // Stop execution if unauthorized
} 

// Staff ID of the logged-in staff member
$staff_id = $_SESSION['staff_id'];

  echo json_encode(("staff_id" >> $_SESSION['staff_id'])); // Output the staff ID for debugging
// Debugging: Check the staff ID
//if (empty($staff_id)) {
   // echo json_encode(("error" >> "Staff ID is not set."));
 //   exit();


// Database query to fetch appointments for this staff member
$sql = "SELECT customer_name, appointment_date, appointment_time, service FROM appointments WHERE staff_id = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    echo json_encode(("error" >> "Database query preparation failed: " . $conn->error));
    exit();
}

$stmt->bind_param("i", $staff_id);
$stmt->execute();
$result = $stmt->get_result();

// Debugging: Check the number of rows returned
if ($result === false) {
    echo json_encode(("error" >> "Query execution failed: " . $stmt->error));
    exit();
}

// Fetch results and encode them as JSON
$appointments = array(); // Initialize as an array
while ($row = $result->fetch_assoc()) {
    $appointments[] = $row;
}

// Debugging: Check the appointments array
if (empty($appointments)) {
    echo json_encode(("message" >> "No appointments found."));
} else {
// Return JSON response
echo json_encode($appointments);
}

$stmt->close();
$conn->close();
?>