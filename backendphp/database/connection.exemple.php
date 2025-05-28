<?php
function connect() {
    $servidor = "localhost";      
    $database = "";  
    $usuario = "root";            
    $senha = "";                  

    $conn = mysqli_connect($servidor, $usuario, $senha, $database);

    if (!$conn) {
        die("Erro na conexão: " . mysqli_connect_error());
    }

    return $conn;
}

//require once esta utilizando a conexao original e nao a de exemplo.