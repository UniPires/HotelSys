<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Quarto</title>
    <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body>
    <h1>Editar Quarto</h1>
    <form action="/hotel/<?= $hotel_id ?>/room/<?= $room['id'] ?>/update" method="POST">
        <label for="room_type">Tipo de Quarto:</label>
        <input type="text" name="room_type" id="room_type" value="<?= htmlspecialchars($room['room_type']) ?>" required>
        <br>
        <label for="price">Preço:</label>
        <input type="number" step="0.01" name="price" id="price" value="<?= $room['price'] ?>" required>
        <br>
        <button type="submit">Salvar Alterações</button>
    </form>
</body>
</html>
