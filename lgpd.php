<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php
	include "cabecalho.php";
	include "conectaBD.php";
	$link = fnConectaBancoDados();	
	include "Tabelas.php";
?>
</head>

<body>
	<div style="background-color:#1A5321;">
		<div class="container bg-transparent">
<?php 
			include "menu.php";
?>				
		</div>
	</div>
		
	<div style="background-color: #1A5321;">
		<BR>
		<div class="container" style="background-color: #E4EBE2;">
			<div class="row">
				<p align="center"><img src="images/IFSC_horizontal.png" width="40%"></p>
			</div>
		</div>
	</div>

	<div style="background-color: #1A5321;">
		<BR>
		<div class="container" style="background-color: #E4EBE2;">
			<h1 align="center" style="color: #1A5321;"><b>Conheça a nossa Política de<BR>Privacidade e Confidencialidade</b></h1><BR>
			<iframe align="middle" src="docs/#.pdf" width="100%" height="800px"></iframe>
		</div>
		<BR>
	</div>
				
<?php
	include "rodape.php";
?>
		
</body>
</html>