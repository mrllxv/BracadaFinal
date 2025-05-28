<?php

//classe enum
class Perfil
{
    const USUARIO = 1;
    const ADMINISTRADOR = 2;

    // garante que os perfis fixos existam na tabela tipo_perfil no banco de dados mysql
    public static function garantirPerfisFixos($conn)
    {
        $sql = "SELECT COUNT(*) as total FROM tipo_perfil";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if ($row['total'] == 0) {
            $conn->query("INSERT INTO tipo_perfil (id_tipo, descricao) VALUES (1, 'Usuário'), (2, 'Administrador')");
        }
    }
    // retorna a descriçao do perfil baseado no id usando if
    public static function descricao($id)
    {
        // self refere-se à própria classe Perfil
        // self::CONSTANTE para acessar as constantes da classe
        if ($id == self::USUARIO) {
            return 'Usuário';
        }
        if ($id == self::ADMINISTRADOR) {
            return 'Administrador';
        }
        return 'Desconhecido';
    }
}
