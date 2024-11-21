<?php
require_once 'config/database.php';

require_once 'controllers/HotelController.php';
require_once 'controllers/RoomController.php';

$request = $_SERVER['REQUEST_URI'];

if ($request == '/' || $request == '/hotels') {
    HotelController::index(); 
} elseif ($request == '/hotel/create') {
    HotelController::create(); 
} elseif ($request == '/hotel/store') {
    HotelController::store(); // Post Hotel
} elseif (preg_match('/^\/hotel\/(\d+)$/', $request, $matches)) {
    HotelController::show($matches[1]); // Get detalhe
} elseif (preg_match('/^\/hotel\/(\d+)\/edit$/', $request, $matches)) {
    HotelController::edit($matches[1]); // Mostra Form
} elseif (preg_match('/^\/hotel\/(\d+)\/update$/', $request, $matches)) {
    HotelController::update($matches[1]); // Update Hotel
} elseif (preg_match('/^\/hotel\/(\d+)\/destroy$/', $request, $matches)) {
    HotelController::destroy($matches[1]); // Destroy hotels
} elseif (preg_match('/^\/hotel\/(\d+)\/rooms$/', $request, $matches)) {
    RoomController::index($matches[1]); // Get quartos
} elseif (preg_match('/^\/hotel\/(\d+)\/room\/create$/', $request, $matches)) {
    RoomController::create($matches[1]); // Mostra Form
} elseif (preg_match('/^\/hotel\/(\d+)\/room\/store$/', $request, $matches)) {
    RoomController::store($matches[1]); // Post quarto
} elseif (preg_match('/^\/hotel\/(\d+)\/room\/(\d+)\/edit$/', $request, $matches)) {
    RoomController::edit($matches[1], $matches[2]); // Mostra Form
} elseif (preg_match('/^\/hotel\/(\d+)\/room\/(\d+)\/update$/', $request, $matches)) {
    RoomController::update($matches[1], $matches[2]); // Update quarto
} elseif (preg_match('/^\/hotel\/(\d+)\/room\/(\d+)\/destroy$/', $request, $matches)) {
    RoomController::destroy($matches[1], $matches[2]); // Delete quarto
} else {
    echo "Página não encontrada!";
}
?>
