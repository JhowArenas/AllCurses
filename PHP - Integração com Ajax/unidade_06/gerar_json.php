<?php
// configurações gerais
    header('Access-Control-Allow-Origin:*');

// abrir conexaoBD
$conecta = mysqli_connect("localhost", "jhow", "#tcc_*", "udemy");

$selecao = "SELECT nomeproduto, precounitario, imagempequena FROM produtos";
$produtos = mysqli_query($conecta, $selecao);

if (!$produtos) {
    echo "falha na conexão ";
}

$retorno = array();
while ($linha = mysqli_fetch_object($produtos)) {
    $retorno[] = $linha;
}

echo json_encode($retorno);

//fechar conec
mysqli_close($conecta);
?>