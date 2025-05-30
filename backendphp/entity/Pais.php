<?php
class Pais{
    private int $id_pais;
    private string $nome;
    private string $bandeira;

    public function __construct(int $id_pais, string $nome, string $bandeira ){
        $this->id_pais = $id_pais;
        $this->nome = $nome;
        $this->bandeira = $bandeira;
    }

    public function getId()
    {
        return $this->id_pais;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getBandeira(){
        return $this->bandeira;
    }

    public function setNome(string $nome){
        $this->nome = $nome;
    }

    public function setBandeira(string $bandeira){
        $this->bandeira = $bandeira;
    }


}