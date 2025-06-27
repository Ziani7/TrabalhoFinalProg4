<?php
global $conn;
require_once __DIR__ . '/../conection/conexao.php';
header('Content-Type: application/json');

$cpf = $_GET['cpf'] ?? '';

if (!empty($cpf)) {
    $stmt = $conn->prepare("SELECT nome FROM usuario WHERE cpf = :cpf");
    $stmt->bindParam(':cpf', $cpf);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode(['sucesso' => true, 'nome' => $usuario['nome']]);
    } else {
        echo json_encode(['sucesso' => false, 'mensagem' => 'CPF não encontrado']);
    }
} else {
    echo json_encode(['sucesso' => false, 'mensagem' => 'CPF inválido']);
}
