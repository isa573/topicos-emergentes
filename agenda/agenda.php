<?php
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $endereco = mysqli_real_escape_string($conexao, $_POST['endereco']);
    $telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);

    $mensagem = '';
    $msgClass = '';

    if (!empty($nome)) {
        $sql = "INSERT INTO contatos (nome, endereco, telefone) VALUES ('$nome', '$endereco', '$telefone')";
        if (mysqli_query($conexao, $sql)) {
            $mensagem = "Contato salvo com sucesso!";
            $msgClass = "success-message";
        } else {
            $mensagem = "Erro ao salvar: " . mysqli_error($conexao);
            $msgClass = "error-message";
        }
    } else {
        $mensagem = "Preencha o nome do contato!";
        $msgClass = "error-message";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Contato</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Adicionar Contato</h1>
    <?php if (!empty($mensagem)): ?>
        <div class="<?= $msgClass; ?>"><?= $mensagem; ?></div>
    <?php endif; ?>
    <form method="POST" action="agenda.php" autocomplete="off">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required placeholder="Nome do contato">

        <label for="endereco">Endereço:</label>
        <input type="text" id="endereco" name="endereco" placeholder="Endereço completo">

        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" placeholder="(XX) XXXXX-XXXX">

        <button type="submit">Salvar contato</button>
    </form>
    <div style="text-align:center; margin-top: 18px;">
        <a href="index.php">← Voltar para agenda</a>
    </div>
</div>
</body>
</html>