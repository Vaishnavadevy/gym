<?php
session_start();
include("config.php"); // Database connection

// Check if username and password are set
if (!isset($_POST["un"]) || !isset($_POST["pass"])) {
    die("Username or password not provided.");
}

// Secure user input to prevent SQL Injection
$username = mysqli_real_escape_string($conn, $_POST["un"]);
$password = mysqli_real_escape_string($conn, $_POST["pass"]);

// Query to fetch user details (including user type)
$match = "SELECT * FROM login WHERE username = '$username' AND password = '$password';";

$qry = mysqli_query($conn, $match);

if (!$qry) {
    die("Query failed: " . mysqli_error($conn));
}

$user = mysqli_fetch_assoc($qry);

if (!$user) {
    //  Invalid username
    $_SESSION['error'] = "Invalid username. Try again."; // Store the error message in session
    header("Location: login.php"); // Redirect back to login page
    exit();
} else {
    //  Check if password matches
    if ($password !== $user['password']) {
        // Invalid password
        $_SESSION['error'] = "Incorrect password. Try again."; // Store the error message
        header("Location: login.php"); // Redirect back to login page
        exit();
    }

    $_SESSION['unt'] = $username; // Username is valid
    
	
	
    // Redirect based on user type (admin or staff)
    if ($user['user_type'] == 'admin') {
    //echo "Redirecting to admin dashboard...";
    header("Location: admin.html");
    exit();
	
} elseif ($user['user_type'] == 'staff') {
    $_SESSION['staff_id'] = $user['id']; // Store staff ID in session
    //echo "Redirecting to staff dashboard... Staff ID: " . $_SESSION['staff_id'];
    header("Location: staff_dashboard.html");
    exit();
	
} else {
    //echo "Unknown user type!";
    exit();
}

    
    exit(); // Stop script execution after redirection
}
?>




<!--
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST">
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>-->