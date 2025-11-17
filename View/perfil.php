<?php
session_start();

// 🔧 Inclui as classes necessárias
require_once '../Controller/UserController.php';
require_once '../Model/User.php';
require_once '../Model/Connection.php';

use Controller\UserController;

// 🔧 Instancia o controlador
$userController = new UserController();
$mensagem = '';

// 🔐 Simulação de login (para TESTE)
if (!isset($_SESSION['email'])) {
    $_SESSION['email'] = 'joao.silva@email.com';
}

// 🔌 Conexão com MySQL (MySQLi)
$conn = new mysqli('localhost', 'root', '', 'intelecta');
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$email = $_SESSION['email'];

// 🧩 Ações do formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // 🗑️ Deletar conta
    if (isset($_POST['deletar_conta'])) {
        $userController->deletarConta($email);
        session_destroy();
        header('Location: login.php');
        exit();
    }

    // 🖼️ Atualizar foto de perfil
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === 0) {
        $extensao = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
        $nome_arquivo = uniqid() . "." . $extensao;
        $caminho = "../uploads/" . $nome_arquivo;

        if (!is_dir("../uploads")) {
            mkdir("../uploads", 0755, true);
        }

        if (move_uploaded_file($_FILES['foto']['tmp_name'], $caminho)) {
            $sql = "UPDATE user SET foto = ? WHERE email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $caminho, $email);
            $stmt->execute();
            $mensagem = "Foto atualizada com sucesso!";
        } else {
            $mensagem = "Erro ao salvar a imagem.";
        }
    }

    // ✏️ Atualizar nome e/ou email
    if (isset($_POST['salvar_nome_email'])) {

        // Atualizar nome
        if (!empty($_POST['novo_nome'])) {
            $novo_nome = $_POST['novo_nome'];
            $sql = "UPDATE user SET nome = ? WHERE email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $novo_nome, $email);
            $stmt->execute();
            $mensagem = "Nome atualizado com sucesso!";
        }

        // Atualizar email
        if (!empty($_POST['novo_email']) && $_POST['novo_email'] !== $email) {
            $novo_email = $_POST['novo_email'];
            $sql = "UPDATE user SET email = ? WHERE email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $novo_email, $email);
            $stmt->execute();
            $_SESSION['email'] = $novo_email;
            $email = $novo_email;
            $mensagem = "E-mail atualizado com sucesso!";
        }

        // Atualizar senha (somente se digitada)
        if (!empty($_POST['nova_senha'])) {
            $novaSenha = $_POST['nova_senha'];
            $userController->alterarSenha($email, $novaSenha);
            $mensagem = "Senha alterada com sucesso!";
        }
    }
}

// 👤 Buscar dados do usuário
$sql = "SELECT nome, email, foto FROM user WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $usuario = $result->fetch_assoc();
    $nome = $usuario['nome'];
    $email = $usuario['email'];
    $foto = !empty($usuario['foto']) ? $usuario['foto'] : '../Images/user.jpg';
} else {
    $nome = "Usuário";
    $email = "email@exemplo.com";
    $foto = '../Images/user.jpg';
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Perfil - Intelecta</title>
    <link rel="stylesheet" href="../templates/css/perfil.css">
</head>

<body>
    <div class="app-container">
        <header class="app-header">
            <div class="welcome-text">
                <h1><span class="thin-text">Bem-vindo(a) de volta,</span><br>
                    <strong><?= htmlspecialchars($nome); ?> 🚀</strong>
                </h1>
            </div>
            <div class="streak-container">
                <img src="src/img/icons8-elemento-fogo-32.png" alt="Ofensiva" class="fire-icon">
                <span class="streak-number">0</span>
            </div>
        </header>

 <nav class="desktop-nav">
            <a href="#" class="nav-item active">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M3 9L12 2L21 9V20C21 20.5 20.8 21 20.4 21.4C20 21.8 19.5 22 19 22H5C4.5 22 4 21.8 3.6 21.4C3.2 21 3 20.5 3 20V9Z" stroke="currentColor" stroke-width="2" />
                    <path d="M9 22V12H15V22" stroke="currentColor" stroke-width="2" />
                </svg>
                <span>Início</span>
            </a>
            <a href="#" class="nav-item">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect x="3" y="3" width="18" height="18" rx="2" stroke="currentColor" stroke-width="2" />
                    <path d="M9 11L11 13L15 9" stroke="currentColor" stroke-width="2" />
                </svg>
                <span>Exercícios</span>
            </a>
            <a href="novidades.html" class="nav-item">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M13 2L3 14H12L11 22L21 10H12L13 2Z" stroke="currentColor" stroke-width="2" />
                </svg>
                <span>Novidades</span>
            </a>
            <a href="#" class="nav-item">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <circle cx="12" cy="8" r="5" stroke="currentColor" stroke-width="2" />
                    <path d="M3 21C3 17.1 7 14 12 14C17 14 21 17.1 21 21" stroke="currentColor" stroke-width="2" />
                </svg>
                <span>Perfil</span>
            </a>
        </nav>


        <main class="app-main">
            <div class="profile-content">
                <h2>Dados Cadastrais</h2>
                <p>Informações sobre sua conta</p>

                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group photo-upload">
                        <label>Foto</label>
                        <div class="photo-wrapper">
                            <img src="<?= htmlspecialchars($foto); ?>" alt="Foto do usuário" id="profile-pic">
                            <input type="file" name="foto" id="file-input" accept="image/*" style="display: none;">
                            <button type="button" class="change-photo-btn" onclick="document.getElementById('file-input').click()">Alterar</button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="novo_nome">Nome</label>
                        <input type="text" id="novo_nome" name="novo_nome" value="<?= htmlspecialchars($nome); ?>">
                    </div>

                    <div class="form-group">
                        <label for="novo_email">Email</label>
                        <input type="email" id="novo_email" name="novo_email" value="<?= htmlspecialchars($email); ?>">
                    </div>

                    <div class="form-group">
                        <label for="nova_senha">Senha</label>
                        <input type="password" id="nova_senha" name="nova_senha" placeholder="Digite uma nova senha">
                    </div>

                    <div class="form-actions">
                        <button type="submit" name="salvar_nome_email" class="save-btn">Salvar Alterações</button>
                    </div>

                    <div id="encerrar-conta">
                        <h2>Sair da Conta</h2>
                        <p>Se sair de sua conta, poderá fazer o login novamente utilizando o email e senha cadastrados.</p>
                        <div class="form-actions">
                            <button type="submit" name="deletar_conta" class="delete-account-btn">Sair</button>
                        </div>
                    </div>

                    <?php if (!empty($mensagem)): ?>
                        <p style="color: green; font-weight: bold;"><?= htmlspecialchars($mensagem); ?></p>
                    <?php endif; ?>
                </form>
            </div>
        </main>
    </div>
</body>
</html>