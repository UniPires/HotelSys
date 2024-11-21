<?php
class RoomController {
    // Exibir lista de quartos de um hotel
    public static function index($hotel_id) {
        global $pdo;
        $query = $pdo->prepare("SELECT * FROM rooms WHERE hotel_id = ?");
        $query->execute([$hotel_id]);
        $rooms = $query->fetchAll(PDO::FETCH_ASSOC);

        include 'views/rooms/index.php'; // Exibe os quartos do hotel
    }

    // Exibir formulário para adicionar um novo quarto
    public static function create($hotel_id) {
        include 'views/rooms/create.php'; // Exibe o formulário de criação de quarto
    }

    // Armazenar um novo quarto
    public static function store($hotel_id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $room_type = $_POST['room_type'];
            $price = $_POST['price'];
            global $pdo;
            $query = $pdo->prepare("INSERT INTO rooms (hotel_id, room_type, price) VALUES (?, ?, ?)");
            $query->execute([$hotel_id, $room_type, $price]);
            header("Location: /hotel/$hotel_id/rooms"); // Redireciona para a lista de quartos
        }
    }

    // Exibir o formulário de edição de um quarto
    public static function edit($hotel_id, $room_id) {
        global $pdo;
        $query = $pdo->prepare("SELECT * FROM rooms WHERE id = ? AND hotel_id = ?");
        $query->execute([$room_id, $hotel_id]);
        $room = $query->fetch(PDO::FETCH_ASSOC);
        include 'views/rooms/edit.php'; // Exibe o formulário de edição
    }

    // Atualizar os dados de um quarto
    public static function update($hotel_id, $room_id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $room_type = $_POST['room_type'];
            $price = $_POST['price'];
            global $pdo;
            $query = $pdo->prepare("UPDATE rooms SET room_type = ?, price = ? WHERE id = ? AND hotel_id = ?");
            $query->execute([$room_type, $price, $room_id, $hotel_id]);
            header("Location: /hotel/$hotel_id/rooms"); // Redireciona para a lista de quartos
        }
    }

    // Excluir um quarto
    public static function destroy($hotel_id, $room_id) {
        global $pdo;
        $query = $pdo->prepare("DELETE FROM rooms WHERE id = ? AND hotel_id = ?");
        $query->execute([$room_id, $hotel_id]);
        header("Location: /hotel/$hotel_id/rooms"); // Redireciona para a lista de quartos
    }
}
?>
