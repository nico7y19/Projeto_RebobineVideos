<?php
class Filmes
{

    private $id;
    private string $nome;
    private string $categoria;
    private int $ano;
    private float $valor;

    private string $imagem;

    public function __construct(int $id, string $nome, string $categoria, int $ano, float $valor, string $imagem)
    {
        $this->$id = $id;
        $this->$nome = $nome;
        $this->$categoria = $categoria;
        $this->$ano = $ano;
        $this->$valor = $valor;
        $this->$imagem = $imagem;
    }

    //getters
    public function getId(): int
    {
        return $this->id;
    }
    public function getNome(): string
    {
        return $this->nome;
    }

    public function getCategoria(): string
    {
        return $this->categoria;
    }

    public function getAno(): int
    {
        return $this->ano;
    }
    public function getValor(): float
    {
        return $this->valor;
    }
    public function getImagem(): string
    {
        return $this->imagem;

    }
    //setters 
    public function setId(int $id)
    {
        $this->id = $id;
    }
    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }
    public function setCategoria(string $categoria)
    {
        $this->categoria = $categoria;
    }
    public function setAno(int $ano)
    {
        $this->ano = $ano;
    }
    public function setValor(float $valor)
    {
        $this->valor = $valor;
    }
    public function setImagem(string $imagem)
    {
        $this->imagem = $imagem;
    }
}
?>