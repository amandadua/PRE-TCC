// Seleciona todos os itens do FAQ
const faqItems = document.querySelectorAll('.faq-item');

// Adiciona evento de clique a cada pergunta
faqItems.forEach(item => {
    const question = item.querySelector('.faq-question');
    
    question.addEventListener('click', () => {
        // Remove a classe 'active' de todos os itens, exceto o clicado
        faqItems.forEach(otherItem => {
            if (otherItem !== item) {
                otherItem.classList.remove('active');
            }
        });

        // Alterna a classe 'active' do item clicado
        item.classList.toggle('active');
    });
});

// Abre o item do FAQ ao clicar no link de navegação
const navLinks = document.querySelectorAll('nav a');

navLinks.forEach(link => {
    link.addEventListener('click', (e) => {
        e.preventDefault();
        const targetId = link.getAttribute('href').substring(1);
        const targetSection = document.getElementById(targetId);

        if (targetSection) {
            targetSection.scrollIntoView({ behavior: 'smooth' });
        }
    });
});

// Abre automaticamente a primeira pergunta de cada seção ao carregar a página
window.addEventListener('load', () => {
    const firstFaqItem = document.querySelector('.faq-item');
    if (firstFaqItem) {
        firstFaqItem.classList.add('active');
    }
});