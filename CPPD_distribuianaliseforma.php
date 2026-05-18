<?php
include "cabecalho.php";
include "conectaBD.php";
$link = fnConectaBancoDados(); 
include "Tabelas.php";
include "funcoes.php";

$idCPPD = 0;
if(isset($_GET["idCPPD"])) {
	$idCPPD = fnDecodeID($link, $_GET["idCPPD"], 'TabCPPD');
}
if(!empty($_POST)) {
	$idPedido = $_POST['idPedido'];
	$docente = $_POST['docente'];
	$estado = "em_analise_forma";
	
	$query = "UPDATE TabSolicitaRSC SET avaliadorCPPD='$docente',estado='$estado',dataMovimentacao=CURRENT_DATE() WHERE id=$idPedido";
	$result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	$idCPPD = fnEncodeID($idCPPD);
	header("Location: CPPD_analiseforma.php?idCPPD=$idCPPD");
}
fnDesconectaBD($link);
?>
