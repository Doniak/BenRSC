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
	$senha = htmlspecialchars($_POST["senha"]);
	$password = "";
	
	$query = "SELECT id,senha FROM TabDocente WHERE email='$email'";
	$result = mysqli_query($link, $query);
	while($row = mysqli_fetch_assoc($result)){
		$password = $row['senha'];
		$id = $row['id'];

		// Verify the hash code against the unencrypted password entered 
		$verify = password_verify($senha, $password); 
		// Print the result depending if they match 
		if ($verify) {
	//		echo nl2br("Verificação de senha OK \n");
			$idCoded = fnEncodeID($id);
			fnDesconectaBD($link);
			header("Location: Docente_inicio.php?id=$idCoded");
			exit;
		}
		else { 
			$mgm = "Senha incorreta ou usuário não cadastrado";
			echo "<meta http-equiv='refresh' content='3;URL=Docente_login.php'>";
			echo nl2br("Falha no login: " . $mgm . "\n");
			fnDesconectaBD($link);
		}
	}
	fnMsgErro("Docente_login.php", "Docente ainda não cadastrado");
}
else {
	fnDesconectaBD($link);
	//header("Location:index.php");
}
?>	
	
</body>
</html>