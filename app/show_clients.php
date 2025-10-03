<?php
include '../config/conn.php'; // conexão PDO

function getClients($conn)
{
    try {
        $stmt = $conn->query("SELECT id, nome, cpf, email, telefone, endereco FROM clientes ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return [];
    }
}

$clientes = getClients($conn);
?>

<h2>Lista de Clientes</h2>

<div id="clients-container">
    <?php if (count($clientes) > 0): ?>
        <table class="xp-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Endereço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clientes as $cliente): ?>
                    <tr data-id="<?= $cliente['id'] ?>">
                        <td><?= htmlspecialchars($cliente['id']) ?></td>
                        <td><?= htmlspecialchars($cliente['nome']) ?></td>
                        <td><?= htmlspecialchars($cliente['cpf']) ?></td>
                        <td><?= htmlspecialchars($cliente['email']) ?></td>
                        <td><?= htmlspecialchars($cliente['telefone']) ?></td>
                        <td><?= htmlspecialchars($cliente['endereco']) ?></td>
                        <td>
                            <button onclick="newWindow('Editar Cliente','edit_client','<?= $cliente['id'] ?>')">Editar</button>
                            <button onclick="newWindow('Excluir Cliente','delete_client','<?= $cliente['id'] ?>')">Excluir</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="xp-message">Nenhum cliente cadastrado ainda.</p>
    <?php endif; ?>
</div>

<style>
    .xp-btn-edit,
    .xp-btn-delete {
        background-color: #ece9d8;
        border: 1px solid #888;
        padding: 4px 8px;
        cursor: pointer;
        font-size: 13px;
        margin-right: 4px;
    }

    .xp-btn-edit:hover,
    .xp-btn-delete:hover {
        background-color: #d4d0c8;
    }

    .xp-message {
        margin-top: 6px;
        padding: 6px;
        border-radius: 3px;
    }

    .xp-message.success {
        background: #d9ffd9;
        border: 1px solid #6b6;
    }

    .xp-message.error {
        background: #ffd9d9;
        border: 1px solid #b66;
    }
</style>

<script>
    function attachClientButtons() {
        document.querySelectorAll('.xp-btn-edit').forEach(btn => {
            btn.onclick = () => {
                const id = btn.dataset.id;
                if (typeof newWindow === 'function') {
                    newWindow(`Editar Cliente ${id}`, `app/edit_client.php?id=${id}`);
                } else {
                    alert('Função newWindow não encontrada.');
                }
            };
        });

        document.querySelectorAll('.xp-btn-delete').forEach(btn => {
            btn.onclick = () => {
                const id = btn.dataset.id;
                if (typeof newWindow === 'function') {
                    newWindow(`Excluir Cliente ${id}`, `app/delete_client.php?id=${id}`);
                } else {
                    alert('Função newWindow não encontrada.');
                }
            };
        });
    }

    // chama a função quando o DOM estiver pronto
    document.addEventListener('DOMContentLoaded', attachClientButtons);

    // função para atualizar a tabela via AJAX sem reload
    function refreshClientTable() {
        fetch('app/show_clients.php')
            .then(res => res.text())
            .then(html => {
                document.getElementById('clients-container').innerHTML = html;
                attachClientButtons(); // reaplica eventos
            })
            .catch(err => console.error(err));
    }

    // Exemplo de uso: após edição ou exclusão, você pode chamar
    // window.refreshClientTable(); dentro de edit_client.php ou delete_client.php
</script>