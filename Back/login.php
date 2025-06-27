<?php
session_start();
require_once __DIR__ . '/../Banco/Conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    if (empty($login) || empty($senha)) {
        header('Location: ../front/login.html');
        exit;
    }

    $conexao = Conexao::getConexao();
    $stmt = $conexao->prepare("SELECT * FROM usuario WHERE login = :login");
    $stmt->bindValue(":login", $login);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && $senha === $user['senha']) {
        $_SESSION['usuario_id'] = $user['id'];
        $_SESSION['nome'] = $user['nome'];
        $_SESSION['cpf'] = $user['cpf'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['foto'] = $user['path_img'];
        $_SESSION['cargo'] = $user['cargo'];

        header('Location: ../front/Telainicial.php');
        exit;
    } else {
        header('Location: ../front/login.html');
        exit;
    }
}
