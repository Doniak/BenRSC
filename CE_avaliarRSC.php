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
				<p><h2 align="center" style="color: #32A041;"><b>Ambiente Avaliador</b></h2></p>
				<h3 align="center" style="color: #1A5321;">Avaliar pedido de RSC</h3>
			</div>
		</div>
	</div>

<?php
	$idPedido = $_POST['idPedido'];
		
	$query = "SELECT * FROM TabSolicitaRSC WHERE id=$idPedido";
	$result = mysqli_query($link, $query); 
	$numlinhas = mysqli_num_rows($result);
	if ($numlinhas > 0) {	
		$row = mysqli_fetch_assoc($result);
		$docente = $row['docente'];
		$siape = $row['siape'];
		$rsc = $row['rsc'];
		$datapedido = $row['datapedido'];
		$ultimaMovimentacao = $row['dataMovimentacao'];
		$presidente = $row['presidentebanca'];
		$ifepresidente = $row['ifepresidente'];
		$membroexterno = $row['membroexterno'];
		$ifemembroexterno = $row['ifemembroexterno'];
		$membrointerno = $row['membrointerno'];
		$ifemembrointerno = $row['ifemembrointerno'];
	}
?>		
	<div  style="background-color: #1A5321;">
		<BR>
		<div class="container" style="background-color: #E4EBE2;">
			<BR>
			<div class="row">
				<div class="coluna" align="center">
					<label>Requerente</label><BR>
					<input type="text" readonly name="docente" value="<?php echo $docente;?>" size="40px" style="background-color: #E9E9E9;"/>
				</div>
				<div class="coluna" align="center">
					<label>Nível de RSC</label><BR>
					<input type="text" readonly name="rsc" value="<?php echo $rsc;?>" style="background-color: #E9E9E9;"/>
				</div>
				<div class="coluna" align="center">
					<label>Data do pedido</label><BR>
					<input type="date" readonly name="datapedido" value="<?php echo $datapedido;?>" style="background-color: #E9E9E9;"/>
				</div>
			</div>
			<BR>
<?php
			$nomeTab = "TabPedidoRSC_" . $siape;
			$query = "SELECT * FROM $nomeTab ORDER BY criterio";
			$result = mysqli_query($link, $query); 
			$numlinhas = mysqli_num_rows($result);
			if ($numlinhas > 0) {
?>
			<div class="row">
				<h2 align="center"><b>Planilha de pontuação</b></h2>
				<table align='justify' width="100%" style="border: 4px solid #1A5321; margin-left: 10px;">
					<tr align="center" style="border: 4px solid #1A5321;">
						<th align="center" style="color: #1A5321;">RSC</th>
						<th align="center" style="color: #1A5321;">Diretriz</th>
						<th align="center" style="color: #1A5321;">Nº do<BR>critério</th>
						<th align="center" style="color: #1A5321;">Critério</th>
						<th align="center" style="color: #1A5321;">Fator de<BR>pontuação</th>
						<th align="center" style="color: #1A5321;">Unidade</th>
						<th align="center" style="color: #1A5321;">Qtde<BR>unidades</th>
						<th align="center" style="color: #1A5321;">Pontuação<BR>requerida</th>
						<th align="center" style="color: #1A5321;">Avalia<BR>critério</th>
					</tr>
<?php
					while ($row = mysqli_fetch_assoc($result)) {
						$idCriterio = $row['id'];
						$nivelRSC = $row['nivel'];
						$diretriz = $row['diretriz'];
						$nrcriterio = $row['criterio'];
						$nomecriterio = $row['nomecriterio'];
						$datadoc = $row['datadoc'];
						$fatorpontuacao = $row['fatorpontuacao'];
						$pontuacaorequerida = $row['pontuacaorequerida'];
						$unidade = $row['unidade'];
						$qtdeunidades = $row['qtdeunidades'];
?>
						<tr align="center" style="border: 2px solid #1A5321;">
							<form action="CE_avaliarRSC_rx1.php?idCE=<?php echo fnEncodeID($idCE);?>" method="post">
								<td align="center"><?php echo $nivelRSC;?></td>
								<td align="center"><?php echo $diretriz;?></td>
								<td align="center"><?php echo $nrcriterio;?></td>
								<td align="center"><?php echo $nomecriterio;?></td>
								<td align="center"><?php echo $fatorpontuacao;?></td>
								<td align="center"><?php echo $unidade;?></td>
								<td align="center"><?php echo $qtdeunidades;?></td>
								<td align="center"><?php echo $pontuacaorequerida;?></td>
								<td align="center">
									<input type="hidden" name="siape" value="<?php echo $siape;?>"/>
									<input type="hidden" name="docente" value="<?php echo $docente;?>"/>
									<input type="hidden" name="rsc" value="<?php echo $rsc;?>"/>
									<input type="hidden" name="idPedido" value="<?php echo $idPedido;?>"/>
									<input type="hidden" name="datapedido" value="<?php echo $datapedido;?>"/>
									<input type="hidden" name="idCriterio" value="<?php echo $idCriterio;?>"/>
									<input type="submit" class="btn" value="Avaliar" style="border-radius: 8px; border: 2px solid #1A5321;; color: white; background-color: #1A5321;">
								</td>
							</form>
						</tr>
<?php						
					}
?>
				</table>
			</div>
<?php
			}
?>
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