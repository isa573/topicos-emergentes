<?php
$v1 = array("Ferrari", "McLaren", "Red Bull", "BMW", "BAR");

$v2 = array('a'=>8, 'b'=>9, 'd'=>6, 'c'=>2, 'e'=>5);

$v3 = array("rg" => "00.000.00--X", "cpf" => "000.000.000--00", "cartao de credito" => 12345);

$chamada = array("aluno1" => "alberto", "aluno3" => "bianca", "aluno5" => "carlos", "aluno24" => "maria");

// Função para exibir chave e valor de um vetor
function exibirChavesValores($nome, $vetor) {
    echo "$nome:<br>";
    foreach ($vetor as $chave => $valor) {
        echo "Chave: $chave => Valor: $valor<br>";
    }
    echo "<br>";
}

exibirChavesValores('v1', $v1);
exibirChavesValores('v2', $v2);
exibirChavesValores('v3', $v3);
exibirChavesValores('chamada', $chamada);
?>