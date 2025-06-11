<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Evento</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="Css/estilo.css">
    <script src="JS/validaDatas.js" ></script>
</head>
<body>
<div class="container min-vh-100 d-flex align-items-center justify-content-center">
    <div class="row w-100 justify-content-center">
        <div class="col-md-6">
            <div class="card animate-in">
                <div class="card-header">
                    <h3 class="text-center">Cadastro de Evento</h3>
                </div>
                <div class="card-body p-4">
                    <form action="../Back/cadastraEvento.php" method="post">
                        <div class="mb-3">
                            <label for="organizacao" class="form-label">Organização</label>
                            <div class="input-group">
                                <i class="fas fa-building input-icon"></i>
                                <input type="text" id="organizacao" class="form-control input-with-icon" name="organizacao" placeholder="Organização do Evento">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="nomeEve" class="form-label">Nome do Evento</label>
                            <div class="input-group">
                                <i class="fas fa-solid fa-ticket input-icon"></i>
                                <input type="text" id="nomeEve" class="form-control input-with-icon" name="nomeEve" placeholder="Nome do Evento">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="dateInicio" class="form-label">Data Inicial</label>
                            <div class="input-group">
                                <i class="fas fa-solid fa-calendar-days input-icon"></i>
                                <input type="date" id="dateInicio" class="form-control input-with-icon" name="dateInicio">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="dateFinal" class="form-label">Data Final</label>
                            <div class="input-group">
                                <i class="fas fa-solid fa-calendar-days input-icon"></i>
                                <input type="date" id="dateFinal" class="form-control input-with-icon" name="dateFinal">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="local" class="form-label">Local do Evento</label>
                            <div class="input-group">
                                <i class="fa-solid fa-location-dot input-icon"></i>
                                <input type="text" id="local" class="form-control input-with-icon" name="local" placeholder="Local do Evento">
                            </div>
                        </div>



                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary" name="button">
                                <i class="fas fa-sign-in-alt me-2"></i>
                                Cadastrar Evento
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

