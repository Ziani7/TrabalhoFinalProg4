<?php
session_start();
require_once __DIR__ . '/../Back/PresencaDAO.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.html");
    exit;
}

$id_atividade = $_GET['id_atividade'] ?? null;
if (!$id_atividade) {
    echo "ID da atividade não informado.";
    exit;
}

$dao = new PresencaDAO();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $todos = $_POST['todos_usuarios'] ?? [];
    $presentes = $_POST['presenca'] ?? [];

    $dao->atualizarPresencas($id_atividade, $todos, $presentes);

    header("Location: presenca.php?id_atividade=$id_atividade&sucesso=1");
    exit;
}

$atividade = $dao->getAtividadeDescricao($id_atividade);
$usuarios = $dao->getUsuariosDaAtividade($id_atividade);
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Presença</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="Css/styles.css">
</head>
<body>
<div class="container" style="margin-top: 100px;">
    <div class="row">
        <div class="col-12">
            <div class="card animate-in">
                <div class="card-header">
                    <h3 class="text-center">Lista de Presença: <?= $atividade['descricao']
                        ?></h3>
                </div>
                <div class="card-body p-4">
                    <?php if (isset($_GET['sucesso'])): ?>
                        <div class="alert alert-success">
                            <i class="fas fa-check-circle me-2"></i>Presenças atualizadas com sucesso!
                        </div>
                    <?php endif; ?>

                    <?php if (empty($usuarios)): ?>
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i>Nenhum participante inscrito nesta atividade.
                        </div>
                    <?php else: ?>
                        <form method="post">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle">
                                    <thead>
                                    <tr>
                                        <th>Participante</th>
                                        <th>Presença</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($usuarios as $usuario): ?>
                                        <tr>
                                            <td><?= $usuario['nome'] ?></td>
                                            <td>
                                                <input type="hidden" name="todos_usuarios[]" value="<?= $usuario['id'] ?>">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                           name="presenca[<?= $usuario['id'] ?>]"
                                                           value="1" <?= $usuario['presenca'] ? 'checked' : '' ?>>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <button type="submit" class="btn btn-success mt-3">
                                <i class="fas fa-save me-2"></i>Salvar Presenças
                            </button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<a href="minhasAtividades.php" id="btnVoltar" class="btn-voltar">
    <i class="fas fa-arrow-left"></i> Voltar
</a>
</body>
</html>
