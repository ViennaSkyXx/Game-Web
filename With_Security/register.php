<?php
require_once("config.php");

if (isset($_POST['register'])) {

    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        die("Invalid Request");
    }

    $trainer_name = $_POST['trainer_name'];
    $region = $_POST['region'];
    $pokemon = $_POST['pokemon'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check = $conn->prepare("SELECT id FROM trainers WHERE username=?");
    $check->bind_param("s", $username);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        $msg = "Username exists";
    } else {

        $stmt = $conn->prepare("INSERT INTO trainers (trainer_name, region, pokemon, username, password) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssss", $trainer_name, $region, $pokemon, $username, $password);
        $stmt->execute();

        header("Location: login.php?registered=1");
        exit;
    }
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

<h2>Pokémon Center</h2>
<p class="subtitle">Register</p>

<?php if (!empty($msg)) echo "<div class='message error'>$msg</div>"; ?>

<form method="POST">

<input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">

<input name="trainer_name" placeholder="Trainer Name" required>

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

<input name="username" placeholder="Username" required>
<input type="password" name="password" placeholder="Password" required>

<button class="btn" name="register">Register</button>

</form>

<div class="links">
<a href="login.php">Login</a>
</div>

</div>

</body>
</html>