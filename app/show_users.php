<?php
// Criando array com 10 usuários
$usuarios = [
    [
        'ID' => 1,
        'Nome' => 'Ana Silva',
        'CPF' => '123.456.789-00',
        'Email' => 'ana.silva@email.com',
        'Telefone' => '(11) 99999-1234',
        'Endereço' => 'Rua das Flores, 123 - São Paulo/SP'
    ],
    [
        'ID' => 2,
        'Nome' => 'Carlos Oliveira',
        'CPF' => '234.567.890-11',
        'Email' => 'carlos.oliveira@email.com',
        'Telefone' => '(21) 98888-5678',
        'Endereço' => 'Av. Brasil, 456 - Rio de Janeiro/RJ'
    ],
    [
        'ID' => 3,
        'Nome' => 'Mariana Santos',
        'CPF' => '345.678.901-22',
        'Email' => 'mariana.santos@email.com',
        'Telefone' => '(31) 97777-9012',
        'Endereço' => 'Rua Minas Gerais, 789 - Belo Horizonte/MG'
    ],
    [
        'ID' => 4,
        'Nome' => 'Pedro Costa',
        'CPF' => '456.789.012-33',
        'Email' => 'pedro.costa@email.com',
        'Telefone' => '(41) 96666-3456',
        'Endereço' => 'Rua Curitiba, 321 - Curitiba/PR'
    ],
    [
        'ID' => 5,
        'Nome' => 'Juliana Lima',
        'CPF' => '567.890.123-44',
        'Email' => 'juliana.lima@email.com',
        'Telefone' => '(51) 95555-7890',
        'Endereço' => 'Av. Assis Brasil, 654 - Porto Alegre/RS'
    ],
    [
        'ID' => 6,
        'Nome' => 'Ricardo Almeida',
        'CPF' => '678.901.234-55',
        'Email' => 'ricardo.almeida@email.com',
        'Telefone' => '(61) 94444-1234',
        'Endereço' => 'SQS 102, Bloco A - Brasília/DF'
    ],
    [
        'ID' => 7,
        'Nome' => 'Fernanda Rocha',
        'CPF' => '789.012.345-66',
        'Email' => 'fernanda.rocha@email.com',
        'Telefone' => '(71) 93333-5678',
        'Endereço' => 'Av. Sete de Setembro, 987 - Salvador/BA'
    ],
    [
        'ID' => 8,
        'Nome' => 'Bruno Pereira',
        'CPF' => '890.123.456-77',
        'Email' => 'bruno.pereira@email.com',
        'Telefone' => '(81) 92222-9012',
        'Endereço' => 'Rua do Sol, 147 - Recife/PE'
    ],
    [
        'ID' => 9,
        'Nome' => 'Patrícia Nunes',
        'CPF' => '901.234.567-88',
        'Email' => 'patricia.nunes@email.com',
        'Telefone' => '(85) 91111-3456',
        'Endereço' => 'Av. Beira Mar, 258 - Fortaleza/CE'
    ],
    [
        'ID' => 10,
        'Nome' => 'Lucas Mendes',
        'CPF' => '012.345.678-99',
        'Email' => 'lucas.mendes@email.com',
        'Telefone' => '(92) 90000-7890',
        'Endereço' => 'Rua Amazonas, 369 - Manaus/AM'
    ]
];
?>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Endereço</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?php echo $usuario['ID']; ?></td>
                <td><?php echo $usuario['Nome']; ?></td>
                <td><?php echo $usuario['CPF']; ?></td>
                <td><?php echo $usuario['Email']; ?></td>
                <td><?php echo $usuario['Telefone']; ?></td>
                <td><?php echo $usuario['Endereço']; ?></td>
                <td><button type="button" onclick='newWindow("Editar Usuário", "edit_user", "<?= $usuario['ID']; ?>")'>Editar</button></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>