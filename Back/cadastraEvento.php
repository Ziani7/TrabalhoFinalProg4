<?php
    include_once "evento.php";
    include_once "eventoDAO.php";

    if(isset($_POST['button'])){
        $organizacao = $_POST['organizacao'];
        $nomeEve = $_POST['nomeEve'];
        $dateInicio = $_POST['dateInicio'];
        $dateFinal = $_POST['dateFinal'];
        $local = $_POST['local'];

        $evento = new Evento($organizacao, $nomeEve, $dateInicio, $dateFinal, $local);

        $eventoDAO = new eventoDAO();
        $eventoDAO->inserir($evento);

    }
?>