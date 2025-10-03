<?php
require 'config/conn.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome  = trim($_POST['nome']);
    $senha = $_POST['senha'];

    try {
        // Busca o usuário pelo nome
        $sql = "SELECT * FROM usuarios WHERE nome = :nome LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':nome' => $nome]);
        $usuario = $stmt->fetch();

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            // Cria sessão
            $_SESSION['usuario'] = [
                'id'    => $usuario['id'],
                'nome'  => $usuario['nome'],
                'email' => $usuario['email']
            ];

            header("Location: home.php");
            exit;
        } else {
            header("Location: index.php?erro=Usuário ou senha incorretos");
            exit;
        }
    } catch (PDOException $e) {
        die("Erro ao efetuar login: " . $e->getMessage());
    }
}
