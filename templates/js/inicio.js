// Navegação Bottom Nav
const navItems = document.querySelectorAll('.nav-item');

navItems.forEach(item => {
    item.addEventListener('click', function(e) {
        // Remove active de todos
        navItems.forEach(nav => nav.classList.remove('active'));
        // Adiciona active no clicado
        this.classList.add('active');
    });
});

// --- Lógica de Sequência (Streak) ---

// Função para buscar a sequência atual do backend
async function fetchStreak() {
    try {
        const response = await fetch('./controller/sequencia.php?action=get');
        const data = await response.json();

        if (data.success) {
            updateStreak(data.streak_count);
        } else {
            console.error('Erro ao buscar sequência:', data.message);
            // Opcional: Exibir uma mensagem de erro para o usuário
        }
    } catch (error) {
        console.error('Erro de rede ao buscar sequência:', error);
    }
}

// Função para notificar o backend sobre a conclusão de uma atividade
async function completeActivity() {
    try {
        const response = await fetch('./controller/sequencia.php?action=complete_activity');
        const data = await response.json();

        if (data.success) {
            updateStreak(data.streak_count);
            console.log('Sequência atualizada:', data.message);
        } else {
            console.error('Erro ao atualizar sequência:', data.message);
        }
    } catch (error) {
        console.error('Erro de rede ao atualizar sequência:', error);
    }
}

// Animação do botão de começar desafio
const challengeCards = document.querySelectorAll(".daily-challenge-grid .challenge-card");
challengeCards.forEach(card => {
    const btnStart = card.querySelector(".btn-start");
    const challengeTitle = card.querySelector("h3").textContent;
    if (btnStart) {
        btnStart.addEventListener("click", function() {
            alert(`Iniciando: ${challengeTitle}`);
            // SIMULAÇÃO: Chamar completeActivity() após a conclusão do desafio
             completeActivity(); 
        });
    }
});

// Animação dos cards de tópicos
const topicCards = document.querySelectorAll('.topic-card');
topicCards.forEach(card => {
    card.addEventListener('click', function() {
        const topicName = this.querySelector('h3').textContent;
        alert(`Abrindo exercícios de ${topicName}...`);
        // SIMULAÇÃO: Chamar completeActivity() após a conclusão de um exercício
         completeActivity(); 
    });
});

// --- Fim da Lógica de Sequência (Streak) ---

// Botão de novidades
const btnNews = document.querySelectorAll('.btn-news');
if (btnNews) {
    btnNews.forEach(btn => {
        btn.addEventListener('click', function() {
            const newsTitle = btn.closest('.news-card').querySelector('h3').textContent;
            alert(`Abrindo: ${newsTitle}...`);
        });
    });
}

// Animação de entrada dos elementos
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);

// Observar seções para animação
const sections = document.querySelectorAll('.progress-section, .daily-challenge, .topics-section, .news-section');
sections.forEach(section => {
    section.style.opacity = '0';
    section.style.transform = 'translateY(20px)';
    section.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
    observer.observe(section);
});

// Efeito ripple nos botões
function createRipple(event) {
    const button = event.currentTarget;
    const ripple = document.createElement('span');
    const rect = button.getBoundingClientRect();
    const size = Math.max(rect.width, rect.height);
    const x = event.clientX - rect.left - size / 2;
    const y = event.clientY - rect.top - size / 2;
    
    ripple.style.width = ripple.style.height = size + 'px';
    ripple.style.left = x + 'px';
    ripple.style.top = y + 'px';
    ripple.classList.add('ripple');
    
    button.appendChild(ripple);
    
    setTimeout(() => {
        ripple.remove();
    }, 600);
}

// Adicionar efeito ripple aos botões
const buttons = document.querySelectorAll('.btn-start, .btn-news');
buttons.forEach(button => {
    button.style.position = 'relative';
    button.style.overflow = 'hidden';
    button.addEventListener('click', createRipple);
});

// Estilo do ripple
const style = document.createElement('style');
style.textContent = `
    .ripple {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.6);
        transform: scale(0);
        animation: ripple-animation 0.6s ease-out;
        pointer-events: none;
    }
    
    @keyframes ripple-animation {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }
`;
document.head.appendChild(style);

// Atualizar progresso do desafio (simulação)
function updateChallengeProgress(completed, total) {
    const progressFill = document.querySelector('.progress-bar-fill');
    const progressText = document.querySelector('.progress-text');
    
    if (progressFill && progressText) {
        const percentage = (completed / total) * 100;
        progressFill.style.width = percentage + '%';
        progressText.textContent = `${completed}/${total} completos`;
    }
}

// Função para atualizar streak
function updateStreak(days) {
    const streakNumbers = document.querySelectorAll('.streak-number');
    const streakDays = document.querySelector('.streak-days');
    const streakSubtitle = document.querySelector('.streak-subtitle');
    
    streakNumbers.forEach(el => {
        el.textContent = days;
    });
    
    if (streakDays) {
        streakDays.textContent = `${days} ${days === 1 ? 'dia' : 'dias'}`;
    }
    
    if (streakSubtitle && days > 0) {
        streakSubtitle.textContent = 'Continue assim!';
    }
}

// Função para atualizar estatísticas
function updateStats(exercises, minutes, correct) {
    const statNumbers = document.querySelectorAll('.stat-number');
    if (statNumbers.length >= 3) {
        statNumbers[0].textContent = exercises;
        statNumbers[1].textContent = minutes;
        statNumbers[2].textContent = correct;
    }
}

// Scroll suave para elementos
function smoothScroll(target) {
    const element = document.querySelector(target);
    if (element) {
        element.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    }
}

// Prevenir scroll horizontal
document.addEventListener('touchmove', function(e) {
    if (e.touches.length > 1) {
        e.preventDefault();
    }
}, { passive: false });

// Log para debug
console.log('%c🎓 Intelecta App', 'color: #07336E; font-size: 20px; font-weight: bold;');
console.log('%cBem-vinda, Helena! Pronta para dominar a matemática?', 'color: #E1A03D; font-size: 14px;');

// Carregar a sequência ao carregar a página
document.addEventListener('DOMContentLoaded', fetchStreak);