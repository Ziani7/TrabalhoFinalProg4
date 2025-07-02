<?php
session_start();
include_once 'eventoDAO.php';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    $nome = isset($_POST['nomeEve']) ? trim($_POST['nomeEve']) : '';
    $dataInicio = isset($_POST['dateInicio']) ? $_POST['dateInicio'] : '';
    $dataFinal = isset($_POST['dateFinal']) ? $_POST['dateFinal'] : '';
    $local = isset($_POST['local']) ? trim($_POST['local']) : '';
        if ($id && $nome && $dataInicio && $dataFinal && $local) {
        $eventoDAO = new eventoDAO();
        $sucesso = $eventoDAO->editar($id, $nome, $dataInicio, $dataFinal, $local);

        if ($sucesso) {
            header("Location: ../Front/VisualizarEventos.php?toast=edicaoSucesso");
            exit;
        } else {
            header("Location: ../Front/VisualizarEventos.php?toast=edicaoErro");
            exit;
        }
    } else {
        header("Location: ../Front/VisualizarEventos.php?toast=camposInvalidos");
        exit;
    }
} else {
    header("Location: ../Front/VisualizarEventos.php");
    exit;
}
?>