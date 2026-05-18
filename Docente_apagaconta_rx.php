<!DOCTYPE html>
<?php
include "cabecalho.php";
include "conectaBD.php";
$link = fnConectaBancoDados(); 
include "Tabelas.php";
include "funcoes.php";
$id = 0;
if(isset($_GET["id"])) {
	$id = fnDecodeID($_GET["id"]);
	
	$query = "SELECT siape FROM TabDocente WHERE id=$id";
	$result = mysqli_query($link, $query);
	$row = mysqli_fetch_assoc($result);
	$siape = $row['siape'];
	
	// precisa apagar todas as tabelas do docente antes de removê-lo
	$nomeTabela = "TabPedidoRSC_" . $siape;
	mysqli_query($link, "DROP TABLE $nomeTabela");
	$nomeTabela = "TabItinerario_" . $siape;
	mysqli_query($link, "DROP TABLE $nomeTabela");
	$nomeTabela = "AvaliaQuadroPont_" . $siape;
	mysqli_query($link, "DROP TABLE $nomeTabela");
	
	// Apaga as informações do docente das demais tabelas:
	mysqli_query($link, "DELETE FROM TabFormacao WHERE siape='$siape'");
	mysqli_query($link, "DELETE FROM FormularioPedidoRSC WHERE siape='$siape'");
	mysqli_query($link, "DELETE FROM TabSolicitaRSC WHERE siape='$siape'");
	mysqli_query($link, "DELETE FROM TabDocente WHERE siape='$siape'");
}

if ($id == 0) {
	fnDesconectaBD($link);
	header("Location: JavaScript: window.history.back();");
}
//echo nl2br("ID: " . $id . "\n");
fnDesconectaBD($link);
header("Location: index.php");
?>				
