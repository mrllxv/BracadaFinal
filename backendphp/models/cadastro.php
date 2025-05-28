<?php
require_once '../database/connection.php';
require_once '../entity/User.php';

if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['data_nascimento'])) {
    
    $nome = ($_POST['nome']);
    $email = ($_POST['email']);
    $senha = $_POST['senha'];
    $data_nascimento = $_POST['data_nascimento'];

    if (empty($nome) || empty($email) || empty($senha) || empty($data_nascimento) || empty($frase_secreta)) {
        echo "Todos os campos são obrigatórios.";
        exit;
    }

    
} else {
    echo "Preencha todos os campos do formulário.";
}