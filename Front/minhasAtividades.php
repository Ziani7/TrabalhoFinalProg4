<?php
session_start();
require_once __DIR__ . '/../Back/atividadeDAO.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.html");
    exit;
}

$id_usuario = $_SESSION['usuario_id'];
$atividadeDAO = new atividadeDAO();
$atividades = $atividadeDAO->atividadesPorResponsavel($id_usuario);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Minhas Atividades</title>
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
                        <h3 class="text-center">Minhas Atividades (Como Responsável)</h3>
                    </div>
                    <div class="card-body p-4">
                        <?php if (empty($atividades)): ?>
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle me-2"></i>
                                Você ainda não é responsável por nenhuma atividade.
                            </div>
                        <?php else: ?>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Descrição</th>
                                            <th>Tipo</th>
                                            <th>Data</th>
                                            <th>Horário</th>
                                            <th>Local</th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($atividades as $atividade): ?>
                                            <tr>
                                                <td><?= $atividade['descricao'] ?></td>
                                                <td><?= $atividade['tipo'] ?></td>
                                                <td><?= date('d/m/Y', strtotime($atividade['data'])) ?></td>
                                                <td><?= $atividade['hora_inicio'] ?> - <?= $atividade['hora_fim'] ?></td>
                                                <td><?= $atividade['local'] ?></td>
                                                <td>
                                                    <a href="presenca.php?id_atividade=<?= $atividade['id'] ?>"
                                                        class="btn btn-sm btn-primary">
                                                        Lista de Presença
                                                    </a>
                                                    <a href="EditarAti.php?idAtividade=<?= $atividade['id'] ?>"
                                                        class="btn btn-sm btn-warning" title="Editar">
                                                        <i class="fas fa-edit"></i>
                                                    </a>

                                                     <a href="../Back/excluirAtividade.php?id=<?php echo $atividade['id']; ?>"
                                                            class="btn btn-sm btn-danger" title="Excluir"
                                                            onclick="return confirm('Tem certeza que deseja excluir este evento? Esta ação não poderá ser desfeita.');">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
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

    <a href="TelaInicial.php" id="btnVoltar" class="btn-voltar">
        <i class="fas fa-arrow-left"></i> Voltar
    </a>
</body>

</html>