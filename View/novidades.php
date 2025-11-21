<?php
// Inicia a sessão para acessar o nome do usuário
session_start();

// Inclui os arquivos de configuração e classes necessárias (se for usar o UserController aqui)
// Para simplificar, vamos apenas verificar se o nome do usuário está na sessão
$userName = $_SESSION['nome'] ?? 'Visitante';

// Se a página for privada, você deve incluir a lógica de autenticação aqui
// if (!isset($_SESSION['id'])) { header('Location: login.php'); exit; }

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intelecta - Novidades</title>
    <link rel="stylesheet" href="../templates/css/novidades.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="novidades-page">
    <div class="app-container">
        
        <header class="app-header">
            <div class="welcome-text">
                <h1><span class="thin-text">Bem-vindo(a) de volta,</span> <br> <strong>Helena!🚀</strong></h1>
            </div>
            <div class="streak-container">
                <img src="https://i.ibb.co/xnT57Vr/Random-female-face-1.jpg" alt="Ofensiva" class="fire-icon">
            </div>
        </header>

        <nav class="desktop-nav">
            <a href="inicio.html" class="nav-item">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M3 9L12 2L21 9V20C21 20.5304 20.7893 21.0391 20.4142 21.4142C20.0391 21.7893 19.5304 22 19 22H5C4.46957 22 3.96086 21.7893 3.58579 21.4142C3.21071 21.0391 3 20.5304 3 20V9Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                    <path d="M9 22V12H15V22" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>Início</span>
            </a>
            <a href="exercicios.html" class="nav-item">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect x="3" y="3" width="18" height="18" rx="2" stroke="currentColor" stroke-width="2" fill="none"/>
                    <path d="M9 11L11 13L15 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>Exercícios</span>
            </a>
            <a href="novidades.html" class="nav-item active">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M13 2L3 14H12L11 22L21 10H12L13 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                </svg>
                <span>Novidades</span>
            </a>
            <a href="perfil.html" class="nav-item">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <circle cx="12" cy="8" r="5" stroke="currentColor" stroke-width="2" fill="none"/>
                    <path d="M3 21C3 17.134 7.029 14 12 14C16.971 14 21 17.134 21 21" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                </svg>
                <span>Perfil</span>
            </a>
        </nav>

        <main class="app-main">
            <div class="news-controls-wrapper">
                <div class="news-filters">
                    <button class="filter-button active" data-filter="all">Todas</button>
                    <button class="filter-button" data-filter="today">Hoje</button>
                    <button class="filter-button" data-filter="last-week">Semana Passada</button>
                    <button class="filter-button" data-filter="last-month">Mês Passado</button>
                    <button class="filter-button" data-filter="older">Mais Antigas</button>
                </div>
                <button id="clear-all-news" class="clear-news-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                    Limpar
                </button>
            </div>
            
            <section id="news-list" class="news-list">
                </section>
        </main>

        <nav class="bottom-nav">
            <a href="index.html" class="nav-item">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M3 9L12 2L21 9V20C21 20.5304 20.7893 21.0391 20.4142 21.4142C20.0391 21.7893 19.5304 22 19 22H5C4.46957 22 3.96086 21.7893 3.58579 21.4142C3.21071 21.0391 3 20.5304 3 20V9Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                    <path d="M9 22V12H15V22" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>Início</span>
            </a>
            <a href="#" class="nav-item">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect x="3" y="3" width="18" height="18" rx="2" stroke="currentColor" stroke-width="2" fill="none"/>
                    <path d="M9 11L11 13L15 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>Exercícios</span>
            </a>
            <a href="novidades.html" class="nav-item active">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M13 2L3 14H12L11 22L21 10H12L13 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                </svg>
                <span>Novidades</span>
            </a>
            <a href="#" class="nav-item">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <circle cx="12" cy="8" r="5" stroke="currentColor" stroke-width="2" fill="none"/>
                    <path d="M3 21C3 17.134 7.029 14 12 14C16.971 14 21 17.134 21 21" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                </svg>
                <span>Perfil</span>
            </a>
        </nav>
    </div>
    <script src="../templates/js/novidades.js"></script>
</body>
</html>