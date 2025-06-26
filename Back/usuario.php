<?php
    class Usuario {
    private $id;
    private $nome;
    private $cpf;
    private $login;
    private $email;
    private $senha;
    private $cargo;
    private $path_img;

    public function __construct($nome, $cpf, $login, $email, $senha, $cargo, $path_img)
    {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->login = $login;
        $this->email = $email;
        $this->senha = $senha;
        $this->cargo = $cargo;
        $this->path_img = $path_img;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function getCargo()
    {
        return $this->cargo;
    }

    public function setCargo($cargo)
    {
        $this->cargo = $cargo;
    }

    public function getPathImg()
    {
        return $this->path_img;
    }

    public function setPathImg($path_img)
    {
        $this->path_img = $path_img;
    }
}

?>