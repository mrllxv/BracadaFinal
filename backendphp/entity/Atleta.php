<?php
class Atleta
{
    private int $id;
    private string $nome;
    private string $genero;
    private DateTime $data_nascimento;
    private int $id_pais;
    private int $id_modalidade;

    public function __construct(int $id, string $nome, string $genero, DateTime $data_nascimento, int $id_pais, int $id_modalidade)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->genero = $genero;
        $this->data_nascimento = $data_nascimento;
        $this->id_pais = $id_pais;
        $this->id_modalidade = $id_modalidade;
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
        return $this->id_pais;
    }
    public function getIdModalidade(): int
    {
        return $this->id_modalidade;
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
    public function setIdPais(int $id_pais)
    {
        $this->id_pais = $id_pais;
    }
    public function setIdModalidade(int $id_modalidade)
    {
        $this->id_modalidade = $id_modalidade;
    }
}
