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
				<p><h3 align="center" style="color: #1A5321;"><b>Avaliadores de pedidos RSC cadastrados para integrarem as comissões especiais após o sorteio na plataforma SIMEC</b></h3></p>
			</div>
		</div>
	</div>
<?php
	$query = "SELECT * FROM TabAvaliadoresRSC ORDER BY ife";
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
					<th align="center" style="color: #1A5321;">Instituto Federal de Educação</th>
					<th align="center" style="color: #1A5321;">Nome do avaliador</th>
					<th align="center" style="color: #1A5321;">E-mail institucional</th>
					<th align="center" style="color: #1A5321;">Siape</th>
					<th align="center" style="color: #1A5321;">Telefone</th>
				</tr>
<?php
					while ($row = mysqli_fetch_assoc($result)) {
						$nome = $row['nome'];
						$telefone = $row['telefone'];
						$email = $row['email'];
						$siape = $row['siape'];
						$ife = $row['ife'];
?>
						<tr style="border: 2px solid #1A5321;">
							<td align="center"><?php echo $ife;?></td>
							<td align="center"><?php echo $nome;?></td>
							<td align="center"><?php echo $email;?></td>
							<td align="center"><?php echo $siape;?></td>
							<td align="center"><?php echo $telefone;?></td>
						</tr>
<?php
					}
?>
			</table>
			<BR>
		</div>
	</div>
<?php
	}
	include "botaovoltar.php";
	fnDesconectaBD($link);
	include "rodape.php";
?>
		
</body>
</html>