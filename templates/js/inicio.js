const navItems = document.querySelectorAll('.nav-item');

navItems.forEach(item => {
    item.addEventListener('click', function(e) {
        navItems.forEach(nav => nav.classList.remove('active'));
        this.classList.add('active');
    });
});

async function loadProgress() {
    try {
        const response = await fetch('controller/get-progress.php');
        const data = await response.json();

        if (data.success) {
            updateStats(
                data.progress.total_exercises,
                data.progress.correct_answers,
                data.progress.total_minutes
            );
        }
    } catch (error) {
        console.error('Erro ao carregar progresso:', error);
    }
}

const btnNews = document.querySelectorAll('.btn-news');
if (btnNews) {
    btnNews.forEach(btn => {
        btn.addEventListener('click', function() {
            const newsTitle = btn.closest('.news-card').querySelector('h3').textContent;
            alert(`Abrindo: ${newsTitle}...`);
        });
    });
}

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

const sections = document.querySelectorAll('.progress-section, .daily-challenge, .topics-section, .news-section');
sections.forEach(section => {
    section.style.opacity = '0';
    section.style.transform = 'translateY(20px)';
    section.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
    observer.observe(section);
});

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

const buttons = document.querySelectorAll('.btn-start, .btn-news');
buttons.forEach(button => {
    button.style.position = 'relative';
    button.style.overflow = 'hidden';
    button.addEventListener('click', createRipple);
});

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

function updateStats(exercises, correct, minutes) {
    document.getElementById('total-exercises').textContent = exercises;
    document.getElementById('correct-answers').textContent = correct;
    document.getElementById('total-minutes').textContent = minutes;
}

function smoothScroll(target) {
    const element = document.querySelector(target);
    if (element) {
        element.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    }
}

document.addEventListener('touchmove', function(e) {
    if (e.touches.length > 1) {
        e.preventDefault();
    }
}, { passive: false });

console.log('%c🎓 Intelecta App', 'color: #07336E; font-size: 20px; font-weight: bold;');
console.log('%cBem-vinda! Pronta para dominar a matemática?', 'color: #E1A03D; font-size: 14px;');

document.addEventListener('DOMContentLoaded', loadProgress);