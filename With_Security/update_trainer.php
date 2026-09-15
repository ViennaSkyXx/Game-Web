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
$stmt->bind_result($trainer_name, $region, $pokemon);
$stmt->fetch();
$stmt->close();

if (isset($_POST['update'])) {

    $trainer_name = $_POST['trainer_name'];
    $region = $_POST['region'];
    $pokemon = $_POST['pokemon'];

    $update = $conn->prepare("UPDATE trainers SET trainer_name=?, region=?, pokemon=? WHERE id=?");
    $update->bind_param("sssi", $trainer_name, $region, $pokemon, $id);
    $update->execute();
    $update->close();

    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="prism-bg"></div>

<div class="glass-card">

<h2>Edit Trainer</h2>

<form method="POST">

<input name="trainer_name" value="<?= htmlspecialchars($trainer_name) ?>" required>

<select name="region">
<option>Kanto</option>
<option>Johto</option>
<option>Hoenn</option>
<option>Sinnoh</option>
<option>Unova</option>
<option>Kalos</option>
<option>Alola</option>
<option>Galar</option>
<option>Paldea</option>
</select>

<select name="pokemon">
<option>Pikachu</option>
<option>Charmander</option>
<option>Squirtle</option>
<option>Bulbasaur</option>
<option>Eevee</option>
</select>

<button class="btn" name="update">Save</button>

</form>

</div>

</body>
</html>