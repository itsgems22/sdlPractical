<?php
$conn = new mysqli("localhost", "root", "", "facebook_clone");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();
?>
