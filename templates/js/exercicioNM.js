const questions = [
    {
        question: "Qual é o resultado de 15 + 23?",
        options: ["35", "38", "40", "42"],
        correct: 1,
        explanation: "Para somar 15 + 23, somamos as unidades (5+3=8) e as dezenas (1+2=3), resultando em 38."
    },
    {
        question: "Quanto é 50 - 18?",
        options: ["30", "32", "35", "38"],
        correct: 1,
        explanation: "Para subtrair 50 - 18, pegamos 50 e tiramos 18, o que resulta em 32."
    },
    {
        question: "Calcule: 7 × 8",
        options: ["54", "56", "58", "60"],
        correct: 1,
        explanation: "A tabuada do 7: 7×8 = 56. Podemos verificar: 7+7+7+7+7+7+7+7 = 56."
    },
    {
        question: "Qual é o resultado de 144 ÷ 12?",
        options: ["10", "11", "12", "14"],
        correct: 2,
        explanation: "144 dividido por 12 é igual a 12, pois 12 × 12 = 144."
    },
    {
        question: "Quanto é 25 + 37 + 13?",
        options: ["73", "75", "77", "80"],
        correct: 1,
        explanation: "Somando: 25 + 37 = 62, depois 62 + 13 = 75."
    },
    {
        question: "Calcule: 100 - 45",
        options: ["50", "55", "60", "65"],
        correct: 1,
        explanation: "100 menos 45 é igual a 55. Podemos fazer: 100 - 40 = 60, depois 60 - 5 = 55."
    },
    {
        question: "Qual é o resultado de 9 × 12?",
        options: ["98", "102", "108", "112"],
        correct: 2,
        explanation: "9 × 12 = 108. Podemos calcular: 9 × 10 = 90, depois 9 × 2 = 18, somando: 90 + 18 = 108."
    },
    {
        question: "Quanto é 200 ÷ 25?",
        options: ["6", "7", "8", "9"],
        correct: 2,
        explanation: "200 dividido por 25 é igual a 8, pois 25 × 8 = 200."
    },
    {
        question: "Calcule: 48 + 52",
        options: ["98", "100", "102", "105"],
        correct: 1,
        explanation: "48 + 52 = 100. Observe que 48 + 52 forma uma centena completa."
    },
    {
        question: "Qual é o resultado de 15 × 6?",
        options: ["80", "85", "90", "95"],
        correct: 2,
        explanation: "15 × 6 = 90. Podemos calcular: 15 × 5 = 75, depois adicionar mais 15, totalizando 90."
    },
    {
        question: "Quanto é 250 - 175?",
        options: ["65", "70", "75", "80"],
        correct: 2,
        explanation: "250 - 175 = 75. Podemos fazer: 250 - 100 = 150, depois 150 - 75 = 75."
    },
    {
        question: "Calcule: 12 + 18 + 20",
        options: ["48", "50", "52", "55"],
        correct: 1,
        explanation: "Somando: 12 + 18 = 30, depois 30 + 20 = 50."
    },
    {
        question: "Qual é o resultado de 13 × 11?",
        options: ["133", "143", "153", "163"],
        correct: 1,
        explanation: "13 × 11 = 143. Podemos calcular: 13 × 10 = 130, depois adicionar 13, totalizando 143."
    },
    {
        question: "Quanto é 180 ÷ 15?",
        options: ["10", "11", "12", "13"],
        correct: 2,
        explanation: "180 dividido por 15 é igual a 12, pois 15 × 12 = 180."
    },
    {
        question: "Calcule: 89 + 76",
        options: ["155", "160", "165", "170"],
        correct: 2,
        explanation: "89 + 76 = 165. Somamos: 80 + 70 = 150, depois 9 + 6 = 15, totalizando 165."
    },
    {
        question: "Qual é o resultado de 300 - 145?",
        options: ["145", "150", "155", "160"],
        correct: 2,
        explanation: "300 - 145 = 155. Podemos fazer: 300 - 100 = 200, depois 200 - 45 = 155."
    },
    {
        question: "Quanto é 16 × 5?",
        options: ["75", "80", "85", "90"],
        correct: 1,
        explanation: "16 × 5 = 80. Podemos calcular: 10 × 5 = 50 e 6 × 5 = 30, somando: 50 + 30 = 80."
    },
    {
        question: "Calcule: 225 ÷ 15",
        options: ["13", "14", "15", "16"],
        correct: 2,
        explanation: "225 dividido por 15 é igual a 15, pois 15 × 15 = 225."
    },
    {
        question: "Qual é o resultado de 45 + 38 + 27?",
        options: ["105", "110", "115", "120"],
        correct: 1,
        explanation: "Somando: 45 + 38 = 83, depois 83 + 27 = 110."
    },
    {
        question: "Quanto é 14 × 8?",
        options: ["102", "108", "112", "118"],
        correct: 2,
        explanation: "14 × 8 = 112. Podemos calcular: 14 × 4 = 56, dobrando esse valor: 56 × 2 = 112."
    },
    {
        question: "Calcule: 500 - 237",
        options: ["253", "263", "273", "283"],
        correct: 1,
        explanation: "500 - 237 = 263. Subtraímos: 500 - 200 = 300, depois 300 - 37 = 263."
    },
    {
        question: "Qual é o resultado de 19 × 7?",
        options: ["123", "133", "143", "153"],
        correct: 1,
        explanation: "19 × 7 = 133. Podemos calcular: 20 × 7 = 140, depois subtraímos 7, resultando em 133."
    },
    {
        question: "Quanto é 420 ÷ 21?",
        options: ["18", "19", "20", "21"],
        correct: 2,
        explanation: "420 dividido por 21 é igual a 20, pois 21 × 20 = 420."
    },
    {
        question: "Calcule: 156 + 89",
        options: ["235", "240", "245", "250"],
        correct: 2,
        explanation: "156 + 89 = 245. Somamos: 156 + 80 = 236, depois 236 + 9 = 245."
    },
    {
        question: "Qual é o resultado de 25 × 12?",
        options: ["280", "290", "300", "310"],
        correct: 2,
        explanation: "25 × 12 = 300. Podemos calcular: 25 × 10 = 250, depois 25 × 2 = 50, somando: 250 + 50 = 300."
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
        message = '🎉 Excelente! Você dominou completamente este conteúdo!';
    } else if (score >= 70) {
        message = '👏 Muito bem! Você tem um bom conhecimento sobre o tema!';
    } else if (score >= 50) {
        message = '👍 Bom trabalho! Continue praticando para melhorar ainda mais!';
    } else {
        message = '💪 Não desanime! Revise o conteúdo e tente novamente. A prática leva à perfeição!';
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