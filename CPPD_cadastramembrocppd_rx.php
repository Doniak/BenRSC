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
	$nome = $_POST['nome'];
	$siape = $_POST['siape'];
	$email = $_POST['email'];
	$campus = $_POST['campus'];
	$telefone = $_POST['telefone'];
	$senha = $_POST['senha'];
	$password = password_hash($senha, PASSWORD_DEFAULT);
	
	$query = "INSERT INTO TabCPPD (id, usuario, siape, senha, email, campus, telefone) VALUES (NULL, '$nome', '$siape', '$password', '$email', '$campus', '$telefone')";
	$result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	if ($idCPPD <= 3) {
		$idCPPD = fnEncodeID($idCPPD);
		header("Location: CPPD_membroscppdcadastrados.php?idCPPD=$idCPPD");
	}
	else {
		header("Location: CPPD_login.php");
	}
}
fnDesconectaBD($link);
?>
