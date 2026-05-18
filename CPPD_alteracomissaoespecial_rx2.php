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
	$idPedido = $_POST['idPedido'];
	$docente = $_POST['docente'];
	$siape = $_POST['siape'];
	$email = $_POST['email'];
	$sipac = $_POST['sipac'];
	$presidente = $_POST['presidente'];
	$ifepresidente = $_POST['ifepresidente'];
	$membroexterno = $_POST['membroexterno'];
	$ifemembroexterno = $_POST['ifemembroexterno'];
	$membrointerno = $_POST['membrointerno'];
	$ifemembrointerno = $_POST['ifemembrointerno'];
	
	$query = "UPDATE TabSolicitaRSC SET presidentebanca='$presidente', membroexterno='$membroexterno', membrointerno='$membrointerno', ifepresidente='$ifepresidente', ifemembroexterno='$ifemembroexterno', ifemembrointerno='$ifemembrointerno',dataMovimentacao=CURRENT_DATE() WHERE id='$idPedido'";
	$result = mysqli_query($link, $query);		

	fnDesconectaBD($link);
	$idCPPD = fnEncodeID($idCPPD);
	header("Location: CPPD_pedidosdistribuidos.php?idCPPD=$idCPPD");
}
else {
	fnDesconectaBD($link);
	header("Location: JavaScript: window.history.back();");
}
?>
