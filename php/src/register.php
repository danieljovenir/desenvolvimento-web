<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lar das Meninas - Cadastro de Conta</title>
    <link rel="stylesheet" href="styles.css"> <!-- Se você tiver um arquivo CSS separado -->
</head>
<body>
    <div class="container">
        <h1>Cadastro de Conta</h1>
        <div class="options">
            <form action="cadastro.php" method="post">
                <label for="nome">Nome Completo:</label>
                <input type="text" id="nome" name="nome" required><br><br>
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br><br>
                
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required><br><br>
                
                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="date" id="data_nascimento" name="data_nascimento" required><br><br>
                
                <label for="telefone">Telefone:</label>
                <input type="text" id="telefone" name="telefone"><br><br>
                
                <input type="submit" value="Cadastrar">
            </form>
        </div>
        <div class="options">
            <p>Já tem uma conta? <a href="index.php">Faça login aqui</a>.</p>
        </div>
    </div>
</body>
</html>
