<?php
// Carregar configuração do banco
require_once 'config/database.php';

// Incluir os controladores
require_once 'controllers/HotelController.php';
require_once 'controllers/RoomController.php';

// Recupera a URL solicitada
$request = $_SERVER['REQUEST_URI'];

// Roteamento para CRUD de Hotéis
if ($request == '/' || $request == '/hotels') {
    HotelController::index(); // Exibe a lista de hotéis
} elseif ($request == '/hotel/create') {
    HotelController::create(); // Exibe o formulário de criação de hotel
} elseif ($request == '/hotel/store') {
    HotelController::store(); // Armazena o novo hotel
} elseif (preg_match('/^\/hotel\/(\d+)$/', $request, $matches)) {
    HotelController::show($matches[1]); // Exibe os detalhes do hotel
} elseif (preg_match('/^\/hotel\/(\d+)\/edit$/', $request, $matches)) {
    HotelController::edit($matches[1]); // Exibe o formulário de edição do hotel
} elseif (preg_match('/^\/hotel\/(\d+)\/update$/', $request, $matches)) {
    HotelController::update($matches[1]); // Atualiza os dados do hotel
} elseif (preg_match('/^\/hotel\/(\d+)\/destroy$/', $request, $matches)) {
    HotelController::destroy($matches[1]); // Exclui o hotel
} elseif (preg_match('/^\/hotel\/(\d+)\/rooms$/', $request, $matches)) {
    RoomController::index($matches[1]); // Exibe a lista de quartos do hotel
} elseif (preg_match('/^\/hotel\/(\d+)\/room\/create$/', $request, $matches)) {
    RoomController::create($matches[1]); // Exibe o formulário de criação de quarto
} elseif (preg_match('/^\/hotel\/(\d+)\/room\/store$/', $request, $matches)) {
    RoomController::store($matches[1]); // Armazena o novo quarto
} elseif (preg_match('/^\/hotel\/(\d+)\/room\/(\d+)\/edit$/', $request, $matches)) {
    RoomController::edit($matches[1], $matches[2]); // Exibe o formulário de edição do quarto
} elseif (preg_match('/^\/hotel\/(\d+)\/room\/(\d+)\/update$/', $request, $matches)) {
    RoomController::update($matches[1], $matches[2]); // Atualiza os dados do quarto
} elseif (preg_match('/^\/hotel\/(\d+)\/room\/(\d+)\/destroy$/', $request, $matches)) {
    RoomController::destroy($matches[1], $matches[2]); // Exclui o quarto
} else {
    echo "Página não encontrada!";
}
?>
