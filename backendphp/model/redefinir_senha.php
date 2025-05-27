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

    //buscar usuário pelo e-mail
    //utilizando stmt para otimização das consultas sql
    $stmt = $conn->prepare("SELECT * FROM usuario WHERE email = ?");
    //informa que o parâmetro é uma string "s" e faz referencia da variável $email ao ? na query preparada.
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();
}
