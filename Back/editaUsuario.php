<?php
session_start();
require_once __DIR__ . '/../Banco/Conexao.php';
ini_set('upload_max_filesize', '20M');
ini_set('post_max_size', '25M');
ini_set('memory_limit', '128M');

error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'usuario.php';
include_once 'usuarioDAO.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $id = $_SESSION['usuario_id'];
    $cargo = $_SESSION['cargo'];

    $usuarioDAO = new usuarioDAO();

    $usuarioAtual = $usuarioDAO->buscarPorId($id);

    if (!$usuarioAtual) {
        die("Usuário não encontrado.");
    }

    $path_img = $usuarioAtual->getPathImg();

    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] !== UPLOAD_ERR_NO_FILE) {
        $arquivo = $_FILES['avatar'];
        $pasta = __DIR__ . '/../img/';

        if (!file_exists($pasta)) {
            mkdir($pasta, 0777, true);
        }

        $extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);

        if (in_array($extensao, ['jpg', 'png', 'jpeg', 'jfif'])) {
            $novoArqNome = uniqid() . '.' . $extensao;
            $caminhoCompleto = $pasta . $novoArqNome;

            if (move_uploaded_file($arquivo['tmp_name'], $caminhoCompleto)) {
                if ($usuarioAtual->getPathImg()) {
                    $caminhoAntigo = __DIR__ . '/..' . $usuarioAtual->getPathImg();
                    if (file_exists($caminhoAntigo)) {
                        unlink($caminhoAntigo);
                    }
                }

                $path_img = '/img/' . $novoArqNome;
            } else {
                die("Erro ao mover o arquivo. Verifique permissões da pasta.");
            }
        }
    }

    $usuarioAtualizado = new Usuario($nome, $cpf, $login, $email, $senha, $path_img, $cargo);
    $usuarioAtualizado->setId($id);

    $usuarioDAO->atualizar($usuarioAtualizado);

    header("Location: ../Front/TelaInicial.php?toast=atualizadoComSucesso");
    exit;
}
?>
