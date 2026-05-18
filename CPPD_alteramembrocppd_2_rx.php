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
	$nome = $_POST['nome'];
	$siape = $_POST['siape'];
	$email = $_POST['email'];
	$campus = $_POST['campus'];
	$telefone = $_POST['telefone'];
	$senha = $_POST['senha'];
	$password = password_hash($senha, PASSWORD_DEFAULT);
	
	$query = "UPDATE TabCPPD SET usuario='$nome',siape='$siape',senha='$password',email='$email',campus='$campus',telefone='$telefone' WHERE id=$idMembro";
	$result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	$idCPPD = fnEncodeID($idCPPD);
	header("Location: CPPD_membroscppdcadastrados.php?idCPPD=$idCPPD");
}
else {
	header("Location: JavaScript: window.history.back();");
}
fnDesconectaBD($link);
?>
