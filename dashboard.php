<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit;
}

$trainer = $_SESSION['trainer_name'] ?? "Trainer";
$region  = $_SESSION['region'] ?? "Unknown Region";
$pokemon = $_SESSION['pokemon'] ?? "Unknown Pokémon";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokémon Center Dashboard</title>
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
        <p><b>Trainer:</b> <?php echo htmlspecialchars($trainer); ?></p>
        <p><b>Region:</b> <?php echo htmlspecialchars($region); ?></p>
        <p><b>Pokémon Checked In:</b> <?php echo htmlspecialchars($pokemon); ?></p>
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