<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lar das Meninas - Página Inicial</title>
    <link rel="stylesheet" href="styles.css"> <!-- Se você tiver um arquivo CSS separado -->
</head>
<body>
    <div class="container">
        <h1>Bem-vindo ao Lar das Meninas</h1>
        <div class="options">
            <h2>Login</h2>
            <form action="login.php" method="post">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br><br>
                
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required><br><br>
                
                <input type="submit" value="Entrar">
            </form>
        </div>
        <div class="options">
            <h2>Cadastro</h2>
            <p>Ainda não tem uma conta? <a href="register.php">Cadastre-se aqui</a>.</p>
        </div>
    </div>
</body>
</html>
