<?php
$host = 'localhost';
$db   = 'jmpss';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
    PDO::ATTR_TIMEOUT => 3 // 3 seconds timeout
];

try {
     echo "Connecting to localhost...\n";
     $pdo = new PDO($dsn, $user, $pass, $options);
     echo "Connected successfully\n";
} catch (\PDOException $e) {
     echo "Connection failed: " . $e->getMessage() . "\n";
}
