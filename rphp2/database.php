<?php

$host = '172.31.22.43';
$db   = 'Rahi200520003';
$user = 'Rahi200520003';
$pass = 'Q8gpYKTAXZ';

$dsn = "mysql:host=$host;dbname=$db";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = new PDO($dsn, $user, $pass, $options);

if (!$pdo) {
    die("Connection failed: " . $pdo->errorInfo());
}

?>
