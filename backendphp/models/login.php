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
}
