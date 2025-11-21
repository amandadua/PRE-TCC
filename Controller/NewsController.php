<?php

namespace Controller;

use Model\News;
use Exception;

class NewsController
{
    private $newsModel;

    public function __construct(?News $newsModel = null)
    {
        // Usa o operador de nulidade explícito para evitar o aviso de depreciação
        $this->newsModel = $newsModel ?? new News();
    }

    /**
     * Busca todas as novidades.
     * @return array|false
     */
    public function getAllNews()
    {
        return $this->newsModel->getAllNews();
    }

    /**
     * Marca uma novidade como lida ou não lida.
     * @param int $newsId ID da novidade.
     * @param bool $isRead True para lida, False para não lida.
     * @return bool
     */
    public function markNewsAsRead(int $newsId, bool $isRead)
    {
        return $this->newsModel->markAsRead($newsId, $isRead);
    }

    /**
     * Limpa todas as novidades.
     * @return bool
     */
    public function clearAllNews()
    {
        return $this->newsModel->clearAllNews();
    }
}
?>