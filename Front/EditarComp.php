<?php
session_start();
include_once "../Back/competicaoDAO.php";
include_once "../Back/eventoDAO.php";

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: visualizarCompeticoes.php?erro=semId");
    exit;
}

$idCompeticao = $_GET['id'];

$competicaoDAO = new competicaoDAO();
$competicao = $competicaoDAO->buscarporId($idCompeticao);

if (!$competicao) {
    header("Location: visualizarCompeticoes.php?erro=eventoNaoEncontrado");
    exit;
}

$eventoDAO = new eventoDAO();
$eventos = $eventoDAO->getNomeEventos($_SESSION["usuario_id"]);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Competição</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="Css/styles.css">
    <script src="JS/validaDatas.js"></script>
</head>

<body>

    <div class="container" style="margin-top: 80px; max-width: 600px;">
        <div class="card p-4 animate-in">
            <div class="card-header text-center">
                <h3>Editar Competição</h3>
            </div>
            <div class="card-body">
                <form action="../Back/editaComp.php" method="post">
                    <input type="hidden" name="id" value="<?php echo (int) $competicao['id']; ?>">
                    <input type="hidden" name="status" value="<?php echo ($competicao['status']); ?>">

                    <div class="mb-3">
                        <label for="evento" class="form-label">Evento</label>
                        <div class="input-group">
                            <i class="fas fa-certificate input-icon"></i>
                            <select id="evento" name="evento" class="form-control input-with-icon" required>
                                <?php foreach ($eventos as $evento): ?>
                                    <option value="<?= $evento['id'] ?>" <?= ($evento['id'] == $competicao['id_evento']) ? 'selected' : '' ?>>
                                        <?= ($evento['nome']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select readonly>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome da Competição</label>
                        <div class="input-group">
                            <i class="fas fa-trophy input-icon"></i>
                            <input type="text" id="nome" class="form-control input-with-icon" name="nome"
                                value="<?= ($competicao['nome']); ?>" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="modalidade" class="form-label">Modalidade (Esporte)</label>
                        <div class="input-group">
                            <i class="fas fa-basketball-ball input-icon"></i>
                            <input type="text" id="modalidade" class="form-control input-with-icon" name="modalidade"
                                value="<?= ($competicao['modalidade']); ?>" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="local" class="form-label">Local da Competição</label>
                        <div class="input-group">
                            <i class="fas fa-map-marker-alt input-icon"></i>
                            <input type="text" id="local" class="form-control input-with-icon" name="local"
                                value="<?= ($competicao['local']); ?>" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="dateInicio" class="form-label">Data de Início</label>
                        <div class="input-group">
                            <i class="fas fa-calendar-alt input-icon"></i>
                            <input type="date" id="dateInicio" class="form-control input-with-icon" name="data_inicio"
                                value="<?= date('Y-m-d', strtotime($competicao['data_inicio'])); ?>" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="dateFinal" class="form-label">Data de Término</label>
                        <div class="input-group">
                            <i class="fas fa-calendar-alt input-icon"></i>
                            <input type="date" id="dateFinal" class="form-control input-with-icon" name="data_fim"
                                value="<?= date('Y-m-d', strtotime($competicao['data_final'])); ?>" required>
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save me-2"></i>Salvar Alterações
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <a href="visualizarCompeticoes.php" id="btnVoltar"
        class="btn btn-secondary position-fixed bottom-0 start-0 m-4 rounded-pill px-4 py-2 shadow">
        <i class="fas fa-arrow-left"></i> Voltar
    </a>

</body>

</html>