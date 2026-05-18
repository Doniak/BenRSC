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
	$idPedido = $_POST['idpedido'];
	
	$query = "UPDATE TabSolicitaRSC SET estado='aguarda_sorteio_banca',dataMovimentacao=CURRENT_DATE() WHERE id=$idPedido";
	$result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	$idCPPD = fnEncodeID($idCPPD);
	header("Location: CPPD_analmerito_aguardasorteio.php?idCPPD=$idCPPD");
}
fnDesconectaBD($link);
include "botaovoltar.php";
?>
