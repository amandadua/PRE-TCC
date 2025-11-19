document.addEventListener('DOMContentLoaded', function() {
    
    const startButtons = document.querySelectorAll('.btn-start-exercise');
    
    startButtons.forEach(button => {
        button.addEventListener('click', function() {
            const card = this.closest('.exercise-card');
            const title = card.querySelector('h3').textContent;
            
            this.innerHTML = '<span>Carregando...</span>';
            this.style.opacity = '0.7';
            this.disabled = true;
            
            setTimeout(() => {
                alert(`Iniciando exercícios de ${title}!\n\nEm breve você será redirecionado para a página de exercícios.`);
                
                this.innerHTML = 'Começar';
                this.style.opacity = '1';
                this.disabled = false;
            }, 800);
        });
    });

    const exerciseCards = document.querySelectorAll('.exercise-card');
    
    exerciseCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            const icon = this.querySelector('.exercise-icon');
            icon.style.transform = 'scale(1.1) rotate(5deg)';
            icon.style.transition = 'transform 0.3s ease';
        });
        
        card.addEventListener('mouseleave', function() {
            const icon = this.querySelector('.exercise-icon');
            icon.style.transform = 'scale(1) rotate(0deg)';
        });
    });

    const navItems = document.querySelectorAll('.nav-item');
    
    navItems.forEach(item => {
        item.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            
            if (href === '#') {
                e.preventDefault();
                
                const itemName = this.querySelector('span').textContent;
                
                if (itemName !== 'Exercícios') {
                    alert(`A seção "${itemName}" estará disponível em breve!`);
                }
            }
        });
    });

    window.addEventListener('scroll', function() {
        const header = document.querySelector('.app-header');
        
        if (window.scrollY > 50) {
            header.style.boxShadow = '0 0.25rem 1rem rgba(7, 51, 110, 0.12)';
        } else {
            header.style.boxShadow = 'none';
        }
    });

    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '0';
                entry.target.style.transform = 'translateY(20px)';
                
                setTimeout(() => {
                    entry.target.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }, 100);
                
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    exerciseCards.forEach(card => {
        observer.observe(card);
    });

    const sections = document.querySelectorAll('.exercises-section');
    sections.forEach((section, index) => {
        section.style.animationDelay = `${index * 0.1}s`;
    });

});

function filterExercises(difficulty) {
    const cards = document.querySelectorAll('.exercise-card');
    
    cards.forEach(card => {
        const badge = card.querySelector('.exercise-difficulty');
        
        if (difficulty === 'all' || badge.classList.contains(difficulty)) {
            card.style.display = 'flex';
            setTimeout(() => {
                card.style.opacity = '1';
                card.style.transform = 'scale(1)';
            }, 10);
        } else {
            card.style.opacity = '0';
            card.style.transform = 'scale(0.9)';
            setTimeout(() => {
                card.style.display = 'none';
            }, 300);
        }
    });
}

function searchExercises(searchTerm) {
    const cards = document.querySelectorAll('.exercise-card');
    const term = searchTerm.toLowerCase();
    
    cards.forEach(card => {
        const title = card.querySelector('h3').textContent.toLowerCase();
        const description = card.querySelector('.exercise-info p').textContent.toLowerCase();
        
        if (title.includes(term) || description.includes(term)) {
            card.style.display = 'flex';
            card.style.opacity = '1';
        } else {
            card.style.display = 'none';
        }
    });
}