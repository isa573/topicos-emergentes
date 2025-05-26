<?php
include('conexao.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Verifica se o contato existe
    $sql_check = "SELECT * FROM contatos WHERE id = $id";
    $resultado = mysqli_query($conexao, $sql_check);

    if (mysqli_num_rows($resultado) == 1) {
        // Executa a exclusão
        $sql_delete = "DELETE FROM contatos WHERE id = $id";
        if (mysqli_query($conexao, $sql_delete)) {
            header('Location: index.php?msg=excluido');
            exit;
        } else {
            echo "Erro ao excluir contato: " . mysqli_error($conexao);
        }
    } else {
        echo "Contato não encontrado.";
    }
} else {
    echo "ID do contato não informado.";
}
?>