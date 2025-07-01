<?php
session_start();
include_once 'atividadeDAO.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    $descricao = isset($_POST['descricao']) ? trim($_POST['descricao']) : '';
    $data = isset($_POST['date']) ? $_POST['date'] : '';  // aqui é 'date' no form
    $hora_inicio = isset($_POST['horaInicio']) ? $_POST['horaInicio'] : '';
    $hora_fim = isset($_POST['horaFinal']) ? $_POST['horaFinal'] : '';
    $local = isset($_POST['local']) ? trim($_POST['local']) : '';
    $tipo = isset($_POST['tipo']) ? trim($_POST['tipo']) : '';
    $id_evento = isset($_POST['evento']) ? (int)$_POST['evento'] : 0;
    $id_responsavel = isset($_POST['cpf']) ? trim($_POST['cpf']) : '';

    if ($id && $descricao && $data && $hora_inicio && $hora_fim && $local && $tipo && $id_evento && $id_responsavel) {
        $atividadeDAO = new atividadeDAO();
        $sucesso = $atividadeDAO->editar($id, $descricao, $data, $hora_inicio, $hora_fim, $local, $tipo, $id_evento, $id_responsavel);

        if ($sucesso) {
            header("Location: ../Front/MinhasAtividades.php?toast=edicaoSucesso");
            exit;
        } else {
            header("Location: ../Front/MinhasAtividades.php?toast=edicaoErro");
            exit;
        }
    } else {
        header("Location: ../Front/MinhasAtividades.php?toast=camposInvalidos");
        exit;
    }
} else {
    header("Location: ../Front/MinhasAtividades.php");
    exit;
}
?>
