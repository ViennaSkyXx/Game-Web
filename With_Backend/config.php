<?php
$pdo = new PDO("mysql:host=localhost;dbname=pokemon_center", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>