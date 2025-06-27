<?php
    session_start();
    include_once __DIR__  . "/../Banco/Conexao.php";

    class eventoDAO{
        
        private $conexao;

        public function __construct() {
            $this->conexao = Conexao::getConexao();
        }

        function inserir($evento){
            $sql = "INSERT INTO evento (nome, data_inicio, data_final, local, organizacao, ativo, usuario_id) VALUES (:nome, :data_inicio, :data_final, :local, :organizacao, :ativo, :usuario_id)";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(":nome", $evento->getNome());
            $stmt->bindValue(":data_inicio", $evento->getDataInicial());
            $stmt->bindValue(":data_final", $evento->getDataFinal());
            $stmt->bindValue(":local", $evento->getLocal());
            $stmt->bindValue(":organizacao", $evento->getOrganizacao());
            $stmt->bindValue(":ativo", $evento->getAtivo());
            $stmt->bindValue("usuario_id", $evento->getUsuario_id());
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


}

?>