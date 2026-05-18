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
	$email = htmlspecialchars($_POST["email"]);
	$senha = ($_POST["senha"]);

	$query = "SELECT id,senha FROM TabCPPD WHERE email='$email'";
	$result = mysqli_query($link, $query) or die("Bad Query: $query");
	while ($row = mysqli_fetch_assoc($result)) {
		$idCPPD = $row['id'];
		$password = $row['senha'];
	}
	fnDesconectaBD($link);
	
	// Verify the hash code against the unencrypted password entered 
  	$verify = password_verify($senha, $password); 
  	if ($verify) {
//		echo nl2br("Verificação de senha OK \n");
		$idCPPD = fnEncodeID($idCPPD);
		header("Location: CPPD_inicio.php?idCPPD=$idCPPD");
		exit;
    }
 	else {
?>
	<div style="background-color:#1A5321;">
		<div class="container bg-transparent">
<?php 
			include "menu.php";
?>				
		</div>
	</div>

	<div style="background-color: #1A5321;">
		<BR>
		<div class="container" style="background-color: whitesmoke;">
			<div class="row">
				<p align="center"><img src="images/IFSC_horizontal.png" width="40%"></p>
			</div>
		</div>
	</div>
	<div style="background-color: #1A5321;">
		<div class="container" style="background-color: #E4EBE2;">
			<div class="row">
<?php
//		echo nl2br("Senha incorreta! \n");
		echo "<meta http-equiv='refresh' content='3;URL=index.php'>";
		echo nl2br("Senha incorreta! " . $verify ."\n");
?>
			</div>
		</div>
	</div>
<?php
    }
}
//header("Location: index.php");
	include "rodape.php";
?>	
	
</body>
</html>