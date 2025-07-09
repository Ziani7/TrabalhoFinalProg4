<?php

class Competicao
{
    private $id;

    private $id_evento;

    private $nome;

    private $modalidade;

    private $local;

    private $data_inicio;

    private $data_final;

    private $status;



public function __construct($id, $id_evento, $nome, $modalidade, $local, $data_inicio, $data_final, $status){
    $this->id = $id;
    $this->id_evento = $id_evento;
    $this->nome = $nome;
    $this->modalidade = $modalidade;
    $this->local = $local;
    $this->data_inicio = $data_inicio;
    $this->data_final = $data_final;
    $this->status = $status;
}

public function getId(){
    return $this->id;
}
public function setId($id){
    $this->id = $id;
}

public function getIdEvento(){
    return $this->id_evento;
}
public function setIdEvento($id_evento){
    $this->id_evento = $id_evento;
}

// Getter e Setter para nome
public function getNome(){
    return $this->nome;
}
public function setNome($nome){
    $this->nome = $nome;
}

public function getModalidade(){
    return $this->modalidade;
}
public function setModalidade($modalidade){
    $this->modalidade = $modalidade;
}

public function getLocal(){
    return $this->local;
}
public function setLocal($local){
    $this->local = $local;
}

public function getDataInicio(){
    return $this->data_inicio;
}
public function setDataInicio($data_inicio){
    $this->data_inicio = $data_inicio;
}

public function getDataFinal(){
    return $this->data_final;
}
public function setDataFinal($data_final){
    $this->data_final = $data_final;
}

public function getStatus(){
    return $this->status;
}
public function setStatus($status){
    $this->status = $status;
}
}