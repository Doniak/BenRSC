<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php
	include "cabecalho.php";
	include "conectaBD.php";
	$link = fnConectaBancoDados(); 
	include "Tabelas.php";
	include "funcoes.php";
	fnAnaliseFormaCPPD($link);
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
				<p><h3 align="center" style="color: #1A5321; font-size: 200%"><b>Pedidos de RSC em Análise de Forma</b></h3></p>
			</div>
		</div>
	</div>
<?php
	$query = "SELECT * FROM TabSolicitaRSC WHERE estado='em_analise_forma'";
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
					<th align="center" style="color: #1A5321;">Nível de<BR>RSC</th>
					<th align="center" style="color: #1A5321;">Docente requerente</th>
					<th align="center" style="color: #1A5321;">Campus</th>
					<th align="center" style="color: #1A5321;">Data do<BR>pedido</th>
					<th align="center" style="color: #1A5321;">Distribuído<BR>análise forma</th>
					<th align="center" style="color: #1A5321;">Avaliador da CPPD</th>
					<th align="center" style="color: #1A5321;">Alterar<BR>avaliador</th>
					<th align="center" style="color: #1A5321;">Análise<BR>de Forma</th>
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
							<td align="center"><?php echo $rsc;?></td>
							<td align="center"><?php echo $docente;?></td>
							<td align="center"><?php echo $campus;?></td>
							<td align="center"><?php echo fnFormatoData($datapedido);?></td>
							<td align="center"><?php echo fnFormatoData($datadistribuido);?></td>
							<form action="CPPD_trocaavaliadoranaliseforma.php?idCPPD=<?php echo fnEncodeID($idCPPD);?>" method="post">
							<td align="center">
								<select name="avaliador">
									<option selected><?php echo $avaliadorCPPD;?></option>
<?php 
									$query = "SELECT id,usuario FROM TabCPPD ORDER BY usuario";
									$res = mysqli_query($link, $query);
									while ($avaliador = mysqli_fetch_assoc($res)) {
										$idrow = $avaliador['id'];
										$nomedoc = $avaliador['usuario'];
										if (($idrow > 2) && (strcmp($nomedoc,$avaliadorCPPD) != 0)) {
?>
										<option><?php echo $nomedoc;?></option>
<?php
										}
									}
?>									
								</select>
							</td>
							<td align="center">
								<input type="hidden" name="idmembro" value="<?php echo $idPedido;?>"/>
								<input type="submit" class="btn" value="Alterar" style="border-radius: 8px; border: 2px solid #1A5321;; color: white; background-color: #1A5321;">
							</td>
							</form>
							<td align="center">
								<form action="CPPD_fazeranaliseforma.php?idCPPD=<?php echo fnEncodeID($idCPPD);?>" method="post">
									<input type="hidden" name="idPedido" value="<?php echo $idPedido;?>"/>
									<input type="submit" class="btn" value="Análise Forma" style="border-radius: 8px; border: 2px solid #1A5321;; color: white; background-color: #1A5321;">
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
	fnDesconectaBD($link);
	include "botaovoltar.php";
	include "rodape.php";
?>
		
</body>
</html>