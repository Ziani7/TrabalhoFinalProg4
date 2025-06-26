<?php
class Atividade
{
    private $id;
    private $descricao;
    private $responsavel;
    private $data;
    private $hora_inicio;
    private $hora_fim;
    private $local;
    private $tipo;
    private $id_evento;

    public function __construct($descricao, $responsavel, $data, $hora_inicio, $hora_fim, $local, $tipo, $id_evento)
    {
        $this->descricao = $descricao;
        $this->responsavel = $responsavel;
        $this->data = $data;
        $this->hora_inicio = $hora_inicio;
        $this->hora_fim = $hora_fim;
        $this->local = $local;
        $this->tipo = $tipo;
        $this->id_evento = $id_evento;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getResponsavel()
    {
        return $this->responsavel;
    }

    public function setResponsavel($responsavel)
    {
        $this->responsavel = $responsavel;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function getHoraInicio()
    {
        return $this->hora_inicio;
    }

    public function setHoraInicio($hora_inicio)
    {
        $this->hora_inicio = $hora_inicio;
    }

    public function getHoraFim()
    {
        return $this->hora_fim;
    }

    public function setHoraFim($hora_fim)
    {
        $this->hora_fim = $hora_fim;
    }

    public function getLocal()
    {
        return $this->local;
    }

    public function setLocal($local)
    {
        $this->local = $local;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function getIdEvento()
    {
        return $this->id_evento;
    }

    public function setIdEvento($id_evento)
    {
        $this->id_evento = $id_evento;
    }
}
