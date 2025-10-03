<?php
include '../config/conn.php'; // conexão PDO

// Se veio via POST → confirmar exclusão
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? '';

    if ($id) {
        try {
            $stmt = $conn->prepare("DELETE FROM clientes WHERE id = :id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo "<p class='xp-message success'>Cliente excluído com sucesso!</p>";
            } else {
                echo "<p class='xp-message error'>Nenhum cliente encontrado com esse ID.</p>";
            }
        } catch (PDOException $e) {
            echo "<p class='xp-message error'>Erro ao excluir cliente: " . htmlspecialchars($e->getMessage()) . "</p>";
        }
    } else {
        echo "<p class='xp-message error'>ID inválido.</p>";
    }

    exit; // evita exibir o formulário abaixo
}

// Se chegou até aqui, é GET → pede confirmação
$id = $_GET['id'] ?? '';

if (!$id) {
    echo "<p class='xp-message error'>ID de cliente não informado.</p>";
    exit;
}

try {
    $stmt = $conn->prepare("SELECT nome FROM clientes WHERE id = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$cliente) {
        echo "<p class='xp-message error'>Cliente não encontrado.</p>";
        exit;
    }
} catch (PDOException $e) {
    echo "<p class='xp-message error'>Erro ao buscar cliente: " . htmlspecialchars($e->getMessage()) . "</p>";
    exit;
}
?>

<h2>Excluir Cliente</h2>
<p>Tem certeza que deseja excluir o cliente <strong><?= htmlspecialchars($cliente['nome']) ?></strong>?</p>

<form method="post">
    <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
    <button type="submit">Sim, excluir</button>
</form>