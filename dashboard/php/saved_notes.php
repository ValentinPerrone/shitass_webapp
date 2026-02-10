<?php
session_start();

// check if user logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Logged in
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];

?>