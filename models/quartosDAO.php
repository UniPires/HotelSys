<?php

function getConnection() {
    $host = 'localhost';
    $dbname = 'nome_do_banco';
    $username = 'seu_usuario';
    $password = 'sua_senha';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        echo "Erro na conexão: " . $e->getMessage();
        exit();
    }
}

function createQuarto($hotel_id, $tipo_quarto, $capacidade, $preco) {
    $pdo = getConnection();
    $sql = "INSERT INTO QUARTO (hotel_id, tipo_quarto, capacidade, preco)
            VALUES (:hotel_id, :tipo_quarto, :capacidade, :preco)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':hotel_id' => $hotel_id,
        ':tipo_quarto' => $tipo_quarto,
        ':capacidade' => $capacidade,
        ':preco' => $preco
    ]);
    echo "Quarto inserido com sucesso!";
}

function getAllQuartos() {
    $pdo = getConnection();
    $sql = "SELECT * FROM QUARTO";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getQuartoById($id) {
    $pdo = getConnection();
    $sql = "SELECT * FROM QUARTO WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getQuartosByHotelId($hotel_id) {
    $pdo = getConnection();
    $sql = "SELECT * FROM QUARTO WHERE hotel_id = :hotel_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':hotel_id' => $hotel_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function updateQuarto($id, $hotel_id, $tipo_quarto, $capacidade, $preco) {
    $pdo = getConnection();
    $sql = "UPDATE QUARTO SET hotel_id = :hotel_id, tipo_quarto = :tipo_quarto, capacidade = :capacidade, preco = :preco
            WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':hotel_id' => $hotel_id,
        ':tipo_quarto' => $tipo_quarto,
        ':capacidade' => $capacidade,
        ':preco' => $preco,
        ':id' => $id
    ]);
    echo "Quarto atualizado com sucesso!";
}

function deleteQuarto($id) {
    $pdo = getConnection();
    $sql = "DELETE FROM QUARTO WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    echo "Quarto excluído com sucesso!";
}
?>
