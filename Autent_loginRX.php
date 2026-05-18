<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php
	include "cabecalho.php";
	include "conectaBD.php";
	$link = fnConectaBancoDados(); 
	include "Tabelas.php";
	include "funcoes.php";
?>
</head>
<body>
<?php
if (!empty($_POST)) {
	$email = $_POST["email"];
	$senha = $_POST["senha"];

	$query = "SELECT id,senha,siape FROM TabAutenticador WHERE email='$email'";
	$result = mysqli_query($link, $query) or die("Bad Query: $query");
	$row = mysqli_fetch_assoc($result);
	$idAuth = $row['id'];
	$password = $row['senha'];
	$siape = $row['siape'];
	
	
	fnDesconectaBD($link);
	
	// Verify the hash code against the unencrypted password entered 
  	$verify = password_verify($senha, $password); 
  	if ($verify) {
//		echo nl2br("Verificação de senha OK \n");
		$idCoded = fnEncodeID($idAuth);
		if (strcmp($siape,NULL) == 0) {
			header("Location: Autent_cadastro.php?idAuth=$idCoded");			
		}
		else {
			header("Location: Autent_inicio.php?idAuth=$idCoded");
		}
		exit;
    }
 	else { 
		echo nl2br("Senha incorreta! \n");
    }
}
header("Location: index.php");
?>	
	
</body>
</html>