<?php
require_once("config.php");

if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit;
}

$id = $_SESSION['trainer_id'];

if (isset($_POST['change'])) {

    $stmt = $conn->prepare("SELECT password FROM trainers WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($hash);
    $stmt->fetch();
    $stmt->close();

    if (!password_verify($_POST['old_password'], $hash)) {
        $msg = "Wrong password";
    } else {

        $new = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

        $update = $conn->prepare("UPDATE trainers SET password=? WHERE id=?");
        $update->bind_param("si", $new, $id);
        $update->execute();
        $update->close();

        header("Location: dashboard.php");
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

<h2>Change Password</h2>

<?php if (!empty($msg)) echo "<div class='message error'>$msg</div>"; ?>

<form method="POST">

<input type="password" name="old_password" placeholder="Current Password" required>
<input type="password" name="new_password" placeholder="New Password" required>

<button class="btn" name="change">Update</button>

</form>

</div>

</body>
</html>