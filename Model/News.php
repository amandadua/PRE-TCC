<?php

namespace Model;

use Model\Connection;
use PDOException;

class News
{
    private $db;
    private $table = 'news';

    public function __construct(?Connection $dbConnection = null)
    {
        // Reutiliza a conexão existente ou cria uma nova
        $this->db = $dbConnection ?? new Connection();
    }

    /**
     * Busca todas as novidades ordenadas por data de criação (mais recente primeiro).
     * @return array|false Lista de novidades ou false em caso de erro.
     */
    public function getAllNews()
    {
        try {
            $sql = "SELECT id, title, content, news_date, category, is_read FROM {$this->table} ORDER BY news_date DESC";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log('Erro ao buscar todas as novidades: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Marca uma novidade como lida ou não lida.
     * @param int $newsId ID da novidade.
     * @param bool $isRead True para lida, False para não lida.
     * @return bool True em caso de sucesso, false em caso de erro.
     */
    public function markAsRead(int $newsId, bool $isRead)
    {
        try {
            $sql = "UPDATE {$this->table} SET is_read = ? WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([$isRead, $newsId]);
        } catch (PDOException $e) {
            error_log('Erro ao marcar novidade como lida: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Limpa todas as novidades (simulando a remoção do banco de dados).
     * @return bool True em caso de sucesso, false em caso de erro.
     */
    public function clearAllNews()
    {
        try {
            // Para um ambiente de produção, seria melhor usar um soft delete ou arquivamento.
            // Aqui, vamos apenas deletar para simular a funcionalidade.
            $sql = "DELETE FROM {$this->table}";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log('Erro ao limpar todas as novidades: ' . $e->getMessage());
            return false;
        }
    }
}
?>
