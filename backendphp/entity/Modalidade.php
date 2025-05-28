<?php
require_once '../enum/TipoModalidade.php';

class Modalidade {
    private int $id_modalidade;
    private string $nome;

    public function __construct(int $id_modalidade, string $nome) {
        $this->id_modalidade = $id_modalidade;
        $this->nome = $nome;
    }

    public function getId(): int {
        return $this->id_modalidade;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function setNome(string $nome): void {
        $this->nome = $nome;
    }
}
