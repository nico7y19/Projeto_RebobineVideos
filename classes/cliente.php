<?php
// Essa classe representa um cliente na locadora de filmes
class Cliente
{
    // Atributos da classe cliente

    private $id;
    private $nomeC;
    private $dataNascimento;
    private $email;
    private $senha;

    //construtor da classe cliente
    public function __construct($id, $nomeC, $dataNascimento, $email, $senha)
    {
        $this->id = $id;
        $this->nomeC = $nomeC;
        // Garante que a data esteja em formato DateTime
        $this->dataNascimento = new DateTime($dataNascimento);
        $this->email = $email;
        $this->senha = $senha;
    }

    // Getters

    public function getId()
    {
        return $this->id;
    }
    public function getNomeC()
    {
        return $this->nomeC;
    }

    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    // Setters 

    public function setId($id)
    {
        $this->id = $id;
    }
    public function setNomeC($nomeC)
    {
        $this->nomeC = $nomeC;
    }

    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = new DateTime($dataNascimento);
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }
}
?>