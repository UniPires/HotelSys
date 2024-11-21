<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Quartos - Hotel</title>
    <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body>
    <h1>Quartos do Hotel</h1>
    <center>
        <a class="btn" style="background-color: white;" href="/hotel/<?= $hotel_id ?>/room/create">Adicionar Novo Quarto</a>
    </center>
    <ul>
        <?php foreach ($rooms as $room): ?>
            <li>
                <center>
                    <?= htmlspecialchars($room['room_type']) ?> - Preço: R$ <?= number_format($room['price'], 2, ',', '.') ?> <br>
                    <a class="btn" href="/hotel/<?= $hotel_id ?>/room/<?= $room['id'] ?>/edit">Editar</a> | 
                    <a class="btn" href="/hotel/<?= $hotel_id ?>/room/<?= $room['id'] ?>/destroy" onclick="return confirm('Deseja excluir?');">Excluir</a>
                </center>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
