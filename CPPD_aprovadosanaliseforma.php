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
			
	<div  style="background-color: #1A5321;" id="analisedeforma">
		<div class="container" style="background-color: #E4EBE2;">
			<div class="row">
				<p><h2 align="center" style="color: #32A041; font-size: 200%"><b>Ambiente CPPD</b></h2></p>
				<p><h3 align="center" style="color: #1A5321; font-size: 200%"><b>Aprove a análise de forma do pedido de RSC analisado</b></h3></p>
			</div>
		</div>
	</div>
<?php
	$query = "SELECT * FROM TabSolicitaRSC WHERE estado='em_analise_forma' AND avaliadorCPPD='$nomeAvaliadorCPPD'";
	$result = mysqli_query($link, $query); 
	$numlinhas = mysqli_num_rows($result);
	if ($numlinhas > 0) {
?>		
	<div  style="background-color: #1A5321;">
		<BR>
		<div class="container" style="background-color: #E4EBE2;">
			<BR>
			<table align='justify' width="100%" style="border: 4px solid #1A5321;">
				<tr align="center" style="border: 2px solid #1A5321;">
					<th align="center" style="color: #1A5321;">RSC</th>
					<th align="center" style="color: #1A5321;">Docente</th>
					<th align="center" style="color: #1A5321;">Campus</th>
					<th align="center" style="color: #1A5321;">E-mail</th>
					<th align="center" style="color: #1A5321;">Data do<BR>pedido</th>
					<th align="center" style="color: #1A5321;">Distribuído<BR>análise forma</th>
					<th align="center" style="color: #1A5321;">Avaliador<BR>da CPPD</th>
					<th align="center" style="color: #1A5321;">Análise<BR>de forma</th>
				</tr>
<?php
					while ($row = mysqli_fetch_assoc($result)) {
						$idPedido = $row['id'];
						$docente = $row['docente'];
						$rsc = $row['rsc'];
						$email = $row['email'];
						$datapedido = $row['datapedido'];
						$datadistribuido = $row['dataMovimentacao'];
						$campus = $row['campus'];
						$avaliadorCPPD = $row['avaliadorCPPD'];
?>
						<tr>
							<form action="CPPD_aprovadosanaliseforma_rx.php?idCPPD=<?php echo fnEncodeID($idCPPD);?>" method="post">
							<td align="center"><?php echo $rsc;?></td>
							<td align="center"><?php echo $docente;?></td>
							<td align="center"><?php echo $campus;?></td>
							<td align="center"><?php echo $email;?></td>
							<td align="center"><?php echo fnFormatoData($datapedido);?></td>
							<td align="center"><?php echo fnFormatoData($datadistribuido);?></td>
							<td align="center"><?php echo $avaliadorCPPD;?></td>
							<td align="center">
									<input type="hidden" name="idpedido" value="<?php echo $idPedido;?>"/>
									<input type="submit" class="btn" value="Aprovar" style="border-radius: 8px; border: 3px solid #1A5321;; color: white; background-color: #1A5321;">
							</td>
							</form>
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

	fnDesconectaBD($link);
	include "botaovoltar.php";
	include "rodape.php";
?>
		
</body>
</html>