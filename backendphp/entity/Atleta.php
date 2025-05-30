<?php
class Atleta
{
    private int $id;
    private string $nome;
    private string $genero;
    private DateTime $data_nascimento;
    private int $cod_pais;
    private int $cod_modalidade;
    private int $cod_medalha;

    public function __construct(int $id, string $nome, string $genero, DateTime $data_nascimento, int $cod_pais, int $cod_modalidade)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->genero = $genero;
        $this->data_nascimento = $data_nascimento;
        $this->cod_pais = $cod_pais;
        $this->cod_modalidade = $cod_modalidade;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function getGenero()
    {
        return $this->genero;
    }
    public function getDataNascimento(): DateTime
    {
        return $this->data_nascimento;
    }
    public function getIdPais(): int
    {
        return $this->cod_pais;
    }
    public function getIdModalidade(): int
    {
        return $this->cod_modalidade;
    }

    public function getIdMedalha(): int{
        return $this->cod_medalha;
    }

    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }
    public function setGenero(string $genero)
    {
        $this->genero = $genero;
    }
    public function setDataNascimento(DateTime $data)
    {
        $this->data_nascimento = $data;
    }
    public function setIdPais(int $cod_pais)
    {
        $this->cod_pais = $cod_pais;
    }
    public function setIdModalidade(int $cod_modalidade)
    {
        $this->cod_modalidade = $cod_modalidade;
    }
}
