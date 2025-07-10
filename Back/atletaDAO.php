<?php
include_once __DIR__ . "/../Banco/Conexao.php";

class atletaDAO
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    public function listarPorEquipe($id_equipe)
    {

        $sql = "SELECT u.nome FROM atleta a JOIN usuario u ON a.id_usuario = u.id WHERE id_equipe = :id_equipe";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(":id_equipe", $id_equipe, PDO::PARAM_INT);
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $nomes = [];
        foreach ($resultado as $linha) {
            $nomes[] = $linha['nome'];
        }
        return $nomes;
    }
}
