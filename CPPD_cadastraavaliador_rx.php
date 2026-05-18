<!DOCTYPE html>
<html lang="pt-br">
<head>
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
?>
</head>
<body>	
<?php
if(!empty($_POST)) {
	$nome = $_POST['nome'];
	$siape = $_POST['siape'];
	$email = $_POST['email'];
	$ife = $_POST['ife'];
	$telefone = $_POST['telefone'];
	$senha = $_POST['senha'];
	$password = password_hash($senha, PASSWORD_DEFAULT);
	
	$query = "SELECT * FROM TabAvaliadoresRSC WHERE siape='$siape'";
	$result = mysqli_query($link, $query);
	$nrlinhas = mysqli_num_rows($result);
	if ($nrlinhas == 0) {
		$query = "SELECT sigla FROM TabInstitutosFederais WHERE nome='$ife'";
		$result = mysqli_query($link, $query);
		$row = mysqli_fetch_assoc($result);
		$siglaife = $row['sigla'];

		$query = "INSERT INTO TabAvaliadoresRSC (id, nome, siape, senha, email, ife, siglaife, telefone) VALUES (NULL, '$nome', '$siape', '$password', '$email', '$ife', '$siglaife', '$telefone')";
		$result = mysqli_query($link, $query) or die("Bad Query: $query");
		
		$nomeTab = "TabMinhasAvaliacoes_" . $siape;
		fnMinhasAvaliacoes($nomeTab,$link);

		fnDesconectaBD($link);
		$idCPPD = fnEncodeID($idCPPD);
		header("Location: CPPD_cadastraavaliador.php?idCPPD=$idCPPD");
		exit;
	}
	else {
		$idCPPD = fnEncodeID($idCPPD);
?>
		<div style="background-color:#1A5321;">
			<div class="container bg-transparent">
<?php 
		include "CPPD_menu.php";
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

		<div  style="background-color: #1A5321;">
			<div class="container" style="background-color: #E4EBE2;">
				<div class="row">
					<p><h2 align="center" style="color: #32A041;"><b>Ambiente CPPD</b></h2></p>
					<p><h3 align="center" style="color: red;"><b>O(A) avaliador(a) <?php echo $nome;?><BR>já está previamente cadastrado(a) no sistema.</b></h3></p>
				</div>
			</div>
		</div>
<?php
	}
}
else {
	header("Location: JavaScript: window.history.back();");
}

fnDesconectaBD($link);
include "botaovoltar.php";
include "rodape.php";
?>
</body>
</html>