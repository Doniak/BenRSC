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
				<p><h2 align="center" style="color: #32A041; font-size: 200%"><b>Ambiente CPPD</b></h2></p>
				<p><h3 align="center" style="color: #1A5321; font-size: 200%"><b>Pedidos de RSC aguardando distribuição para análise de forma</b></h3></p>
			</div>
		</div>
	</div>
<?php
	$query = "SELECT * FROM TabSolicitaRSC WHERE estado='ditribuir_analise_forma'";
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
					<th align="center" style="color: #1A5321;">Entrada<BR>na CPPD</th>
					<th align="center" style="color: #1A5321;">Responsável<BR>da CPPD</th>
					<th align="center" style="color: #1A5321;">Distribui</th>
				</tr>
<?php
					while ($row = mysqli_fetch_assoc($result)) {
						$idPedido = $row['id'];
						$docente = $row['docente'];
						$rsc = $row['rsc'];
						$email = $row['email'];
						$datapedido = $row['datapedido'];
						$campus = $row['campus'];
						$dataentradaCPPD = $row['dataMovimentacao'];
?>
						<tr>
							<td align="center"><?php echo $rsc;?></td>
							<td align="center"><?php echo $docente;?></td>
							<td align="center"><?php echo $campus;?></td>
							<td align="center"><?php echo $email;?></td>
							<td align="center"><?php echo fnFormatoData($datapedido);?></td>
							<td align="center"><?php echo fnFormatoData($dataentradaCPPD);?></td>
							<form action="CPPD_distribuianaliseforma.php?idCPPD=<?php echo fnEncodeID($idCPPD);?>" method="post">
							<td align="center">
								<select required="required" name="docente">
									<option>Avalidor para a análise de forma</option>
<?php
									$query = "SELECT id,usuario FROM TabCPPD ORDER BY usuario";
									$res = mysqli_query($link, $query);
									while ($avaliador = mysqli_fetch_assoc($res)) {
										$idrow = $avaliador['id'];
										$nomedoc = $avaliador['usuario'];
										if ($idrow > 2) {
?>
										<option><?php echo $nomedoc;?></option>
<?php
										}
									}
?>
								</select>
							</td>
							<td align="center" >
								<input type="hidden" name="idPedido" value="<?php echo $idPedido;?>"/>
								<input type="submit" class="btn" value="Distribui" style="border-radius: 8px; border: 3px solid #1A5321;; color: white; background-color: #1A5321;">
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