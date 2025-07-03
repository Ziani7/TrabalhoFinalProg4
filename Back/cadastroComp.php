<?php
session_start();

<<<<<<< HEAD
include_once 'competicao.php';
include_once 'competicaoDAO.php';

if(isset($_POST['button'])){
    $id_evento = $_POST['evento'];
=======
include_once "cadastro.php";
include_once "cadastroDAO.php";

if(isset($_POST['button'])){
>>>>>>> ef409c4d189a530d799f8a22e496844f2c2997d0
    $nome = $_POST['nome'];
    $modalidade = $_POST['esporte'];
    $local = $_POST['local'];
    $data_inicio = $_POST['data_inicio'];
    $data_fim = $_POST['data_fim'];
    $status = 1;

<<<<<<< HEAD
    $competicao = new Competicao($id_evento, $nome, $modalidade, $local, $data_inicio, $data_fim, $status);
    $competicaoDAO = new competicaoDAO();
    $competicaoDAO->inserir($competicao);

}
=======
    $competicao = new Competicao($nome, $modalidade, $local, $data_inicio, $data_fim, $status);
    $competicaoDAO = new competicaoDAO();
    $competicaoDAO->inserir($competicao);
}

>>>>>>> ef409c4d189a530d799f8a22e496844f2c2997d0
