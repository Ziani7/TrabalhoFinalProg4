<?php
include_once __DIR__  . "/../Banco/Conexao.php";

class atividadeDAO
{

    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }
    function busca_IdResponsavel($cpf)
    {
        $sql = "SELECT id FROM usuario WHERE cpf = :cpf";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->execute();
        $id_responsavel = $stmt->fetch(PDO::FETCH_ASSOC);
        return $id_responsavel['id'];
    }

    function busca_IdEvento($evento)
    {
        $sql = "SELECT id FROM evento WHERE nome = :evento";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':evento', $evento);
        $stmt->execute();
        $id_evento = $stmt->fetch(PDO::FETCH_ASSOC);
        return $id_evento['id'];
    }

    function inserir($atividade)
    {
        $sql = "INSERT INTO atividade (descricao, responsavel, data, hora_inicio, hora_fim, local, tipo,id_evento,id_responsavel) VALUES 
                                  (:descricao, :responsavel, :data, :hora_inicio, :hora_fim, :local, :tipo, :id_evento, :id_responsavel)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(":descricao", $atividade->getDescricao());
        $stmt->bindValue(":responsavel", $atividade->getResponsavel());
        $stmt->bindValue(":data", $atividade->getData());
        $stmt->bindValue(":hora_inicio", $atividade->getHoraInicio());
        $stmt->bindValue(":hora_fim", $atividade->getHoraFim());
        $stmt->bindValue(":local", $atividade->getLocal());
        $stmt->bindValue(":tipo", $atividade->getTipo());
        $stmt->bindValue(":id_evento", $atividade->getIdEvento());
        $stmt->bindValue(":id_responsavel", $atividade->getIdResponsavel());
        if ($stmt->execute()) {
            header("Location: ../Front/TelaInicial.php?toast=cadastroSucesso");
        } else {
            header("Location: cadastraEvento.php?toast=cadastroErro");
        }
    }
    function vizualizar($id_evento)
    {
        $sql = "SELECT * FROM atividade where $id_evento = id_evento";;
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        $atividades = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $atividades;
    }
}
