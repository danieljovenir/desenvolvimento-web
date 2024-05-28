<?php
session_start();
require_once "db_conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura os dados do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $data_nascimento = $_POST["data_nascimento"];
    $telefone = $_POST["telefone"];

    // Verifica se o email já está cadastrado
    $sql_verificar = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultado_verificar = $conexao->query($sql_verificar);

    if ($resultado_verificar->num_rows > 0) {
        echo '<script>alert("Este email já está cadastrado. Por favor, tente outro."); window.location.href = "cadastro.php";</script>';
    } else {
        // Insere o novo usuário no banco de dados
        $sql_inserir = "INSERT INTO usuarios (nome, email, senha, data_nascimento, telefone) VALUES ('$nome', '$email', '$senha', '$data_nascimento', '$telefone')";
        if ($conexao->query($sql_inserir) === TRUE) {
            echo '<script>alert("Cadastro realizado com sucesso! Faça login para acessar sua conta."); window.location.href = "index.php";</script>';
        } else {
            echo '<script>alert("Erro ao cadastrar usuário. Por favor, tente novamente.");</script>';
        }
    }
}
?>
