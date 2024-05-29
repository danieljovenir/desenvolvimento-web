<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}

// Aqui você pode buscar os dados do usuário logado no banco de dados usando $_SESSION['email']
require_once "db_conexao.php";
$email = $_SESSION['email'];
try {
    $consulta = $conexao->prepare("SELECT * FROM usuarios WHERE email = :email");
    $consulta->bindParam(":email", $email);
    $consulta->execute();
    $usuario = $consulta->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erro ao buscar dados do usuário: " . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário - Lar das Meninas</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Lar das Meninas</h1>
            <nav>
                <ul>
                    <li><a href="perfil.php">Home</a></li>
                    <li><a href="#">O Lar</a></li>
                    <li><a href="#">Projetos</a></li>
                    <li><a href="#">Notícias</a></li>
                    <li><a href="#">Contato</a></li>
                    <li><a href="logout.php">Sair da Conta</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <div class="container">
            <h2>Bem-vindo, <?php echo htmlspecialchars($usuario['nome']); ?>!</h2>
            <p>Email: <?php echo htmlspecialchars($usuario['email']); ?></p>
            <p>Data de Nascimento: <?php echo htmlspecialchars($usuario['data_nascimento']); ?></p>
            <p>Telefone: <?php echo htmlspecialchars($usuario['telefone']); ?></p>
        </div>
    </main>
    <footer>
        <div class="container">
            <p>&copy; 2023 Lar das Meninas. Todos os direitos reservados.</p>
        </div>
    </footer>
</body>
</html>
