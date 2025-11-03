<?php
// Configuração do Banco de Dados
define('DB_HOST', 'localhost');
define('DB_NAME', 'locadora_filme_site');
define('DB_USER', 'root');
define('DB_PASS', '');

/**
 * Retorna uma nova conexão PDO com o banco de dados.
 */

function getDbConnection()
{
    /**
     * $dsn significa Data Source Name (nome da fonte de dados).
     */

    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4';
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    try {
        return new PDO($dsn, DB_USER, DB_PASS, $options);
    } catch (\PDOException $e) {
        // Em um ambiente de produção, você registraria o erro em vez de exibi-lo.
        throw new \PDOException($e->getMessage(), (int) $e->getCode());
    }
}
