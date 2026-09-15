<?php
session_start();

if (isset($_POST['register'])) {
    $_SESSION['trainer_name'] = $_POST['trainer_name'];
    $_SESSION['region'] = $_POST['region'];
    $_SESSION['pokemon'] = $_POST['pokemon'];
    $_SESSION['registered_user'] = $_POST['username'];
    $_SESSION['registered_pass'] = $_POST['password'];

    header("Location: login.php?registered=1");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokémon Center - Check In</title>
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
    <p class="subtitle">Trainer Check-In (Diamond Prism System)</p>

    <form method="POST">
        <input type="text" name="trainer_name" placeholder="Trainer Name" required>

        <select name="region" required>
            <option value="">Select Region</option>
            <option value="Kanto">Kanto</option>
            <option value="Johto">Johto</option>
            <option value="Hoenn">Hoenn</option>
            <option value="Sinnoh">Sinnoh</option>
            <option value="Unova">Unova</option>
            <option value="Kalos">Kalos</option>
            <option value="Alola">Alola</option>
            <option value="Galar">Galar</option>
            <option value="Paldea">Paldea</option>
        </select>

        <select name="pokemon" required>
            <option value="">Choose Pokémon for Healing</option>
            <option value="Pikachu">Pikachu ⚡</option>
            <option value="Charmander">Charmander 🔥</option>
            <option value="Squirtle">Squirtle 💧</option>
            <option value="Bulbasaur">Bulbasaur 🌿</option>
            <option value="Eevee">Eevee ✨</option>
            <option value="Jigglypuff">Jigglypuff 🎵</option>
        </select>

        <input type="text" name="username" placeholder="Center Username" required>
        <input type="password" name="password" placeholder="Center Password" required>

        <button class="btn" type="submit" name="register">Check In</button>
    </form>

    <div class="links">
        Already checked in? <a href="login.php">Login</a>
    </div>
</div>

</body>
</html>