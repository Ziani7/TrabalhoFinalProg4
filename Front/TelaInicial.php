<?php
session_start();
require_once __DIR__ . '/../Back/atividadeDAO.php';
require_once __DIR__ . '/../Back/eventoDAO.php';
$nome = isset($_SESSION["nome"]) ? $_SESSION["nome"] : "";
$email = isset($_SESSION["email"]) ? $_SESSION["email"] : "";
$foto = isset($_SESSION["foto"]) ? $_SESSION["foto"] : "";
$status = isset($_SESSION["cargo"]) ? $_SESSION["cargo"] : "";
$id_usuario = isset($_SESSION["usuario_id"]) ? $_SESSION["usuario_id"]:"";
if (empty($foto)) {
  $foto = "https://ui-avatars.com/api/?name=" . urlencode($nome) . "&background=0D8ABC&color=fff";
} else {
    if (strpos($foto, 'http') !== 0 && strpos($foto, '/') !== 0) {
    } else {
        $caminho_foto = $_SERVER["DOCUMENT_ROOT"] . $foto;
        echo $caminho_foto;
        if (!file_exists($caminho_foto)) {
            $foto = "https://ui-avatars.com/api/?name=" . urlencode($nome) . "&background=0D8ABC&color=fff";        
        }
    }
}
    $atividadeDAO = new atividadeDAO();
    $temAtividadesResponsavel = $atividadeDAO->existeAtividadeResponsavel($id_usuario);
    $eventoDAO = new eventoDAO();
    $temEvento = $eventoDAO->existeEventoDono($id_usuario);

if(empty($nome)) {
    header("Location: login.html");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página Inicial</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="Css/styles.css">
</head>
<body>
<header class="animate-in">
    <h1>EventQ</h1>
    <nav>
        <ul>
            <li><a href="visualizarEventos.php"><i class="fas fa-calendar me-2"></i>Visualizar Eventos</a></li>
            <li><a href="visualizarCompeticoes.php"><i class="fas fa-trophy me-2"></i>Visualizar Competições</a></li>
            <?php if($status == "admin"): ?>
            <li><a href="visualizarTodasAtividades.php"><i class="fas fa-clipboard-list me-2"></i>Visualizar Todas Atividades</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <div class="dropdown">
        <button class="btn btn-outline-light dropdown-toggle user-dropdown-btn" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="<?php echo $foto ?>" alt="User Avatar" class="user-avatar me-3">
            <?php echo $nome ?>
        </button>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
            <li><a class="dropdown-item" href="perfil.php?id_usuario=<?php echo $_SESSION['usuario_id'];?>"><i class="fas fa-user me-2"></i>Meu Perfil</a></li>
            <?php if ($temAtividadesResponsavel): ?>
                <li><a class="dropdown-item" href="minhasAtividades.php"><i class="fas fa-clipboard-list me-2"></i>Minhas Atividades</a></li>
            <?php endif; ?>
            <?php if ($temEvento): ?>
                <li><a class="dropdown-item" href="meusEventos.php"><i class="fas fa-tasks me-2"></i>Meus Eventos</a></li>
            <?php endif; ?>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../Back/logout.php"><i class="fas fa-sign-out-alt me-2"></i>Sair</a></li>
        </ul>
    </div>
</header>
<section class="hero">
    <h2 class="animate-in">Bem-vindo ao EventQ!</h2>
    <p class="animate-in">EventQ é a plataforma ideal para gerenciar inscrições, programação, certificados e
        submissões</p>
</section>
<?php if($status == "organizador" || $status == "admin"): ?>
    <section class="content">
        <a href="cadastroEve.php" style="text-decoration: none; color: inherit;">
            <div class="card animate-in">
                <i class="fas fa-calendar-plus fa-3x mb-4 text-primary"></i>
                <h3>Cadastrar Evento</h3>
                <p>Dê o primeiro passo: Cadastre seu evento e comece a organizar tudo em um só lugar.</p>
            </div>
        </a>
        <a href="cadastrarAti.php" style="text-decoration: none; color: inherit;">
            <div class="card animate-in">
                <i class="fas fa-certificate fa-3x mb-4 text-primary"></i>
                <h3>Cadastrar Atividade</h3>
                <p>Adicione uma nova atividade com título, horário e responsável em poucos passos.</p>
            </div>
        </a>
        <a href="cadastroComp.php" style="text-decoration: none; color: inherit;">
            <div class="card animate-in">
                <i class="fas fa-futbol fa-3x mb-4 text-primary"></i>
                <h3>Cadastrar Competição</h3>
                <p>Cadastre uma nova competição com todas as informações necessárias para participação e avaliação.</p>
            </div>
        </a>
    </section>
<?php endif; ?>
</body>
</html>