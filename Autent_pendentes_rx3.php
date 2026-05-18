<!doctype html>
<?php
	include "cabecalho.php";
	include "conectaBD.php";
	$link = fnConectaBancoDados(); 
	include "Tabelas.php";
	include "funcoes.php";

	$idAuth = 0;
	$idAuth = fnDecodeID($link, $_GET["idAuth"], 'TabAutenticador');
	if(!empty($_POST)) {
		$idDocAuth = $_POST['idDocAuth'];

		$query = "UPDATE TabDocAutenticar SET authPronta=-1,dataAutenticacao=CURDATE() WHERE id=$idDocAuth";
		$result = mysqli_query($link, $query);
	}
	fnDesconectaBD($link);
	$idAuthEncode = fnEncodeID($idAuth);
	header("Location: Autent_recusadas.php?idAuth=$idAuthEncode");
?>
