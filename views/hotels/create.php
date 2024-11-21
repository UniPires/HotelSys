<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Criar Novo Hotel</title>
    <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body>
    <h1>Criar Novo Hotel</h1>
    <form action="/hotel/store" method="POST">
        <label for="name">Nome do Hotel:</label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="location">Localização:</label>
        <input type="text" name="location" id="location" required>
        <br>
        <button type="submit">Adicionar Hotel</button>
    </form>
</body>
</html>
