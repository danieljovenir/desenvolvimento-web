<?php
session_start();
require_once "db_conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura os dados do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT); // Criptografa a senha
    $data_nascimento = $_POST["data_nascimento"];
    $telefone = $_POST["telefone"];

    try {
        // Verifica se o email já está cadastrado
        $sql_verificar = "SELECT * FROM usuarios WHERE email = :email";
        $stmt_verificar = $conexao->prepare($sql_verificar);
        $stmt_verificar->bindParam(':email', $email);
        $stmt_verificar->execute();

        if ($stmt_verificar->rowCount() > 0) {
            echo '<script>alert("Este email já está cadastrado. Por favor, tente outro."); window.location.href = "index.php";</script>';
        } else {
            // Insere o novo usuário no banco de dados
            $sql_inserir = "INSERT INTO usuarios (nome, email, senha, data_nascimento, telefone) VALUES (:nome, :email, :senha, :data_nascimento, :telefone)";
            $stmt_inserir = $conexao->prepare($sql_inserir);
            $stmt_inserir->bindParam(':nome', $nome);
            $stmt_inserir->bindParam(':email', $email);
            $stmt_inserir->bindParam(':senha', $senha);
            $stmt_inserir->bindParam(':data_nascimento', $data_nascimento);
            $stmt_inserir->bindParam(':telefone', $telefone);
            $stmt_inserir->execute();

            echo '<script>alert("Cadastro realizado com sucesso! Faça login para acessar sua conta."); window.location.href = "index.php";</script>';
        }
    } catch (PDOException $e) {
        echo "Erro ao inserir usuário: " . $e->getMessage();
    }
}
