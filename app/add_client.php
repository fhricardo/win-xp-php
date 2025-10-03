<?php
// Verifica se veio via POST — se sim, processa o retorno aqui dentro mesmo
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include '../config/conn.php'; // aqui o $conn é um objeto PDO

    $nome = $_POST['nome'] ?? '';
    $cpf = $_POST['cpf'] ?? '';
    $email = $_POST['email'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $endereco = $_POST['endereco'] ?? '';

    try {
        $stmt = $conn->prepare("INSERT INTO clientes (nome, cpf, email, telefone, endereco) VALUES (:nome, :cpf, :email, :telefone, :endereco)");
        $stmt->execute([
            ':nome' => $nome,
            ':cpf' => $cpf,
            ':email' => $email,
            ':telefone' => $telefone,
            ':endereco' => $endereco
        ]);

        echo "<p class='xp-message success'>Cliente <strong>$nome</strong> cadastrado com sucesso!</p>";
    } catch (PDOException $e) {
        echo "<p class='xp-message error'>Erro ao cadastrar cliente: " . htmlspecialchars($e->getMessage()) . "</p>";
    }

    exit; // impede renderização do form abaixo
}
?>

<!-- Janela Cadastro Cliente -->
<h2>Cadastro de Cliente</h2>

<form method="post">
    <div>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required />
    </div>

    <div>
        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" id="cpf" required />
    </div>

    <div>
        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" required />
    </div>

    <div>
        <label for="telefone">Telefone:</label>
        <input type="tel" name="telefone" id="telefone" required />
    </div>

    <div>
        <label for="endereco">Endereço:</label>
        <input type="text" name="endereco" id="endereco" required />
    </div>

    <button type="submit">Cadastrar</button>
</form>