<?php
session_start();
include_once '../Back/eventoDAO.php';
if (!isset($_SESSION["nome"]) || empty($_SESSION["nome"])) {
    header("Location: login.html");
    exit;
}
$eventoDAO = new eventoDAO();
$eventos = $eventoDAO->vizualizar();
$nome = $_SESSION["nome"];
$email = isset($_SESSION["email"]) ? $_SESSION["email"] : "";

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Eventos</title>
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
                        <h3 class="text-center">Eventos Disponíveis</h3>
                    </div>
                    <div class="card-body p-4">
                        <?php if (empty($eventos)): ?>
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle me-2"></i>
                                Não há eventos cadastrados no momento.
                            </div>
                        <?php else: ?>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>

                                           <th>Nome do Evento</th>
                                            <th>Organizador</th>
                                            <th>Data de Início</th>
                                            <th>Data de Término</th>
                                            <th>Local</th>
                                            <th>Ações</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($eventos as $evento): ?>
                                            <tr>
                                                <td><?php echo $evento['nome']; ?></td>
                                                <td><?php echo $evento['organizacao']; ?></td>
                                                <td><?php echo date('d/m/Y', strtotime($evento['data_inicio'])); ?></td>
                                                <td><?php echo date('d/m/Y', strtotime($evento['data_final'])); ?></td>
                                                <td><?php echo $evento['local']; ?></td>
                                                <td>
                                                    <a href="visualizarAtividades.php?id=<?php echo $evento['id']; ?>"
                                                        class="btn btn-sm btn-primary" title="Detalhes">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <?php if ($evento['usuario_id']==$_SESSION["usuario_id"]): ?>
                                                        <a href="Editareve.php?id=<?php echo $evento['id']; ?>"
                                                            class="btn btn-sm btn-warning" title="Editar">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="../Back/excluirEvento.php?id=<?php echo $evento['id']; ?>"
                                                            class="btn btn-sm btn-danger" title="Excluir"
                                                            onclick="return confirm('Tem certeza que deseja excluir este evento? Esta ação não poderá ser desfeita.');">
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

    <a href="TelaInicial.php" id="btnVoltar"
       class="btn btn-secondary position-fixed bottom-0 start-0 m-4 rounded-pill px-4 py-2 shadow">
        <i class="fas fa-arrow-left"></i> Voltar
    </a>

</body>

</html>