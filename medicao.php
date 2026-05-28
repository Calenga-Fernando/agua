<?php
    require 'db.php';
    header ('Content-Type: application/json');

    //recepção dos dados pelo ESP32
    $dados = json_encode(file_get_contents('php://input'), true);

    //validar os campos esperados
    if(!isset($dados['ph']) || !isset($dados['turbidez']) || !isset($dados['temperatura']) || !isset($dados['resultado'])){
        http_response_code(400);
        echo json_encode(['erro' => 'Campos obrigatórios em falta']);
        exit;
    }

    //validar valor do resultado
    if(!in_array($dados['resultado'], ['potavel', 'nao_potavel'])){
        http_response_code(400);
        echo json_encode(['erro' => 'Resultado inválido']);
        exit;
    }

    $ph = $dados['ph'];
    $turbidez = $dados['turbidez'];
    $temperatura = $dados['temperatura'];
    $resultado = $dados['resultado'];
    $latitude = $dados['latitude'] ?? null;
    $longitude = $dados['longitude'] ?? null;
    $localizacao = $dados['localizacao'] ?? null;

    // start
    try {
        $stmt = $pdo -> prepare ("
            INSERT INTO medicao (ph, turbidez, temperatura, resultado, latitude, longitude)
            VALUES (?, ?, ?, ?, ?, ?)
        ");

        $stmt -> execute([$ph, $turbidez, $temperatura, $resultado, $latitude, $longitude]);

        echo json_encode(['status' => 'ok',
                            'id' => $pdo -> lastInsertId()
        ]);
    } catch (PDOException $e) {
        # code...
        http_response_code (500);
        echo json_encode(['erro' => 'Erro ao guardar medição']);
    }
?>