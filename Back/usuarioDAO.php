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
        $sql = "INSERT INTO usuario (nome, cpf, login, email, senha, path_img, cargo) 
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

    function buscarPorId($id_usuario)
    {
        try {
            $sql = "SELECT * FROM usuario WHERE id = :id";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':id', $id_usuario, PDO::PARAM_INT);
            $stmt->execute();

            $dados = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($dados) {
                $usuario = new Usuario(
                    $dados['nome'],
                    $dados['cpf'],
                    $dados['login'],
                    $dados['email'],
                    $dados['senha'],
                    $dados['path_img'],
                    $dados['cargo']
                );
                $usuario->setId($dados['id']);
                return $usuario;
            }

            return null;
        } catch (PDOException $e) {
            die("Erro ao buscar usuário: " . $e->getMessage());
        }
    }

    public function atualizar($usuario)
    {
        $sql = "UPDATE usuario SET 
                    nome = :nome,
                    cpf = :cpf,
                    login = :login,
                    email = :email,
                    senha = :senha,
                    path_img = :path_img,
                    cargo = :cargo
                WHERE id = :id";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(":nome", $usuario->getNome());
        $stmt->bindValue(":cpf", $usuario->getCpf());
        $stmt->bindValue(":login", $usuario->getLogin());
        $stmt->bindValue(":email", $usuario->getEmail());
        $stmt->bindValue(":senha", $usuario->getSenha());
        $stmt->bindValue(":path_img", $usuario->getPathImg());
        $stmt->bindValue(":cargo", $usuario->getCargo());
        $stmt->bindValue(":id", $usuario->getId());

        $stmt->execute();
    }
}
?>
