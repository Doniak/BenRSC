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
				<p><h3 align="center" style="color: #1A5321;"><b>Membros da CPPD cadastrados para realizarem análise de forma</b></h3></p>
			</div>
		</div>
	</div>
<?php
	$query = "SELECT * FROM TabCPPD ORDER BY campus";
	$result = mysqli_query($link, $query); 
	$numlinhas = mysqli_num_rows($result);
	if ($numlinhas > 0) {
?>		
	<div  style="background-color: #1A5321;">
		<BR>
		<div class="container" style="background-color: #E4EBE2;">
			<BR>
			<table align='justify' width="100%" style="border: 4px solid #1A5321;">
				<tr align="center" style="border: 4px solid #1A5321;">
					<th align="center" style="color: #1A5321;">Nome</th>
					<th align="center" style="color: #1A5321;">E-mail</th>
					<th align="center" style="color: #1A5321;">Campus</th>
					<th align="center" style="color: #1A5321;">Siape</th>
					<th align="center" style="color: #1A5321;">Telefone</th>
				</tr>
<?php
					while ($row = mysqli_fetch_assoc($result)) {
						$idmembro = $row['id'];
						$nome = $row['usuario'];
						$telefone = $row['telefone'];
						$email = $row['email'];
						$siape = $row['siape'];
						$campus = $row['campus'];
						if ($idmembro > 2) {
?>
						<tr style="border: 2px solid #1A5321;">
							<td align="center"><?php echo $nome;?></td>
							<td align="center"><?php echo $email;?></td>
							<td align="center"><?php echo $campus;?></td>
							<td align="center"><?php echo $siape;?></td>
							<td align="center"><?php echo $telefone;?></td>
						</tr>
<?php
						}
					}
?>
			</table>
			<BR>
		</div>
	</div>
<?php
	}
?>	
	<div style="background-color: #1A5321;">
		<BR>
		<div class="container" style="background-color: #E4EBE2;">
			<BR>
			<div align="center">
				<a href="CPPD_cadastramembrocppd.php?idCPPD=<?php echo fnEncodeID($idCPPD);?>"><button type="button" class="btn" style="border-radius: 8px; border: 3px solid #1A5321;; color: white; padding: 14px 26px; font-size: 18px; background-color: #1A5321;">Cadastrar novo membro</button></a>
			</div>
			<BR>
		</div>
	</div>

<?php
	fnDesconectaBD($link);
	include "botaovoltar.php";
	include "rodape.php";
?>
		
</body>
</html>