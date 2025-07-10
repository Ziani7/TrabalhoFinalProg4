<?php
session_start();
include_once '../Back/atividadeDAO.php';

if (!isset($_SESSION["nome"]) || empty($_SESSION["nome"])) {
    header("Location: login.html");
    exit;
}

$atividadeDAO = new atividadeDAO();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao'])) {
    $acao = $_POST['acao'];
    $id_usuario = $_SESSION['usuario_id'] ?? null;
    $id_atividade = $_POST['id_atividade'] ?? null;
    $id_evento = $_POST['id_evento'] ?? null;

    if ($id_usuario && $id_atividade && $id_evento) {
        if ($acao === 'desinscrever') {
            $sucesso = $atividadeDAO->desinscrever($id_usuario, $id_atividade);
        } elseif ($acao === 'inscrever') {
            $sucesso = $atividadeDAO->inscrever($id_usuario, $id_atividade);
        }

        if (isset($sucesso) && $sucesso) {
            header("Location: visualizarAtividades.php?id=" . $id_evento);
            exit;
        } else {
            $erroMensagem = "Erro ao processar a inscrição.";
        }
    } else {
        $erroMensagem = "Dados insuficientes para processar.";
    }
}

$id_evento = $_GET['id'] ?? null;

if (!$id_evento) {
    echo "<div class='alert alert-danger'>ID do evento não fornecido.</div>";
    exit;
}

$atividades = $atividadeDAO->vizualizar($id_evento);

$nome = $_SESSION["nome"];
$email = $_SESSION["email"] ?? "";

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Visualizar Atividades</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="Css/styles.css" />
</head>

<body>
    <div class="container" style="margin-top: 100px;">
        <?php if (isset($erroMensagem)): ?>
            <div class="alert alert-danger"><?php echo ($erroMensagem); ?></div>
        <?php endif; ?>

        <div class="row">
            <div class="col-12">
                <div class="card animate-in">
                    <div class="card-header">
                        <h3 class="text-center">Atividades Disponíveis</h3>
                    </div>
                    <div class="card-body p-4">
                        <?php if (empty($atividades)): ?>
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle me-2"></i>
                                Não há atividades cadastradas no momento.
                            </div>
                        <?php else: ?>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nome da Atividade</th>
                                            <th>Tipo da Atividade</th>
                                            <th>Data</th>
                                            <th>Horário</th>
                                            <th>Responsável</th>
                                            <th>Local</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($atividades as $atividade): ?>
                                            <tr>
                                                <td><?php echo ($atividade['descricao']); ?></td>
                                                <td><?php echo ($atividade['tipo']); ?></td>
                                                <td><?php echo date('d/m/Y', strtotime($atividade['data'])); ?></td>
                                                <td><?php echo ($atividade['hora_inicio'] . ' - ' . $atividade['hora_fim']); ?></td>
                                                <td><?php echo ($atividade['nome_responsavel'] ?? 'Não informado'); ?></td>
                                                <td><?php echo ($atividade['local']); ?></td>
                                                <td>
                                                    <?php if ($atividadeDAO->verificaInscricao($_SESSION['usuario_id'], $atividade['id'])): ?>
                                                        <form method="post" style="display:inline;">
                                                            <input type="hidden" name="acao" value="desinscrever" />
                                                            <input type="hidden" name="id_atividade" value="<?php echo $atividade['id']; ?>" />
                                                            <input type="hidden" name="id_evento" value="<?php echo $id_evento; ?>" />
                                                            <button type="submit" class="btn btn-sm btn-danger" title="Cancelar inscrição">Cancelar inscrição</button>
                                                        </form>
                                                    <?php else: ?>
                                                        <form method="post" style="display:inline;">
                                                            <input type="hidden" name="acao" value="inscrever" />
                                                            <input type="hidden" name="id_atividade" value="<?php echo $atividade['id']; ?>" />
                                                            <input type="hidden" name="id_evento" value="<?php echo $id_evento; ?>" />
                                                            <button type="submit" class="btn btn-sm btn-success" title="Inscrever-se">Inscrever-se</button>
                                                        </form>
                                                    <?php endif; ?>

                                                    <?php if (isset($_SESSION["status"]) && $_SESSION["status"] === "admin"): ?>
                                                        <a href="#" class="btn btn-sm btn-warning" title="Editar">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="#" class="btn btn-sm btn-danger" title="Excluir">
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
