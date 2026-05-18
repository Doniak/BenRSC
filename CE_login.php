<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php
		include "cabecalho.php";
?>
</head>
<body>
<?php
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
				<p><h2 align="center">Formulário de Solicitação para o<BR>Reconhecimento de Saberes e Competências - RSC</h2></p>
				<p><h3 align="center" style="color: #32A041;"><b>Faça o seu login para acessar o ambiente Avaliador</b></h3></p>
				<p align="justify">Este é o ambiente do avaliador da Comissão Especial de pedidos RSC. Aqui você poderá acompanhar os pedidos de RSC que você foi indicado para avaliar e aqueles já avaliados.</p>
			</div>
		</div>
	</div>

	<div style="background-color: #1A5321;" id="CElogin">
		<BR>
		<form action="CE_loginRX.php" method="post">
		<div class="container" style="background-color: #E4EBE2;">
			<div class="row">
				<div class="coluna" align="center">
					<label>E-mail de identificação</label><br>
					<input required="required" type="email" id="email" name="email"><br>
				</div>
				<div class="coluna" align="center">
					<label>Senha</label><br>
					<input required="required" type="password" id="senha" name="senha"><br>	
				</div>
				<div class="coluna" align="center">
					<input type="submit" class="btn" value="Login" style="border-radius: 8px; border: 3px solid #1A5321;; color: white; padding: 15px 30px; font-size: 18px; background-color: #1A5321;"><br>
				</div>
			</div>
		</div>
		</form>
	</div>

<?php
	include "rodape.php";
?>
		
</body>
</html>