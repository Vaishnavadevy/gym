<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password'], PASSWORD_BCRYPT); // Secure password hashing

    $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $password);

    if ($stmt->execute()) {
        echo "<script>alert('Registration successful!'); window.location.href='login.html';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url('img/app2.jpg') no-repeat center center/cover;
        }
        .container {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            text-align: center;
            width: 400px;
			height:400px;
        }
        .container h2 {
            color: #fff;
            margin-bottom: 20px;
        }
        .container input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            outline: none;
        }
        .container input::placeholder {
            color: #ddd;
        }
        .container button {
            width: 100%;
            padding: 10px;
            background: rgba(255, 255, 255, 0.3);
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: #fff;
            font-size: 16px;
            transition: 0.3s;
        }
        .container button:hover {
            background: rgba(255, 255, 255, 0.5);
        }
        .container a {
            display: block;
            margin-top: 10px;
            color: #fff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form method="POST">
            <input type="text" name="name" placeholder="Full Name" required>
			<br>
            <input type="email" name="email" placeholder="Email" required>
			<br>
            <input type="password" name="password" placeholder="Password" required>
			<br>
			<br>
            <button type="submit">Register</button>
        </form>
		<br>
        <a href="login.html">Already have an account? Login</a>
    </div>
</body>
</html>
