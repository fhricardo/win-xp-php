<?php
include '../config/conn.php'; // conexão PDO

// Verifica se veio via POST (atualização)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id       = $_POST['id'] ?? '';
    $nome     = $_POST['nome'] ?? '';
    $cpf      = $_POST['cpf'] ?? '';
    $email    = $_POST['email'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $endereco = $_POST['endereco'] ?? '';

    if ($id && $nome && $cpf && $email && $telefone && $endereco) {
        try {
            $stmt = $conn->prepare("
                UPDATE clientes 
                SET nome = :nome, cpf = :cpf, email = :email, telefone = :telefone, endereco = :endereco 
                WHERE id = :id
            ");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->bindValue(':nome', $nome);
            $stmt->bindValue(':cpf', $cpf);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':telefone', $telefone);
            $stmt->bindValue(':endereco', $endereco);

            if ($stmt->execute()) {
                echo "<p class='xp-message success'>Cliente <strong>$nome</strong> atualizado com sucesso!</p>";
            } else {
                echo "<p class='xp-message error'>Erro ao atualizar cliente.</p>";
            }
        } catch (PDOException $e) {
            echo "<p class='xp-message error'>Erro: " . htmlspecialchars($e->getMessage()) . "</p>";
        }
    } else {
        echo "<p class='xp-message error'>Preencha todos os campos.</p>";
    }

    exit; // Impede renderização do formulário novamente
}

// Se chegou até aqui, é GET — exibe o formulário com dados existentes
$id = $_GET['id'] ?? '';

if (!$id) {
    echo "<p class='xp-message error'>ID de cliente não informado.</p>";
    exit;
}

try {
    $stmt = $conn->prepare("SELECT * FROM clientes WHERE id = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$cliente) {
        echo "<p class='xp-message error'>Cliente não encontrado.</p>";
        exit;
    }
} catch (PDOException $e) {
    echo "<p class='xp-message error'>Erro: " . htmlspecialchars($e->getMessage()) . "</p>";
    exit;
}
?>

<h2>Editar Cliente</h2>

<form method="post">
    <input type="hidden" name="id" value="<?= htmlspecialchars($cliente['id']) ?>">

    <div>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="<?= htmlspecialchars($cliente['nome']) ?>" required>
    </div>

    <div>
        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" id="cpf" value="<?= htmlspecialchars($cliente['cpf']) ?>" required>
    </div>

    <div>
        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" value="<?= htmlspecialchars($cliente['email']) ?>" required>
    </div>

    <div>
        <label for="telefone">Telefone:</label>
        <input type="tel" name="telefone" id="telefone" value="<?= htmlspecialchars($cliente['telefone']) ?>" required>
    </div>

    <div>
        <label for="endereco">Endereço:</label>
        <input type="text" name="endereco" id="endereco" value="<?= htmlspecialchars($cliente['endereco']) ?>" required>
    </div>

    <button type="submit">Salvar Alterações</button>
</form>