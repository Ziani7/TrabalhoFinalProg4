<?php
ini_set('upload_max_filesize', '20M');
ini_set('post_max_size', '25M');
ini_set('memory_limit', '128M');

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../conection/conexao.php';
include_once 'usuario.php';
include_once 'usuarioDAO.php';
global $conn;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $cpf = $_POST ['cpf'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $cargo = $_POST['cargo'];
    $path_img = null;

    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] !== UPLOAD_ERR_NO_FILE) {
        $arquivo = $_FILES['avatar'];

        $pasta = __DIR__ . '/../img/';  // Ajuste conforme sua estrutura

        if (!file_exists($pasta)) {
            mkdir($pasta, 0777, true);
        }

        $extensao = strtolower(pathinfo($arquivo['name'], PATHINFO_EXTENSION));

        if (in_array($extensao, ['jpg', 'png', 'jpeg', 'jfif'])) {
            $novoArqNome = uniqid() . '.' . $extensao;
            $caminhoCompleto = $pasta . $novoArqNome;

            if (move_uploaded_file($arquivo['tmp_name'], $caminhoCompleto)) {
                $path_img = '/img/' . $novoArqNome;
            } else {
                die("Erro ao mover o arquivo. Verifique as permissões da pasta.");
            }
        }
    }

    $usuario = new Usuario($nome, $cpf, $login, $email, $senha, $path_img, $cargo);
    $usuarioDAO = new usuarioDAO();
    $usuarioDAO->inserir($usuario);
}

