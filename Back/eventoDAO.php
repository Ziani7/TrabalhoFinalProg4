<?php
    include_once __DIR__  . "/../Banco/Conexao.php";

    class eventoDAO{
        
        private $conexao;

        public function __construct() {
            $this->conexao = Conexao::getConexao();
        }

        function inserir($evento){
            $sql = "INSERT INTO evento (nome, data_inicio, data_final, local, organizacao) VALUES (:nome, :data_inicio, :data_final, :local, :organizacao)";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(":nome", $evento->getNome());
            $stmt->bindValue(":data_inicio", $evento->getDataInicial());
            $stmt->bindValue(":data_final", $evento->getDataFinal());
            $stmt->bindValue(":local", $evento->getLocal());
            $stmt->bindValue(":organizacao", $evento->getOrganizacao());
            if ($stmt->execute()) {
                header("Location: ../Front/TelaInicial.php?toast=cadastroSucesso");
            } else {
                header("Location: cadastraEvento.php?toast=cadastroErro");
            }
        }
}

?>