<?php
session_start();

require_once '../vendor/autoload.php';

use Controller\UserController;

$userController = new UserController();

$registerMessage = '';
$messageType = ''; 

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
            $userId = $userController->createUser($nome, $email, $senha);

            if ($userId) {
                $registerMessage = 'Cadastro realizado com sucesso! Redirecionando para o login...';
                $messageType = 'success';
                header('Refresh: 3; URL=login.php'); 
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
    <title>Cadastro - Intelecta</title>
    <link rel="stylesheet" href="../templates/css/login-cadastro.css"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
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
    <div class="background-visual"></div>
    <div class="cadastro-container">
        <div class="cadastro-form-container"> <div class="logo-container">
                 <h1 class="logo-text">Intelecta</h1>
            </div>

            <h2 class="welcome-title">Crie sua conta Intelecta</h2>
            <p class="welcome-subtitle">Aprenda de forma rápida e eficiente. É grátis!</p>
        
            <?php if (!empty($registerMessage)): ?>
                <div class="alert alert-<?php echo $messageType; ?>">
                    <?php echo $registerMessage; ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="cadastro.php">
                <div class="input-group">
                    <label for="nome">Nome Completo</label>
                    <input type="text" id="nome" name="nome" required
                        placeholder="Seu nome e sobrenome"
                        value="<?php echo isset($_POST['nome']) ? htmlspecialchars($_POST['nome']) : ''; ?>"
                    >
                </div>
                
                <div class="input-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" required
                        placeholder="seu.email@exemplo.com"
                        value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"
                    >
                </div>
                
                <div class="input-group">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" required
                        placeholder="Crie uma senha forte"
                    >
                </div>

                <div class="input-group">
                    <label for="confirmar_senha">Confirme a Senha</label>
                    <input type="password" id="confirmar_senha" name="confirmar_senha" required
                        placeholder="Repita sua senha"
                    >
                </div>
                
                <button type="submit" class="cadastro-btn">Cadastrar</button>
            </form>
            
            <div class="divider">
                <span>ou cadastre-se com</span>
            </div>
            <div class="social-buttons">
                <div class="social-btn facebook-btn"> <a href="https://www.facebook.com/login/?locale=pt_BR"><i class="fab fa-facebook-f"></i> </a></div>
                    <div class="social-btn google-btn"> <a href="https://www.google.com"><i class="fab fa-google"></i> </a></div>
                    <div class="social-btn apple-btn"> <a href="https://www.apple.com/br/"><i class="fab fa-apple"></i> </a></div>
            </div>

            <div class="login-link">
                <p>Já tem uma conta? <a href="login.php">Fazer Login</a></p>
            </div>
        </div>
    </div>
</body>
</html>