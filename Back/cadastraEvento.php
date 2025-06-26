<?php
    session_start();

    include_once "evento.php";
    include_once "eventoDAO.php";

    if(isset($_POST['button'])){
        $organizacao = $_POST['organizacao'];
        $nomeEve = $_POST['nomeEve'];
        $dateInicio = $_POST['dateInicio'];
        $dateFinal = $_POST['dateFinal'];
        $local = $_POST['local'];
        $ativo = 1;
        $usuario_id = $_SESSION['usuario_id'];

        $evento = new Evento($organizacao, $nomeEve, $dateInicio, $dateFinal, $local, $ativo, $usuario_id);

        $eventoDAO = new eventoDAO();
        $eventoDAO->inserir($evento);

    }
?>