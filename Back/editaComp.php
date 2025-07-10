<?php
session_start();
include_once 'competicaoDAO.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;
    $idEvento = isset($_POST['evento']) ? (int) $_POST['evento'] : 0;
    $nome = isset($_POST['nome']) ? trim($_POST['nome']) : '';
    $modalidade = isset($_POST['modalidade']) ? trim($_POST['modalidade']) : '';
    $local = isset($_POST['local']) ? trim($_POST['local']) : '';
    $dataInicio = isset($_POST['data_inicio']) ? $_POST['data_inicio'] : '';
    $dataFinal = isset($_POST['data_fim']) ? $_POST['data_fim'] : '';
    $status = isset($_POST['status']) ? $_POST['status'] : 'Planejamento';


    if ($id && $idEvento && $nome && $modalidade && $local && $dataInicio && $dataFinal) {
        $competicaoDAO = new competicaoDAO();
        $sucesso = $competicaoDAO->editar($id, $nome, $modalidade, $local, $dataInicio, $dataFinal, $status);

        if ($sucesso) {
            header("Location: ../Front/VisualizarCompeticoes.php?sucesso=competicaoEditada");
            exit;
        } else {
            header("Location: ../Front/VisualizarCompeticoes.php?erro=naoEditado");
            exit;
        }
    } else {
        header("Location: ../Front/VisualizarCompeticoes.php?erro=dadosInvalidos");
        exit;
    }
} else {
    header("Location: ../Front/VisualizarCompeticoes.php?erro=metodoInvalido");
    exit;
}
?>