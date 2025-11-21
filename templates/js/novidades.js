document.addEventListener('DOMContentLoaded', () => {
    const newsListElement = document.querySelector('.news-list');
    const clearAllButton = document.getElementById('clear-all-news');
    const filterButtons = document.querySelectorAll('.filter-button');

    let newsData = []; // Inicialmente vazio, será preenchido pelo AJAX

    // Função para buscar as novidades do backend
    async function fetchNews() {
        try {
            const response = await fetch('get-news.php');
            const result = await response.json();

            if (result.success) {
                // Mapeia os dados do PHP para o formato esperado pelo JS
                newsData = result.news.map(news => ({
                    id: parseInt(news.id),
                    title: news.title,
                    content: news.content,
                    date: news.news_date, // Usar news_date do banco de dados
                    read: news.is_read === '1' ? true : false, // O PDO retorna '1' ou '0' para BOOLEAN
                    category: news.category
                }));
                renderNews();
            } else {
                console.error('Erro ao buscar novidades:', result.message);
                newsListElement.innerHTML = '<p class="error-message">Não foi possível carregar as novidades.</p>';
            }
        } catch (error) {
            console.error('Erro de rede ao buscar novidades:', error);
            newsListElement.innerHTML = '<p class="error-message">Erro de conexão. Verifique o servidor.</p>';
        }
    }

    // Função para agrupar as novidades (mantida do código original)
    function groupNewsByDate(data) {
        const now = new Date();
        const ONE_DAY = 1000 * 60 * 60 * 24;
        const ONE_WEEK = ONE_DAY * 7;
        const ONE_MONTH = ONE_DAY * 30;

        const grouped = {
            today: [],
            lastWeek: [],
            lastMonth: [],
            older: []
        };

        data.forEach(news => {
            // O formato do banco de dados é 'YYYY-MM-DD HH:MM:SS', que é aceito pelo construtor Date
            const newsDate = new Date(news.date); 
            const diffTime = now - newsDate;

            if (diffTime < ONE_DAY) {
                grouped.today.push(news);
            } else if (diffTime < ONE_WEEK) {
                grouped.lastWeek.push(news);
            } else if (diffTime < ONE_MONTH) {
                grouped.lastMonth.push(news);
            } else {
                grouped.older.push(news);
            }
        });
        return grouped;
    }

    // Função para criar o card da novidade (adaptada para usar a nova estrutura)
    function createNewsCard(news) {
        const newsCard = document.createElement('div');
        newsCard.classList.add('news-card');
        if (news.read) {
            newsCard.classList.add('read');
        } else {
            newsCard.classList.add('unread');
        }
        newsCard.dataset.id = news.id;

        // Formata a data para exibição
        const formattedDate = new Date(news.date).toLocaleDateString('pt-BR', {
            day: '2-digit',
            month: '2-digit',
            year: 'numeric'
        });

        newsCard.innerHTML = `
            <div class="news-header-meta">
                <span class="news-badge">${news.category}</span>
                <span class="news-date">${formattedDate}</span>
            </div>
            <h3 class="news-title">${news.title}</h3>
            <p class="news-description">${news.content}</p>
            <button class="read-toggle-button" data-id="${news.id}" data-read="${news.read}">
                ${news.read ? 'Marcar como não lida' : 'Marcar como lida'}
            </button>
        `;
        return newsCard;
    }

    // Função para renderizar as novidades (mantida do código original)
    function renderNews(filter = 'all') {
        newsListElement.innerHTML = '';
        if (newsData.length === 0) {
            newsListElement.innerHTML = `
                <div class="empty-news-message">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M13 2L3 14H12L11 22L21 10H12L13 2Z"/>
                    </svg>
                    <p>Nenhuma novidade disponível.</p>
                </div>
            `;
            return;
        }

        const groupedNews = groupNewsByDate(newsData);

        const groupsToRender = [
            { title: 'Hoje', array: groupedNews.today, filterName: 'today' },
            { title: 'Semana Passada', array: groupedNews.lastWeek, filterName: 'last-week' },
            { title: 'Mês Passado', array: groupedNews.lastMonth, filterName: 'last-month' },
            { title: 'Mais Antigas', array: groupedNews.older, filterName: 'older' },
        ];

        if (filter === 'all') {
            groupsToRender.forEach(group => {
                if (group.array.length > 0) {
                    const section = document.createElement('div');
                    section.classList.add('news-section-group');
                    section.innerHTML = `<h3 class="news-section-title">${group.title}</h3>`;
                    group.array.forEach(news => section.appendChild(createNewsCard(news)));
                    newsListElement.appendChild(section);
                }
            });
        } else {
            const currentGroup = groupsToRender.find(g => g.filterName === filter);
            if (currentGroup) {
                const section = document.createElement('div');
                section.classList.add('news-section-group');
                section.innerHTML = `<h3 class="news-section-title">${currentGroup.title}</h3>`;

                if (currentGroup.array.length > 0) {
                    currentGroup.array.forEach(news => section.appendChild(createNewsCard(news)));
                } else {
                    const emptyMessage = document.createElement('div');
                    emptyMessage.classList.add('empty-news-message');
                    emptyMessage.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M13 2L3 14H12L11 22L21 10H12L13 2Z"/>
                    </svg>
                    <p>Nenhuma novidade neste período</p>
                `;
                    section.appendChild(emptyMessage);
                }

                newsListElement.appendChild(section);
            }
        }

        addEventListenersToNewsItems();
    }

    // Função para marcar/desmarcar como lida no backend
    async function toggleReadStatus(newsId, isRead) {
        try {
            const response = await fetch('mark-news.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ id: newsId, is_read: isRead })
            });
            const result = await response.json();
            if (result.success) {
                // Atualiza o estado local e renderiza
                const newsIndex = newsData.findIndex(n => n.id === newsId);
                if (newsIndex > -1) {
                    newsData[newsIndex].read = isRead;
                    renderNews(document.querySelector('.filter-button.active').dataset.filter);
                }
            } else {
                alert('Erro ao atualizar status: ' + result.message);
            }
        } catch (error) {
            console.error('Erro de rede ao atualizar status:', error);
            alert('Erro de rede. Tente novamente.');
        }
    }

    // Função para limpar todas as novidades no backend
    async function clearAllNewsBackend() {
        if (!confirm('Tem certeza que deseja limpar TODAS as novidades?')) {
            return;
        }
        try {
            const response = await fetch('clear-news.php');
            const result = await response.json();
            if (result.success) {
                newsData = [];
                renderNews();
                alert('Todas as novidades foram limpas.');
            } else {
                alert('Erro ao limpar novidades: ' + result.message);
            }
        } catch (error) {
            console.error('Erro de rede ao limpar novidades:', error);
            alert('Erro de rede. Tente novamente.');
        }
    }

    function addEventListenersToNewsItems() {
        document.querySelectorAll('.news-card').forEach(card => {
            const markButton = card.querySelector('.read-toggle-button');
            const newsId = parseInt(card.dataset.id);

            // Evento para o botão Marcar/Desmarcar
            markButton.addEventListener('click', (event) => {
                const isCurrentlyRead = markButton.dataset.read === 'true';
                toggleReadStatus(newsId, !isCurrentlyRead);
                event.stopPropagation();
            });

            // Evento para o clique no card (marcar como lida se não estiver)
            card.addEventListener('click', (event) => {
                const newsTitle = card.querySelector('.news-title').textContent;
                alert(`Abrindo novidade: ${newsTitle}`);

                const newsItem = newsData.find(n => n.id === newsId);
                if (newsItem && !newsItem.read) {
                    toggleReadStatus(newsId, true);
                }
            });
        });
    }

    // Evento para o botão Limpar Todas
    clearAllButton.addEventListener('click', clearAllNewsBackend);

    // Eventos para os botões de filtro (mantidos do código original)
    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            filterButtons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');
            renderNews(button.dataset.filter);
        });
    });

    // Inicia o carregamento das novidades
    fetchNews();
});
