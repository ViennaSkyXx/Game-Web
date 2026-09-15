<?php
require_once("config.php");

if (isset($_POST['login'])) {

    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        die("Invalid Request");
    }

    $username = $_POST['username'];

    $stmt = $conn->prepare("SELECT id, password FROM trainers WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {

        $stmt->bind_result($id, $hash);
        $stmt->fetch();

        if (password_verify($_POST['password'], $hash)) {

            session_regenerate_id(true);

            $_SESSION['logged_in'] = true;
            $_SESSION['trainer_id'] = $id;

            header("Location: dashboard.php");
            exit;

        } else {
            $msg = "Incorrect password";
        }

    } else {
        $msg = "User not found";
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
<p class="subtitle">Login Panel</p>

<?php if (!empty($msg)) echo "<div class='message error'>$msg</div>"; ?>

<form method="POST">

<input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">

<input name="username" placeholder="Username" required>
<input type="password" name="password" placeholder="Password" required>

<button class="btn" name="login">Login</button>

</form>

<div class="links">
New Trainer? <a href="register.php">Check In</a>
</div>

</div>

</body>
</html>