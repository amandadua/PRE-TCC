<?php

require_once '../Config/configuration.php';
require_once '../Model/Connection.php';
require_once '../Model/Progress.php';
require_once '../Controller/ProgressController.php';

use Controller\ProgressController;

header('Content-Type: application/json');

if (!isset($_SESSION['id'])) {
    echo json_encode(['success' => false, 'message' => 'Usuário não autenticado']);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true);

if (!$data) {
    echo json_encode(['success' => false, 'message' => 'Dados inválidos']);
    exit;
}

$userId = $_SESSION['id'];
$totalQuestions = $data['total_questions'] ?? 0;
$correctAnswers = $data['correct_answers'] ?? 0;
$timeSpent = $data['time_spent'] ?? 0;

$progressController = new ProgressController();
$result = $progressController->saveExerciseResult($userId, $totalQuestions, $correctAnswers, $timeSpent);

if ($result) {
    $updatedProgress = $progressController->getUserProgress($userId);
    echo json_encode([
        'success' => true,
        'message' => 'Progresso salvo com sucesso!',
        'progress' => $updatedProgress
    ]);
} else {
    echo json_encode(['success' => false, 'message' => 'Erro ao salvar progresso']);
}
?>