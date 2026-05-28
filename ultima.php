<?php 
    ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    require 'db.php';
    header('Content-Type: application/json');

    try{
        $stmt = $pdo -> query("
            SELECT id_medicao, registado_em, ph, turbidez, temperatura, resultado, latitude; longitude
            FROM medicao
            ORDER BY registado_em DESC
            LIMIT1 
        ");

        $ultima = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$ultima) {
        http_response_code(404);
        echo json_encode(['erro' => 'Nenhuma medição encontrada']);
        exit;
        }

        echo json_encode($ultima);
    }catch (PDOException $e){
        http_response_code(500);
        echo json_encode(['erro' => 'Erro ao obter última medição']);
    }
?>