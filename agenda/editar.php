<?php
include('conexao.php');

$mensagem = '';
$msgClass = '';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Busca o contato pelo ID
    $sql = "SELECT * FROM contatos WHERE id = $id";
    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) == 1) {
        $contato = mysqli_fetch_assoc($resultado);
    } else {
        $mensagem = "Contato não foi encontrado.";
        $msgClass = "error-message";
    }
} else {
    $mensagem = "ID não informado.";
    $msgClass = "error-message";
}

// Atualização
if (isset($_POST['atualizar'])) {
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $endereco = mysqli_real_escape_string($conexao, $_POST['endereco']);
    $telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);

    $sql2 = "UPDATE contatos SET nome='$nome', endereco='$endereco', telefone='$telefone' WHERE id=$id";
    if (mysqli_query($conexao, $sql2)) {
        $mensagem = "Contato atualizado com sucesso!";
        $msgClass = "success-message";
        // Atualiza os dados locais para exibir no formulário
        $contato['nome'] = $nome;
        $contato['endereco'] = $endereco;
        $contato['telefone'] = $telefone;
    } else {
        $mensagem = "Erro ao atualizar: " . mysqli_error($conexao);
        $msgClass = "error-message";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Contato</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Editar Contato</h1>
    <?php if (!empty($mensagem)): ?>
        <div class="<?= $msgClass; ?>"><?= $mensagem; ?></div>
    <?php endif; ?>
    <?php if (isset($contato)): ?>
    <form method="post" autocomplete="off">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required value="<?= htmlspecialchars($contato['nome']); ?>" placeholder="Nome do contato">

        <label for="endereco">Endereço:</label>
        <input type="text" id="endereco" name="endereco" value="<?= htmlspecialchars($contato['endereco']); ?>" placeholder="Endereço completo">

        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" value="<?= htmlspecialchars($contato['telefone']); ?>" placeholder="(XX) XXXXX-XXXX">

        <button type="submit" name="atualizar">Atualizar contato</button>
    </form>
    <?php endif; ?>
    <div style="text-align:center; margin-top: 18px;">
        <a href="index.php">← Voltar para agenda</a>
    </div>
</div>
</body>
</html>