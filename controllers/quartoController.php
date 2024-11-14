<?php
include 'QuartoDAO.php';

// cadastra um novo quarto
function cadastrarQuarto($data) {
    if (isset($data['hotel_id'], $data['tipo_quarto'], $data['capacidade'], $data['preco'])) {
        createQuarto($data['hotel_id'], $data['tipo_quarto'], $data['capacidade'], $data['preco']);
        return ["status" => "success", "message" => "Quarto cadastrado com sucesso!"];
    } else {
        return ["status" => "error", "message" => "Dados incompletos"];
    }
}

// listar todos os quartos
function listarQuartos() {
    return getAllQuartos();
}

// atualizar um quarto
function atualizarQuarto($id, $data) {
    if (isset($data['hotel_id'], $data['tipo_quarto'], $data['capacidade'], $data['preco'])) {
        updateQuarto($id, $data['hotel_id'], $data['tipo_quarto'], $data['capacidade'], $data['preco']);
        return ["status" => "success", "message" => "Quarto atualizado com sucesso!"];
    } else {
        return ["status" => "error", "message" => "Dados incompletos"];
    }
}

// excluir um quarto
function excluirQuarto($id) {
    deleteQuarto($id);
    return ["status" => "success", "message" => "Quarto excluído com sucesso!"];
}
?>
