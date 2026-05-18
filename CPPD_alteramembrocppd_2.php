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
				<p><h3 align="center" style="color: #1A5321;"><b>Atualize as informações como membro da CPPD</b></h3></p>
			</div>
		</div>
	</div>
<?php

if(!empty($_POST)) {
	$idMembro = $_POST['idmembro'];
	$nome = $_POST['nome'];
	$siape = $_POST['siape'];
	$email = $_POST['email'];
	$campus = $_POST['campus'];
	$telefone = $_POST['telefone'];
	
}
?>
	<div  style="background-color: #1A5321;">
		<BR>
		<div class="container" style="background-color: #E4EBE2;">
			<form action="CPPD_alteramembrocppd_2_rx.php?idCPPD=<?php echo fnEncodeID($idCPPD);?>" method="post">
			<div class="row">
				<div class="coluna" align="center">
					<label>Nome completo</label><br>
					<input required="required" type="text" name="nome" size="35px" value="<?php echo $nome;?>"/><br>
				</div>
				<div class="coluna" align="center">
					<label>Matrícula SIAPE</label><br>
					<input required="required" type="text" name="siape" value="<?php echo $siape;?>"/><br>
				</div>
				<div class="coluna" align="center">
					<label>E-mail institucional</label><br>
					<input required="required" type="email" name="email" size="35px" value="<?php echo $email;?>"/><br>
				</div>
			</div>
			<div class="row">
				<div class="coluna" align="center">
					<label>Campus</label><br>
					<input required="required" type="text" name="campus" size="35px" value="<?php echo $campus;?>"/><br>
				</div>
				<div class="coluna" align="center">
					<label>Telefone</label><br>
					<input required="required" type="text" name="telefone" value="<?php echo $telefone;?>"/><br>
				</div>
				<div class="coluna" align="center">
					<label>Senha</label><br>
					<input required="required" type="password" name="senha"/><br>
				</div>
			</div>
			<div class="row">
				<div align="center">
					<input type="hidden" name="idmembro" value="<?php echo $idMembro;?>"/>
					<input type="submit" class="btn" value="Atualiza informações" style="border-radius: 8px; border: 3px solid #1A5321;; color: white; padding: 15px 30px; font-size: 18px; background-color: #1A5321;"/><br>
				</div>
			</div>
			<BR>
			</form>
		</div>
	</div>

<?php
include "botaovoltar.php";
fnDesconectaBD($link);
include "rodape.php";
?>