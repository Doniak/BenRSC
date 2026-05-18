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
				<p><h3 align="center" style="color: #32A041;"><b>Cadastra avaliador da Comissão Especial</b></h3></p>
			</div>
		</div>
	</div>
	
	<div  style="background-color: #1A5321;">
		<BR>
		<div class="container" style="background-color: #E4EBE2;">
			<form action="CPPD_cadastraavaliador_rx.php?idCPPD=<?php echo fnEncodeID($idCPPD);?>" method="post">
			<div class="row">
				<div class="coluna" align="center">
					<label>Nome completo do avaliador</label><br>
					<input required="required" type="text" name="nome" size="35px"><br>
				</div>
				<div class="coluna" align="center">
					<label>Matrícula SIAPE</label><br>
					<input required="required" type="text" name="siape"><br>
				</div>
				<div class="coluna" align="center">
					<label>E-mail institucional</label><br>
					<input required="required" type="email" name="email" size="35px"><br>
				</div>
			</div>
			<div class="row">
				<div class="coluna" align="center">
					<label>Instituto Federal de Eduação</label><br>
					<select name="ife" required="required">
						<option>Selecione o IFE do avaliador</option>
<?php
						$query = "SELECT nome FROM TabInstitutosFederais ORDER BY estado";
						$result = mysqli_query($link, $query);
						while ($row = mysqli_fetch_assoc($result)) {
							$nomeife = $row['nome'];
?>
							<option><?php echo $nomeife;?></option>
<?php
						}
?>
					</select>
				</div>
				<div class="coluna" align="center">
					<label>Telefone</label><br>
					<input required="required" type="text" name="telefone"><br>
				</div>
				<div class="coluna" align="center">
					<label>Senha (ifsc)</label><br>
					<input required="required" type="password" name="senha" value="ifsc"><br>
				</div>
			</div>
			<div class="row">
				<div align="center">
					<input type="submit" class="btn" value="Salva avaliador" style="border-radius: 8px; border: 3px solid #1A5321;; color: white; padding: 15px 30px; font-size: 18px; background-color: #1A5321;"><br>
				</div>
			</div>
			</form>
			<BR>
		</div>
	</div>
		
<?php
	include "botaovoltar.php";
	fnDesconectaBD($link);
	include "rodape.php";
?>
		
</body>
</html>