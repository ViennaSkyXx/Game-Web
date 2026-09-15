<?php
require_once("config.php");

if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit;
}

$id = $_SESSION['trainer_id'];

$stmt = $conn->prepare("SELECT trainer_name, region, pokemon FROM trainers WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows === 0) {
    session_destroy();
    header("Location: login.php");
    exit;
}

$stmt->bind_result($trainer, $region, $pokemon);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="prism-bg"></div>

<div class="glass-card">

<h2>Pokémon Center Console</h2>
<p class="info">Healing System Active</p>

<div class="pokeball-spinner"></div>

<div class="center-panel">

<p><b>Trainer:</b> <?= htmlspecialchars($trainer) ?></p>
<p><b>Region:</b> <?= htmlspecialchars($region) ?></p>
<p><b>Pokémon:</b> <?= htmlspecialchars($pokemon) ?></p>

</div>

<div class="button-grid">

<a href="update_trainer.php"><button class="btn-action">Edit</button></a>
<a href="change_account.php"><button class="btn-action">Password</button></a>
<a href="delete_account.php"><button class="btn-action">Delete</button></a>

</div>

<a href="logout.php">
<button class="btn btn-logout-wide">Logout</button>
</a>

</div>

</body>
</html>