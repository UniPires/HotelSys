<?php
class HotelController {
    // Exibir lista de hotéis
    public static function index() {
        global $pdo;
        $query = $pdo->query("SELECT * FROM hotels");
        $hotels = $query->fetchAll(PDO::FETCH_ASSOC);
        include 'views/hotels/index.php'; // Exibe a lista de hotéis
    }

    // Exibir formulário para adicionar um novo hotel
    public static function create() {
        include 'views/hotels/create.php'; // Exibe o formulário de adição
    }

    // Armazenar um novo hotel
    public static function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $location = $_POST['location'];
            global $pdo;
            $query = $pdo->prepare("INSERT INTO hotels (name, location) VALUES (?, ?)");
            $query->execute([$name, $location]);
            header("Location: /hotels"); // Redireciona para a lista de hotéis
        }
    }

    // Exibir o formulário de edição de um hotel
    public static function edit($id) {
        global $pdo;
        $query = $pdo->prepare("SELECT * FROM hotels WHERE id = ?");
        $query->execute([$id]);
        $hotel = $query->fetch(PDO::FETCH_ASSOC);
        include 'views/hotels/edit.php'; // Exibe o formulário de edição
    }

    public static function show($id) {
        global $pdo;
        $query = $pdo->prepare("SELECT * FROM hotels WHERE id = ?");
        $query->execute([$id]);
        $hotel = $query->fetch(PDO::FETCH_ASSOC);

        if ($hotel) {
            include 'views/hotels/show.php'; // Exibe os detalhes do hotel
        } else {
            echo "Hotel não encontrado!";
        }
    }

    // Atualizar os dados de um hotel
    public static function update($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $location = $_POST['location'];
            global $pdo;
            $query = $pdo->prepare("UPDATE hotels SET name = ?, location = ? WHERE id = ?");
            $query->execute([$name, $location, $id]);
            header("Location: /"); // Redireciona para os detalhes do hotel
        }
    }

    // Excluir um hotel
    public static function destroy($id) {
        global $pdo;
        $query = $pdo->prepare("DELETE FROM hotels WHERE id = ?");
        $query->execute([$id]);
        header("Location: /hotels"); // Redireciona para a lista de hotéis
    }
}
?>
