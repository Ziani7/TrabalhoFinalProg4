<?php
include_once __DIR__  . "/../Banco/Conexao.php";

class atividadeDAO
{

    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    function inserir($atividade)
    {
        $sql = "INSERT INTO atividade (descricao, responsavel, data, hora_inicio, hora_fim, local, tipo,id_evento) VALUES 
                                  (:descricao, :responsavel, :data, :hora_inicio, :hora_fim, :local, :tipo, :id_evento)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(":descricao", $atividade->getDescricao());
        $stmt->bindValue(":responsavel", $atividade->getResponsavel());
        $stmt->bindValue(":data", $atividade->getData());
        $stmt->bindValue(":hora_inicio", $atividade->getHoraInicio());
        $stmt->bindValue(":hora_fim", $atividade->getHoraFim());
        $stmt->bindValue(":local", $atividade->getLocal());
        $stmt->bindValue(":tipo", $atividade->getTipo());
        $stmt->bindValue(":id_evento", $atividade->getIdEvento());
        if ($stmt->execute()) {
            header("Location: ../Front/TelaInicial.php?toast=cadastroSucesso");
        } else {
            header("Location: cadastraEvento.php?toast=cadastroErro");
        }
    }
}
