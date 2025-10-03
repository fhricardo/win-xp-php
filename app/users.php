<?php
// Se vier POST, processa o cadastro
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';

    if ($nome && $email) {
        // Aqui você faria INSERT no banco, mas por enquanto só exemplo
        echo "<p style='color:green;'>Usuário <strong>$nome</strong> cadastrado com sucesso!</p>";
    } else {
        echo "<p style='color:red;'>Preencha todos os campos!</p>";
    }
    exit; // importante para não renderizar o form de novo
}
?>

<form id="form-user" method="post">
    <label>Nome:</label>
    <input type="text" name="nome" required>
    <br><br>
    <label>E-mail:</label>
    <input type="email" name="email" required>
    <br><br>
    <button type="submit">Cadastrar</button>
</form>

<div id="resposta"></div>