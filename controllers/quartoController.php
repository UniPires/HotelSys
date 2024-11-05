<?php
include 'QuartoDAO.php';

// Lógica para cadastrar um novo quarto
function cadastrarQuarto($data) {
    if (isset($data['hotel_id'], $data['tipo_quarto'], $data['capacidade'], $data['preco'])) {
        createQuarto($data['hotel_id'], $data['tipo_quarto'], $data['capacidade'], $data['preco']);
        return ["status" => "success", "message" => "Quarto cadastrado com sucesso!"];
    } else {
        return ["status" => "error", "message" => "Dados incompletos"];
    }
}

// Lógica para listar todos os quartos
function listarQuartos() {
    return getAllQuartos();
}

// Lógica para atualizar um quarto
function atualizarQuarto($id, $data) {
    if (isset($data['hotel_id'], $data['tipo_quarto'], $data['capacidade'], $data['preco'])) {
        updateQuarto($id, $data['hotel_id'], $data['tipo_quarto'], $data['capacidade'], $data['preco']);
        return ["status" => "success", "message" => "Quarto atualizado com sucesso!"];
    } else {
        return ["status" => "error", "message" => "Dados incompletos"];
    }
}

// Lógica para excluir um quarto
function excluirQuarto($id) {
    deleteQuarto($id);
    return ["status" => "success", "message" => "Quarto excluído com sucesso!"];
}
?>
