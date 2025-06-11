<?php
global $conn;
require_once __DIR__ . '/conection/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $login = $_POST['login'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $path_img = null;

    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] !== 4) {
        $arquivo = $_FILES['avatar'];
        $pasta = "../img/";
        $extensao = strtolower(pathinfo($arquivo['name'], PATHINFO_EXTENSION));
        
        if (in_array($extensao, ['jpg', 'png', 'jpeg', 'jfif'])) {
            $novoArqNome = uniqid();
            $path_img = $pasta . $novoArqNome . "." . $extensao;
            move_uploaded_file($arquivo['tmp_name'], $path_img);
        }
    }
    try {
        $stmt = $conn->prepare("INSERT INTO usuario (nome, login, senha, email, path_img) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$nome, $login, $senha, $email, $path_img]);

        header('Location: ../Front/login.html?success=1');
        exit;
    } catch (PDOException $e) {
        header('Location: ../Front/cadastro.html?error=1');
        exit;
    }
} else {
    header('Location: ../Front/cadastro.html?error=1');
    exit;
}