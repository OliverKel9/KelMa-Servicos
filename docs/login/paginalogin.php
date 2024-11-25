<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="wrapper">
        <form action="processlogin.php" method="POST">
            <h1>Kelma</h1>
            <div class="input-box">
                <input type="email" name="email" placeholder="e-mail" required>
                <i class='bx bx-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="senha" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox" name="remember">lembrar</label>
                <a href="#">Esqueceu a senha?</a>
            </div>
            <div class="register-link">
                <br>
                <button type="submit" class="botao-login">Entrar</button>
                <br>
                <p style="margin-top: 15px;">Não tem uma conta? <a href=".../.../cadastro/cadastro.php"><strong>cadastre-se</strong></a></p>
            </div>
        </form>
    </div>
</body>
</html>
