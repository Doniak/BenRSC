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
	<div style="background-color:#1A5321;">
		<div class="container bg-transparent">
<?php 
			include "CE_menu.php";
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
				<p><h2 align="center" style="color: #32A041; font-size: 200%"><b>Ambiente Avaliador</b></h2></p>
			</div>
			<div class="row">
				<p align="justify">No Ambiente Avaliador (...) </p>
				<p align="justify">(...)</p>
				<p align="center"><a href="CE_#.php?idCE=<?php echo fnEncodeID($idCE);?>"><button type="button" class="btn" style="border-radius: 8px; border: 3px solid #1A5321;; color: white; padding: 20px 30px; font-size: 20px; background-color: #1A5321;"><b>Vamos começar!</b></button></a></p>
			</div>
		</div>
	</div>

<?php
	fnDesconectaBD($link);
	include "rodape.php";
?>
		
</body>
</html>