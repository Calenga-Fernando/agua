<?php
$host     = getenv('MYSQLHOST');
$port     = getenv('MYSQLPORT');
$dbname   = getenv('MYSQLDATABASE');
$user     = getenv('MYSQLUSER');
$password = getenv('MYSQLPASSWORD');

try {
    $pdo = new PDO(
        "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8",
        $user,
        $password,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['erro' => 'Falha na ligação à BD']);
    exit;
}