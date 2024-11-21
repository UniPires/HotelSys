<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Hotel</title>
    <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body>
    <h1>Editar Hotel</h1>
    <form action="/hotel/<?= $hotel['id']; ?>/update" method="POST">
        <label for="name">Nome do Hotel:</label>
        <input type="text" name="name" id="name" value="<?= htmlspecialchars($hotel['name']); ?>" required>
        <br>
        <label for="location">Localização:</label>
        <input type="text" name="location" id="location" value="<?= htmlspecialchars($hotel['location']); ?>" required>
        <br>
        <button type="submit">Atualizar Hotel</button>
    </form>
</body>
</html>
