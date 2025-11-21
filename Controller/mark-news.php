<?php

// Inclui os arquivos de configuração e classes necessárias
require_once '../Config/configuration.php';
require_once '../Model/Connection.php';
require_once '../Model/News.php';
require_once '../Controller/NewsController.php';

use Controller\NewsController;

header('Content-Type: application/json');

// Verifica se o usuário está logado
if (!isset($_SESSION['id'])) {
    echo json_encode(['success' => false, 'message' => 'Usuário não autenticado']);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['id']) || !isset($data['is_read'])) {
    echo json_encode(['success' => false, 'message' => 'Dados inválidos']);
    exit;
}

$newsId = (int) $data['id'];
$isRead = (bool) $data['is_read'];

try {
    $newsController = new NewsController();
    $result = $newsController->markNewsAsRead($newsId, $isRead);

    if ($result) {
        echo json_encode(['success' => true, 'message' => 'Status da novidade atualizado com sucesso.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erro ao atualizar status da novidade.']);
    }
} catch (Exception $e) {
    error_log('Erro no mark-news.php: ' . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Erro interno do servidor.']);
}

?>
