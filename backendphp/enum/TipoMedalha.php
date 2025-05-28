<?php

class TipoMedalha {
    const OURO = 1;
    const PRATA = 2;
    const BRONZE = 3;

    public static function garantirMedalhasFixas($conn) {
        $sql = "SELECT COUNT(*) as total FROM tipo_medalha";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if ($row['total'] == 0) {
            $inserir = "
                INSERT INTO tipo_medalha (id_tipo_medalha, descricao) 
                VALUES (1, 'Ouro'), (2, 'Prata'), (3, 'Bronze')";
            if (!$conn->query($inserir)) {
                die("Erro ao inserir medalhas fixas: " . $conn->error);
            }
        }
    }

    public static function descricao($id) {
        if ($id === self::OURO) {
            return "Ouro";
        }
        if ($id === self::PRATA) {
            return "Prata";
        }
        if ($id === self::BRONZE) {
            return "Bronze";
        }
        return 'Inválido';
    }
}
