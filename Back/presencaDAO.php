<?php
require_once __DIR__ . '/../Banco/Conexao.php';

class PresencaDAO {
    private $conexao;

    public function __construct() {
        $this->conexao = Conexao::getConexao();
    }

    public function getAtividadeDescricao($id_atividade) {
        $stmt = $this->conexao->prepare("SELECT descricao FROM atividade WHERE id = :id");
        $stmt->execute([':id' => $id_atividade]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getUsuariosDaAtividade($id_atividade) {
        $stmt = $this->conexao->prepare("
            SELECT u.id, u.nome, ua.presenca
            FROM usuario u
            JOIN usuario_atividade ua ON u.id = ua.id_usuario
            WHERE ua.id_atividade = :id_atividade
        ");
        $stmt->execute([':id_atividade' => $id_atividade]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function atualizarPresencas($id_atividade, $todos, $presentes) {
        $sql = "UPDATE usuario_atividade SET presenca = :presenca WHERE id_usuario = :id_usuario AND id_atividade = :id_atividade";
        $stmt = $this->conexao->prepare($sql);

        foreach ($todos as $id_usuario) {
            $presenca = isset($presentes[$id_usuario]) ? 1 : 0;
            $stmt->execute([
                ':presenca' => $presenca,
                ':id_usuario' => $id_usuario,
                ':id_atividade' => $id_atividade
            ]);
        }
    }
}
