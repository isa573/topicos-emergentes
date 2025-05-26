<?php
include('conexao.php');
$sql = "SELECT * FROM contatos";
$result = mysqli_query($conexao, $sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Agenda</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Contatos</h1>
    <?php if (isset($_GET['msg']) && $_GET['msg'] == 'excluido'): ?>
        <div style="color: green; margin-bottom: 10px;">Contato excluído com sucesso!</div>
    <?php endif; ?>
    <a href="agenda.php">Adicionar novo contato</a>
    <table>
        <tr>
            <th>Nome</th>
            <th>Endereço</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= htmlspecialchars($row['nome']); ?></td>
            <td><?= htmlspecialchars($row['endereco']); ?></td>
            <td><?= htmlspecialchars($row['telefone']); ?></td>
            <td class="actions">
                <a href="editar.php?id=<?= $row['id']; ?>">Editar</a>
                <a href="excluir.php?id=<?= $row['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir este contato?');">Excluir</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>
</body>
</html>