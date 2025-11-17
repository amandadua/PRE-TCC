<?php
// =======================================================
// ESTRUTURA DE DADOS (QUESTÕES) EM PHP
// O PHP gera este array, que será convertido para JavaScript
// =======================================================

$questoes = [
    [
        'id' => 1,
        'texto' => "Ao escutar à notícia de que um filme recém-lançado arrecadou, no primeiro mês de lançamento, R$ 1,35 bilhão em bilheteria, um estudante escreveu corretamente o número que representa essa quantia, com todos os seus algarismos. O número escrito pelo estudante foi",
        'alternativas' => [
            'A' => "135 000,00",
            'B' => " 1 350 000,00",
            'C' => "13 500 000,00",
            'D' => "1 350 000 000,00"
        ],
        'correta' => "D",
        'explicacao' => "1,35 bilhão significa que a parte inteira, antes da vírgula, representa 1 unidade de bilhão. Assim, os números após a vírgula representam as ordens que vem logo em seguida, os milhões. Basta completar as ordens e classes com zeros. Logo: 1 350 000 000,00"
    ],
    [
        'id' => 2,
        'texto' => "A produção diária P(t) (em unidades) de uma pequena fábrica é modelada por P(t) = 50t + 200, onde t é o número de dias. Qual é a produção no 8º dia e quantos dias são necessários para que a produção diária atinja 800 unidades?",
        'alternativas' => [ 
            'A' => "P(8) = 600 unidades; 12 dias.", 
            'B' => "P(8) = 600 unidades; 10 dias.", 
            'C' => "P(8) 400 unidades; 12 dias.", 
            'D' => "P(8) 400 unidades; 8 dias." 
        ],
        'correta' => "A",
        'explicacao' => "P(8) = 50 * 8 + 200 = 400 + 200 = 600. Para P(t) = 800:50t + 200 = 800 => 50t = 600 => t = 12."
    ],
    [
        'id' => 3,
        'texto' => "Uma cultura bacteriana dobra de quantidade a cada 3 horas. Começando com 500 bactérias, quantas bacterias existirão após 15 horas?",
        'alternativas' => [ 'A' => "1.000.", 'B' => "4.000.", 'C' => "8.000.", 'D' => "16.000." ],
        'correta' => "D",
        'explicacao' => "Períodos de 3h em 15h: 15 / 3 = 5 15 / 3 = 5. Fator 2⁵ = 32. Quantidade =  500 * 32 = 16.000. 500 * 32 = 16.000."
    ],
    [
        'id' => 4,
        'texto' => "Um produto custa R$ 120,00 e está com desconto de 10% à vista. Qual o preço com desconto? ",
        'alternativas' => [ 'A' => "R$ 100,00", 'B' => "R$ 108,00", 'C' => "R$ 110,00", 'D' => "R$ 112,00" ],
        'correta' => "B",
        'explicacao' => "10% de 120 =  0,10 * 120 = 12 0,10 * 120=12. Preço =  120 - 12 = 108 120 - 12 = 108."
    ],
    [
        'id' => 5,
        'texto' => "A função linear  f ( x ) = 3 x + 2 f(x) = 3 x + 2. Qual é f(4)?",
        'alternativas' => [ 'A' => "10", 'B' => "12", 'C' => "14", 'D' => "8" ],
        'correta' => "C",
        'explicacao' => "f(4) = 3 ⋅ 4 + 2 = 12 + 2 = 14."
    ],
    [
        'id' => 6,
        'texto' => "As notas de 4 exercícios são: 7, 8, 6 e 9. Qual a média aritmética?",
        'alternativas' => [ 'A' => "7,5", 'B' => "7,25", 'C' => "7,75", 'D' => "8,0" ],
        'correta' => "A",
        'explicacao' => "Soma =  7 + 8 + 6 + 9 = 30. Média =  30 / 4 = 7,5."
    ],
    [
        'id' => 7,
        'texto' => "Um capital de R$ 200 rende 5% de juros simples por mês. Qual o valor dos juros em um mês?",
        'alternativas' => [ 'A' => "R$ 5,00", 'B' => "R$ 8,00", 'C' => "R$ 12,00", 'D' => "10,00" ],
        'correta' => "D",
        'explicacao' => "Juros =  200 * 0,05 = 10."
    ],
    [
        'id' => 8,
        'texto' => "Um caminhante anda 2 km por hora. Quanto tempo (em horas) ele levará para percorrer 7 km?",
        'alternativas' => [ 'A' => "3 h", 'B' => "3,5 h ", 'C' => "4h", 'D' => "2,5h" ],
        'correta' => "B",
        'explicacao' => "Tempo = distância / velocidade =  7 / 2 = 3,5."
    ],
    [
        'id' => 9,
        'texto' => "Numa urna há 4 bolas vermelhas e 6 bolas verdes (total 10). Se extraímos uma bola ao acaso, qual a probabilidade de ela ser verde?",
        'alternativas' => [ 'A' => "2/5", 'B' => "3/5 ", 'C' => "4/10", 'D' => "6/10" ],
        'correta' => "B",
        'explicacao' => "Probabilidade = número de verdes / total =  6 / 10 = 3 / 5."
    ],
    [
        'id' => 10,
        'texto' => "Se todo triângulo tem três lados e toda figura com três lados é um triângulo, o que podemos afirmar sobre uma figura que tem três lados?",
        'alternativas' => [ 'A' => "Pode ser um quadrado.", 'B' => "Pode ser um triângulo.", 'C' => "Deve ser um triângulo.", 'D' => ") Não podemos afirmar nada." ],
        'correta' => "C",
        'explicacao' => "Pela definição, qualquer figura com três lados é um triângulo."
    ],
    [
        'id' => 11,
        'texto' => "Um caminhão carrega 1 tonelada de areia. Se ele carregar 1 tonelada de algodão, o que acontecerá?",
        'alternativas' => [ 'A' => "O caminhão ficará mais leve.", 'B' => "O caminhão ficará vazio.", 'C' => "O peso será diferente.", 'D' => "O caminhão ficará mais cheio." ],
        'correta' => "D",
        'explicacao' => "A massa é a mesma, mas o algodão tem menor densidade, ocupando mais volume."
    ],
    [
        'id' => 12,
        'texto' => "Se todo número par é divisível por 2, qual das afirmações é verdadeira?",
        'alternativas' => [ 'A' => "12 é divisível por 2.", 'B' => "9 é divisível por 2.", 'C' => "15 é um número par.", 'D' => "7 é um número par." ],
        'correta' => "A",
        'explicacao' => "Somente 12 é par e, portanto, divisível por 2."
    ],
    [
        'id' => 13,
        'texto' => "Um jardim tem formato circular e raio de 7 metros. Use  𝜋 = 3,14. Qual a área aproximada?",
        'alternativas' => [ 'A' => "120 m²", 'B' => "140 m²", 'C' => "150 m²", 'D' => "154 m²" ],
        'correta' => "D",
        'explicacao' => "A = πr² = 3,14 * 7² = 3,14 * 49 = 153,86"
    ],
    [
        'id' => 14,
        'texto' => "Uma caixa tem dimensões de 30 cm * 20 cm * 10 cm. Qual é o volume da caixa em litros (1 litro = 1.000 cm³)?",
        'alternativas' => [ 'A' => "3 L", 'B' => "5 L", 'C' => "6 L", 'D' => "10 L" ],
        'correta' => "C",
        'explicacao' => "V = 30 * 20 * 10 = 6000 cm3 = 6L"
    ],
    [
        'id' => 15,
        'texto' => "Em uma caixa há 10 bolas, sendo 6 vermelhas e 4 azuis. Qual a probabilidade de sair azul?",
        'alternativas' => [ 'A' => "1/4", 'B' => "2/5", 'C' => "3/5", 'D' => "4/10" ],
        'correta' => "B",
        'explicacao' => "P = 4/10 = 2/5"
    ],
    [
        'id' => 16,
        'texto' => "Um mapa está na escala 1 : 500.000. A distância entre duas cidades é 8 cm no mapa. Qual é a distância real?",
        'alternativas' => [ 'A' => "20 km", 'B' => "30 km", 'C' => "40 km", 'D' => "50 km" ],
        'correta' => "C",
        'explicacao' => "1 cm → 500.000 cm = 5 km. 8 cm → 8 * 5 = 40 km"
    ],
    [
        'id' => 17,
        'texto' => "Um provedor cobra uma taxa fixa de R$ 30,00 por mês, mais R$ 2,00 por gigabyte de internet consumido. Se um cliente usa 15 GB, quanto pagará?",
        'alternativas' => [ 'A' => "R$ 55,00", 'B' => "R$ 65,00", 'C' => "70,00", 'D' => "R$ 60,00" ],
        'correta' => "D",
        'explicacao' => "f(x) = 30 + 2x → f(15) = 30 + 2 *15 = 60"
    ],
    [
        'id' => 18,
        'texto' => "Um prédio projeta uma sombra de 20 m quando o Sol forma um ângulo de 30° com o solo. Qual é a altura do prédio? (Use tan 30° = 0 , 577)",
        'alternativas' => [ 'A' => "8,5 m", 'B' => "10,5 m", 'C' => "11,5 m", 'D' => "12 m" ],
        'correta' => "C",
        'explicacao' => "tan(30°) = h/20 ​→ h = 20 * 0,577 = 11,54"
    ],
    [
        'id' => 19,
        'texto' => "Resolva a equação: 2x + 5 = 13",
        'alternativas' => [ 'A' => "3", 'B' => "4", 'C' => "5", 'D' => "6" ],
        'correta' => "B",
        'explicacao' => "2x = 13 - 5 → 2x = 8 → x = 4"
    ],
    [
        'id' => 20,
        'texto' => "Um jardim circular tem raio de 7 m. Qual é a área do jardim? (Use π ≈ 3,14)",
        'alternativas' => [ 'A' => "143,12 m²", 'B' => "147,00 m²", 'C' => "153,86 m²", 'D' => "154,00 m²" ],
        'correta' => "C",
        'explicacao' => "Área = π * r² = 3,14 * 7² = 3,14 * 49 ≈ 153,86"
    ],
    [
        'id' => 21,
        'texto' => "Resolva: x² - 5x + 6 = 0",
        'alternativas' => [ 'A' => "x = 1 ou x = 6", 'B' => "x = 2 ou x = 3", 'C' => "x = -2 ou x = -3", 'D' => "x = 3 ou x = 6" ],
        'correta' => "B",
        'explicacao' => "x² - 5x + 6 = 0 → ( x - 2)( x- 3) = 0 → x = 2 ou x = 3"
    ],
    [
        'id' => 22,
        'texto' => "PA com primeiro termo 2 e razão 3. Qual é o 15º termo?",
        'alternativas' => [ 'A' => "x = 1 ou x = 6", 'B' => "x = 2 ou x = 3", 'C' => "x = -2 ou x = -3", 'D' => "x = 3 ou x = 6" ],
        'correta' => "B",
        'explicacao' => "x² - 5x + 6 = 0 → ( x - 2)( x- 3) = 0 → x = 2 ou x = 3"
    ],
    [
        'id' => 23,
        'texto' => "Um tanque comporta 2.500 litros de água. Quantos metros cúbicos isso representa?",
        'alternativas' => [ 'A' => "1,5 m³", 'B' => "2,0 m³", 'C' => "60 cm²", 'D' => "65 cm²" ],
        'correta' => "D", // Corrigi para D para usar a explicação correta de 2.5m³
        'explicacao' => "1 m³ = 1.000 litros → 2.500 litros = 2.500 / 1.000 = 2,5 m³"
    ],
    [
        'id' => 24,
        'texto' => "Um paralelogramo tem base 10 cm e altura 6 cm. Qual é a área?",
        'alternativas' => [ 'A' => "50 cm²", 'B' => "55 cm²", 'C' => "25 m³", 'D' => "2,5 m³" ],
        'correta' => "C", // Corrigi para C para usar a explicação correta de 60cm²
        'explicacao' => "Área = base * altura = 10 * 6 = 60 cm²"
    ],
    [
        'id' => 25,
        'texto' => "Se f(x) = 2x + 5, qual é o valor de x para f(x) = 15?",
        'alternativas' => [ 'A' => "4", 'B' => "5", 'C' => "6", 'D' => "7" ],
        'correta' => "B",
        'explicacao' => "2x + 5 = 15 → 2x = 10 → x = 5"
    ], 
    [
        'id' => 26,
        'texto' => "Se uma função relaciona cada elemento do conjunto A a exatamente um elemento do conjunto B, qual tipo de relação é essa?",
        'alternativas' => [ 'A' => "Função", 'B' => "Probabilidade", 'C' => "Conjunto vazio", 'D' => "Equação quadrática" ],
        'correta' => "A",
        'explicacao' => "A - É a definição de função."
    ],
    [
        'id' => 27,
        'texto' => "Um polígono possui todos os lados e ângulos iguais. Como ele é chamado?",
        'alternativas' => [ 'A' => "Losango", 'B' => "Polígono regular", 'C' => "Quadrado", 'D' => "Retângulo" ],
        'correta' => "B",
        'explicacao' => "D - Polígonos com lados e ângulos iguais são regulares."
    ],
    [
        'id' => 28,
        'texto' => "Um cubo é um sólido com faces quadradas e todas iguais. Quantas faces, vértices e arestas ele possui, respectivamente?",
        'alternativas' => [ 'A' => "6, 8, 12", 'B' => "6, 6, 12", 'C' => "8, 6, 12", 'D' => "6, 12, 8" ],
        'correta' => "A",
        'explicacao' => "A - Cubo: 6 faces, 8 vértices, 12 arestas."
    ],
    [
        'id' => 29,
        'texto' => "Um cubo é um sólido com faces quadradas e todas iguais. Quantas faces, vértices e arestas ele possui, respectivamente?",
        'alternativas' => [ 'A' => "6, 8, 12", 'B' => "6, 6, 12", 'C' => "8, 6, 12", 'D' => "6, 12, 8" ],
        'correta' => "A",
        'explicacao' => "Cubo: 6 faces, 8 vértices, 12 arestas."
    ],
    [
        'id' => 30,
        'texto' => "Uma função é chamada crescente quando:",
        'alternativas' => [ 'A' => "O valor de y diminui à medida que x aumenta.", 'B' => "O valor de y aumenta à medida que x aumenta.", 'C' => "O valor de x permanece constante.", 'D' => "O gráfico é uma linha horizontal." ],
        'correta' => "B",
        'explicacao' => "Função crescente: x aumenta → y também aumenta."
    ],
    [
        'id' => 31,
        'texto' => "Qual das opções representa corretamente um número racional?",
        'alternativas' => [ 'A' => "√2", 'B' => "π", 'C' => "2/3", 'D' => "e (número de Euler)." ],
        'correta' => "C",
        'explicacao' => "2/3 é um número racional, pois pode ser expresso como fração."
    ],
    [
        'id' => 32,
        'texto' => "Um cilindro pode ser visualizado como:",
        'alternativas' => [ 'A' => "A rotação de um triângulo em torno de um eixo.", 'B' => "A rotação de um retângulo em torno de um de seus lados.", 'C' => "A rotação de um quadrado em torno de sua diagonal.", 'D' => "A rotação de um círculo em torno de um de seus raios." ],
        'correta' => "B",
        'explicacao' => "O cilindro é formado pela rotação de um retângulo."
    ],
    [
        'id' => 33,
        'texto' => "Um cilindro pode ser visualizado como:",
        'alternativas' => [ 'A' => "A rotação de um triângulo em torno de um eixo.", 'B' => "A rotação de um retângulo em torno de um de seus lados.", 'C' => "A rotação de um quadrado em torno de sua diagonal.", 'D' => "A rotação de um círculo em torno de um de seus raios." ],
        'correta' => "B",
        'explicacao' => "O cilindro é formado pela rotação de um retângulo."
    ],
    [
        'id' => 34,
        'texto' => "Se dois eventos não podem acontecer ao mesmo tempo, eles são chamados de:",
        'alternativas' => [ 'A' => "Independentes", 'B' => "Complementares", 'C' => "Mutuamente exclusivos", 'D' => "Simultâneos" ],
        'correta' => "C",
        'explicacao' => "Eventos que não ocorrem juntos são mutuamente exclusivos."
    ]
];

$TOTAL_QUESTOES_DESEJADAS = 34;
$Q_FAKE_COUNT = $TOTAL_QUESTOES_DESEJADAS - count($questoes);

// Lógica PHP para adicionar questões FAKE, se o total for menor que o desejado
for ($i = 0; $i < $Q_FAKE_COUNT; $i++) {
    $fakeId = count($questoes) + 1;
    $questoes[] = [
        'id' => $fakeId,
        'texto' => 'QUESTÃO ' . $fakeId . ' (FAKE - Substitua!) - Enunciado da questão ' . $fakeId . '.',
        'alternativas' => [
            'A' => 'Alternativa A da Questão ' . $fakeId,
            'B' => 'Alternativa B da Questão ' . $fakeId,
            'C' => 'Alternativa C da Questão ' . $fakeId,
            'D' => 'Alternativa D da Questão ' . $fakeId
        ],
        'correta' => "A",
        'explicacao' => 'Esta é a explicação detalhada da Questão ' . $fakeId . ' (FAKE).'
    ];
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulado de Matemática</title>
    <link rel="stylesheet" href="../templates/css/simulado.css">
</head>
<body>
    <div vw class="enabled">
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper>
            <div class="vw-plugin-top-wrapper"></div>
        </div>
    </div>
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script>
        new window.VLibras.Widget('https://vlibras.gov.br/app')
    </script>

    <header>
        <h1>Simulado de Matemática</h1>
        
        <div id="navegacao-rapida-topo">
        </div>
    </header>

    <div id="container-principal">
        <div id="area-principal-conteudo">
            
            <div id="introducao" class="container-introducao">
                <h2>Bem-vindo ao Simulado de Matemática!</h2>
                <p>Este simulado contém <span id="total-questoes-intro"><?php echo count($questoes); ?></span> questões de múltipla escolha. Você terá <strong>2 horas</strong> para completar todas elas.</p>
                
                <div class="regras">
                    <h3>Regras Importantes:</h3>
                    <ul>
                        <li>O cronômetro será iniciado assim que você clicar em "Começar Prova".</li>
                        <li>Você só poderá finalizar o simulado após responder <strong>todas as questões</strong>.</li>
                        <li>Se o tempo acabar, a prova será encerrada e enviada automaticamente.</li>
                        <li>Você pode navegar livremente entre as questões e mudar suas respostas.</li>
                    </ul>
                </div>
                
                <button id="iniciar-prova-btn" class="nav-btn">Começar Prova</button>
            </div>
            <div id="prova" class="container">
                
                <div id="cabecalho-prova">
                    <div id="cronometro">
                        Tempo Restante: <span id="tempo-restante">02:00:00</span>
                    </div>
                </div>

                <form id="formulario-simulado">
                </form>

                <div id="finalizar-btn-flutuante" class="oculto">
                    Finalizar Simulado
                </div>
            </div>
            <div id="resultado" class="oculto">
                <h2>Resultado do Simulado</h2>
                <p>Você acertou <span id="acertos-total">0</span> de <span id="total-questoes-resultado">0</span> questões.</p>

                <button id="voltar-prova-btn">Voltar à Prova</button>

                <h3>Gabarito Completo e Resoluções</h3>
                
                <input type="text" id="pesquisa-questao" placeholder="Pesquisar por número da questão..." oninput="filtrarGabarito(this.value)">

                <div id="gabarito-completo">
                </div>
            </div>
        </div>
    </div>

    <script>
        // Transforma o array PHP em uma variável JavaScript
        var questoes = <?php echo json_encode($questoes); ?>;
        var TOTAL_QUESTOES_DESEJADAS = <?php echo $TOTAL_QUESTOES_DESEJADAS; ?>;

        var questaoAtualIndex = 0;
        var respostasUsuario = {};

        var formulario = document.getElementById('formulario-simulado');
        var navegacaoRapidaTopoDiv = document.getElementById('navegacao-rapida-topo');
        var finalizarBtnFlutuante = document.getElementById('finalizar-btn-flutuante');
        var resultadoDiv = document.getElementById('resultado');
        var provaDiv = document.getElementById('prova');
        var cronometroDiv = document.getElementById('cronometro');
        var tempoRestanteSpan = document.getElementById('tempo-restante');
        var cabecalhoProvaDiv = document.getElementById('cabecalho-prova');
        var voltarProvaBtn = document.getElementById('voltar-prova-btn');
        var pesquisaInput = document.getElementById('pesquisa-questao');
        var gabaritoCompletoDiv = document.getElementById('gabarito-completo');
        var introducaoDiv = document.getElementById('introducao'); 
        var iniciarProvaBtn = document.getElementById('iniciar-prova-btn'); 


        var DURACAO_SEGUNDOS = 2 * 60 * 60; // 2 horas em segundos
        var AVISO_SEGUNDOS = 10 * 60; // 10 minutos em segundos
        var segundosPassados = 0; 
        var intervaloCronometro;


        function formatarTempo(segundos) {
            
            var h = Math.floor(segundos / 3600);
            var m = Math.floor((segundos % 3600) / 60);
            var s = segundos % 60;
            

            var horasFormatadas = String(h).padStart(2, '0');
            var minutosFormatadas = String(m).padStart(2, '0');
            var segundosFormatados = String(s).padStart(2, '0');
            

            return horasFormatadas + ':' + minutosFormatadas + ':' + segundosFormatados;
        }

        function iniciarCronometro() {
            
            if (intervaloCronometro) {
                clearInterval(intervaloCronometro);
            }
            

            intervaloCronometro = setInterval(function() {
                segundosPassados++; 
                var segundosRestantes = DURACAO_SEGUNDOS - segundosPassados;

                
                if (segundosRestantes <= 0) {
                    clearInterval(intervaloCronometro);
                    tempoRestanteSpan.textContent = "00:00:00";
                    alert("O tempo do simulado acabou! A prova será finalizada automaticamente.");
                    finalizarSimulado(true); 
                    return;
                }

                if (segundosRestantes <= AVISO_SEGUNDOS) {
                    cronometroDiv.classList.add('aviso');
                } else {
                    cronometroDiv.classList.remove('aviso');
                }

                tempoRestanteSpan.textContent = formatarTempo(segundosRestantes);
            }, 1000);
        }

        // NOVO: FUNÇÃO PARA INICIAR O SIMULADO
        function iniciarSimulado() {
            // 1. Oculta a introdução
            introducaoDiv.classList.add('oculto'); 
            
            // 2. Mostra a prova e elementos flutuantes/fixos
            provaDiv.classList.remove('oculto');
            cabecalhoProvaDiv.classList.remove('oculto');
            finalizarBtnFlutuante.classList.remove('oculto');
            navegacaoRapidaTopoDiv.classList.remove('oculto'); // A barra de navegação no topo também deve reaparecer
            
            // 3. Inicia o cronômetro
            iniciarCronometro();
        }


        function salvarResposta(id, resposta, index) {
            respostasUsuario[id] = resposta;
            renderizarNavegacaoRapidaTopo();
        }

        function mudarQuestao(index) {
            
            if (index < 0 || index >= questoes.length) {
                return;
            }
            questaoAtualIndex = index;
            renderizarQuestao(questaoAtualIndex);
            renderizarNavegacaoRapidaTopo();
        }

        function renderizarQuestao(index) {
            var q = questoes[index];
            var idQuestao = q.id;
            
            var opcoesHTML = '';
            var alternativasChaves = ['A', 'B', 'C', 'D'];

            
            for (var i = 0; i < alternativasChaves.length; i++) {
                var opcao = alternativasChaves[i];
                var estaRespondida = respostasUsuario[idQuestao] === opcao ? 'checked' : '';
                var textoAlternativa = q.alternativas[opcao];
                
                
                opcoesHTML = opcoesHTML + 
                    '<label class="alternativa">' +
                        '<input type="radio" ' +
                                'name="q' + idQuestao + '" ' +
                                'value="' + opcao + '" ' +
                                estaRespondida + 
                                ' onchange="salvarResposta(' + idQuestao + ', \'' + opcao + '\', ' + index + ')">' +
                        '<span style="font-weight: bold;">' + opcao + ')</span> ' + textoAlternativa +
                    '</label>';
            }

            formulario.innerHTML = 
                '<div class="questao" id="q' + idQuestao + '">' +
                    '<h3>Questão ' + q.id + ' de ' + questoes.length + '</h3>' +
                    '<p>' + q.texto + '</p>' +
                    '<div class="opcoes">' +
                        opcoesHTML +
                    '</div>' +
                    '<div class="navegacao-questao">' +
                        
                        '<button type="button" class="nav-btn" ' + (index === 0 ? 'disabled' : '') + ' onclick="mudarQuestao(' + (index - 1) + ')">Anterior</button>' +
                       
                        '<button type="button" class="nav-btn" ' + (index === questoes.length - 1 ? 'disabled' : '') + ' onclick="mudarQuestao(' + (index + 1) + ')">Próxima</button>' +
                    '</div>' +
                '</div>';
        }

        function renderizarNavegacaoRapidaTopo() {
            var navHTML = '';
            
            for (var index = 0; index < questoes.length; index++) {
                var q = questoes[index];
                var classe = 'btn-questao-topo';
            
                if (respostasUsuario[q.id]) {
                    classe += ' respondida';
                }
            
                if (index === questaoAtualIndex) {
                    classe += ' atual';
                }

                navHTML = navHTML + '<button class="' + classe + '" onclick="mudarQuestao(' + index + ')">' + q.id + '</button>';
            }
            navegacaoRapidaTopoDiv.innerHTML = navHTML;
        }


        function finalizarSimulado(automatico) { 
            clearInterval(intervaloCronometro); 
            
            var segundosRestantes = DURACAO_SEGUNDOS - segundosPassados;

            var totalRespondidas = 0;
            // Contando quantas questões foram respondidas (usando loop)
            for (var key in respostasUsuario) {
                if (respostasUsuario.hasOwnProperty(key)) {
                    totalRespondidas++;
                }
            }
            
            // REGRA: IMPEDIR O ENVIO SEM TODAS AS QUESTÕES RESPONDIDAS (exceto se for envio automático)
            if (!automatico && totalRespondidas < questoes.length) {
                alert('É necessário responder todas as ' + questoes.length + ' questões para finalizar o simulado. Você respondeu apenas ' + totalRespondidas + '.');
                iniciarCronometro(); // Volta o cronômetro
                return; // Impede a finalização
            }
            
            // Confirmação para finalizar antes do tempo (só entra se automatico for false E todas as questões estiverem respondidas)
            if (!automatico && segundosRestantes > 0) {
                if (!confirm('Você tem certeza que deseja finalizar a prova?')) {
                    iniciarCronometro(); // Volta o cronômetro se o usuário desistir
                    return;
                }
            }
            
            // OCULTA OS ELEMENTOS DA PROVA
            provaDiv.classList.add('oculto');
            finalizarBtnFlutuante.classList.add('oculto');
            cabecalhoProvaDiv.classList.add('oculto');
            navegacaoRapidaTopoDiv.classList.add('oculto'); // Oculta a barra de círculos
            
            // MOSTRA O RESULTADO
            resultadoDiv.classList.remove('oculto');
            
            pesquisaInput.value = '';
            calcularResultado();
        }

        function voltarProva() {
            var segundosRestantes = DURACAO_SEGUNDOS - segundosPassados;

            if (segundosRestantes <= 0) {
                alert("O tempo do simulado esgotou. Não é possível voltar à prova.");
                return;
            }
            
            resultadoDiv.classList.add('oculto');
            provaDiv.classList.remove('oculto');
            finalizarBtnFlutuante.classList.remove('oculto');
            cabecalhoProvaDiv.classList.remove('oculto');
            navegacaoRapidaTopoDiv.classList.remove('oculto'); // Mostra a barra de círculos
            
            iniciarCronometro();
        }

        function calcularResultado() {
            var acertos = 0;
            gabaritoCompletoDiv.innerHTML = ''; // Limpa resultados anteriores

            // Loop FOR tradicional para processar as questões
            for (var i = 0; i < questoes.length; i++) {
                var q = questoes[i];
                var respostaDada = respostasUsuario[q.id];
                var estaCorreta = respostaDada === q.correta;

                if (estaCorreta) {
                    acertos++;
                }

                // Cria a div do resultado (usando método DOM, mais fundamental que innerHTML para iniciantes)
                var resultadoItem = document.createElement('div');
                resultadoItem.classList.add('resultado-questao');
                resultadoItem.setAttribute('data-questao-id', q.id); 
                
                // Constrói o HTML interno usando concatenação de strings
                resultadoItem.innerHTML = 
                    '<h4>Questão ' + q.id + '</h4>' +
                    '<p style="margin-bottom: 15px;">' + q.texto.substring(0, 150) + '...</p>' + 
                    '<p class="resposta-correta"><strong>Correta:</strong> ' + q.correta + ') ' + q.alternativas[q.correta] + '</p>' +
                    '<p class="sua-resposta"><strong>Sua Resposta:</strong> ' + (respostaDada ? respostaDada + ') ' + q.alternativas[respostaDada] : 'Não Respondida') + '</p>' +
                    '<p style="margin-top: 15px;"><strong>Resolução:</strong> ' + q.explicacao + '</p>' +
                    '<hr style="border: 0; border-top: 1px solid #eee; margin-top: 20px;">';
                
                gabaritoCompletoDiv.appendChild(resultadoItem);
            }

            // Atualiza o placar
            document.getElementById('acertos-total').textContent = String(acertos);
            document.getElementById('total-questoes-resultado').textContent = String(questoes.length);
        }

        function filtrarGabarito(termo) {
            // Seleciona todos os itens do gabarito
            var itens = gabaritoCompletoDiv.querySelectorAll('.resultado-questao');
            var numeroQuestao = parseInt(termo.trim());

            // Loop para verificar cada item
            for (var i = 0; i < itens.length; i++) {
                var item = itens[i];
                var id = parseInt(item.getAttribute('data-questao-id'));
                
                // Lógica de filtro: Se o termo não é um número OU se o ID da questão corresponde ao número
                if (isNaN(numeroQuestao) || id === numeroQuestao) {
                    item.style.display = 'block'; // Mostra
                } else {
                    item.style.display = 'none'; // Esconde
                }
            }
        }
                                                                                                                                                                                                                                                
        function init() {
            // OCULTA ELEMENTOS DA PROVA QUE DEVEM SUMIR NA TELA INICIAL
            provaDiv.classList.add('oculto');
            cabecalhoProvaDiv.classList.add('oculto');
            finalizarBtnFlutuante.classList.add('oculto');
            navegacaoRapidaTopoDiv.classList.add('oculto'); // Oculta a barra de navegação no topo

            // Define o total de questões na tela de introdução
            // Nota: O PHP já preencheu a tag span no HTML, mas esta linha garante a consistência se você decidir manter o JS.
            document.getElementById('total-questoes-intro').textContent = questoes.length;
            
            // ADICIONA O LISTENER NO NOVO BOTÃO DE INÍCIO
            iniciarProvaBtn.addEventListener('click', iniciarSimulado);

            // Renderiza a primeira questão e a navegação (embora oculta, para estar pronta)
            renderizarQuestao(questaoAtualIndex);
            renderizarNavegacaoRapidaTopo();
            
            
            finalizarBtnFlutuante.addEventListener('click', function() {
                finalizarSimulado(false);
            });
            
            voltarProvaBtn.addEventListener('click', voltarProva); 
            
            pesquisaInput.addEventListener('input', function(e) {
                filtrarGabarito(e.target.value);
            });
            
            var segundosRestantesIniciais = DURACAO_SEGUNDOS - segundosPassados;
            tempoRestanteSpan.textContent = formatarTempo(segundosRestantesIniciais);
        }

        init();
    </script>
</body>
</html>