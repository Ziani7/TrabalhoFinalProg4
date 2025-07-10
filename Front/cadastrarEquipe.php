<?php
session_start();

if (!isset($_SESSION["nome"]) || empty($_SESSION["nome"])) {
    header("Location: login.html");
    exit;
}

$id_comp = $_GET['id'] ?? null;

if (!$id_comp) {
    echo "<div class='alert alert-danger'>ID da competição não informado.</div>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Cadastrar Equipe</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="Css/styles.css" />
</head>

<body>
    <div class="container min-vh-100 d-flex align-items-center justify-content-center">
        <div class="row w-100 justify-content-center">
            <div class="col-md-6">
                <div class="card animate-in">
                    <div class="card-header">
                        <h3 class="text-center">Cadastrar Equipe</h3>
                    </div>
                    <div class="card-body p-4">

                        <?php if (isset($_SESSION['sucesso'])): ?>
                            <div class="alert alert-success">
                                <?= $_SESSION['sucesso'];
                                unset($_SESSION['sucesso']); ?>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($_SESSION['erro'])): ?>
                            <div class="alert alert-danger">
                                <?= $_SESSION['erro'];
                                unset($_SESSION['erro']); ?>
                            </div>
                        <?php endif; ?>

                        <form action="../Back/cadastroEquipe.php" method="post">
                            <input type="hidden" name="id_comp" value="<?= $id_comp ?>" />

                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome da Equipe</label>
                                <div class="input-group">
                                    <i class="fas fa-users input-icon"></i>
                                    <input type="text" id="nome" class="form-control input-with-icon" name="nome"
                                        placeholder="Nome da equipe" required />
                                </div>
                            </div>

                            <div id="cpf-container">
                                <div class="mb-3">
                                    <label class="form-label">CPF do atleta:</label>
                                    <div class="input-group">
                                        <i class="fas fa-users input-icon"></i>
                                        <input type="text" name="cpfAtleta[]" class="form-control input-with-icon"
                                            placeholder="CPF do atleta" />
                                    </div>
                                </div>
                            </div>

                            <button type="button" class="btn btn-secondary mb-3" onclick="adicionarCampoCPF()">
                                <i class="fas fa-plus me-1"></i>Adicionar atleta
                            </button>

                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i>Cadastrar Equipe
                                </button>
                            </div>
                        </form>

                        <script>
                            function adicionarCampoCPF() {
                                const container = document.getElementById('cpf-container');
                                const novoCampo = document.createElement('div');
                                novoCampo.classList.add('mb-3');
                                novoCampo.innerHTML = `
                                                        <label class="form-label">CPF do atleta:</label>
                                                        <div class="input-group">
                                                            <i class="fas fa-users input-icon"></i>
                                                            <input type="text" name="cpfAtleta[]" class="form-control input-with-icon"
                                                                placeholder="CPF do atleta" />
                                                        </div>
                                                    `;
                                container.appendChild(novoCampo);
                            }
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <a href="visualizarCompeticoes.php?id=<?= ($id_comp) ?>" class="btn-voltar">
        <i class="fas fa-arrow-left"></i> Voltar
    </a>
</body>

</html>