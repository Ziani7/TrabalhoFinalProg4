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
        $sql = "SELECT * FROM atividade WHERE id_evento = :id_evento";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':id_evento' => $id_evento]); // mais simples e limpo
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    function inscrever($id_usuario, $id_atividade)
    {
        $sql = "INSERT INTO usuario_atividade (id_usuario, id_atividade) VALUES (:id_usuario, :id_atividade)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(":id_usuario", $id_usuario);
        $stmt->bindValue(":id_atividade", $id_atividade);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function verificaInscricao($id_usuario, $id_atividade)
    {
        $sql = "SELECT COUNT(*) as total FROM usuario_atividade WHERE id_usuario = :id_usuario AND id_atividade = :id_atividade";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(":id_usuario", $id_usuario);
        $stmt->bindValue(":id_atividade", $id_atividade);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado['total'] > 0;
    }

}
