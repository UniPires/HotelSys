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

function createHotel($nome, $endereco, $avaliacao, $preco_por_noite, $cidade, $estado) {
    $pdo = getConnection();
    $sql = "INSERT INTO HOTEL (nome, endereco, avaliacao, preco_por_noite, cidade, estado)
            VALUES (:nome, :endereco, :avaliacao, :preco_por_noite, :cidade, :estado)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nome' => $nome,
        ':endereco' => $endereco,
        ':avaliacao' => $avaliacao,
        ':preco_por_noite' => $preco_por_noite,
        ':cidade' => $cidade,
        ':estado' => $estado
    ]);
    echo "Hotel inserido com sucesso!";
}

function getAllHotels() {
    $pdo = getConnection();
    $sql = "SELECT * FROM HOTEL";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getHotelById($id) {
    $pdo = getConnection();
    $sql = "SELECT * FROM HOTEL WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function updateHotel($id, $nome, $endereco, $avaliacao, $preco_por_noite, $cidade, $estado) {
    $pdo = getConnection();
    $sql = "UPDATE HOTEL SET nome = :nome, endereco = :endereco, avaliacao = :avaliacao, preco_por_noite = :preco_por_noite, cidade = :cidade, estado = :estado
            WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nome' => $nome,
        ':endereco' => $endereco,
        ':avaliacao' => $avaliacao,
        ':preco_por_noite' => $preco_por_noite,
        ':cidade' => $cidade,
        ':estado' => $estado,
        ':id' => $id
    ]);
    echo "Hotel atualizado com sucesso!";
}

function deleteHotel($id) {
    $pdo = getConnection();
    $sql = "DELETE FROM HOTEL WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    echo "Hotel excluído com sucesso!";
}
?>
