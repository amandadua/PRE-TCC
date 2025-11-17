// Elementos do DOM
const navLinks = document.querySelectorAll('.nav-link');
const backToTopButton = document.getElementById('backToTop');
const sections = document.querySelectorAll('.section');

// Função para atualizar o link ativo no índice
function updateActiveLink() {
    let currentSection = '';

    sections.forEach((section) => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.clientHeight;

        if (window.scrollY >= sectionTop - 100) {
            currentSection = section.getAttribute('id');
        }
    });

    navLinks.forEach((link) => {
        link.classList.remove('active');
        if (link.getAttribute('data-section') === currentSection) {
            link.classList.add('active');
        }
    });
}

// Função para mostrar/ocultar botão "Voltar ao Topo"
function toggleBackToTopButton() {
    if (window.scrollY > 300) {
        backToTopButton.classList.add('show');
    } else {
        backToTopButton.classList.remove('show');
    }
}

// Função para rolar para o topo
function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

// Event listeners para navegação
navLinks.forEach((link) => {
    link.addEventListener('click', (e) => {
        e.preventDefault();
        const sectionId = link.getAttribute('data-section');
        const section = document.getElementById(sectionId);

        if (section) {
            section.scrollIntoView({ behavior: 'smooth' });
            updateActiveLink();
        }
    });
});

// Event listener para o botão "Voltar ao Topo"
backToTopButton.addEventListener('click', scrollToTop);

// Event listeners para scroll
window.addEventListener('scroll', () => {
    updateActiveLink();
    toggleBackToTopButton();
});

// Inicializar ao carregar a página
document.addEventListener('DOMContentLoaded', () => {
    updateActiveLink();
    toggleBackToTopButton();
});
