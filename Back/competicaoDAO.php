<?php
    include_once __DIR__  . "/../Banco/Conexao.php";

    class competicaoDAO{
        
        private $conexao;

        public function __construct() {
            $this->conexao = Conexao::getConexao();
        }
        function visualizar()
        {
            $sql = "SELECT * FROM competicao";
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();
            $competicoes = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $competicoes;
        }

    function inserir($competicao)
    {
        $sql = "INSERT INTO competicao (id_evento,nome,modalidade,local,data_inicio, data_final,status) VALUES ( :id_evento, :nome, :modalidade, :local, :data_inicio, :data_final,:status)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(":id_evento", $competicao->getIdEvento());
        $stmt->bindValue(":nome", $competicao->getNome());
        $stmt->bindValue(":modalidade", $competicao->getModalidade());
        $stmt->bindValue(":data_inicio", $competicao->getDataInicio());
        $stmt->bindValue(":data_final", $competicao->getDataFinal());
        $stmt->bindValue(":local", $competicao->getLocal());
        $stmt->bindValue(":status", $competicao->getStatus());
        if ($stmt->execute()) {
            header("Location: ../Front/TelaInicial.php?toast=cadastroSucesso");
        } else {
            header("Location: cadastraEvento.php?toast=cadastroErro");
        }

    }
}

