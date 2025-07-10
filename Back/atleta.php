<?php
class Atleta
{
    private $id_equipe;
    private $id_usuario;

    public function __construct($id_equipe = null, $id_usuario = null)
    {
        $this->id_equipe = $id_equipe;
        $this->id_usuario = $id_usuario;
    }

    public function getIdEquipe()
    {
        return $this->id_equipe;
    }

    public function setIdEquipe($id_equipe)
    {
        $this->id_equipe = $id_equipe;
    }

    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }
}
