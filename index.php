<?php
require 'routes/router.php';

route('/', function() {
    include 'listar.html';
});

route('/cadastro', function() {
    include 'cadastro.html';
});

route('/cadastro-quarto', function() {
    include 'cadastroQuarto.html';
});

// Pega o caminho da URL
$requestedPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Executa o roteamento
dispatch($requestedPath);
