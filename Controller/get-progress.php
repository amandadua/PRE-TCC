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

$userId = $_SESSION['id'];
$progressController = new ProgressController();
$progress = $progressController->getUserProgress($userId);

echo json_encode([
    'success' => true,
    'progress' => $progress
]);
?>