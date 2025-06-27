<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastrar Atividade</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="Css/estilo.css">
    <script src="JS/validaDatas.js"></script>
    <script src="JS/buscarNome.js"></script>
</head>

<body>
    <div class="container min-vh-100 d-flex align-items-center justify-content-center">
        <div class="row w-100 justify-content-center">
            <div class="col-md-6">
                <div class="card animate-in">
                    <div class="card-header">
                        <h3 class="text-center">Cadastrar Atividade</h3>
                    </div>
                    <div class="card-body p-4">
                        <form action="../Back/cadastraAtividade.php" method="post">
                            <div class="mb-3">
                                <label for="evento" class="form-label">Evento</label>
                                <div class="input-group">
                                    <i class="fas fa-certificate input-icon"></i>
                                    <select id="evento" name="evento" class="form-control input-with-icon">
                                        <option value="">Selecione um evento</option>
                                        <?php
                                        include_once "../Back/eventoDAO.php";
                                        $eventoDAO = new eventoDAO();
                                        $eventos = $eventoDAO->getNomeEventos();
                                        foreach ($eventos as $evento):
                                            echo "<option value='{$evento['id']}'>{$evento['nome']}</option>";
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="descricao" class="form-label">Descrição da Ativadade</label>
                                <div class="input-group">
                                    <i class="fa-solid fa-file-lines input-icon"></i>
                                    <input type="text" id="descricao" class="form-control input-with-icon" name="descricao" placeholder="Descrição da Ativadade" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="cpf" class="form-label">CPF do Responsavel</label>
                                <div class="input-group">
                                    <i class="fas fa-id-card input-icon"></i>
                                    <input type="text" id="cpf" class="form-control input-with-icon" name="cpf" placeholder="CPF do Responsavel" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="nomeRes" class="form-label">Nome do Responsavel</label>
                                <div class="input-group">
                                    <i class="fa-solid fa-user input-icon"></i>
                                    <input type="text" id="nomeRes" class="form-control input-with-icon" name="nomeRes" placeholder="Nome do Responsavel" readonly>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="date" class="form-label">Data da Atividade</label>
                                <div class="input-group">
                                    <i class="fas fa-solid fa-calendar-days input-icon"></i>
                                    <input type="date" id="date" class="form-control input-with-icon" name="date" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="horaInicio" class="form-label">Hora Inicial</label>
                                <div class="input-group">
                                    <i class="fas fa-clock input-icon"></i>
                                    <input type="time" id="horaInicio" class="form-control input-with-icon" name="horaInicio" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="horaFinal" class="form-label">Hora Final</label>
                                <div class="input-group">
                                    <i class="fas fa-clock input-icon"></i>
                                    <input type="time" id="horaFinal" class="form-control input-with-icon" name="horaFinal" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="local" class="form-label">Local do Evento</label>
                                <div class="input-group">
                                    <i class="fa-solid fa-location-dot input-icon"></i>
                                    <input type="text" id="local" class="form-control input-with-icon" name="local" placeholder="Local da Atividade" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="Tipo" class="form-label">Tipo</label>
                                <div class="input-group">
                                    <i class="fas fa-certificate input-icon"></i>
                                    <select id="Tipo" name="tipo" class="form-control input-with-icon" required>
                                        <option value="">Selecione um Tipo</option>
                                        <option value="Palestra">Palestra</option>
                                        <option value="Oficina">Oficina</option>
                                    </select>
                                </div>
                            </div>


                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary" name="button">
                                    <i class="fas fa-sign-in-alt me-2"></i>
                                    Cadastrar Atividade
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