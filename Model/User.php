<?php

namespace Model;

use Model\Connection;

use PDOException;

class User
{
    private $db;

    private $table = 'user';

    public function __construct(?Connection $dbConnection = null)
    {
        $this->db = $dbConnection ?? new Connection();
    }

    public function registerUser($nome, $email, $senha)
    {
        try {
            $sql = "INSERT INTO {$this->table} (nome, email, senha, data_criacao) VALUES (?, ?, ?, NOW())";

            $stmt = $this->db->prepare($sql);

            $result = $stmt->execute([$nome, $email, $senha]);

            if ($result) {
                return $this->db->lastInsertId();
            }

            return false;
        } catch (PDOException $e) {
            error_log('Erro ao registrar usuário: ' . $e->getMessage());

            return false;
        }
    }

    public function getUserByEmail($email)
    {
        try {
            $sql = "SELECT * FROM {$this->table} WHERE email = ? LIMIT 1";

            $stmt = $this->db->prepare($sql);

            $stmt->execute([$email]);

            $user = $stmt->fetch();

            return $user ? $user : false;
        } catch (PDOException $e) {
            error_log('Erro ao buscar usuário por email: ' . $e->getMessage());

            return false;
        }
    }

    public function getUserById($id)
    {
        try {
            $sql = "SELECT * FROM {$this->table} WHERE id = ? LIMIT 1";

            $stmt = $this->db->prepare($sql);

            $stmt->execute([$id]);

            $user = $stmt->fetch();

            return $user ? $user : false;
        } catch (PDOException $e) {
            error_log('Erro ao buscar usuário por ID: ' . $e->getMessage());

            return false;
        }
    }
}
?>