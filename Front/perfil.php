<?php
session_start();
if(!isset($_SESSION['login'])){
    header('Location: index.html');
}
?>

?><!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Atualização de Dados</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="js/validaForm.js"></script>
    <link rel="stylesheet" href="Css/styles.css">
</head>
<body>
<div class="container py-5">
    <div class="card animate-in">
        <div class="card-header">
            <h3 class="text-center">Atualização de Dados</h3>
        </div>
        <div class="card-body p-4">
            <div id="errorAlert" class="alert alert-danger d-none" role="alert">
                Ocorreu um erro na atualização. Por favor, tente novamente.
            </div>
            <form action="../Back/editaUsuario.php" method="post" enctype="multipart/form-data">
                <div class="row mb-4">
                    <div class="col-md-4">
                        <label for="nome" class="form-label">Nome completo</label>
                        <div class="input-group">
                            <i class="fas fa-user input-icon"></i>
                            <input type="text" class="form-control input-with-icon" id="nome" name="nome" value="<?php echo $_SESSION['nome']?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="cpf" class="form-label">CPF</label>
                        <div class="input-group">
                            <i class="fas fa-id-card input-icon"></i>
                            <input type="text" class="form-control input-with-icon" id="cpf" name="cpf" value="<?php echo $_SESSION['cpf']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group">
                            <i class="fas fa-envelope input-icon"></i>
                            <input type="email" class="form-control input-with-icon" id="email" name="email" value="<?php echo $_SESSION['email']?>" required>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="login" class="form-label">Login</label>
                        <div class="input-group">
                            <i class="fas fa-at input-icon"></i>
                            <input type="text" class="form-control input-with-icon" id="login" name="login" value="<?php echo $_SESSION['login']?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="senha" class="form-label">Senha</label>
                        <div class="input-group">
                            <i class="fas fa-lock input-icon"></i>
                            <input type="text" class="form-control input-with-icon" id="senha" name="senha" value="<?php echo $_SESSION['senha']?>" required>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-12">
                        <label for="avatar" class="form-label">Avatar</label>
                        <div class="input-group">
                            <i class="fas fa-upload input-icon"></i>
                            <input type="file" class="form-control input-with-icon" id="avatar" name="avatar">
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-12 d-flex justify-content-end gap-2">
                        <button type="submit" class="btn btn-primary" name="button">
                            <i class="fas fa-save me-2"></i>Atualizar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <a href="TelaInicial.php" id="btnVoltar"
       class="btn btn-secondary position-fixed bottom-0 start-0 m-4 rounded-pill px-4 py-2 shadow">
        <i class="fas fa-arrow-left"></i> Voltar
    </a>
</div>
</body>
</html>