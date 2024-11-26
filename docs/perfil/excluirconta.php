<?php
// Incluir o arquivo de conexão com o banco
include_once 'docs/includes/db.php';

// Iniciar a sessão para obter o ID do usuário logado
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header("Location: /docs/login/index.php?error=Você precisa estar logado para excluir sua conta.");
    exit;
}

// Verificar se o formulário de exclusão foi enviado
if (isset($_POST['deletar']) && isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];

    // Preparar a query para deletar o usuário no banco de dados
    $stmt = $pdo->prepare("DELETE FROM clientes WHERE id = :user_id");
    $stmt->bindParam(':user_id', $user_id);

    // Executar a query
    if ($stmt->execute()) {
        // Destruir a sessão e redirecionar para a página de login
        session_unset();
        session_destroy();
        header("Location: /docs/login/index.php?status=conta_excluida");
        exit;
    } else {
        echo "Erro ao excluir a conta.";
    }
} else {
    echo "Ação de exclusão não permitida.";
}
?>