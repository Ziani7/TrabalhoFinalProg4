<?php

class Evento {

    private $id;
    private $organizacao;
    private $nome;
    private $dataInicial;
    private $dataFinal;
    private $local;

    public function __construct($organizacao, $nome, $dataInicial, $dataFinal, $local) {
        $this->organizacao = $organizacao;
        $this->nome = $nome;
        $this->dataInicial = $dataInicial;
        $this->dataFinal = $dataFinal;
        $this->local = $local;
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
}

?>