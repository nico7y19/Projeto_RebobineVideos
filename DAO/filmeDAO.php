<?php
require_once '../classes/filme.php';
//banco de dados da classe filme

class filmeDAO
{
    // Conexão com o banco de dados
    private $conn;
    // Nome da tabela no banco de dados que armazena os filmes
    private $table_name = "filmes";
    // Construtor que recebe a conexão com o banco de dados e inicializa a propriedade conn
    public function __construct($db)
    {
        // Inicializa a conexão com o banco de dados na propriedade conn
        $this->conn = $db;

    }

    // Função para obter todos os filmes do banco de dados
    public function getAllFilmes()
    {
        // Query SQL para selecionar todos os filmes assim como estão armazenados na tabela filme
        $query = "SELECT * FROM " . $this->table_name;

        // Prepara a query desse objeto
        $stmt = $this->conn->prepare($query);

        // Executa a query preparada
        $stmt->execute();

        // Retorna todos os filmes como um array associativo
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Função para obter um filme específico pelo seu ID
    public function getFilmePorId($id)
    {
        // Query SQL para selecionar um filme específico pelo seu ID
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id LIMIT 0,1";

        // Prepara a query desse objeto
        $stmt = $this->conn->prepare($query);

        // Vincula o parâmetro ID à query preparada
        $stmt->bindParam(':id', $id);

        // Executa a query preparada
        $stmt->execute();

        // Retorna o filme como um array associativo
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getFilmePorCategoria($categoria)
    {

        $query = "SELECT * FROM " . $this->table_name . " WHERE categoria = :categoria";

        // Prepara a query desse objeto
        $stmt = $this->conn->prepare($query);
        // Vincula o parâmetro ID à query preparada
        $stmt->bindParam(':categoria', $categoria);
        // Executa a query preparada
        $stmt->execute();
        // Retorna o filme como um array associativo
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}






?>