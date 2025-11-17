<?php

namespace Model;

use PDO;
use PDOException;

class Connection
{
    private $host = 'localhost';

    private $dbname = 'intelecta'; 

    private $username = 'root';

    private $password = '';

    private $connection;

    public function __construct()
    {
        try {
            $this->connection = new PDO(
                "mysql:host={$this->host};dbname={$this->dbname};charset=utf8",
                $this->username, 
                $this->password, 
                [ // Opções PDO
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
                    PDO::ATTR_EMULATE_PREPARES => false, 
                ]
            );

        } catch (PDOException $error) {
            throw new \Exception('Erro na conexão com o banco de dados: ' . $error->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function prepare($sql)
    {
        return $this->connection->prepare($sql);
    }

    public function lastInsertId()
    {
        return $this->connection->lastInsertId();
    }
}
?>