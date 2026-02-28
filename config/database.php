<?php

$host = "127.0.0.1";
$db   = "logistics";
$user = "root";
$pass = "StrongPassword123!"; // replace this

$pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);