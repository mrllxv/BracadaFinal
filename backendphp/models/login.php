<?php
require_once '../database/connection.php';
require_once '../entity/Login.php';

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
    if ($login->autenticar($email, $senha)) {
        echo "Login realizado com sucesso.";
    } else {
        echo "E-mail ou senha inválidos.";
    }

    $conn->close();
} else {
    echo "Preencha todos os campos.";
}
