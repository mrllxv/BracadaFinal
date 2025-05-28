<?php

class TipoModalidade {
    const CRAWL = 1;
    const COSTAS = 2;
    const PEITO = 3;
    const BORBOLETA = 4;

    public static function garantirModalidadesFixas($conn) {
        $sql = "SELECT COUNT(*) as total FROM tipo_modalidade";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if ($row['total'] == 0) {
            $conn->query("INSERT INTO tipo_modalidade (id_tipo_modalidade, descricao) VALUES 
                (1, 'Crawl'), 
                (2, 'Costas'), 
                (3, 'Peito'), 
                (4, 'Borboleta')");
        }
    }

    public static function descricao($id): string {
        if ($id === self::CRAWL) {
            return 'Crawl';
        }
        if ($id === self::COSTAS) {
            return 'Costas';
        }
        if ($id === self::PEITO) {
            return 'Peito';
        }
        if ($id === self::BORBOLETA) {
            return 'Borboleta';
        }
        return 'Desconhecida';
    }
}
