<?php
class Room {
    public $id;
    public $hotel_id;
    public $room_type;
    public $price;

    public static function all($hotel_id) {
        global $pdo;
        $query = $pdo->prepare("SELECT * FROM rooms WHERE hotel_id = ?");
        $query->execute([$hotel_id]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id) {
        global $pdo;
        $query = $pdo->prepare("SELECT * FROM rooms WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($hotel_id, $room_type, $price) {
        global $pdo;
        $query = $pdo->prepare("INSERT INTO rooms (hotel_id, room_type, price) VALUES (?, ?, ?)");
        $query->execute([$hotel_id, $room_type, $price]);
        return $pdo->lastInsertId();
    }

    public static function update($id, $room_type, $price) {
        global $pdo;
        $query = $pdo->prepare("UPDATE rooms SET room_type = ?, price = ? WHERE id = ?");
        $query->execute([$room_type, $price, $id]);
    }

    public static function delete($id) {
        global $pdo;
        $query = $pdo->prepare("DELETE FROM rooms WHERE id = ?");
        $query->execute([$id]);
    }
}
?>
