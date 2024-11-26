<?php
// Incluir arquivo de conexão com o banco
include_once 'docs/includes/db.php';

// Obter os dados do formulário
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Verificar se os campos estão preenchidos
if (empty($email) || empty($password)) {
    echo "Por favor, preencha todos os campos.";
    exit;
}

// Buscar usuário no banco de dados
$stmt = $pdo->prepare("SELECT id, senha FROM clientes WHERE email = :email");
$stmt->bindParam(':email', $email);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user['senha'])) {
    // Login bem-sucedido
    session_start();
    $_SESSION['user_id'] = $user['id'];
    header("Location: /docs/index.php"); // Redireciona para a página principal
    exit;
} else {
    // Falha no login
    header("Location: /docs/index.php");
    exit;
}
?>
