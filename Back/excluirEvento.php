<?php
session_start();
include_once 'eventoDAO.php';

if (!isset($_SESSION["nome"]) || empty($_SESSION["nome"])) {
    header("Location: ../Front/login.html");
    exit;
}

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    $eventoDAO = new eventoDAO();
    if ($eventoDAO->excluir($id)) {
        header("Location: ../Front/VisualizarEventos.php?toast=exclusaoSucesso");
    } else {
        header("Location: ../Front/VisualizarEventos.php?toast=exclusaoErro");
    }
    exit;
} else {
    header("Location: ../Front/VisualizarEventos.php?toast=parametroInvalido");
    exit;
}
?>
