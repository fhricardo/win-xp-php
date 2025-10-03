<?php
if (!empty($_POST['nome']) && !empty($_POST['email'])) {
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);

    // Aqui você faria o INSERT no banco, mas por enquanto só exemplo
    echo "<p style='color:green;'>Usuário <strong>$nome</strong> cadastrado com sucesso!</p>";
} else {
    echo "<p style='color:red;'>Preencha todos os campos!</p>";
}
