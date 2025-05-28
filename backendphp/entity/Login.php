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

        //utilizando stmt para evitar injecao sql direta, e otimizando a consulta + bind param passando o parametro "s" (string)
        $stmt = $this->conn->prepare("SELECT * FROM usuario WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $row = $result->fetch_assoc()) {
            //funçao nativa do php que verifica se uma senha digitada corresponde ao hash salvo no banco de dados
            if (password_verify($senha, $row['senha'])) {
                $usuario = new User(
                    (int)$row['id_usuario'],
                    $row['nome'],
                    $row['email'],
                    $row['senha'], // já hashada
                    new DateTime($row['data_nascimento']),
                    $row['tipo_perfil'],
                    true  // senha já hashada
                );
                //armazena o objeto User do usuário logado
                //utilizacao do json_encode para transformar o objeto e enviar para o javascript
                $_SESSION['usuario'] = json_encode($usuario->toArray());
                return true;
            }
        }
        return false;
    }
}
