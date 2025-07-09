<?php
include_once __DIR__ . "/../Banco/Conexao.php";

class equipeDAO
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    public function listarPorCompeticao($id_comp)
    {
        $sql = "SELECT * FROM equipe WHERE id_comp = :id_comp";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(":id_comp", $id_comp, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
