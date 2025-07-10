<?php
    include_once __DIR__  . "/../Banco/Conexao.php";

    class eventoDAO{
        
        private $conexao;

        public function __construct() {
            $this->conexao = Conexao::getConexao();
        }

        function inserir($evento){
            $sql = "INSERT INTO evento (nome, data_inicio, data_final, local, organizacao, carga_horaria, presenca_minima, ativo, usuario_id) VALUES (:nome, :data_inicio, :data_final, :local, :organizacao, :carga_horaria, :presenca_minima, :ativo, :usuario_id)";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(":nome", $evento->getNome());
            $stmt->bindValue(":data_inicio", $evento->getDataInicial());
            $stmt->bindValue(":data_final", $evento->getDataFinal());
            $stmt->bindValue(":local", $evento->getLocal());
            $stmt->bindValue(":organizacao", $evento->getOrganizacao());
            $stmt->bindValue(":carga_horaria", $evento->getCarga_horaria());
            $stmt->bindValue(":presenca_minima", $evento->getPresenca());
            $stmt->bindValue(":ativo", $evento->getAtivo());
            $stmt->bindValue(":usuario_id", $evento->getUsuario_id());
            if ($stmt->execute()) {
                header("Location: ../Front/TelaInicial.php?toast=cadastroSucesso");
            } else {
                header("Location: cadastraEvento.php?toast=cadastroErro");
            }
        }

        function vizualizar()
        {
            $sql = "SELECT * FROM evento";
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();
            $eventos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $eventos;
        }

        function getNomeEventos()
        {
            $sql = "SELECT id, nome FROM evento";
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();
            $eventos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $eventos;
        }

            function buscarPorId($id)
    {
        $sql = "SELECT * FROM evento WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function editar($id, $nome, $dataInicio, $dataFinal, $local) {
    $sql = "UPDATE evento 
            SET nome = :nome, data_inicio = :dataInicio, data_final = :dataFinal, local = :local 
            WHERE id = :id";

    $stmt = $this->conexao->prepare($sql);
    $stmt->bindValue(":nome", $nome);
    $stmt->bindValue(":dataInicio", $dataInicio);
    $stmt->bindValue(":dataFinal", $dataFinal);
    $stmt->bindValue(":local", $local);
    $stmt->bindValue(":id", $id, PDO::PARAM_INT);

    return $stmt->execute();
}
public function excluir($id) {
    $sql = "DELETE FROM evento WHERE id = :id";
    $stmt = $this->conexao->prepare($sql);
    $stmt->bindValue(":id", $id, PDO::PARAM_INT);
    return $stmt->execute();
}
        function existeEventoDono($id_usuario)
        {
            $sql = "SELECT COUNT(*) as total FROM evento WHERE usuario_id = :id_usuario";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(":id_usuario", $id_usuario);
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            return $resultado['total'] > 0;
        }

        function eventoPorDono($id_usuario)
        {
            $sql = "SELECT * FROM evento WHERE usuario_id = :id_usuario ORDER BY data_final ASC";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(":id_usuario", $id_usuario);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
}


?>