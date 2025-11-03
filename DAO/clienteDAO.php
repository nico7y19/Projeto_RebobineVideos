<?php
// DAO para a classe Cliente para interagir com o banco de dados

// Importa a conexão com o banco de dados
require_once '../bancoDados/bancoDados.php';
require_once '../classes/cliente.php';

//banco de dados da classe cliente
class ClienteDAO
{
    // Conexão com o banco de dados
    private $conn;
    // Nome da tabela no banco de dados
    private $table_name = "cliente";
    // Construtor que recebe a conexão com o banco de dados
    public function __construct($db)
    {
        // Inicializa a conexão com o banco de dados
        $this->conn = $db;

    }
    // Função para criar um novo cliente no banco de dados
    public function create($cliente)
    {
        // Query SQL para inserir um novo cliente
        $query = "INSERT INTO " . $this->table_name . " (nome, dataNas, email, senha) VALUES (:nome, :dataNas, :email, :senha)";

        //guarda os dados do cliente 
        $cliente = array_map('htmlspecialchars', array_map('strip_tags', $cliente));

        // Prepara a query
        $stmt = $this->conn->prepare($query);
        // Vincula os parâmetros
        $stmt->bindParam(':nome', $cliente['nomeC']);
        $stmt->bindParam(':dataNas', $cliente['Y-m-d']);
        $stmt->bindParam(':email', $cliente['email']);
        $stmt->bindParam(':senha', $cliente['senha']);
        // Executa a query
        try {
            return $stmt->execute();
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function login($nome, $senha)
    {
        // Busca o cliente pelo nome
        $query = "SELECT * FROM " . $this->table_name . " WHERE nome = :nome LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nome', $nome);
        $stmt->execute();

        $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verifica se encontrou e se a senha está correta
        if ($cliente && password_verify($senha, $cliente['senha'])) {
            // Retorna o objeto cliente
            return new cliente(
                $cliente['id'],
                $cliente['nome'],
                $cliente['dataNas'],
                $cliente['email'],
                $cliente['senha']
            );
        } else {
            return null; // Login inválido
        }
    }


}

?>