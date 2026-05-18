<!DOCTYPE html>
<?php
include "cabecalho.php";
include "conectaBD.php";
$link = fnConectaBancoDados();
include "Tabelas.php";
include "funcoes.php";

$id = 0;
if(isset($_GET["id"])) {
	$id = fnDecodeID($link,$_GET["id"],'TabDocente');
}
if (!empty($_POST) && $id > 0) {
	$graduacao = intval($_POST["graduacao"]);
	$especializacao = intval($_POST["especializacao"]);
	$mestrado = intval($_POST["mestrado"]);
	$experiencia = intval($_POST["experiencia"]);
	$descricao = htmlspecialchars($_POST["descricao"]);
	//echo nl2br("Descrição: " . $descricao);
	
	$query = "SELECT siape FROM TabDocente WHERE id=$id";
	$result = mysqli_query($link, $query); 
	$rows = mysqli_fetch_assoc($result);
	$siape = $rows['siape'];

	$query = "SELECT * FROM TabFormacao WHERE siape='$siape'";
	$result = mysqli_query($link, $query); 
	$nrlinhas = mysqli_num_rows($result);
	//echo nl2br("Número de linhas: " . $nrlinhas . "\n");
	if ($nrlinhas == 0) {
		$query = "INSERT INTO TabFormacao (id,siape,graduacao,especializacao,mestrado,experiencia,descricao) VALUES (NULL,'$siape',$graduacao,$especializacao,$mestrado,$experiencia,'$descricao')";
		$result = mysqli_query($link, $query);
		
		$nomeTab = "TabItinerario_" . $siape;
		fnTabItinerario($nomeTab,$link);
	} else {
//		echo nl2br("Especialização: " . $especializacao . "\n");
		$query = "UPDATE TabFormacao SET graduacao=$graduacao, especializacao=$especializacao, mestrado=$mestrado, experiencia=$experiencia, descricao='$descricao' WHERE siape=$siape";
		$result = mysqli_query($link, $query);
	}
}
$idCoded = fnEncodeID($id);
header("Location: Docente_itinerariodocs.php?id=$idCoded");
?>
