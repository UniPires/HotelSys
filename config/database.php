<?php
// Configuração da conexão com o banco PostgreSQL
$host = 'localhost'; // ou o endereço do servidor
$db = 'postgres'; // Nome do banco de dados
$user = 'postgres'; // Seu usuário do PostgreSQL
$password = 'admin'; // Sua senha

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$db", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}
?>
