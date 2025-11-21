const questions = [
    {
        question: "Resolva a equação: x + 5 = 12",
        options: ["x = 5", "x = 7", "x = 17", "x = 3"],
        correct: 1,
        explanation: "Para resolver x + 5 = 12, isolamos o x: x = 12 - 5, portanto x = 7."
    },
    {
        question: "Qual é o valor de x na equação: 2x = 18?",
        options: ["x = 7", "x = 8", "x = 9", "x = 10"],
        correct: 2,
        explanation: "Dividimos ambos os lados por 2: x = 18 ÷ 2, logo x = 9."
    },
    {
        question: "Resolva: x - 8 = 15",
        options: ["x = 7", "x = 23", "x = -7", "x = 8"],
        correct: 1,
        explanation: "Isolando x: x = 15 + 8, portanto x = 23."
    },
    {
        question: "Encontre x: 3x + 4 = 19",
        options: ["x = 4", "x = 5", "x = 6", "x = 7"],
        correct: 1,
        explanation: "Primeiro: 3x = 19 - 4, então 3x = 15. Dividindo por 3: x = 5."
    },
    {
        question: "Resolva: 5x - 10 = 25",
        options: ["x = 5", "x = 6", "x = 7", "x = 8"],
        correct: 2,
        explanation: "5x = 25 + 10, então 5x = 35. Dividindo por 5: x = 7."
    },
    {
        question: "Qual é o valor de x: x/4 = 3?",
        options: ["x = 10", "x = 11", "x = 12", "x = 13"],
        correct: 2,
        explanation: "Multiplicamos ambos os lados por 4: x = 3 × 4, portanto x = 12."
    },
    {
        question: "Resolva: 2x + 7 = 21",
        options: ["x = 5", "x = 6", "x = 7", "x = 8"],
        correct: 2,
        explanation: "2x = 21 - 7, então 2x = 14. Dividindo por 2: x = 7."
    },
    {
        question: "Encontre x: 4x - 5 = 11",
        options: ["x = 3", "x = 4", "x = 5", "x = 6"],
        correct: 1,
        explanation: "4x = 11 + 5, então 4x = 16. Dividindo por 4: x = 4."
    },
    {
        question: "Resolva: 7 + 3x = 28",
        options: ["x = 6", "x = 7", "x = 8", "x = 9"],
        correct: 1,
        explanation: "3x = 28 - 7, então 3x = 21. Dividindo por 3: x = 7."
    },
    {
        question: "Qual é o valor de x: 6x = 42?",
        options: ["x = 5", "x = 6", "x = 7", "x = 8"],
        correct: 2,
        explanation: "Dividimos ambos os lados por 6: x = 42 ÷ 6, logo x = 7."
    },
    {
        question: "Resolva: x/3 + 2 = 7",
        options: ["x = 12", "x = 15", "x = 18", "x = 21"],
        correct: 1,
        explanation: "x/3 = 7 - 2, então x/3 = 5. Multiplicando por 3: x = 15."
    },
    {
        question: "Encontre x: 8x - 12 = 36",
        options: ["x = 4", "x = 5", "x = 6", "x = 7"],
        correct: 2,
        explanation: "8x = 36 + 12, então 8x = 48. Dividindo por 8: x = 6."
    },
    {
        question: "Resolva: 5 - 2x = -11",
        options: ["x = 6", "x = 7", "x = 8", "x = 9"],
        correct: 2,
        explanation: "-2x = -11 - 5, então -2x = -16. Dividindo por -2: x = 8."
    },
    {
        question: "Qual é o valor de x: 9x + 3 = 48?",
        options: ["x = 4", "x = 5", "x = 6", "x = 7"],
        correct: 1,
        explanation: "9x = 48 - 3, então 9x = 45. Dividindo por 9: x = 5."
    },
    {
        question: "Resolva: 10 - x = 3",
        options: ["x = 5", "x = 6", "x = 7", "x = 8"],
        correct: 2,
        explanation: "-x = 3 - 10, então -x = -7. Multiplicando por -1: x = 7."
    },
    {
        question: "Encontre x: 2x/5 = 8",
        options: ["x = 18", "x = 20", "x = 22", "x = 24"],
        correct: 1,
        explanation: "2x = 8 × 5, então 2x = 40. Dividindo por 2: x = 20."
    },
    {
        question: "Resolva: 3(x + 2) = 21",
        options: ["x = 4", "x = 5", "x = 6", "x = 7"],
        correct: 1,
        explanation: "Distribuindo: 3x + 6 = 21, então 3x = 15. Dividindo por 3: x = 5."
    },
    {
        question: "Qual é o valor de x: 12 = 4x - 8?",
        options: ["x = 3", "x = 4", "x = 5", "x = 6"],
        correct: 2,
        explanation: "4x = 12 + 8, então 4x = 20. Dividindo por 4: x = 5."
    },
    {
        question: "Resolva: 5x + 2x = 35",
        options: ["x = 4", "x = 5", "x = 6", "x = 7"],
        correct: 1,
        explanation: "Somando termos semelhantes: 7x = 35. Dividindo por 7: x = 5."
    },
    {
        question: "Encontre x: 2(x - 3) = 10",
        options: ["x = 6", "x = 7", "x = 8", "x = 9"],
        correct: 2,
        explanation: "Distribuindo: 2x - 6 = 10, então 2x = 16. Dividindo por 2: x = 8."
    },
    {
        question: "Resolva: 15 - 3x = 0",
        options: ["x = 3", "x = 4", "x = 5", "x = 6"],
        correct: 2,
        explanation: "-3x = 0 - 15, então -3x = -15. Dividindo por -3: x = 5."
    },
    {
        question: "Qual é o valor de x: 7x - 2x = 30?",
        options: ["x = 5", "x = 6", "x = 7", "x = 8"],
        correct: 1,
        explanation: "Simplificando: 5x = 30. Dividindo por 5: x = 6."
    },
    {
        question: "Resolva: x/2 + x/4 = 9",
        options: ["x = 10", "x = 12", "x = 14", "x = 16"],
        correct: 1,
        explanation: "MMC(2,4) = 4: 2x/4 + x/4 = 9, então 3x/4 = 9. Logo 3x = 36 e x = 12."
    },
    {
        question: "Encontre x: 4(x + 1) - 2 = 18",
        options: ["x = 3", "x = 4", "x = 5", "x = 6"],
        correct: 2,
        explanation: "4x + 4 - 2 = 18, então 4x + 2 = 18. Logo 4x = 16 e x = 4."
    },
    {
        question: "Resolva: 8x + 5 = 3x + 30",
        options: ["x = 4", "x = 5", "x = 6", "x = 7"],
        correct: 1,
        explanation: "8x - 3x = 30 - 5, então 5x = 25. Dividindo por 5: x = 5."
    },
    {
        question: "Qual é o valor de x: 20 - 5x = 5?",
        options: ["x = 2", "x = 3", "x = 4", "x = 5"],
        correct: 1,
        explanation: "-5x = 5 - 20, então -5x = -15. Dividindo por -5: x = 3."
    },
    {
        question: "Resolva: 3x - 7 = 2x + 5",
        options: ["x = 10", "x = 11", "x = 12", "x = 13"],
        correct: 2,
        explanation: "3x - 2x = 5 + 7, então x = 12."
    },
    {
        question: "Encontre x: 6(x - 2) = 24",
        options: ["x = 5", "x = 6", "x = 7", "x = 8"],
        correct: 1,
        explanation: "6x - 12 = 24, então 6x = 36. Dividindo por 6: x = 6."
    },
    {
        question: "Resolva: 2x + 8 = x + 20",
        options: ["x = 10", "x = 11", "x = 12", "x = 13"],
        correct: 2,
        explanation: "2x - x = 20 - 8, então x = 12."
    },
    {
        question: "Qual é o valor de x: 5(2x - 1) = 45?",
        options: ["x = 4", "x = 5", "x = 6", "x = 7"],
        correct: 1,
        explanation: "10x - 5 = 45, então 10x = 50. Dividindo por 10: x = 5."
    },
    {
        question: "Resolva: 7x - 3 = 4x + 18",
        options: ["x = 5", "x = 6", "x = 7", "x = 8"],
        correct: 2,
        explanation: "7x - 4x = 18 + 3, então 3x = 21. Dividindo por 3: x = 7."
    },
    {
        question: "Encontre x: 9 - 2(x - 1) = 3",
        options: ["x = 3", "x = 4", "x = 5", "x = 6"],
        correct: 1,
        explanation: "9 - 2x + 2 = 3, então 11 - 2x = 3. Logo -2x = -8 e x = 4."
    },
    {
        question: "Resolva: x/3 + x/6 = 5",
        options: ["x = 8", "x = 9", "x = 10", "x = 11"],
        correct: 2,
        explanation: "MMC(3,6) = 6: 2x/6 + x/6 = 5, então 3x/6 = 5. Logo x/2 = 5 e x = 10."
    },
    {
        question: "Qual é o valor de x: 4x + 10 = 2(x + 15)?",
        options: ["x = 8", "x = 9", "x = 10", "x = 11"],
        correct: 2,
        explanation: "4x + 10 = 2x + 30, então 4x - 2x = 30 - 10. Logo 2x = 20 e x = 10."
    },
    {
        question: "Resolva: 3(2x + 1) - 4 = 11",
        options: ["x = 1", "x = 2", "x = 3", "x = 4"],
        correct: 2,
        explanation: "6x + 3 - 4 = 11, então 6x - 1 = 11. Logo 6x = 12 e x = 2."
    }
];

let currentQuestion = 0;
let selectedAnswer = null;
let correctAnswers = 0;
let wrongAnswers = 0;

document.addEventListener('DOMContentLoaded', function() {
    loadQuestion();
    updateProgressBar();
});

function loadQuestion() {
    const question = questions[currentQuestion];
    
    document.getElementById('question-num').textContent = currentQuestion + 1;
    document.getElementById('current-question').textContent = currentQuestion + 1;
    document.getElementById('total-questions').textContent = questions.length;
    document.getElementById('question-text').textContent = question.question;
    
    const optionsContainer = document.getElementById('options-container');
    optionsContainer.innerHTML = '';
    
    question.options.forEach((option, index) => {
        const optionDiv = document.createElement('div');
        optionDiv.className = 'option-item';
        optionDiv.textContent = option;
        optionDiv.onclick = () => selectOption(index);
        optionsContainer.appendChild(optionDiv);
    });
    
    document.getElementById('feedback-container').style.display = 'none';
    document.getElementById('btn-check').style.display = 'block';
    document.getElementById('btn-next').style.display = 'none';
    document.getElementById('btn-finish').style.display = 'none';
    document.getElementById('btn-check').disabled = true;
    
    selectedAnswer = null;
}

function selectOption(index) {
    if (selectedAnswer !== null) return;
    
    const options = document.querySelectorAll('.option-item');
    options.forEach(opt => opt.classList.remove('selected'));
    options[index].classList.add('selected');
    
    selectedAnswer = index;
    document.getElementById('btn-check').disabled = false;
}

function checkAnswer() {
    const question = questions[currentQuestion];
    const options = document.querySelectorAll('.option-item');
    const feedbackContainer = document.getElementById('feedback-container');
    
    options.forEach(opt => opt.classList.add('disabled'));
    
    if (selectedAnswer === question.correct) {
        correctAnswers++;
        options[selectedAnswer].classList.add('correct');
        
        feedbackContainer.className = 'feedback-container correct';
        feedbackContainer.innerHTML = `
            <div class="feedback-title correct">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" fill="none"/>
                    <path d="M9 12l2 2 4-4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Parabéns! Resposta Correta!
            </div>
            <div class="feedback-text">${question.explanation}</div>
        `;
    } else {
        wrongAnswers++;
        options[selectedAnswer].classList.add('incorrect');
        options[question.correct].classList.add('correct');
        
        feedbackContainer.className = 'feedback-container incorrect';
        feedbackContainer.innerHTML = `
            <div class="feedback-title incorrect">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" fill="none"/>
                    <path d="M15 9l-6 6m0-6l6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                </svg>
                Resposta Incorreta
            </div>
            <div class="feedback-answer">Resposta correta: <strong>${question.options[question.correct]}</strong></div>
            <div class="feedback-text">${question.explanation}</div>
        `;
    }
    
    feedbackContainer.style.display = 'block';
    document.getElementById('btn-check').style.display = 'none';
    
    if (currentQuestion < questions.length - 1) {
        document.getElementById('btn-next').style.display = 'block';
    } else {
        document.getElementById('btn-finish').style.display = 'block';
    }
}

function nextQuestion() {
    currentQuestion++;
    loadQuestion();
    updateProgressBar();
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function updateProgressBar() {
    const progress = ((currentQuestion + 1) / questions.length) * 100;
    document.getElementById('progress-bar').style.width = progress + '%';
}

function finishExercise() {
    document.getElementById('question-card').style.display = 'none';
    
    const resultsCard = document.getElementById('results-card');
    resultsCard.style.display = 'block';
    
    document.getElementById('correct-answers').textContent = correctAnswers;
    document.getElementById('wrong-answers').textContent = wrongAnswers;
    
    const score = Math.round((correctAnswers / questions.length) * 100);
    document.getElementById('final-score').textContent = score + '%';
    
    let message = '';
    if (score >= 90) {
        message = '🎉 Excelente! Você dominou completamente equações do 1º grau!';
    } else if (score >= 70) {
        message = '👏 Muito bem! Você tem um ótimo entendimento sobre o tema!';
    } else if (score >= 50) {
        message = '👍 Bom trabalho! Continue praticando para aperfeiçoar suas habilidades!';
    } else {
        message = '💪 Não desanime! Revise os conceitos e tente novamente. A prática leva à perfeição!';
    }
    
    document.getElementById('results-message').textContent = message;
    
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function restartExercise() {
    currentQuestion = 0;
    selectedAnswer = null;
    correctAnswers = 0;
    wrongAnswers = 0;
    
    document.getElementById('question-card').style.display = 'block';
    document.getElementById('results-card').style.display = 'none';
    
    loadQuestion();
    updateProgressBar();
    window.scrollTo({ top: 0, behavior: 'smooth' });
}