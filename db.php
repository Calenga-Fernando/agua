<?php
$host     = getenv('PGHOST');       // Supabase fornece estas variáveis
$port     = getenv('PGPORT');       // geralmente 5432
$dbname   = getenv('PGDATABASE');
$user     = getenv('PGUSER');
$password = getenv('PGPASSWORD');

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;sslmode=require";

$pdo = new PDO(
    $dsn,
    $user,
    $password,
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_TIMEOUT => 10
    ]
);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['erro' => 'Falha na ligação à BD']);
    exit;
}
