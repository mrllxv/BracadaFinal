<?php

require_once "../enum/TipoMedalha.php";

class Medal{
    private int $id_medalha;
    private int $cod_tipo_medalha;
    private int $cod_atleta;

    public function __construct(int $id_medalha, int $cod_tipo_medalha, int $cod_atleta ){
        $this->id_medalha = $id_medalha;
        $this->cod_tipo_medalha = $cod_tipo_medalha;
        $this->cod_atleta = $cod_atleta;
    }

    public function getId(){
        return $this->id_medalha;
    }

    public function getTipoId(){
        return $this->cod_tipo_medalha;
    }

    public function getIdAtleta(){
        return $this->cod_atleta;
    }


    public function getDescricaoTipoMedalha(): string
    {
        return TipoMedalha::descricao($this->cod_tipo_medalha);
    }

}
