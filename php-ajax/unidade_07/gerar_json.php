<?php
// configurações gerais
header('Access-Control-Allow-Origin:*');

// preparar o arquivo para callback
$callback = isset($_GET['callback']) ? $_GET['callback'] : false;


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

echo($callback ? $callback . '(' : '') . json_encode($retorno) . ($callback ? ')' : '');

//fechar conec
mysqli_close($conecta);
?>