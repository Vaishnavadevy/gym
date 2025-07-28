<?php
include 'config.php'; // Make sure this connects to your DB correctly

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $customer_name = trim($_POST['customer_name']);
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];
    $service = trim($_POST['service']);
    $staff_id = (int) $_POST['staff_id'];

    // SQL insert query
    $sql = "INSERT INTO appointments (customer_name, appointment_date, appointment_time, service, staff_id) 
            VALUES (?, ?, ?, ?, ?)";

    // Prepare statement
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssssi", $customer_name, $appointment_date, $appointment_time, $service, $staff_id);

        if ($stmt->execute()) {
            echo "Appointment booked successfully! <a href='appointment_form.html'>Book Another</a>";
        } else {
            echo " Error executing query: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Failed to prepare statement: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
?>
