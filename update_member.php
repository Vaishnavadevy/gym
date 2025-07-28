<?php
$conn = new mysqli("localhost", "root", "", "gym_fitness");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch member details based on the ID
    $sql = "SELECT * FROM members WHERE id = $id";
    $result = $conn->query($sql);
    $member = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Member | Admin Dashboard</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
            color: #333;
        }
        .container {
            margin-top: 50px;
        }
        .form-group {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center">Update Member</h2>
    <form id="updateMemberForm">
        <div class="form-group">
            <label for="memberName">Name</label>
            <input type="text" class="form-control" id="memberName" name="name" value="<?php echo $member['name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="memberEmail">Email</label>
            <input type="email" class="form-control" id="memberEmail" name="email" value="<?php echo $member['email']; ?>" required>
        </div>
        <div class="form-group">
            <label for="memberPhone">Phone</label>
            <input type="text" class="form-control" id="memberPhone" name="phone" value="<?php echo $member['phone']; ?>" required>
        </div>
        <input type="hidden" id="memberId" name="id" value="<?php echo $member['id']; ?>">
        <button type="submit" class="btn btn-primary">Update Member</button>
    </form>
</div>

<script>
    // Handle update member form submission
    $('#updateMemberForm').submit(function(e) {
        e.preventDefault();
        
        var id = $('#memberId').val();
        var name = $('#memberName').val();
        var email = $('#memberEmail').val();
        var phone = $('#memberPhone').val();

        $.ajax({
            url: 'update_member_action.php',
            type: 'POST',
            data: { id: id, name: name, email: email, phone: phone },
            success: function(response) {
                alert(response);
                window.location.href = 'members.html'; // Redirect to members list after update
            }
        });
    });
</script>

<script src="js/bootstrap.min.js"></script>
</body>
</html>
