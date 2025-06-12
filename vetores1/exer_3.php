<?php
// Inicializa a lista de convidados na sessão
session_start();

if (!isset($_SESSION['convidados'])) {
    $_SESSION['convidados'] = [];
}

if (isset($_POST['nome']) && !empty(trim($_POST['nome']))) {
    $nome = trim($_POST['nome']);
    if (!in_array($nome, $_SESSION['convidados'])) {
        $_SESSION['convidados'][] = $nome;
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Convidados</title>
</head>
<body>
    <h1>Controle de Lista de Convidados</h1>
    <form method="post">
        <label for="nome">Nome do convidado:</label>
        <input type="text" name="nome" id="nome" required>
        <button type="submit">Adicionar</button>
    </form>
    <h2>Convidados:</h2>
    <ul>
        <?php foreach ($_SESSION['convidados'] as $convidado): ?>
            <li><?= htmlspecialchars($convidado) ?></li>
        <?php endforeach; ?>
    </ul>
    <form method="post">
        <button type="submit" name="limpar" value="1">Limpar lista</button>
    </form>
    <?php
    if (isset($_POST['limpar'])) {
        $_SESSION['convidados'] = [];
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
    ?>
</body>
</html>