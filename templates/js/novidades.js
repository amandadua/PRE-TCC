document.addEventListener('DOMContentLoaded', () => {
    const newsListElement = document.querySelector('.news-list');
    const clearAllButton = document.getElementById('clear-all-news');
    const filterButtons = document.querySelectorAll('.filter-button');

    // Dados de exemplo (mantidos)
    let newsData = [
        // HOJE (17 de Novembro de 2025)
        {
            id: 9,
            title: 'Aula ao vivo: Redação nota 1000',
            content: 'Participe hoje às 19h da nossa aula especial sobre técnicas de redação para o ENEM.',
            date: '2025-11-17T14:00:00Z', // HOJE
            read: false,
            category: 'Evento'
        },
        {
            id: 10,
            title: 'Quiz rápido: Teste seus conhecimentos em Química',
            content: 'Responda 10 questões sobre Química Orgânica e veja seu desempenho.',
            date: '2025-11-17T09:00:00Z', // HOJE
            read: false,
            category: 'Desafio'
        },

        // SEMANA PASSADA (últimos 7 dias)
        {
            id: 11,
            title: 'Material complementar: Física Moderna',
            content: 'Baixe gratuitamente nosso PDF com exercícios resolvidos de Física Quântica.',
            date: '2025-11-14T10:00:00Z', // 3 dias atrás
            read: false,
            category: 'Atualização'
        },
        {
            id: 12,
            title: 'Live: Como organizar seu cronograma de estudos',
            content: 'Assista à gravação da nossa live com especialistas em planejamento.',
            date: '2025-11-12T16:00:00Z', // 5 dias atrás
            read: true,
            category: 'Evento'
        },

        // MÊS PASSADO (últimos 30 dias)
        {
            id: 1,
            title: 'Novo Simulado ENEM 2025 disponível!',
            content: 'Teste seus conhecimentos com questões inéditas baseadas no último ENEM.',
            date: '2025-10-27T10:00:00Z',
            read: false,
            category: 'Novo'
        },
        {
            id: 2,
            title: 'Novos exercícios de Geometria Analítica!',
            content: 'Aprofunde seus conhecimentos com nossa nova coleção de exercícios. Não perca essa chance de evoluir.',
            date: '2025-10-25T15:30:00Z',
            read: false,
            category: 'Atualização'
        },
        {
            id: 3,
            title: 'Guia completo de Trigonometria para o Vestibular',
            content: 'Baixe nosso material exclusivo e domine os conceitos essenciais.',
            date: '2025-10-20T09:00:00Z',
            read: true,
            category: 'Dica'
        },

        // MAIS ANTIGAS (mais de 30 dias)
        {
            id: 4,
            title: 'Webinar Gratuito: Estratégias para o ENEM',
            content: 'Participe do nosso webinar exclusivo com dicas de professores renomados.',
            date: '2025-10-18T18:00:00Z',
            read: false,
            category: 'Evento'
        },
        {
            id: 5,
            title: 'Novos recursos na plataforma',
            content: 'Descubra as novas ferramentas que vão otimizar seus estudos.',
            date: '2025-10-15T11:00:00Z',
            read: true,
            category: 'Atualização'
        },
        {
            id: 6,
            title: 'Desafio de Biologia: Ganhe prêmios!',
            content: 'Participe do nosso desafio semanal e teste seus conhecimentos em Biologia.',
            date: '2025-09-10T14:00:00Z',
            read: true,
            category: 'Desafio'
        },
        {
            id: 7,
            title: 'Dica de estudo: Como fazer um bom resumo',
            content: 'Aprenda técnicas eficazes para criar resumos que realmente ajudam a fixar o conteúdo.',
            date: '2025-09-28T16:00:00Z',
            read: false,
            category: 'Dica'
        },
        {
            id: 8,
            title: 'Simulado de Matemática: Prepare-se para o vestibular',
            content: 'Resolva questões de matemática de níveis variados e melhore seu desempenho.',
            date: '2025-09-25T10:00:00Z',
            read: true,
            category: 'Geral'
        }
    ];

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

    function createNewsCard(news) {
        const newsCard = document.createElement('div');
        newsCard.classList.add('news-card');
        if (news.read) {
            newsCard.classList.add('read');
        } else {
            newsCard.classList.add('unread');
        }
        newsCard.dataset.id = news.id;

        newsCard.innerHTML = `
            <div class="news-header-meta">
                <span class="news-badge">${news.category}</span>
                <span class="news-date">${new Date(news.date).toLocaleDateString('pt-BR')}</span>
            </div>
            <h3 class="news-title">${news.title}</h3>
            <p class="news-description">${news.content}</p>
            <button class="read-toggle-button" data-id="${news.id}">
                ${news.read ? 'Marcar como não lida' : 'Marcar como lida'}
            </button>
        `;
        return newsCard;
    }

    function renderNews(filter = 'all') {
        newsListElement.innerHTML = '';
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

    function addEventListenersToNewsItems() {
        document.querySelectorAll('.news-card').forEach(card => {
            const markButton = card.querySelector('.read-toggle-button');
            markButton.addEventListener('click', (event) => {
                const newsId = parseInt(markButton.dataset.id);
                const newsIndex = newsData.findIndex(n => n.id === newsId);
                if (newsIndex > -1) {
                    newsData[newsIndex].read = !newsData[newsIndex].read;
                    renderNews(document.querySelector('.filter-button.active').dataset.filter);
                }
                event.stopPropagation();
            });

            card.addEventListener('click', (event) => {
                const newsId = parseInt(card.dataset.id);
                const newsTitle = card.querySelector('.news-title').textContent;
                alert(`Abrindo novidade: ${newsTitle}`);

                const newsIndex = newsData.findIndex(n => n.id === newsId);
                if (newsIndex > -1 && !newsData[newsIndex].read) {
                    newsData[newsIndex].read = true;
                    renderNews(document.querySelector('.filter-button.active').dataset.filter);
                }
            });
        });
    }

    clearAllButton.addEventListener('click', () => {
        // CORRIGIDO: Agora remove TODAS as notícias
        if (confirm('Tem certeza que deseja limpar TODAS as novidades?')) {
            newsData = [];
            renderNews();
        }
    });

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            filterButtons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');
            renderNews(button.dataset.filter);
        });
    });

    renderNews(); // Renderização inicial
});