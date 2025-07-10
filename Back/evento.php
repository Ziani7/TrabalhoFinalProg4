<?php

class Evento {

    private $id;
    private $organizacao;
    private $nome;
    private $dataInicial;
    private $dataFinal;
    private $local;
    private $ativo;
    private $carga_horaria;
    private $presenca;
    private $usuario_id;

    public function __construct($organizacao, $nome, $presenca, $carga_horaria, $dataInicial, $dataFinal, $local, $ativo, $usuario_id) {
        $this->organizacao = $organizacao;
        $this->nome = $nome;
        $this->carga_horaria = $carga_horaria;
        $this->presenca = $presenca;
        $this->dataInicial = $dataInicial;
        $this->dataFinal = $dataFinal;
        $this->local = $local;
        $this->ativo = $ativo;
        $this->usuario_id = $usuario_id;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

     public function getOrganizacao() {
        return $this->organizacao;
    }

    public function setOrganizacao($organizacao) {
        $this->organizacao = $organizacao;
    }

     public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }
    public function getCarga_horaria() {
        return $this->carga_horaria;
    }
    public function setCarga_horaria($carga_horaria) {
        $this->carga_horaria = $carga_horaria;
    }
    public function getPresenca() {
        return $this->presenca;
    }
    public function setPresenca($presenca) {
        $this->presenca = $presenca;
    }

     public function getDataInicial() {
        return $this->dataInicial;
    }

    public function setDataInicial($dataInicial) {
        $this->dataInicial = $dataInicial;
    }

     public function getDataFinal() {
        return $this->dataFinal;
    }

    public function setDataFinal($dataFinal) {
        $this->dataFinal = $dataFinal;
    }

     public function getLocal() {
        return $this->local;
    }

    public function setLocal($local) {
        $this->local = $local;
    }

     public function getAtivo() {
        return $this->ativo;
    }

    public function setAtivo($ativo) {
        $this->ativo = $ativo;
    }

     public function getUsuario_id() {
        return $this->usuario_id;
    }

    public function setUsuario_id($usuario_id) {
        $this->usuario_id = $usuario_id;
    }
}

?>