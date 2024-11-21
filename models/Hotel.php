<?php
class Hotel {
    public $id;
    public $name;
    public $location;

    public static function all() {
        global $pdo;
        $query = $pdo->query("SELECT * FROM hotels");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id) {
        global $pdo;
        $query = $pdo->prepare("SELECT * FROM hotels WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($name, $location) {
        global $pdo;
        $query = $pdo->prepare("INSERT INTO hotels (name, location) VALUES (?, ?)");
        $query->execute([$name, $location]);
        return $pdo->lastInsertId();
    }

    public static function update($id, $name, $location) {
        global $pdo;
        $query = $pdo->prepare("UPDATE hotels SET name = ?, location = ? WHERE id = ?");
        $query->execute([$name, $location, $id]);
    }

    public static function delete($id) {
        global $pdo;
        $query = $pdo->prepare("DELETE FROM hotels WHERE id = ?");
        $query->execute([$id]);
    }
}
?>
