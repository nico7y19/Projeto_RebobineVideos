<?php
require_once '../classes/locacao.php';
//banco de dados da classe locacao
class locacaoDAO
{
    // Conexão com o banco de dados
    private $conn;
    // Nome da tabela no banco de dados que armazena as locações
    private $table_name = "locacao_filme";
    // Construtor que recebe a conexão com o banco de dados e inicializa a propriedade conn
    public function __construct($db)
    {
        // Inicializa a conexão com o banco de dados na propriedade conn
        $this->conn = $db;
    }

    // Métodos para manipulação das locações podem ser adicionados aqui
    public function salvarLocacao($locacao)
    {
        $query = "INSERT INTO " . $this->table_name . " (id_filme, id_cliente, data_locacao, data_devolucao, valor) VALUES (:filme_id, :cliente_id, :data_locacao, :data_devolucao,:valor)";


        $stmt = $this->conn->prepare($query);

        $stmt->bindValue(':filme_id', $locacao->getFilmeId()); // o bindValue troca o :filme_id pelo id_filme do obj locação
        $stmt->bindValue(':cliente_id', $locacao->getClienteId());
        $stmt->bindValue(':data_locacao', $locacao->getDataLocacao());
        $stmt->bindValue(':data_devolucao', $locacao->getDataDevolucao());
        $stmt->bindValue(':valor', $locacao->getValor());

        if ($stmt->execute()) {
            return true; // salvou no banco de dados
        }

        return false;
    }

    public function getMinhasLocacao($idCliente)
    {

        $query = "SELECT * FROM locacao_filme WHERE id_cliente = :id_cliente";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id_cliente', $idCliente);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getLocacaoPorId($id)
    {

        $query = "SELECT * FROM locacao_filme WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function excluiLocacao($id)
    {
        $query = "DELETE FROM locacao_filme WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

    }


}

?>