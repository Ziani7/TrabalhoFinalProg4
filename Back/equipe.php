<?php
class Equipe {
    private $id;
    private $id_comp;
    private $nome;

    public function __construct($id_comp, $nome, $id = null) {
        $this->id = $id;
        $this->id_comp = $id_comp;
        $this->nome = $nome;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getIdComp() {
        return $this->id_comp;
    }

    public function getNome() {
        return $this->nome;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setIdComp($id_comp) {
        $this->id_comp = $id_comp;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }
}
?>
