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
        <form action="login.php" method="post">
            <div><label for="username">Nome:</label>
                <input type="text" name="nome" id="nome">
            </div>
            <div>
                <label for="pass">Senha:</label>
                <input type="password" name="senha" id="senha">
            </div>

            <div class="btn-set">
                <button type="submit">OK</button>

                <button type="reset">Cancelar</button>
                <a href="shutdown.html"><button type="button">Desligar...</button></a>

                <button type="button" onclick="cadastra()">Cadastrar</button>
            </div>
        </form>
    </div>
</body>

</html>