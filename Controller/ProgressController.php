<?php

namespace Controller;

use Model\Progress;
use Exception;

class ProgressController
{
    private $progressModel;

    public function __construct(?Progress $progressModel = null)
    {
        $this->progressModel = $progressModel ?? new Progress();
    }

    public function getUserProgress($userId)
    {
        if (empty($userId)) {
            return [
                'total_exercises' => 0,
                'correct_answers' => 0,
                'total_minutes' => 0
            ];
        }

        $progress = $this->progressModel->getProgressByUserId($userId);

        if (!$progress) {
            $this->progressModel->createProgress($userId);
            return [
                'total_exercises' => 0,
                'correct_answers' => 0,
                'total_minutes' => 0
            ];
        }

        return $progress;
    }

    public function saveExerciseResult($userId, $totalQuestions, $correctAnswers, $timeSpent)
    {
        if (empty($userId)) {
            return false;
        }

        $progress = $this->progressModel->getProgressByUserId($userId);
        
        if (!$progress) {
            $this->progressModel->createProgress($userId);
        }

        $minutesSpent = ceil($timeSpent / 60);

        return $this->progressModel->updateUserProgress($userId, $totalQuestions, $correctAnswers, $minutesSpent);
    }
}
?>