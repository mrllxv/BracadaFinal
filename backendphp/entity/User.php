<?php

class User{
    private string $nome;
    private int $id_usuario;
    private string $email;
    private string $senha;
    private DateTime $data_nascimento;
    private string $frase_secreta;
    private string $tipo_perfil;


   public function __construct(int $id_usuario, string $nome, string $email, string $senha, DateTime $data_nascimento, string $frase_secreta, string $tipo_perfil) {
        $this->id_usuario = $id_usuario;
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->data_nascimento = $data_nascimento;
        $this->frase_secreta = $frase_secreta;
        $this->tipo_perfil = $tipo_perfil;
    }
}