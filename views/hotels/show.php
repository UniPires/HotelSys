<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Detalhes do Hotel</title>
    <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body>
    <h1>Detalhes do Hotel: <?= htmlspecialchars($hotel['name']); ?></h1>
    <p>Localização: <?= htmlspecialchars($hotel['location']); ?></p>
    <a href="/hotel/<?= $hotel['id']; ?>/edit">Editar</a> |
    <a href="/hotel/<?= $hotel['id']; ?>/destroy" onclick="return confirm('Deseja excluir?');">Excluir</a>
</body>
</html>
