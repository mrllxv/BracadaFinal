<?php
//inicia a sessao para poder usar $_SESSION
session_start(); 
require_once '../database/connection.php';
require_once '../entity/Login.php';

try {
    if (isset($_POST['email']) && isset($_POST['senha'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        if (empty($email) || empty($senha)) {
            echo "Preencha todos os campos.";
            exit;
        }
        $conn = connect();

        //inicializando o login do usuario
        $login = new Login($conn);
        //utilizando o metodo autenticar da classe login
        $usuario = $login->autenticar($email, $senha);
        
        if ($usuario) {
            //armazena os dados essenciais do usuario na sessao
            $_SESSION['id_usuario'] = $usuario['id_usuario'];
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['perfil'] = $usuario['id_tipo'];

            echo "Login realizado com sucesso.";

        } else {
            echo "Email ou senha inválidos.";
        }
        $conn->close();
    } else {
        echo "Preencha todos os campos.";
    }
} catch (Exception $e) {
    //pega qualquer exceção lançada no bloco try
    echo "Erro no processo de login: " . $e->getMessage();
}
