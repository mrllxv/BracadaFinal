<?php
require_once '../database/connection.php';
require_once '../entity/User.php';

// verifica se os dados foram enviados
if (isset($_POST['email']) && isset($_POST['frase_secreta']) && isset($_POST['nova_senha'])) {
    $email = $_POST['email'];
    $frase = $_POST['frase_secreta'];
    $novaSenha = $_POST['nova_senha'];

    if (empty($email) || empty($frase) || empty($novaSenha)) {
        echo "Todos os campos são obrigatórios.";
        exit;
    }

    $conn = connect();
}