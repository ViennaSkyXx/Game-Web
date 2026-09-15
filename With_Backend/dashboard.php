<?php
session_start();
require_once("config.php");

if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM trainers WHERE id = ?");
$stmt->execute([$_SESSION['trainer_id']]);
$user = $stmt->fetch();

$trainer = $user['trainer_name'];
$region  = $user['region'];
$pokemon = $user['pokemon'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="prism-bg"></div>

<div class="sparkle"></div>
<div class="sparkle"></div>
<div class="sparkle"></div>
<div class="sparkle"></div>

<div class="glass-card dashboard-box">

<h2>Pokémon Center Console</h2>
<p class="info">Diamond Prism Healing System Activated</p>

<div class="pokeball-spinner"></div>

<p class="info">Healing Pokémon... Please wait</p>

<div class="center-panel">

<h3>Trainer Healing Record</h3>

<p><b>Trainer:</b> <?= htmlspecialchars($trainer) ?></p>
<p><b>Region:</b> <?= htmlspecialchars($region) ?></p>
<p><b>Pokémon Checked In:</b> <?= htmlspecialchars($pokemon) ?></p>
<p><b>Status:</b> Healing in Progress 💎✨</p>
<p><b>Nurse Joy:</b> Assigned</p>

</div>

<br>

<a href="logout.php">
<button class="btn">Logout</button>
</a>

</div>

</body>
</html>