<?php
global $conn;
session_start();
require_once __DIR__ . '/../conection/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    if (empty($login) || empty($senha)) {
        header('Location: ../front/login.html');
        exit;
    }

    $stmt = $conn->prepare("SELECT * FROM usuario WHERE login = ?");
    $stmt->execute([$login]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && $senha === $user['senha']) {
        $_SESSION['usuario_id'] = $user['id'];
        $_SESSION['nome'] = $user['nome'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['foto'] = $user['path_img'];
        $_SESSION['admin'] = $user['admin'];
        $_SESSION['status'] = $user['admin'] ? "admin" : "comum";
        header('Location: ../front/Telainicial.php');
        exit;
    } else {
        header('Location: ../front/login.html');
        exit;
    }
}
