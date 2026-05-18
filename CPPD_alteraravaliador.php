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
				<p><h3 align="center" style="color: #1A5321;"><b>Avaliadores cadastrados para realizarem análise de forma</b></h3></p>
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
			<p align="left" style="color: #1A5321; font-size: 130%;">Selecione o membro que você deseja alterar o cadastro</p>
			<table align='justify' width="100%" style="border: 4px solid #1A5321;">
				<tr align="center" style="border: 4px solid #1A5321;">
					<th align="center" style="color: #1A5321;">Instituto Federal</th>
					<th align="center" style="color: #1A5321;">Nome do avaliador</th>
					<th align="center" style="color: #1A5321;">Siape</th>
					<th align="center" style="color: #1A5321;">E-mail</th>
					<th align="center" style="color: #1A5321;">Telefone</th>
					<th align="center" style="color: #1A5321;">Altera<BR>avaliador</th>
				</tr>
<?php
					while ($row = mysqli_fetch_assoc($result)) {
						$idrow = $row['id'];
						$nome = $row['nome'];
						$telefone = $row['telefone'];
						$email = $row['email'];
						$siape = $row['siape'];
						$ife = $row['ife'];
?>
						<tr style="border: 2px solid #1A5321;">
							<td align="center"><?php echo $ife;?></td>
							<td align="center"><?php echo $nome;?></td>
							<td align="center"><?php echo $siape;?></td>
							<td align="center"><?php echo $email;?></td>
							<td align="center"><?php echo $telefone;?></td>
							<td align="center">
								<form action="CPPD_alteraravaliador_2.php?idCPPD=<?php echo fnEncodeID($idCPPD);?>" method="post">
									<input type="hidden" name="idmembro" value="<?php echo $idrow;?>">
									<input type="hidden" name="nome" value="<?php echo $nome;?>">
									<input type="hidden" name="siape" value="<?php echo $siape;?>">
									<input type="hidden" name="ife" value="<?php echo $ife;?>">
									<input type="hidden" name="email" value="<?php echo $email;?>">
									<input type="hidden" name="telefone" value="<?php echo $telefone;?>">
									<input type="submit" class="btn" value="Alterar" style="border-radius: 8px; border: 3px solid #1A5321;; color: white; padding: 8px 8px; font-size: 15px; background-color: #1A5321;">
								</form>
							</td>
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