<?php
session_start();

if (!isset($_SESSION["nome"]) || empty($_SESSION["nome"])) {
    header("Location: login.html");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once '../Back/equipeDAO.php';
    include_once '../Back/equipe.php';

    $id_comp = $_POST['id_comp'] ?? null;
    $nome = trim($_POST['nome'] ?? '');

    if (!$id_comp || empty($nome)) {
        $_SESSION['erro'] = "Dados insuficientes para cadastrar a equipe.";
        header("Location: cadastrarEquipe.php?id=" . urlencode($id_comp));
        exit;
    }

    $equipeDAO = new equipeDAO();

    $existeEquipe = $equipeDAO->buscarPorNomeCompeticao($id_comp, $nome);

    if ($existeEquipe) {
        $_SESSION['erro'] = "Já existe uma equipe com este nome cadastrada nesta competição.";
        header("Location: ../Front/cadastrarEquipe.php?id=" . urlencode($id_comp));
        exit;
    }

    $equipe = new Equipe($id_comp, $nome);
    $atletas = $_POST['cpfAtleta'];
    $resultado = $equipeDAO->inserir($equipe, $atletas);

    if ($resultado) {
        $_SESSION['sucesso'] = "Equipe cadastrada com sucesso!";
        header("Location: visualizarCompeticoes.php?id=" . urlencode($id_comp));
        exit;
    } else {
        $_SESSION['erro'] = "Erro ao cadastrar a equipe.";
        header("Location: ../Front/cadastrarEquipe.php?id=" . urlencode($id_comp));
        exit;
    }
} else {
    header("Location: visualizarCompeticoes.php");
    exit;
}
?>
