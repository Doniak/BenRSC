<!DOCTYPE html>
<?php
include "cabecalho.php";
include "conectaBD.php";
$link = fnConectaBancoDados();
include "Tabelas.php";
include "funcoes.php";

$idAuth = 0;
if(isset($_GET["idAuth"])) {
	$idAuth = fnDecodeID($link, $_GET["idAuth"], 'TabAutenticador');
}

$idDocAuth = $_POST["idDocAuth"];
$dataAuth = $_POST["dataAuth"];
$arquivo = $_FILES["arquivo"];
//var_dump($arquivo);
$filename = strtolower(pathinfo($arquivo["name"],PATHINFO_FILENAME));
$extensao = strtolower(pathinfo($arquivo["name"],PATHINFO_EXTENSION));
$arquivo_blob = addslashes(file_get_contents($arquivo['tmp_name']));
//echo nl2br("dataAuth: " . $dataAuth . "\n");

$query = "UPDATE TabDocAutenticar SET arquivo='$arquivo_blob',tipoarquivo='$extensao',dataAutenticacao='$dataAuth',authPronta=1 WHERE id=$idDocAuth";
$result = mysqli_query($link, $query);

$query = "SELECT nomeTabPedidoRSC,idTabPedidoRSC FROM TabDocAutenticar WHERE id=$idDocAuth";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_assoc($result);
$nomeTabPedidoRSC = $row['nomeTabPedidoRSC'];
$idTabPedidoRSC	= $row['idTabPedidoRSC'];

// Salva o índice da tabela TabDocAutenticar onde está salvo o documento autenticado na tabela TabPedidoRSC do docente
$query = "UPDATE $nomeTabPedidoRSC SET arquivoauth=$idDocAuth WHERE id=$idTabPedidoRSC";
$result = mysqli_query($link, $query);

fnDesconectaBD($link);
$idCoded = fnEncodeID($idAuth);
header("Location: Autent_uploaddoc.php?idAuth=$idCoded");