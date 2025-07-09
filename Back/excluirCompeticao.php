<?php
session_start();
include_once 'competicaoDAO.php';

if (!isset($_SESSION["nome"]) || empty($_SESSION["nome"])) {
    header("Location: ../Front/login.html");
    exit;
}

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $competicaoDAO = new CompeticaoDAO();
    if ($competicaoDAO->excluir($id)) {
        header("Location: ../Front/VisualizarCompeticoes.php?toast=exclusaoSucesso");
    } else {
        header("Location: ../Front/VisualizarCompeticoes.php?toast=exclusaoErro");
    }
} else {
    header("Location: ../Front/VisualizarCompeticoes.php?toast=parametroInvalido");
}
exit;
?>
