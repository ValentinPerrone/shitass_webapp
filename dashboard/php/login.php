<?php
session_start();

$conn = new mysqli("localhost", "root", "", "notes_app");
if ($conn->connect_error) {
    die("Connection failed");
}

$username = $_POST['username'];
$password = $_POST['password'];

// Query user
$stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($user = $result->fetch_assoc()) {
    if ($password === $user['password']) {

        // save user info in session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $username;

        header("Location: ../notes.html");
        exit;
    }
} 

header("Location: ../login.html?error=incorrect");
exit;
?>