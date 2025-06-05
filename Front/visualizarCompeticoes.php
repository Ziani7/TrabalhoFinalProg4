<?php
session_start();

if(!isset($_SESSION["nome"]) || empty($_SESSION["nome"])) {
    header("Location: login.html");
    exit;
}

$nome = $_SESSION["nome"];
$email = isset($_SESSION["email"]) ? $_SESSION["email"] : "";
$foto = isset($_SESSION["foto"]) ? $_SESSION["foto"] : "/img/img.png";

$caminho_foto = $_SERVER["DOCUMENT_ROOT"] . $foto;

if (!file_exists($caminho_foto)) {
    $foto = "https://ui-avatars.com/api/?name=" . urlencode($nome) . "&background=0D8ABC&color=fff";
}

$competicoes = [
    [
        'id' => 1,
        'nome' => 'Torneio de Programação',
        'data' => '2023-11-16',
        'hora_inicio' => '13:00',
        'hora_fim' => '18:00',
        'categoria' => 'Equipes',
        'local' => 'Laboratório Central',
        'status' => 'Inscrições Abertas'
    ],
    [
        'id' => 2,
        'nome' => 'Hackathon de Inovação',
        'data' => '2023-12-10',
        'hora_inicio' => '09:00',
        'hora_fim' => '21:00',
        'categoria' => 'Equipes',
        'local' => 'Centro de Tecnologia',
        'status' => 'Em Breve'
    ],
    [
        'id' => 3,
        'nome' => 'Olimpíada de Robótica',
        'data' => '2024-01-15',
        'hora_inicio' => '10:00',
        'hora_fim' => '16:00',
        'categoria' => 'Individual/Equipes',
        'local' => 'Ginásio Poliesportivo',
        'status' => 'Planejamento'
    ]
];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Competições</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/Front/Css/estilo.css">
</head>
<body>

<div class="container" style="margin-top: 100px;">
    <div class="row">
        <div class="col-12">
            <div class="card animate-in">
                <div class="card-header">
                    <h3 class="text-center">Competições Disponíveis</h3>
                </div>
                <div class="card-body p-4">
                    <?php if (empty($competicoes)): ?>
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i>
                            Não há competições cadastradas no momento.
                        </div>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nome da Competição</th>
                                        <th>Data</th>
                                        <th>Horário</th>
                                        <th>Categoria</th>
                                        <th>Local</th>
                                        <th>Status</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($competicoes as $competicao): ?>
                                        <tr>
                                            <td><?php echo $competicao['nome']; ?></td>
                                            <td><?php echo date('d/m/Y', strtotime($competicao['data'])); ?></td>
                                            <td><?php echo $competicao['hora_inicio'] . ' - ' . $competicao['hora_fim']; ?></td>
                                            <td><?php echo $competicao['categoria']; ?></td>
                                            <td><?php echo $competicao['local']; ?></td>
                                            <td>
                                                <?php 
                                                $status_class = '';
                                                switch($competicao['status']) {
                                                    case 'Inscrições Abertas':
                                                        $status_class = 'text-success';
                                                        break;
                                                    case 'Em Breve':
                                                        $status_class = 'text-warning';
                                                        break;
                                                    case 'Planejamento':
                                                        $status_class = 'text-info';
                                                        break;
                                                    case 'Encerrado':
                                                        $status_class = 'text-secondary';
                                                        break;
                                                }
                                                ?>
                                                <span class="<?php echo $status_class; ?> fw-bold">
                                                    <?php echo $competicao['status']; ?>
                                                </span>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-primary" title="Detalhes">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <?php if(isset($_SESSION["status"]) && $_SESSION["status"] == "admin"): ?>
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

<a href="TelaInicial.php" id="btnVoltar" class="btn-voltar">
    <i class="fas fa-arrow-left"></i> Voltar
</a>

<style>
    .active {
        color: #0095FF !important;
        font-weight: bold;
    }
    
    .table {
        margin-bottom: 0;
    }
    
    .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
        border-radius: 0.2rem;
    }
</style>
</body>
</html>