<?php
session_start();
include 'database.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? ''; // Avoid undefined index error
    $password = $_POST['password'] ?? '';

    // Check if user exists
    $sql = "SELECT username, password FROM user WHERE username = ?"; 
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error in preparing the SQL statement: " . $conn->error);
    }

    $stmt->bind_param("s", $username); // Bind only one parameter (username)
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Verify password securely
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username;
        echo "Login successful! Redirecting...";
        header("refresh:2;url=../pages/start.html"); // Redirect to dashboard
    } else {
        echo "Invalid username or password.";
    }

    $stmt->close();
}

$conn->close();
?>
