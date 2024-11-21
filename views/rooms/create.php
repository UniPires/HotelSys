<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Criar Quarto</title>
    <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body>
    <h1>Criar Novo Quarto</h1>
    <form action="/hotel/<?= $hotel_id ?>/room/store" method="POST">
        <label for="room_type">Tipo de Quarto:</label>
        <input type="text" name="room_type" id="room_type" required>
        <br>
        <label for="price">Preço:</label>
        <input type="number" step="0.01" name="price" id="price" required>
        <br>
        <button type="submit">Adicionar Quarto</button>
    </form>
</body>
</html>
