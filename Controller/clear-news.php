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

try {
    $newsController = new NewsController();
    $result = $newsController->clearAllNews();

    if ($result) {
        echo json_encode(['success' => true, 'message' => 'Todas as novidades foram limpas.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erro ao limpar as novidades.']);
    }
} catch (Exception $e) {
    error_log('Erro no clear-news.php: ' . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Erro interno do servidor.']);
}

?>
