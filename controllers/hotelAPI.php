<?php
include 'HotelDAO.php';

header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);

        if (isset($data['nome']) && isset($data['endereco']) && isset($data['avaliacao']) &&
            isset($data['preco_por_noite']) && isset($data['cidade']) && isset($data['estado'])) {
            
            createHotel($data['nome'], $data['endereco'], $data['avaliacao'], $data['preco_por_noite'], $data['cidade'], $data['estado']);
            
            echo json_encode(["status" => "success", "message" => "Hotel cadastrado com sucesso!"]);
        } else {
            http_response_code(400);
            echo json_encode(["status" => "error", "message" => "Dados incompletos"]);
        }
        break;

    case 'GET':
        $hoteis = getAllHotels();
        echo json_encode($hoteis);
        break;

    default:
        http_response_code(405);
        echo json_encode(["status" => "error", "message" => "Método não permitido"]);
        break;
}
?>
