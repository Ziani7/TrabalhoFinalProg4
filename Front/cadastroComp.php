<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Competição</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="Css/estilo.css">
    <script src="JS/addTimes.js" ></script>
    <script src="JS/validaDatas.js"></script>

</head>
<body>
<div class="container min-vh-100 d-flex align-items-center justify-content-center">
    <div class="row w-100 justify-content-center">
        <div class="col-md-6">
            <div class="card animate-in">
                <div class="card-header">
                    <h3 class="text-center">Cadastro de Competição Esportiva</h3>
                </div>

                <div class="card-body p-4">
                    <form action="../Back/cadastroComp" method="post">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome da competição</label>
                            <div class="input-group">
                                <i class="fas fa-trophy input-icon"></i>
                                <input type="text" id="nome" class="form-control input-with-icon" name="nome" placeholder="Nome da competição" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="esporte" class="form-label">Esporte</label>
                            <div class="input-group">
                                <i class="fas fa-basketball-ball input-icon"></i>
                                <input type="text" id="esporte" class="form-control input-with-icon" name="esporte" placeholder="Tipo de esporte" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="local" class="form-label">Local</label>
                            <div class="input-group">
                                <i class="fas fa-map-marker-alt input-icon"></i>
                                <input type="text" id="local" class="form-control input-with-icon" name="local" placeholder="Local da competição" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="data_inicio" class="form-label">Data de início</label>
                            <div class="input-group">
                                <i class="fas fa-calendar-alt input-icon"></i>
                                <input type="date" id="data_inicio" class="form-control input-with-icon" name="data_inicio" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="data_fim" class="form-label">Data de término</label>
                            <div class="input-group">
                                <i class="fas fa-calendar-alt input-icon"></i>
                                <input type="date" id="data_fim" class="form-control input-with-icon" name="data_fim" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Times Participantes</label>
                            <div id="timesContainer">
                                <div class="input-group mb-2">
                                    <i class="fas fa-team input-icon"></i>
                                    <input type="text" class="form-control input-with-icon" name="times[]" placeholder="Nome do time" required>
                                </div>
                            </div>

                            <button type="button" class="btn btn-secondary w-100 mb-3" onclick="adicionarTime()">
                                <i class="fas fa-plus me-2"></i>Adicionar mais times
                            </button>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Cadastrar Competição
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<a href="TelaInicial.php" class="btn-voltar">
    <i class="fas fa-arrow-left"></i> Voltar
</a>
</body>
</html>