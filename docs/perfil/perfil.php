<?php
// Incluir o arquivo de conexão com o banco de dados
include_once 'docs/includes/db.php';

// Iniciar a sessão para obter o ID do usuário logado
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header("Location: /docs/login/index.php?error=Você precisa estar logado para acessar esta página.");
    exit;
}

$user_id = $_SESSION['user_id'];

// Buscar as informações do usuário no banco de dados
$stmt = $pdo->prepare("SELECT nome_completo, idade, telefone, cpf, email FROM clientes WHERE id = :user_id");
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Verificar se o usuário existe
if (!$user) {
    echo "Usuário não encontrado!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Cliente</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrapper">
        <h1>Perfil do Cliente</h1>
        <p><strong>Nome:</strong> <?= htmlspecialchars($user['nome_completo']) ?></p>
        <p><strong>Idade:</strong> <?= htmlspecialchars($user['idade']) ?></p>
        <p><strong>Telefone:</strong> <?= htmlspecialchars($user['telefone']) ?></p>
        <p><strong>CPF:</strong> <?= htmlspecialchars($user['cpf']) ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>

        <!-- Formulário para excluir conta -->
        <form action="deletar.php" method="POST">
            <input type="hidden" name="user_id" value="<?= htmlspecialchars($user_id) ?>"> <!-- ID do usuário -->
            <button type="submit" name="deletar" onclick="return confirm('Você tem certeza de que deseja excluir sua conta?')">Excluir Conta</button>
        </form>
        
        <!-- Botão para sair da conta -->
        <form action="logout.php" method="POST">
            <button type="submit">Sair</button>
        </form>
    </div>
</body>
</html>
