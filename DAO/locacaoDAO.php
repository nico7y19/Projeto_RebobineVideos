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
        $query = "INSERT INTO " . $this->table_name . " (id_filme, id_cliente, data_locacao, data_devolucao) VALUES (:filme_id, :cliente_id, :data_locacao, :data_devolucao)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindValue(':filme_id', $locacao->getFilmeId());
        $stmt->bindValue(':cliente_id', $locacao->getClienteId());
        $stmt->bindValue(':data_locacao', $locacao->getDataLocacao());
        $stmt->bindValue(':data_devolucao', $locacao->getDataDevolucao());

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }


}

?>