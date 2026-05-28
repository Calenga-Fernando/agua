<?php
    require 'db.php';
    header ('Content-Type: application/json');

    //Arquivo que ira fornecer o historico de medições
    //start
    try{
        $stmt = $pdo -> query("
        SELECT id_medicao, registado_em, ph, turbidez, temperatura, resultado, latitude, longitude
        FROM medicao
        ORDER BY registado_em DESC
        LIMIT 100
        ");

        $medicoes = $stmt -> fetchAll(PDO::FETCH_ASSOC);

        if (!$medicoes) {
        http_response_code(404);
        echo json_encode(['erro' => 'Não há medições para serem mostradas']);
        exit;
        }

        echo json_encode($medicoes);
    } catch (PDOException $e){
        http_response_code(500);
        echo json_encode(['erro' => 'Erro ao obter medições']);
    }
?>