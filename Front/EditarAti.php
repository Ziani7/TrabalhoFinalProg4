<?php
session_start();
include_once '../Back/atividadeDAO.php';
include_once '../Back/usuarioDAO.php';

if(!isset($_GET['idAtividade']) || empty($_GET['idAtividade'])){
    header("Location: minhasAtividades.php?erro=semId");
    exit;
}

$idAtividade = $_GET["idAtividade"];

$atividadeDAO = new atividadeDAO();
$atividade = $atividadeDAO->buscarPorId($idAtividade);

if(!$atividade){
    header("Location: minhasAtividades.php?erro=atividadeNaoEncontrada");
    exit;
}


$usuarioDAO = new usuarioDAO();
$usuario = $usuarioDAO->buscarPorId($atividade['id_responsavel']);

$cpf = $usuario ? $usuario->getCpf() : '';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Editar Atividade</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="Css/estilo.css" />
    <script src="JS/validaDatas.js"></script>
    <script src="JS/buscarNome.js"></script>
</head>
<body>
<div class="container min-vh-100 d-flex align-items-center justify-content-center">
    <div class="row w-100 justify-content-center">
        <div class="col-md-6">
            <div class="card animate-in">
                <div class="card-header">
                    <h3 class="text-center">Editar Atividade</h3>
                </div>
                <div class="card-body p-4">
                    <form action="../Back/editaAti.php" method="post">
                        <input type="hidden" name="id" value="<?php echo (int)$atividade['id']; ?>">


                        <div class="mb-3">
                            <label for="descricao" class="form-label">Nome da Atividade</label>
                            <div class="input-group">
                                <i class="fa-solid fa-file-lines input-icon"></i>
                                <input type="text" id="descricao" class="form-control input-with-icon" name="descricao" required
                                       value="<?php echo htmlspecialchars($atividade['descricao']); ?>">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="cpf" class="form-label">CPF do Responsável</label>
                            <div class="input-group">
                                <i class="fas fa-id-card input-icon"></i>
                                <input type="text" id="cpf" class="form-control input-with-icon" name="cpf" required
                                          value="<?php echo($cpf); ?>">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="nomeRes" class="form-label">Nome do Responsável</label>
                            <div class="input-group">
                                <i class="fa-solid fa-user input-icon"></i>
                                <input type="text" id="nomeRes" class="form-control input-with-icon" name="nomeRes" readonly
                                       value="<?php echo htmlspecialchars($atividade['responsavel']); ?>">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="date" class="form-label">Data da Atividade</label>
                            <div class="input-group">
                                <i class="fas fa-solid fa-calendar-days input-icon"></i>
                                <input type="date" id="date" class="form-control input-with-icon" name="date" required
                                       value="<?php echo date('Y-m-d', strtotime($atividade['data'])); ?>">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="horaInicio" class="form-label">Hora Inicial</label>
                            <div class="input-group">
                                <i class="fas fa-clock input-icon"></i>
                                <input type="time" id="horaInicio" class="form-control input-with-icon" name="horaInicio" required
                                       value="<?php echo substr($atividade['hora_inicio'], 0, 5); ?>">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="horaFinal" class="form-label">Hora Final</label>
                            <div class="input-group">
                                <i class="fas fa-clock input-icon"></i>
                                <input type="time" id="horaFinal" class="form-control input-with-icon" name="horaFinal" required
                                       value="<?php echo substr($atividade['hora_fim'], 0, 5); ?>">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="local" class="form-label">Local da Atividade</label>
                            <div class="input-group">
                                <i class="fa-solid fa-location-dot input-icon"></i>
                                <input type="text" id="local" class="form-control input-with-icon" name="local" required
                                       value="<?php echo htmlspecialchars($atividade['local']); ?>">
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary" name="button">
                                <i class="fas fa-save me-2"></i>
                                Editar Atividade
                            </button>
                        </div>
                    </form>
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
