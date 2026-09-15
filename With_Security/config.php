<?php
session_start();

$conn = new mysqli("localhost", "root", "", "pokemon_center");

if ($conn->connect_error) {
    die("DB Connection Failed: " . $conn->connect_error);
}

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>