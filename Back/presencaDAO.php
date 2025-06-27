<?php
require_once __DIR__ . '/../Banco/Conexao.php';

class PresencaDAO {
    private $conexao;

    public function __construct() {
        $this->conexao = Conexao::getConexao();
    }

    public function getAtividadeDescricao($id_atividade) {
        $sql = "SELECT descricao FROM atividade WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $id_atividade);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function getUsuariosDaAtividade($id_atividade) {
    $sql = "SELECT u.id, u.nome, ua.presenca
            FROM usuario u
            JOIN usuario_atividade ua ON u.id = ua.id_usuario
            WHERE ua.id_atividade = :id_atividade";
    $stmt = $this->conexao->prepare($sql);
    $stmt->bindParam(':id_atividade', $id_atividade);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

    public function atualizarPresencas($id_atividade, $todos_usuarios, $presentes) {
        $dateTime = new DateTime();
        $dateTime->setTimezone(new DateTimeZone('America/Sao_Paulo'));

        $data = $dateTime->format('Y-m-d');
        $hora = $dateTime->format('H:i:s');

        $sql = "UPDATE usuario_atividade 
            SET presenca = :presenca, 
                data = :data,
                hora = :hora
            WHERE id_usuario = :id_usuario 
            AND id_atividade = :id_atividade";

        $stmt = $this->conexao->prepare($sql);

        foreach ($todos_usuarios as $id_usuario) {
            $presenca = isset($presentes[$id_usuario]) ? 1 : 0;

            $stmt->bindValue(':presenca', $presenca);
            $stmt->bindValue(':data', $data);
            $stmt->bindValue(':hora', $hora);
            $stmt->bindValue(':id_usuario', $id_usuario);
            $stmt->bindValue(':id_atividade', $id_atividade);
            $stmt->execute();
        }
    }

}