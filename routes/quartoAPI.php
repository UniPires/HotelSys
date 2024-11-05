<?php
include 'QuartoController.php';

header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

$id = isset($_GET['id']) ? intval($_GET['id']) : null;

switch ($method) {
    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        $response = cadastrarQuarto($data);
        echo json_encode($response);
        break;

    case 'GET':
        if ($id) {
            $quartos = getQuartoById($id); // Função para obter um quarto específico (caso precise implementar)
        } else {
            $quartos = listarQuartos();
        }
        echo json_encode($quartos);
        break;

    case 'PUT':
        $data = json_decode(file_get_contents("php://input"), true);
        if ($id) {
            $response = atualizarQuarto($id, $data);
            echo json_encode($response);
        } else {
            http_response_code(400);
            echo json_encode(["status" => "error", "message" => "ID do quarto não fornecido"]);
        }
        break;

    case 'DELETE':
        if ($id) {
            $response = excluirQuarto($id);
            echo json_encode($response);
        } else {
            http_response_code(400);
            echo json_encode(["status" => "error", "message" => "ID do quarto não fornecido"]);
        }
        break;

    default:
        http_response_code(405);
        echo json_encode(["status" => "error", "message" => "Método não permitido"]);
        break;
}
?>
