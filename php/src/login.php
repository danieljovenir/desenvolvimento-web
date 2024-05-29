<?php
session_start();
require_once "db_conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém o email e a senha fornecidos no formulário
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    try {
        // Consulta SQL para buscar o usuário com o email fornecido
        $consulta = $conexao->prepare("SELECT * FROM usuarios WHERE email = :email");
        $consulta->bindParam(":email", $email);
        $consulta->execute();

        // Verifica se o usuário foi encontrado
        if ($usuario = $consulta->fetch(PDO::FETCH_ASSOC)) {
            // Verifica se a senha fornecida corresponde à senha armazenada no banco de dados
            if (password_verify($senha, $usuario['senha'])) {
                // Senha correta - armazena o email na sessão e redireciona para a página de perfil
                $_SESSION['email'] = $email;
                header("Location: perfil.php");
                exit();
            } else {
                // Senha incorreta
                echo '<script>alert("Email ou senha inválidos. Tente novamente.");</script>';
            }
        } else {
            // Usuário não encontrado
            echo '<script>alert("Usuário não encontrado.");</script>';
        }
    } catch (PDOException $e) {
        // Erro na consulta SQL
        echo "Erro na consulta SQL: " . $e->getMessage();
    }
}
