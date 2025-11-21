<?php

// Inclui os arquivos de configuração e classes necessárias
require_once '../Config/configuration.php';
require_once '../Model/Connection.php';
require_once '../Model/News.php';
require_once '../Controller/NewsController.php';

use Controller\NewsController;

header('Content-Type: application/json');

// Verifica se o usuário está logado (opcional, mas recomendado)
// Se a página de novidades for pública, remova esta verificação
if (!isset($_SESSION['id'])) {
    // Se a página for pública, apenas continua. Se for privada, retorna erro.
    // Assumindo que a página de novidades é acessível apenas para usuários logados.
    // Se não for, você pode remover este bloco.
    // echo json_encode(['success' => false, 'message' => 'Usuário não autenticado']);
    // exit;
}

try {
    $newsController = new NewsController();
    $news = $newsController->getAllNews();

    if ($news !== false) {
        echo json_encode([
            'success' => true,
            'news' => $news
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erro ao buscar novidades.']);
    }
} catch (Exception $e) {
    error_log('Erro no get-news.php: ' . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Erro interno do servidor.']);
}

?>
