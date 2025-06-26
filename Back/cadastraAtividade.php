<?php
    include_once "atividade.php";
    include_once "atividadeDAO.php";

    if(isset($_POST['button'])){
        $descricao = $_POST['descricao'];
        $nomeRes = $_POST['nomeRes'];
        $date = $_POST['date'];
        $horaInicio = $_POST['horaInicio'];
        $horaFinal = $_POST['horaFinal'];
        $local = $_POST['local'];
        $tipo = $_POST['tipo'];
        $id_evento = $_POST['id_evento'];

        $atividade = new atividade($descricao, $nomeRes, $date, $horaInicio, $horaFinal, $local, $tipo, $id_evento);
        
        $atividadeDAO = new atividadeDAO();
        $atividadeDAO->inserir($atividade);
    }
?>