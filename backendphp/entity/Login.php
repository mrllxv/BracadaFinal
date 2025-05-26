<?php

require_once 'User.php';
require_once '../database/connection.php';

//classe de login, utilizando a classe usuario e o arquivo de conexao com banco de dados

class Login
{
    private $conn;

    // construtor do login
    public function __construct(mysqli $conn)
    {
        // inicia a sessao caso ainda nao tenha sido iniciada
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $this->conn = $conn;
    }

    public function autenticar($email, $senha)
    {
        //escapa caracteres especiais em uma string para uso em uma consulta SQL
        $email = mysqli_real_escape_string($this->conn, $email);

        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $result = $this->conn->query($sql);

        if ($result && $row = $result->fetch_assoc()) {
            //funçao nativa do php que verifica se uma senha digitada corresponde ao hash salvo no banco de dados
            if (password_verify($senha, $row['senha'])) {
                $usuario = new User(
                    (int)$row['id_usuario'],
                    $row['nome'],
                    $row['email'],
                    $row['senha'], // já hashada
                    new DateTime($row['data_nascimento']),
                    $row['frase_secreta'],
                    $row['tipo_perfil'],
                    true  // senha já hashada
                );
                //armazena o objeto User do usuário logado
                //utilizacao do serialize para transformar o objeto em texto na sessao
                $_SESSION['usuario'] = serialize($usuario);
                return true;
            }
        }
        return false;
    }
}
