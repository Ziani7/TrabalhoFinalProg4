<?php
session_start();

include_once "cadastro.php";
include_once "cadastroDAO.php";

if(isset($_POST['button'])){
    $nome = $_POST['nome'];
    $modalidade = $_POST['esporte'];
    $local = $_POST['local'];
    $data_inicio = $_POST['data_inicio'];
    $data_fim = $_POST['data_fim'];
    $status = 1;

    $competicao = new Competicao($nome, $modalidade, $local, $data_inicio, $data_fim, $status);
    $competicaoDAO = new competicaoDAO();
    $competicaoDAO->inserir($competicao);
}

