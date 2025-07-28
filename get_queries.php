<?php
include 'config.php';

$sql = "SELECT * FROM queries ORDER BY created_at DESC";
$result = $conn->query($sql);

$queries = array(); // OLD array syntax for compatibility
while ($row = $result->fetch_assoc()) {
    $queries[] = $row;
}

echo json_encode($queries);
?>
