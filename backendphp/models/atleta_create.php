<?php
session_start();
require_once '../util/funcoes.php';
requireAdmin();
require_once '../database/connection.php';
require_once '../entity/Atleta.php';

if (isset($_POST['nome']) && isset($_POST['genero']) && isset($_POST['data_nascimento']) && isset($_POST['id_pais']) && isset($_POST['id_modalidade'])) {
    $nome = $_POST['nome'];
    $genero = $_POST['genero'];
    $data_nascimento = $_POST['data_nascimento'];
    $id_pais = $_POST['id_pais'];
    $id_modalidade = $_POST['id_modalidade'];

    if (empty($nome) || empty($genero) || empty($data_nascimento) || empty($id_pais) || empty($id_modalidade)) {
        echo "Preencha todos os campos.";
        exit;
    }

    try {
        $conn = connect();
        $stmt = $conn->prepare("INSERT INTO atleta (nome, genero, data_nascimento, id_pais, id_modalidade) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssii", $nome, $genero, $data_nascimento, $id_pais, $id_modalidade);
        $stmt->execute();
        echo "Atleta cadastrado com sucesso.";
        $conn->close();
    } catch (Exception $e) {
        echo "Erro ao cadastrar atleta: " . $e->getMessage();
    }
}
