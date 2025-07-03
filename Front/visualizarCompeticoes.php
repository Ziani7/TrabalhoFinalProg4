<?php
session_start();
include_once '../Back/competicaoDAO.php';

if (!isset($_SESSION["nome"]) || empty($_SESSION["nome"])) {
    header("Location: login.html");
    exit;
}

$competicaoDAO = new competicaoDAO();
$competicoes = $competicaoDAO->vizualizar();

$nome = $_SESSION["nome"];
$email = $_SESSION["email"] ?? "";

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Competições</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="Css/estilo.css">
</head>
<body>

<div class="container" style="margin-top: 100px;">
    <div class="row">
        <div class="col-12">
            <div class="card animate-in">
                <div class="card-header">
                    <h3 class="text-center">Competições Disponíveis</h3>
                </div>
                <div class="card-body p-4">
                    <?php if (empty($competicoes)): ?>
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i>
                            Não há competições cadastradas no momento.
                        </div>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nome da Competição</th>
                                        <th>Modalidade</th>
                                        <th>Data Início</th>
                                        <th>Data Final</th>
                                        <th>Local</th>
                                        <th>Status</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($competicoes as $competicao): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($competicao['nome']) ?></td>
                                            <td><?= htmlspecialchars($competicao['modalidade']) ?></td>
                                            <td><?= date('d/m/Y', strtotime($competicao['data_inicio'])) ?></td>
                                            <td><?= date('d/m/Y', strtotime($competicao['data_final'])) ?></td>
                                            <td><?= htmlspecialchars($competicao['local']) ?></td>
                                            <td>
                                                <?php 
                                                $status_class = '';
                                                switch ($competicao['status']) {
                                                    case 'Inscrições Abertas': $status_class = 'text-success'; break;
                                                    case 'Em Breve': $status_class = 'text-warning'; break;
                                                    case 'Planejamento': $status_class = 'text-info'; break;
                                                    case 'Encerrado': $status_class = 'text-secondary'; break;
                                                }
                                                ?>
                                                <span class="<?= $status_class ?> fw-bold">
                                                    <?= htmlspecialchars($competicao['status']) ?>
                                                </span>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-primary" title="Detalhes">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <?php if (isset($_SESSION["status"]) && $_SESSION["status"] === "admin"): ?>
                                                    <a href="#" class="btn btn-sm btn-warning" title="Editar">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-sm btn-danger" title="Excluir">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Botão Voltar padronizado -->
<a href="TelaInicial.php" id="btnVoltar" class="btn btn-secondary position-fixed bottom-0 start-0 m-4 rounded-pill px-4 py-2 shadow">
    <i class="fas fa-arrow-left"></i> Voltar
</a>

</body>
</html>
