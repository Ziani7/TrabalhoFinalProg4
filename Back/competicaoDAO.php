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
    public function excluir($id){
    $sql = "delete from competicao where id = :id";
    $stmt = $this->conexao->prepare($sql);
    $stmt->bindValue(":id", $id, PDO::PARAM_INT);
    return $stmt->execute();
}
public function editar($id, $nome, $modalidade, $local, $dataInicio, $dataFim, $status) {
    $sql = "UPDATE competicao 
            SET nome = :nome, 
                modalidade = :modalidade, 
                local = :local, 
                data_inicio = :dataInicio, 
                data_final = :dataFim, 
                status = :status
            WHERE id = :id";

    $stmt = $this->conexao->prepare($sql);
    $stmt->bindValue(":nome", $nome);
    $stmt->bindValue(":modalidade", $modalidade);
    $stmt->bindValue(":local", $local);
    $stmt->bindValue(":dataInicio", $dataInicio);
    $stmt->bindValue(":dataFim", $dataFim);
    $stmt->bindValue(":status", $status);
    $stmt->bindValue(":id", $id, PDO::PARAM_INT);

    return $stmt->execute();
}



    public function buscarPorId($id)
{
    try {
        $sql = "SELECT * FROM competicao WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo "Erro ao buscar competição por ID: " . $e->getMessage();
        return false;
    }
}

}

