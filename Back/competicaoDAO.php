<?php
    include_once __DIR__  . "/../Banco/Conexao.php";

    class competicaoDAO{
        
        private $conexao;

        public function __construct() {
            $this->conexao = Conexao::getConexao();
        }
        function vizualizar()
        {
            $sql = "SELECT * FROM competicao";
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();
            $competicoes = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $competicoes;
        }
    }