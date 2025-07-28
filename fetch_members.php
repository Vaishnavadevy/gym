<?php
$conn = new mysqli("localhost", "root", "", "gym_fitness");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$search = isset($_GET['search']) ? $_GET['search'] : '';
$sql = "SELECT * FROM members WHERE name LIKE '%$search%' OR email LIKE '%$search%' OR phone LIKE '%$search%'";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['email']}</td>
            <td>{$row['phone']}</td>
            <td>
                <button class='btn btn-info' onclick='updateMember({$row['id']})'>Update</button>
                <button class='btn btn-info' onclick='deleteMember({$row['id']})'>Delete</button>
            </td>
          </tr>";
}

$conn->close();
?>
