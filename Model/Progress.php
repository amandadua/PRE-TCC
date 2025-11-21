<?php

namespace Model;

use Model\Connection;
use PDOException;

class Progress
{
    private $db;
    private $table = 'user_progress';

    public function __construct(?Connection $dbConnection = null)
    {
        $this->db = $dbConnection ?? new Connection();
    }

    public function createProgress($userId)
    {
        try {
            $sql = "INSERT INTO {$this->table} (user_id, total_exercises, correct_answers, total_minutes) 
                    VALUES (?, 0, 0, 0)";
            
            $stmt = $this->db->prepare($sql);
            $result = $stmt->execute([$userId]);

            return $result ? $this->db->lastInsertId() : false;
        } catch (PDOException $e) {
            error_log('Erro ao criar progresso: ' . $e->getMessage());
            return false;
        }
    }

    public function getProgressByUserId($userId)
    {
        try {
            $sql = "SELECT * FROM {$this->table} WHERE user_id = ? LIMIT 1";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$userId]);
            $progress = $stmt->fetch();

            return $progress ? $progress : false;
        } catch (PDOException $e) {
            error_log('Erro ao buscar progresso: ' . $e->getMessage());
            return false;
        }
    }

    public function updateUserProgress($userId, $exercisesCompleted, $correctAnswers, $minutesSpent)
    {
        try {
            $sql = "UPDATE {$this->table} 
                    SET total_exercises = total_exercises + ?,
                        correct_answers = correct_answers + ?,
                        total_minutes = total_minutes + ?
                    WHERE user_id = ?";
            
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([$exercisesCompleted, $correctAnswers, $minutesSpent, $userId]);
        } catch (PDOException $e) {
            error_log('Erro ao atualizar progresso: ' . $e->getMessage());
            return false;
        }
    }
}
?>