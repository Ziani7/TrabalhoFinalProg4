<?php
include_once __DIR__  . "/../Banco/Conexao.php";

class competicaoDAO
{

    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }


    function inserir($competicao)
    { $sql = "INSERT INTO competicao (id_evento,nome,modalidade, local,data_inicio, data_final,) VALUES ( :id_evento, :nome, :modalidade, :local, :data_inicio, :data_final, :ativo, :usuario_id)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(":nome", $competicao->getNome());
        $stmt->bindValue(":data_inicio", $competicao->getDataInicial());
        $stmt->bindValue(":data_final", $competicao->getDataFinal());
        $stmt->bindValue(":local", $competicao->getLocal());
        $stmt->bindValue(":organizacao", $competicao->getOrganizacao());
        $stmt->bindValue(":ativo", $competicao->getAtivo());
        $stmt->bindValue("usuario_id", $competicao->getUsuario_id());
        if ($stmt->execute()) {}

    }

}