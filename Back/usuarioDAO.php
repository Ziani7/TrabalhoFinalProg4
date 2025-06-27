<?php
include_once __DIR__  . "/../Banco/Conexao.php";
include_once "usuario.php";

class usuarioDAO
{

    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    function inserir($usuario)
    {
        $sql = "INSERT INTO usuario (nome, cpf, login, email, senha,path_img ,cargo ) 
            VALUES (:nome, :cpf, :login, :email, :senha, :path_img, :cargo)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(":nome", $usuario->getNome());
        $stmt->bindValue(":cpf", $usuario->getCpf());
        $stmt->bindValue(":login", $usuario->getLogin());
        $stmt->bindValue(":email", $usuario->getEmail());
        $stmt->bindValue(":senha", $usuario->getSenha());
        $stmt->bindValue(":path_img", $usuario->getPathImg());
        $stmt->bindValue(":cargo", $usuario->getCargo());

        if ($stmt->execute()) {
            header("Location: ../Front/TelaInicial.php?toast=cadastroSucesso");
        } else {
            header("Location: cadastraUsuario.php?toast=cadastroErro");
        }
    }
}
