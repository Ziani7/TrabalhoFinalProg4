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
public function inserir($equipe) {
    $sql = "INSERT INTO equipe (id_comp, nome) VALUES (:id_comp, :nome)";
    $stmt = $this->conexao->prepare($sql);
    $stmt->bindValue(":id_comp", $equipe->getIdComp());
    $stmt->bindValue(":nome", $equipe->getNome());

    if ($stmt->execute()) {
        header("Location: ../Front/visualizarEquipes.php?id=" . $equipe->getIdComp() . "&toast=cadastroSucesso");
        exit;
    } else {
        header("Location: ../Front/cadastrarEquipe.php?id=" . $equipe->getIdComp() . "&toast=cadastroErro");
        exit;
    }
}
public function buscarPorNomeCompeticao($id_comp, $nome) {
    try {
        $sql = "SELECT * FROM equipe WHERE id_comp = :id_comp AND nome = :nome";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(":id_comp", $id_comp);
        $stmt->bindParam(":nome", $nome);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo "Erro ao buscar equipe: " . $e->getMessage();
        return false;
    }
}


}
