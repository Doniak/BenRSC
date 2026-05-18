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
	
	$query = "DELETE FROM TabCPPD WHERE id=$idMembro";
	$result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	if($idMembro != $idCPPD) {
		$idCPPD = fnEncodeID($idCPPD);
		header("Location: CPPD_membroscppdcadastrados.php?idCPPD=$idCPPD");
	} 
	else {
		header("Location: index.php");
	}
}
else {
	header("Location: JavaScript: window.history.back();");
}
fnDesconectaBD($link);
?>
