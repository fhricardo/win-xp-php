<?php
require 'config/conn.php';
if (!empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nome  = trim($_POST['nome']);
        $email = trim($_POST['email']);
        $senha = $_POST['senha'];

        // Gera o hash seguro da senha
        $hash = password_hash($senha, PASSWORD_DEFAULT);

        try {
            $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                ':nome'  => $nome,
                ':email' => $email,
                ':senha' => $hash
            ]);

            header("Location: index.php");
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                echo "Usuário já existe!";
            } else {
                echo "Erro ao cadastrar: " . $e->getMessage();
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Windows XP</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js" defer></script>
</head>

<body class="logon-screen">
    <div class="logon-window">
        <img src="assets/win-logon.webp" alt="">
        <form method="post">
            <div><label for="username">Nome:</label>
                <input type="text" name="nome" id="nome">
            </div>
            <div>
                <label for="email">E-mail:</label>
                <input type="email" name="email" id="email">
            </div>
            <div>
                <label for="pass">Senha:</label>
                <input type="password" name="senha" id="senha">
            </div>

            <div class="btn-set">
                <button type="submit">OK</button>

                <button type="reset" onclick="start()">Cancelar</button>
                <a href="shutdown.html"><button type="button">Desligar...</button></a>
            </div>
        </form>
    </div>
</body>

</html>