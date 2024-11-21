<?php
require 'config/database.php';

// Verifica se o ID do hotel foi passado
if (!isset($_GET['hotel_id'])) {
    die("ID do hotel não fornecido.");
}

$hotelId = intval($_GET['hotel_id']);

// Recupera o hotel
$hotelQuery = $pdo->prepare("SELECT * FROM hotels WHERE id = :id");
$hotelQuery->execute(['id' => $hotelId]);
$hotel = $hotelQuery->fetch(PDO::FETCH_ASSOC);

if (!$hotel) {
    die("Hotel não encontrado.");
}

// Recupera os quartos do hotel
$roomsQuery = $pdo->prepare("SELECT * FROM rooms WHERE hotel_id = :hotel_id");
$roomsQuery->execute(['hotel_id' => $hotelId]);
$rooms = $roomsQuery->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Quartos - <?= htmlspecialchars($hotel['name']); ?></title>
</head>
<body>
    <h1>Quartos de <?= htmlspecialchars($hotel['name']); ?></h1>
    <ul>
        <?php foreach ($rooms as $room): ?>
            <li>
                <?= htmlspecialchars($room['room_type']); ?> - R$ <?= number_format($room['price'], 2, ',', '.'); ?>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="index.php">Voltar para a lista de hotéis</a>
</body>
</html>
