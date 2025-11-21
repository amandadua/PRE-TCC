<?php
session_start();

require_once '../vendor/autoload.php';

use Controller\UserController;

// Nota: Certifique-se de que a classe UserController e o autoload estão corretos.
// Para este exemplo funcionar sem o resto do seu projeto, vamos simular o UserController.
if (!class_exists('Controller\\UserController')) {
    class DummyUserController {
        public function checkUserByEmail($email) {
            // Simula que 'teste@exemplo.com' já está cadastrado
            return $email === 'teste@exemplo.com';
        }
        public function createUser($nome, $email, $senha) {
            // Simula a criação do usuário e retorna um ID
            return 123; 
        }
    }
    $userController = new DummyUserController();
} else {
    $userController = new UserController();
}

$registerMessage = '';
$messageType = ''; 
$registrationSuccessAndAwaitingPayment = false; // Novo flag de estado
$userId = null; // Inicializa a variável para armazenar o ID do usuário

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['confirmar_senha'])) {
        $nome = trim($_POST['nome']);
        $email = trim($_POST['email']);
        $senha = $_POST['senha'];
        $confirmarSenha = $_POST['confirmar_senha'];

        if ($senha !== $confirmarSenha) {
            $registerMessage = 'As senhas não coincidem. Por favor, tente novamente.';
            $messageType = 'error';
        } 
        else if ($userController->checkUserByEmail($email)) {
            $registerMessage = 'Este e-mail já está cadastrado. Tente fazer login.';
            $messageType = 'error';
        } 
        else {
            // Supondo que 'createUser' cria o usuário no banco de dados com um status inicial (ex: 'pending')
            $userId = $userController->createUser($nome, $email, $senha);

            if ($userId) {
                $registerMessage = 'Cadastro realizado com sucesso! Prossiga para a ativação da conta.';
                $messageType = 'success';
                // Define o flag para exibir a tela de pagamento
                $registrationSuccessAndAwaitingPayment = true; 
            } else {
                $registerMessage = 'Ocorreu um erro interno ao tentar registrar. Verifique os logs do servidor.';
                $messageType = 'error';
            }
        }
    } else {
        $registerMessage = 'Por favor, preencha todos os campos obrigatórios.';
        $messageType = 'error';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro e Pagamento - Intelecta</title>
    <link rel="stylesheet" href="../templates/css/login-cadastro.css"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    
    <style>
        /* Estilos Existentes */
        .payment-stage {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            text-align: center;
        }

        .payment-stage h2 { margin-bottom: 10px; color: #333; }
        .payment-stage p { margin-bottom: 20px; color: #555; }
        .payment-options {
            display: flex;
            flex-direction: column; 
            gap: 15px; 
            width: 100%; 
            max-width: 350px; 
            margin-top: 25px;
        }

        .payment-btn {
            display: flex; align-items: center; justify-content: center;
            padding: 12px 20px; border: 2px solid #ccc; border-radius: 8px;
            cursor: pointer; font-size: 1.1em; font-weight: bold;
            text-decoration: none; color: #333; transition: all 0.3s ease;
        }

        .payment-btn:hover { border-color: #007bff; background-color: #f4f8ff; }
        .payment-icon { margin-right: 10px; width: 30px; height: 30px; object-fit: contain; }
        .pix-btn { background-color: #5b8877ff; border-color: #00965e; color: white; } 
        .pix-btn:hover { background-color: #00965e; border-color: #00734d; }

        .loading-animation {
            border: 4px solid #f3f3f3; border-top: 4px solid #007bff;
            border-radius: 50%; width: 30px; height: 30px;
            animation: spin 2s linear infinite; margin: 10px auto;
            display: none; 
        }
        @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }

        /* --- NOVOS ESTILOS PARA MODAIS --- */
        .modal {
            display: none; /* Escondido por padrão */
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.5); /* Fundo semi-transparente */
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto; /* 5% do topo e centralizado */
            padding: 30px;
            border: 1px solid #888;
            width: 90%; 
            max-width: 450px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            position: relative;
        }

        .modal-content h3 {
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .close-btn {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close-btn:hover,
        .close-btn:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
        
        /* Estilos específicos para o conteúdo do QR Code (Pix, Boleto, Cartão Pós-Form) */
        .qr-code-display {
            width: 150px;
            height: 150px;
            margin: 15px auto;
            background-color: #000; /* Simulação de QR Code */
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 5px;
        }
        .qr-code-display img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .countdown-text { /* Estilo unificado para contagem regressiva */
            font-size: 1.2em;
            font-weight: bold;
            color: #007bff;
            margin-top: 10px;
        }

        /* Estilos para formulário de Cartão */
        #credit-card-form input, #boleto-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-row {
            display: flex;
            gap: 10px;
        }
        .form-row input {
            flex: 1;
        }
    </style>
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
    new window.VLibras.Widget('https://vlibras.gov.br/app');

    let paymentTimeout;
    const userId = '<?php echo $userId ?? "simulated_user"; ?>';

    // --- Função de Confirmação Final ---
    function simulatePaymentConfirmation(userId) {
        document.getElementById('payment-info').innerHTML = 
            '<h2><i class="fas fa-check-circle" style="color: green;"></i> Pagamento Confirmado!</h2>' +
            '<p>Seu acesso foi liberado. Você será redirecionado para a página de Login em instantes...</p>' +
            '<div class="loading-animation" style="display: block;"></div>';

        closeAllModals();

        setTimeout(() => {
            window.location.href = 'login.php';
        }, 3000);
    }

    // --- Fechar Modais ---
    function closeAllModals() {
        document.getElementById('pix-modal').style.display = 'none';
        document.getElementById('credit-card-modal').style.display = 'none';
        document.getElementById('boleto-modal').style.display = 'none';

        if (paymentTimeout) clearTimeout(paymentTimeout);
    }

    // --- PIX (NÃO ALTERADO) ---
    function openPixModal() {
        closeAllModals();
        document.getElementById('pix-modal').style.display = 'block';
        document.getElementById('pix-content').innerHTML = 
            '<h3><i class="fab fa-pix" style="color:#00bf75;"></i> Pagar com Pix</h3>' +
            '<p>Escaneie o QR Code abaixo com seu aplicativo bancário.</p>' +
            '<div class="qr-code-display">' +
                '<img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=ChavePixSimulada-Intelecta" />' +
            '</div>' +
            '<p class="pix-countdown" id="pix-countdown-text">Aguardando pagamento...</p>';

        let countdown = 5;
        const countdownEl = document.getElementById('pix-countdown-text');

        function updatePixCountdown() {
            if (countdown > 0) {
                countdownEl.textContent = `Confirmação automática em ${countdown} segundos...`;
                countdown--;
            } else {
                clearInterval(interval);
                countdownEl.textContent = 'Pagamento Recebido! Redirecionando...';
                simulatePaymentConfirmation(userId);
            }
        }

        const interval = setInterval(updatePixCountdown, 1000);
        updatePixCountdown();
    }

    // --- CARTÃO E BOLETO REESCRITOS E CORRIGIDOS ---
    window.onload = function () {

        // --- Abrir modal de Cartão ---
        window.openCreditCardModal = function () {
            closeAllModals();
            document.getElementById('credit-card-modal').style.display = 'block';
        };

        // --- Processar pagamento com Cartão ---
        const creditForm = document.getElementById('credit-card-form');
        if (creditForm) {
            creditForm.onsubmit = function (e) {
                e.preventDefault();

                document.getElementById('credit-card-modal').innerHTML =
                    '<div class="modal-content">' +
                    '<h3>Processando Cartão...</h3>' +
                    '<p>Aguarde a validação das informações e a aprovação do pagamento.</p>' +
                    '<div class="loading-animation" style="display: block;"></div>' +
                    '</div>';

                setTimeout(() => {
                    simulatePaymentConfirmation(userId);
                }, 3000);
            };
        }

        // --- Abrir modal de Boleto ---
        window.openBoletoModal = function () {
            closeAllModals();
            document.getElementById('boleto-modal').style.display = 'block';
        };

        // --- Gerar boleto ---
        const boletoForm = document.getElementById('boleto-form');
        if (boletoForm) {
            boletoForm.onsubmit = function (e) {
                e.preventDefault();

                document.getElementById('boleto-modal').innerHTML =
                    '<div class="modal-content">' +
                    '<h3>Boleto Gerado!</h3>' +
                    '<p>Você será redirecionado para o login. Seu acesso será liberado em até 24 horas após o pagamento do boleto.</p>' +
                    '<p style="font-weight:bold;">Linha Digitável: 12345.67890 12345.678901 12345.678901 1 00000000000000</p>' +
                    '<button onclick="window.location.href = \'login.php\';" class="cadastro-btn" style="background-color: #6c757d;">Ir para Login</button>' +
                    '</div>';
            };
        }
    };

    // --- Fechar modal ao clicar fora ---
    window.onclick = function(event) {
        if (event.target.classList.contains('modal')) {
            closeAllModals();
        }
    };
</script>
    
    <div class="background-visual"></div>
    <div class="cadastro-container">
        <div class="cadastro-form-container"> 
            <div class="logo-container">
                <h1 class="logo-text">Intelecta</h1>
            </div>

            <div id="registration-stage" style="<?php echo $registrationSuccessAndAwaitingPayment ? 'display: none;' : ''; ?>">
                <h2 class="welcome-title">Crie sua conta Intelecta</h2>
                <p class="welcome-subtitle">Aprenda de forma rápida e eficiente. É grátis!</p>
            
                <?php if (!empty($registerMessage)): ?>
                    <div class="alert alert-<?php echo $messageType; ?>">
                        <?php echo $registerMessage; ?>
                    </div>
                <?php endif; ?>

                <form method="POST" action="cadastro.php">
                    <div class="input-group"> <label for="nome">Nome Completo</label>
                        <input type="text" id="nome" name="nome" required placeholder="Seu nome e sobrenome" value="<?php echo isset($_POST['nome']) ? htmlspecialchars($_POST['nome']) : ''; ?>">
                    </div>
                    
                    <div class="input-group"> <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" required placeholder="seu.email@exemplo.com" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                    </div>
                    
                    <div class="input-group"> <label for="senha">Senha</label>
                        <input type="password" id="senha" name="senha" required placeholder="Crie uma senha forte">
                    </div>

                    <div class="input-group"> <label for="confirmar_senha">Confirme a Senha</label>
                        <input type="password" id="confirmar_senha" name="confirmar_senha" required placeholder="Repita sua senha">
                    </div>
                    
                    <button type="submit" class="cadastro-btn">Cadastrar e Ativar</button>
                </form>
                
                <div class="divider"> <span>ou cadastre-se com</span> </div>
                <div class="social-buttons">
                    <div class="social-btn facebook-btn"> <a href="https://www.facebook.com/login/?locale=pt_BR"><i class="fab fa-facebook-f"></i> </a></div>
                    <div class="social-btn google-btn"> <a href="https://www.google.com"><i class="fab fa-google"></i> </a></div>
                    <div class="social-btn apple-btn"> <a href="https://www.apple.com/br/"><i class="fab fa-apple"></i> </a></div>
                </div>

                <div class="login-link">
                    <p>Já tem uma conta? <a href="login.php">Fazer Login</a></p>
                </div>

            </div> <div id="payment-stage" class="payment-stage" style="display: <?php echo $registrationSuccessAndAwaitingPayment ? 'flex' : 'none'; ?>;">
                
                <div id="payment-info">
                    <h2 class="welcome-title">Ativação da Conta: Escolha o Pagamento</h2>
                    <p class="welcome-subtitle">Para liberar seu acesso total à plataforma, escolha o método de pagamento ideal.</p>

                    <div class="payment-options">

                        <a href="javascript:void(0);" class="payment-btn pix-btn" onclick="openPixModal()">
                            <img src="../templates/img/pix.png" alt="Logo Pix" class="payment-icon">
                            Pagar com Pix
                        </a>
                        
                        <a href="javascript:void(0);" class="payment-btn" onclick="openCreditCardModal()">
                            <i class="fas fa-credit-card payment-icon" style="color: #007bff; font-size: 30px;"></i>
                            Pagar com Cartão de Crédito
                        </a>

                        <a href="javascript:void(0);" class="payment-btn" onclick="openBoletoModal()">
                            <i class="fas fa-barcode payment-icon" style="color: #6c757d; font-size: 30px;"></i>
                            Pagar com Boleto Bancário
                        </a>

                    </div>
                    
                </div>

            </div> </div>
    </div>
    
    <div id="pix-modal" class="modal">
        <div id="pix-content" class="modal-content">
            </div>
    </div>

    <div id="credit-card-modal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeAllModals()">&times;</span>
            <h3><i class="fas fa-credit-card" style="color:#007bff;"></i> Detalhes do Cartão</h3>
            <form id="credit-card-form">
                <input type="text" placeholder="Número do Cartão" required minlength="16" maxlength="16">
                <input type="text" placeholder="Nome Impresso no Cartão" required>
                <div class="form-row">
                    <input type="text" placeholder="Validade (MM/AA)" required pattern="(0[1-9]|1[0-2])\/\d{2}">
                    <input type="text" placeholder="CVV" required minlength="3" maxlength="4">
                </div>
                <button type="submit" class="cadastro-btn">Confirmar Pagamento</button>
            </form>
        </div>
    </div>

    <div id="boleto-modal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeAllModals()">&times;</span>
            <h3><i class="fas fa-barcode" style="color:#6c757d;"></i> Geração de Boleto</h3>
            <form id="boleto-form">
                <p>O Boleto será gerado com o nome e CPF da conta cadastrada.</p>
                <input type="text" placeholder="CPF" required minlength="11" maxlength="11">
                <button type="submit" class="cadastro-btn" style="background-color: #6c757d;">Gerar Boleto</button>
            </form>
        </div>
    </div>
    
</body>
</html>