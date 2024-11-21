<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Hotéis</title>
    <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body>
    <h1>Hotéis Cadastrados</h1>
    <center>
        <a class="btn" style="background-color: white;" href="/hotel/create">Adicionar Novo Hotel</a>
    </center>
    <ul>
        <?php foreach ($hotels as $hotel): ?>
            <center>
                <li>
                    <a href="/hotel/<?= $hotel['id']; ?>"><?= htmlspecialchars($hotel['name']); ?></a> <br>
                    <a class="btn" href="/hotel/<?= $hotel['id']; ?>/edit">Editar</a> - 
                    <a class="btn" href="/hotel/<?= $hotel['id'] ?>/rooms">Ver Quartos</a> -
                    <a class="btn" href="/hotel/<?= $hotel['id']; ?>/destroy" onclick="return confirm('Deseja excluir?');">Excluir</a>
                </li>
            </center>
        <?php endforeach; ?>
    </ul>
</body>
</html>
