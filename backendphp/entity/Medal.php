<?php

require_once "TipoMedalha.php";
class Medal{
    private int $id_medalha;

    private int $cod_tipo_medalha;

    public function __construct(int $id_medalha, int $cod_tipo_medalha ){
        $this->id_medalha = $id_medalha;
        $this->cod_tipo_medalha = $cod_tipo_medalha;
    }

    public function getId(){
        return $this->id_medalha;
    }

    public function getTipoId(){
        return $this->cod_tipo_medalha;
    }
    public function getDescricaoTipoMedalha(): string
    {
        return TipoMedalha::descricao($this->cod_tipo_medalha);
    }

}
