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

    if ($resultado && $resultado->num_rows > 0) {
        $dados = $resultado->fetch_assoc();
        $usuario = new User(
            $dados['id_usuario'],
            $dados['nome'],
            $dados['email'],
            $dados['senha'], // senha já está com hash
            new DateTime($dados['data_nascimento']),
            $dados['cod_tipo_perfil'],
            true
        );

        // definir frase secreta no objeto
        $usuario->setFraseSecreta($dados['frase_secreta']);

        // verificar a frase informada
        if ($usuario->verificarFraseSecreta($frase)) {
            $usuario->setSenha($novaSenha);

            // atualizar no banco de dados
            $stmtUpdate = $conn->prepare("UPDATE usuario SET senha = ? WHERE id_usuario = ?");
            $senhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);
            $stmtUpdate->bind_param("si", $senhaHash, $usuario->getId());
            $stmtUpdate->execute();

            echo "Senha redefinida com sucesso.";
        } else {
            echo "Frase secreta incorreta.";
        }
    } else {
        echo "E-mail não encontrado.";
    }

    $conn->close();
} else {
    echo "Preencha todos os campos do formulário.";
}
