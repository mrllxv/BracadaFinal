<?php

require_once 'User.php';
require_once 'conexao.php';

//classe de login, utilizando a classe usuario e o arquivo de conexao com banco de dados

class Login 
{
    private $conn;

    // construtor do login
    public function __construct(mysqli $conn)
    {
        // inicia a sessao caso ainda nao tenha sido iniciada
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }

        $this->conn = $conn;
    }



}
