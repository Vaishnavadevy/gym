<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("config.php");

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ensure all required fields are filled
    if (!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["comment"])) {
        $name = mysqli_real_escape_string($conn, $_POST["name"]);
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $website = isset($_POST["website"]) ? mysqli_real_escape_string($conn, $_POST["website"]) : '';
        $comment = mysqli_real_escape_string($conn, $_POST["comment"]);

        // Insert into database
        $sql = "INSERT INTO contact (name, email, website, comment) VALUES ('$name', '$email', '$website', '$comment')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Thank you! Your message has been submitted.'); window.location.href='contact.html';</script>";
        } else {
            echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
        }
    } else {
        echo "<script>alert('Please fill all required fields.');</script>";
    }
}
?>
