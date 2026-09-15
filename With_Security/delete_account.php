<?php
require_once("config.php");

if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit;
}

$id = $_SESSION['trainer_id'];

$stmt = $conn->prepare("DELETE FROM trainers WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();

session_unset();
session_destroy();

header("Location: register.php");
exit;
?>