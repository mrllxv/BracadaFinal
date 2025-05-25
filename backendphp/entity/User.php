<?php

class User
{
    private string $nome;
    private int $id_usuario;
    private string $email;
    private string $senha;
    private DateTime $data_nascimento;
    private string $frase_secreta;
    private string $tipo_perfil;

    //Construtor do usuario
    public function __construct(int $id_usuario, string $nome, string $email, string $senha, DateTime $data_nascimento, string $frase_secreta, string $tipo_perfil)
    {
        $this->id_usuario = $id_usuario;
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->data_nascimento = $data_nascimento;
        $this->frase_secreta = $frase_secreta;
        $this->tipo_perfil = $tipo_perfil;
    }

    //GETTERS

    public function getNome()
    {
        return $this->nome;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getDataNascimento()
    {
        return $this->data_nascimento;
    }

    public function getFraseSecreta()
    {
        return $this->frase_secreta;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function getPerfil()
    {
        return $this->tipo_perfil;
    }

    public function getId()
    {
        return $this->id_usuario;
    }

    //SETTERS

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setDataNascimento(DateTime $data_nascimento): void
    {
        $this->data_nascimento = $data_nascimento;
    }

    public function setFraseSecreta(string $frase_secreta): void
    {
        $this->frase_secreta = $frase_secreta;
    }
    // utilizando a funçao nativa password_hash para nao armazenar a senha em texto puro
    public function setSenha(string $senha): void
    {
        $this->senha = password_hash($senha, PASSWORD_DEFAULT);
    }

    public function setPerfil(string $tipo_perfil): void
    {
        $this->tipo_perfil = $tipo_perfil;
    }

    public function setId(int $id_usuario): void
    {
        $this->id_usuario = $id_usuario;
    }
}
