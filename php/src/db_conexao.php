<?php
// Configurações do banco de dados
$servidor = "postgres_local"; // Endereço do servidor
$porta = "5432"; // Porta padrão do PostgreSQL
$usuario = "postgres"; // Nome de usuário do banco de dados
$senha = "postgres"; // Senha do banco de dados
$banco = "postgres"; // Nome do banco de dados

try {
    // Cria uma conexão com o banco de dados usando PDO
    $conexao = new PDO("pgsql:host=$servidor;port=$porta;dbname=$banco", $usuario, $senha);

    // Configura o PDO para lançar exceções em caso de erros
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    // Em caso de erro na conexão, exibe uma mensagem de erro
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
