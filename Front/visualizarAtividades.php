<?php
session_start();
include_once '../Back/atividadeDAO.php';

if(!isset($_SESSION["nome"]) || empty($_SESSION["nome"])) {
    header("Location: login.html");
    exit;
}

$id_evento = $_GET['id'];
$atividadeDAO = new atividadeDAO();
$atividades = $atividadeDAO->vizualizar($id_evento);

$nome = $_SESSION["nome"];
$email = isset($_SESSION["email"]) ? $_SESSION["email"] : "";

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Atividades</title>
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
                    <h3 class="text-center">Atividades Disponíveis</h3>
                </div>
                <div class="card-body p-4">
                    <?php if (empty($atividades)): ?>
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i>
                            Não há atividades cadastradas no momento.
                        </div>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nome da Atividade</th>
                                        <th>Tipo da Atividade</th>
                                        <th>Data</th>
                                        <th>Horário</th>
                                        <th>Responsável</th>
                                        <th>Local</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($atividades as $atividade): ?>
                                        <tr>
                                            <td><?php echo $atividade['descricao']; ?></td>
                                            <td><?php echo $atividade['tipo']; ?></td>
                                            <td><?php echo date('d/m/Y', strtotime($atividade['data'])); ?></td>
                                            <td><?php echo $atividade['hora_inicio'] . ' - ' . $atividade['hora_fim']; ?></td>
                                            <td><?php echo $atividade['responsavel']; ?></td>
                                            <td><?php echo $atividade['local']; ?></td>
                                            <td>
                                                <?php if($atividadeDAO->verificaInscricao($_SESSION['usuario_id'], $atividade['id'])): ?>
                                                    <button class="btn btn-sm btn-secondary" disabled title="Inscrito">
                                                        Inscrito
                                                    </button>
                                                <?php else: ?>
                                                    <a href="../Back/matriculaAtividade.php?id_usuario=<?php echo $_SESSION['usuario_id']; ?>&id_atividade=<?php echo $atividade['id']; ?>&id_evento=<?php echo $id_evento; ?>" class="btn btn-sm btn-success" title="Inscrever-se">
                                                        Inscrever-se
                                                    </a>
                                                <?php endif; ?>
                                                <?php if(isset($_SESSION["status"]) && $_SESSION["status"] == "admin"): ?>
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

<a href="visualizarEventos.php" id="btnVoltar" class="btn-voltar">
    <i class="fas fa-arrow-left"></i> Voltar
</a>
</body>
</html>
