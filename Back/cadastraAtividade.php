<?php
include_once "atividade.php";
include_once "atividadeDAO.php";


    if(isset($_POST['button'])){
        $atividadeDAO = new atividadeDAO();
        $descricao = $_POST['descricao'];
        $cpf = $_POST['cpf'];
        $nomeRes = $_POST['nomeRes'];
        $date = $_POST['date'];
        $horaInicio = $_POST['horaInicio'];
        $horaFinal = $_POST['horaFinal'];
        $local = $_POST['local'];
        $tipo = $_POST['tipo'];
        $id_evento = $_POST['evento'];
        $id_responsavel = $atividadeDAO->busca_IdResponsavel($cpf);

        $atividade = new atividade($descricao, $nomeRes, $date, $horaInicio, $horaFinal, $local, $tipo, $id_evento, $id_responsavel);


        $atividadeDAO->inserir($atividade);
    }
?>
