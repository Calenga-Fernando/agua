<?php
$host     = getenv('PGHOST');       // Supabase fornece estas variáveis
$port     = getenv('PGPORT');       // geralmente 5432
$dbname   = getenv('PGDATABASE');
$user     = getenv('PGUSER');
$password = getenv('PGPASSWORD');

try {
    $pdo = new PDO(
    "pgsql:host=$host;port=$port;dbname=$dbname;sslmode=require",
    $user,
    $password,
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['erro' => 'Falha na ligação à BD']);
    exit;
}
