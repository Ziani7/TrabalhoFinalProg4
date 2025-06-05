<?php

session_start();

if(isset($_POST["login"])) {
    $_SESSION["nome"] = $_POST["login"];
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["foto"] = "/Front/img/default-avatar.jpg";
}

$nome = isset($_SESSION["nome"]) ? $_SESSION["nome"] : "";
$email = isset($_SESSION["email"]) ? $_SESSION["email"] : "";
$foto = isset($_SESSION["foto"]) ? $_SESSION["foto"] : "/Front/img/default-avatar.jpg";

$caminho_foto = $_SERVER["DOCUMENT_ROOT"] . $foto;

if (!file_exists($caminho_foto)) {
    $foto = "https://ui-avatars.com/api/?name=" . urlencode($nome) . "&background=0D8ABC&color=fff";
}

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
  <link rel="stylesheet" href="/Front/Css/estilo.css">
</head>
<body>
<header class="animate-in">
  <h1>EventQ</h1>
  <div class="dropdown">
    <button class="btn btn-outline-light dropdown-toggle user-dropdown-btn" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
      <img src="<?php echo $foto ?>" alt="User Avatar" class="user-avatar me-3">
      <?php echo $nome ?>
    </button>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
      <li><a class="dropdown-item" href="../Back/logout.php"><i class="fas fa-sign-out-alt me-2"></i>Sair</a></li>
    </ul>
  </div>
</header>
<section class="hero">
  <h2 class="animate-in">Bem-vindo ao EventQ!</h2>
  <p class="animate-in">EventQ é a plataforma ideal para gerenciar inscrições, programação, certificados e
    submissões</p>
</section>
<section class="content">
  <div class="card animate-in">
    <i class="fas fa-calendar-plus fa-3x mb-4 text-primary"></i>
    <h3>Crie eventos com poucos cliques</h3>
    <p>Configure seu evento em minutos. Personalize datas, categorias, submissões e formas de pagamento com
      facilidade.</p>
  </div>
  <div class="card animate-in">
    <i class="fas fa-certificate fa-3x mb-4 text-primary"></i>
    <h3>Certificados automáticos</h3>
    <p>Gere e envie certificados personalizados para participantes, palestrantes, monitores e avaliadores — sem dor
      de cabeça.</p>
  </div>
  <div class="card animate-in">
    <i class="fas fa-university fa-3x mb-4 text-primary"></i>
    <h3>Soluções para instituições</h3>
    <p>Desde pequenos encontros até grandes congressos multiárea — o EventQ é escalável e preparado para atender
      universidades, centros de pesquisa e grupos de estudo.</p>
  </div>
</section>
</body>
</html>
