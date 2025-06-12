<?php
// a) $v1 = range(0, 12)
$v1 = range(0, 12);
// b) $v2 = range(0, 100, 10)
$v2 = range(0, 100, 10);
// c) $v3 = range('a', 'i')
$v3 = range('a', 'i');
// d) $v4 = range('e', 'a')
$v4 = range('e', 'a');

// Função para exibir o conteúdo do vetor usando foreach
function exibirVetor($nome, $vetor) {
    echo "$nome: ";
    foreach ($vetor as $valor) {
        echo $valor . " ";
    }
    echo "<br>";
}

exibirVetor('v1', $v1);
exibirVetor('v2', $v2);
exibirVetor('v3', $v3);
exibirVetor('v4', $v4);
?>