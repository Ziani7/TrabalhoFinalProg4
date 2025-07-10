<?php
session_start();
include_once '../Back/atletaDAO.php';
include_once '../Back/equipeDAO.php';

if (!isset($_SESSION["nome"]) || empty($_SESSION["nome"])) {
    header("Location: login.html");
    exit;
}

$equipeDAO = new equipeDAO();
$atletaDAO = new atletaDAO();
$id_equipe = $_GET['id'] ?? null;

if (!$id_equipe) {
    echo "<div class='alert alert-danger'>ID da equipe não fornecido.</div>";
    exit;
}

$atletas = $atletaDAO->listarPorEquipe($id_equipe);

$nome = $_SESSION["nome"];
$email = $_SESSION["email"] ?? "";

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Equipes da Competição</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="Css/estilo.css" />
</head>

<body>
    <div class="container" style="margin-top: 100px;">
        <div class="row">
            <div class="col-12">
                <div class="card animate-in">
                    <div class="card-header">
                        <h3 class="text-center">Atletas inscritos</h3>
                    </div>
                    <div class="card-body p-4">
                        <?php if (empty($atletas)): ?>
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle me-2"></i>
                                Nenhum atleta cadastrado nessa equipe.
                            </div>
                        <?php else: ?>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nome do atleta</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($atletas as $atleta): ?>
                                            <tr>
                                                <td><?php echo ($atleta); ?></td>
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

    <a href="visualizarCompeticoes.php" class="btn-voltar">
        <i class="fas fa-arrow-left"></i> Voltar
    </a>

</body>

</html>