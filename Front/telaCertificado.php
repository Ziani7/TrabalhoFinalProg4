<?php
session_start();
if (!isset($_SESSION["nome"])) {
    header("Location: login.html");
    exit;
}

$id_evento = $_GET['id'] ?? null;

if (!$id_evento) {
    echo "<div class='alert alert-danger'>ID do evento não fornecido.</div>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Geração de Certificados</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="Css/styles.css">
    <script src="Js/certificados.js"></script>
</head>

<body>

<div class="container" style="margin-top: 100px;">
    <div class="row">
        <div class="col-12">
            <div class="card animate-in shadow">
                <div class="card-header bg-light text-dark text-center" style="border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem;">
                    <h4><i class="fas fa-certificate me-2"></i> Gerar e Enviar Certificados</h4>
                </div>
                <div class="card-body p-4 text-center">
                    <p class="mb-4">Clique no botão abaixo para iniciar o processo de geração e envio dos certificados para os participantes do evento.</p>

                    <button class="btn btn-success px-4 py-2" onclick="gerarCertificados(<?= $id_evento ?>)">
                        <i class="fas fa-paper-plane me-2"></i> Iniciar Envio de Certificados
                    </button>

                    <div id="output" class="mt-4 text-start"
                         style="display:none; white-space: pre-wrap; background: #f9f9f9; border: 1px solid #ccc; padding: 15px; max-height: 400px; overflow-y: auto;"></div>

                </div>
            </div>
        </div>
    </div>
</div>

<a href="visualizarEventos.php" class="btn btn-secondary position-fixed bottom-0 start-0 m-4 rounded-pill px-4 py-2 shadow">
    <i class="fas fa-arrow-left"></i> Voltar
</a>

</body>
</html>
