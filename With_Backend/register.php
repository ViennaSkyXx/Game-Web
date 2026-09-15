<?php
require_once("config.php");

if (isset($_POST['register'])) {

    $stmt = $pdo->prepare("
        INSERT INTO trainers (trainer_name, region, pokemon, username, password)
        VALUES (?, ?, ?, ?, ?)
    ");

    $stmt->execute([
        $_POST['trainer_name'],
        $_POST['region'],
        $_POST['pokemon'],
        $_POST['username'],
        password_hash($_POST['password'], PASSWORD_DEFAULT)
    ]);

    header("Location: login.php?registered=1");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Register</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="prism-bg"></div>

<div class="sparkle"></div>
<div class="sparkle"></div>
<div class="sparkle"></div>
<div class="sparkle"></div>

<div class="glass-card">

<h2>Pokémon Center</h2>
<p class="subtitle">Trainer Check-In</p>

<form method="POST">

<input type="text" name="trainer_name" placeholder="Trainer Name" required>

<select name="region" required>
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

<select name="pokemon" required>
<option>Pikachu</option>
<option>Charmander</option>
<option>Squirtle</option>
<option>Bulbasaur</option>
<option>Eevee</option>
</select>

<input type="text" name="username" placeholder="Username" required>
<input type="password" name="password" placeholder="Password" required>

<button class="btn" name="register">Check In</button>

</form>

<div class="links">
<a href="login.php">Login</a>
</div>

</div>

</body>
</html>