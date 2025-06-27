<?php
global $conn;
include_once __DIR__ . '/../conection/conexao.php';
include_once "atividade.php";
include_once "atividadeDAO.php";

if (isset($_GET['id_usuario']) && isset($_GET['id_atividade']) && isset($_GET['id_evento'])) {
    $id_usuario = (int) $_GET['id_usuario'];
    $id_atividade = (int) $_GET['id_atividade'];
    $id_evento = (int) $_GET['id_evento'];

    $atividadeDAO = new atividadeDAO();

    // Verifica se o usuário já está inscrito
    if ($atividadeDAO->verificaInscricao($id_usuario, $id_atividade)) {
        header("Location: ../Front/visualizarAtividades.php?id=" . $id_evento . "&msg=ja_inscrito");
        exit;
    }

    // Tenta inscrever o usuário
    if ($atividadeDAO->inscrever($id_usuario, $id_atividade)) {
        header("Location: ../Front/visualizarAtividades.php?id=" . $id_evento . "&msg=inscrito");
    } else {
        header("Location: ../Front/visualizarAtividades.php?id=" . $id_evento . "&erro=inscricao_falhou");
    }
    exit;
} else {
    header("Location: ../Front/visualizarAtividades.php?erro=parametros_invalidos");
    exit;
}
?>
