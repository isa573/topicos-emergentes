<?php
$nome= $_POST["nome"];
$endereco= $_POST["endereco"];
$telefone= $_POST["telefone"];

$servidor="localhost";
$user="root";
$senha="";
$banco="agenda";
$conexao=mysqli_connect($servidor,$user,$senha,$banco);
if($conexao){
    echo "conexao bem sucedida";
}
?>