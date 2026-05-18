<?php
	include "cabecalho.php";
	include "conectaBD.php";
	$link = fnConectaBancoDados(); 
	include "Tabelas.php";
	include "funcoes.php";
	
	$idAuth = 0;
	if(isset($_GET["idAuth"])) {
		$idAuth = fnDecodeID($link, $_GET["idAuth"], 'TabAutenticador');
	}
	if(!empty($_POST)) {
		$nome = $_POST['nome'];
		$siape = $_POST['siape'];
		$email = $_POST['email'];
		$ife = $_POST['ife'];
		$campus = $_POST['campus'];
		$telefone = $_POST['telefone'];

		$senha = $_POST['senha'];
		$password = password_hash($senha, PASSWORD_DEFAULT);
		
		$query = "SELECT id FROM TabAutenticador WHERE email='$email'";
		$result = mysqli_query($link, $query);
		$linhas = mysqli_num_rows($result);
		if ($linhas > 0) {
			$row = mysqli_fetch_assoc($result);
			$idAuth = $row['id'];
		}
		
		$query = "SELECT sigla FROM TabInstitutosFederais WHERE nome='$ife'";
		$result = mysqli_query($link, $query);
		$row = mysqli_fetch_assoc($result);
		$siglaife = $row['sigla'];

		if ($idAuth > 0) {
			$query = "UPDATE TabAutenticador SET nome='$nome', siape='$siape', senha='$password', email='$email', ife='$ife', siglaife='$siglaife', telefone='$telefone', campus='$campus'  WHERE id=$idAuth";
			$result = mysqli_query($link, $query);
		} 
		else {
			$query = "INSERT INTO TabAutenticador (id, nome, email, senha, siape, ife, siglaife, campus, telefone) VALUES (NULL, '$nome', '$email', '$password', '$siape', '$ife', '$siglaife', '$campus', '$telefone')";
			$result = mysqli_query($link, $query);
			
			$query = "SELECT id FROM TabAutenticador WHERE siape='$siape'";
			$result = mysqli_query($link, $query);
			$row = mysqli_fetch_assoc($result);
			$idAuth = $row['id'];
		}
		
		fnDesconectaBD($link);
		$idCoded = fnEncodeID($idAuth);
		header("Location: Autent_inicio.php?idAuth=$idCoded");
	}
	fnDesconectaBD($link);
	header("Location: index.php");
?>
