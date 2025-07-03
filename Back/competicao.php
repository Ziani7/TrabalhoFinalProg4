<?php

class Competicao
{
    private $id;
    private $id_evento;
    private $nome;
    private $local;
    private $modalidade;
    private $data_inicio;
    private $data_final;
    private $status;

    public function __construct($id_evento = null, $nome = null, $local = null, $modalidade = null, $data_inicio = null, $data_final = null, $status = null)
    {
        $this->id_evento = $id_evento;
        $this->nome = $nome;
        $this->local = $local;
        $this->modalidade = $modalidade;
        $this->data_inicio = $data_inicio;
        $this->data_final = $data_final;
        $this->status = $status;
    }

    // ID
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }

    // ID Evento
    public function getIdEvento() {
        return $this->id_evento;
    }
    public function setIdEvento($id_evento) {
        $this->id_evento = $id_evento;
    }

    // Nome
    public function getNome() {
        return $this->nome;
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }

    // Local
    public function getLocal() {
        return $this->local;
    }
    public function setLocal($local) {
        $this->local = $local;
    }

    // Modalidade
    public function getModalidade() {
        return $this->modalidade;
    }
    public function setModalidade($modalidade) {
        $this->modalidade = $modalidade;
    }

    // Data Início
    public function getDataInicio() {
        return $this->data_inicio;
    }
    public function setDataInicio($data_inicio) {
        $this->data_inicio = $data_inicio;
    }

    // Data Final
    public function getDataFinal() {
        return $this->data_final;
    }
    public function setDataFinal($data_final) {
        $this->data_final = $data_final;
    }

    // Status
    public function getStatus() {
        return $this->status;
    }
    public function setStatus($status) {
        $this->status = $status;
    }
}
