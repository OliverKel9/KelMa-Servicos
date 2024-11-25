<?php
// Inclui o arquivo de conexão com o banco
include_once '../includes/db_connect.php';

// Verifica se os dados foram enviados via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura os dados do formulário
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $idade = filter_input(INPUT_POST, 'idade', FILTER_SANITIZE_NUMBER_INT);
    $telefone = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_STRING);
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT); // Criptografa a senha

    // Valida os dados (opcional: mais validações podem ser adicionadas)
    if (empty($nome) || empty($idade) || empty($telefone) || empty($cpf) || empty($email) || empty($senha)) {
        die('Preencha todos os campos!');
    }

    try {
        // Prepara a query de inserção
        $query = "INSERT INTO clientes (nome, idade, telefone, cpf, email, senha) VALUES (:nome, :idade, :telefone, :cpf, :email, :senha)";
        $stmt = $pdo->prepare($query);

        // Executa a query com os dados
        $stmt->execute([
            ':nome' => $nome,
            ':idade' => $idade,
            ':telefone' => $telefone,
            ':cpf' => $cpf,
            ':email' => $email,
            ':senha' => $senha
        ]);

        // Redireciona ou exibe mensagem de sucesso
        header("Location: /docs/index.php?cadastro=sucesso");
        exit;
    } catch (PDOException $e) {
        echo "Erro ao cadastrar: " . $e->getMessage();
    }
} else {
    echo "Método inválido.";
}
?>
