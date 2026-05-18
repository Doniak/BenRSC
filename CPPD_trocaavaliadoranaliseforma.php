<?php
include "cabecalho.php";
include "conectaBD.php";
$link = fnConectaBancoDados(); 
include "Tabelas.php";
include "funcoes.php";

$idCPPD = 0;
if(isset($_GET["idCPPD"])) {
	$idCPPD = fnDecodeID($link,$_GET["idCPPD"],'TabCPPD');
}
if(!empty($_POST)) {
	$idMembro = $_POST['idmembro'];
	$avaliador = $_POST['avaliador'];
	
	$query = "UPDATE TabSolicitaRSC SET avaliadorCPPD='$avaliador',dataMovimentacao=CURRENT_DATE() WHERE id=$idMembro";
	$result = mysqli_query($link, $query) or die("Bad Query: $query");
}
$idCPPD = fnEncodeID($idCPPD);
header("Location: CPPD_analiseforma.php?idCPPD=$idCPPD#analisedeforma");
fnDesconectaBD($link);
?>
