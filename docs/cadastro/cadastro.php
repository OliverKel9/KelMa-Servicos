<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <title>Cadastro para Cliente</title>
    <link rel="stylesheet" href="cadastro.css">
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="#">Kelma</a>
            </div>
            <div class="Menu">
                <a href="/docs/index.php">Início</a>
                <a id="botao" href="/docs/login/paginalogin.php">Entrar</a>
            </div>
        </nav>  
    </header>

    <main>
        <section class="box">

            <div class="h2_div"><h2>Cadastro</h2></div>
            <br>
            <form action="processarcadastro.php" method="post">
                <label for="nome_completo">Nome Completo:</label>
                <input type="text" id="nome_completo" name="nome_completo" placeholder="Nome"required>
                <br><br><br>


                <label for="idade">Idade:</label>
                <input type="number" id="idade" name="idade" min="18" max="100" placeholder="Idade" required>
                <br><br><br>


                <label for="telefone">Telefone:</label>
                <input type="number" id="telefone" name="telefone" placeholder="xx-9-xxxx-xxxx"
                pattern="[0-9]{2}[9]{1}[0-9]{4}[0-9]{4}" required>
                <br><br><br>

                <label for="cpf">CPF:</label>
                <input type="number" id= "cpf" name="cpf" placeholder="xxx-xxx-xxx-xx"
                pattern="[0-9]{3}[0-9]{3}[0-9]{3}[0-9]{2}" required>
                <br><br><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="exemplo@hotmail.com" required>
                <br><br><br>

                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" minlength="7" placeholder="Senha"required>
                <br><br><br>
                <br>

                <button type="submit" style="padding: 10px 80px; background-color: white; border-radius: 10px; font-size: 16px;">Cadastrar</button>
                
            </form>

        </section>
    </main>   

</body>