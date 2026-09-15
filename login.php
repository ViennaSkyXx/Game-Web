<?php
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (
        isset($_SESSION['registered_user']) &&
        $username === $_SESSION['registered_user'] &&
        $password === $_SESSION['registered_pass']
    ) {
        $_SESSION['logged_in'] = true;
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokémon Center - Login</title>
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
    <p class="subtitle">Nurse Joy Login Panel</p>

    <?php if (isset($_GET['error'])): ?>
        <div class="message error">Access Denied. Incorrect credentials.</div>
    <?php endif; ?>

    <?php if (isset($_GET['registered'])): ?>
        <div class="message success">Trainer Check-In Complete. Please Login.</div>
    <?php endif; ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Center Username" required>
        <input type="password" name="password" placeholder="Center Password" required>

        <button class="btn" type="submit" name="login">Enter System</button>
    </form>

    <div class="links">
        New trainer? <a href="register.php">Check In</a>
    </div>
</div>

</body>
</html>