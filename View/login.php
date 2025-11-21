<?php
session_start();

require_once '../vendor/autoload.php';

use Controller\UserController;

$userController = new UserController();

$loginMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email'], $_POST['senha'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        if ($userController->login($email, $senha)) {
            header('Location: ../View/inicio.php');
            exit();
        } else {
            $loginMessage = 'E-mail ou senha incorretos.';
        }
    } else {
        $loginMessage = 'Por favor, preencha todos os campos.';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Intelecta</title> 
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
    <div class="login-container">
        <div class="login-form-container">
            <div class="logo-container">
                <h1 class="logo-text">Intelecta</h1> 
            </div>
            
            <div class="login-form">
                <h2 class="welcome-title">Bem-vindo(a) de volta!</h2>
                <p class="welcome-subtitle">Acesse sua conta para continuar seus estudos.</p>
                
                <?php if (!empty($loginMessage )): ?>
                    <div class="alert alert-error">
                        <?php echo $loginMessage; ?>
                    </div>
                <?php endif; ?>
                
                <form method="POST" class="form">
                    <div class="input-group">
                        <label for="email">E-mail</label> <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            required
                            placeholder="seu.email@exemplo.com"
                            value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"
                        >
                    </div>
                    <div class="input-group">
                        <label for="senha">Senha</label> <input 
                            type="password" 
                            id="senha" 
                            name="senha" 
                            required
                            placeholder="Sua senha"
                        >
                    </div>
                    <button type="submit" class="login-btn">Entrar</button> 
                </form>
                
                <div class="divider">
                    <span>ou acesse rapidamente</span>
                </div>
                <div class="social-buttons">
                    <div class="social-btn facebook-btn"> <a href="https://www.facebook.com/login/?locale=pt_BR"><i class="fab fa-facebook-f"></i> </a></div>
                    <div class="social-btn google-btn"> <a href="https://www.google.com"><i class="fab fa-google"></i> </a></div>
                    <div class="social-btn apple-btn"> <a href="https://www.apple.com/br/"><i class="fab fa-apple"></i> </a></div>
                </div>
                
                <div class="register-link">
                    <p>Não tem uma conta? <a href="cadastro.php">Crie sua conta Intelecta</a></p>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>