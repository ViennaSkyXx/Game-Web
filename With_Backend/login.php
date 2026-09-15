<?php
session_start();
require_once("config.php");

if (isset($_POST['login'])) {

    $stmt = $pdo->prepare("SELECT * FROM trainers WHERE username = ?");
    $stmt->execute([$_POST['username']]);
    $user = $stmt->fetch();

    if ($user && password_verify($_POST['password'], $user['password'])) {

        $_SESSION['logged_in'] = true;
        $_SESSION['trainer_id'] = $user['id'];

        header("Location: dashboard.php");
        exit;

    } else {
        header("Location: login.php?error=1");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login</title>
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
<p class="subtitle">Login Panel</p>

<?php if (isset($_GET['error'])): ?>
<div class="message error">Invalid login</div>
<?php endif; ?>

<?php if (isset($_GET['registered'])): ?>
<div class="message success">Registered successfully</div>
<?php endif; ?>

<form method="POST">

<input type="text" name="username" required>
<input type="password" name="password" required>

<button class="btn" name="login">Enter System</button>

</form>

<div class="links">
New trainer? <a href="register.php">Register</a>
</div>

</div>

</body>
</html>