<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customer_name = $_POST['customer_name'];
    $query_text = $_POST['query_text'];

    $sql = "INSERT INTO queries (customer_name, query_text, created_at) VALUES (?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $customer_name, $query_text);

    if ($stmt->execute()) {
        echo json_encode(["success" => "Query submitted successfully!"]);
    } else {
        echo json_encode(["error" => "Failed to submit query."]);
    }
	exit;
}
?>
