<?php
require_once '../database/connection.php';
require_once '../entity/User.php';
require_once '../enum/Perfil.php';

if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['data_nascimento'])) {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $data_nascimento = $_POST['data_nascimento'];

    if (empty($nome) || empty($email) || empty($senha) || empty($data_nascimento)) {
        exit;
    }

    try {
        $conn = connect();
        //verificando se ja existe um usuario com esse email
        $stmt = $conn->prepare("SELECT id_usuario FROM usuario WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            exit;
        }
        $usuario = new User(
            0,  //o id será gerado automaticamente pelo banco mysql (AUTO_INCREMENT)
            $nome,
            $email,
            $senha,
            new DateTime($data_nascimento),
            Perfil::USUARIO, //perfil padrão para usuario
            false
        );

        //inserindo no banco de dos mysql
        //stmt novamente e bind_param
        $stmtInsert = $conn->prepare("INSERT INTO usuario (nome, email, senha, data_nascimento, cod_tipo_perfil) VALUES (?, ?, ?, ?, ?)");
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
        $data = $usuario->getDataNascimento()->format('Y-m-d');
        $stmtInsert->bind_param("ssssi", $nome, $email, $senhaHash, $data, $usuario->getTipoPerfilId());
        $stmtInsert->execute();
        $conn->close();

    } catch (Exception $e) {
         $e->getMessage();
    }
} else {
    echo "Preencha todos os campos do formulário.";
}
