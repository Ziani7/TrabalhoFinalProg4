<?php
session_start();
require_once '../Back/atividadeDAO.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../Front/login.html");
    exit;
}

$id_usuario = $_SESSION['usuario_id'];

// Verifica se veio o ID pela URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id_atividade = (int)$_GET['id'];

    $atividadeDAO = new atividadeDAO();

    // Você pode reforçar a segurança passando o usuário para garantir que só o responsável exclui
    if ($atividadeDAO->excluir($id_atividade, $id_usuario)) {
        header("Location: ../Front/MinhasAtividades.php?toast=exclusaoSucesso");
    } else {
        header("Location: ../Front/MinhasAtividades.php?toast=exclusaoErro");
    }
    exit;
} else {
    header("Location: ../Front/MinhasAtividades.php?toast=parametroInvalido");
    exit;
}
?>
