<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php
	include "cabecalho.php";
	include "conectaBD.php";
	$link = fnConectaBancoDados(); 
	include "Tabelas.php";
	include "funcoes.php";
	include "CE_funcoes.php";
?>
</head>
<body>
<?php
?>	
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
				<p><h3 align="center" style="color: #1A5321;"><b>Finaliza Avaliação de RSC</b></h3></p>
				<p align="justify" style="color: #1A5321;">Formulário de avaliação RSC deliberando sobre o pedido feito pelo docente pela Comissão Especial de avaliação. Neste formulário serão anexadas as planilhas de pontuação deferida por cada avaliador. No formulário irá constar a data de concessão do benefício caso este venha ser deferido pela comissão.</p>
			</div>
		</div>
	</div>
<?php
	$query = "SELECT * FROM TabSolicitaRSC WHERE estado='aguarda_avaliacao'";
	$result = mysqli_query($link, $query); 
	$numlinhas = mysqli_num_rows($result);
	if ($numlinhas > 0) {
?>		
	<div  style="background-color: #1A5321;">
		<BR>
		<div class="container" style="background-color: #E4EBE2; ">
			<BR>
			<table align='justify' width="100%" style="border: 4px solid #1A5321;">
				<tr align="center" style="border: 2px solid #1A5321;">
					<th align="center" style="color: #1A5321;">RSC</th>
					<th align="center" style="color: #1A5321;">Docente requerente</th>
					<th align="center" style="color: #1A5321;">Data do<BR>pedido</th>
					<th align="center" style="color: #1A5321;">Presidente</th>
					<th align="center" style="color: #1A5321;">Membro externo</th>
					<th align="center" style="color: #1A5321;">Membro interno</th>
					<th align="center" style="color: #1A5321;">Quadro<BR>pontuação</th>
					<th align="center" style="color: #1A5321;">Finaliza<BR>avaliação</th>
				</tr>
<?php
					while ($row = mysqli_fetch_assoc($result)) {
						$idPedido = $row['id'];
						$docente = $row['docente'];
						$siape = $row['siape'];
						$rsc = $row['rsc'];
						$datapedido = $row['datapedido'];
						$dataDistribuido = $row['dataMovimentacao'];
						$presidente = $row['presidentebanca'];
						$membroexterno = $row['membroexterno'];
						$membrointerno = $row['membrointerno'];
						if (strcmp($nomeAvaliador,$presidente) == 0) 
						{
?>
							<tr align="center" style="border: 2px solid #1A5321;">
								<td align="center"><?php echo $rsc;?></td>
								<td align="center"><?php echo $docente;?></td>
								<td align="center"><?php echo fnFormatoData($datapedido);?></td>
								<td align="center"><?php echo $presidente;?></td>
								<td align="center"><?php echo $membroexterno;?></td>
								<td align="center"><?php echo $membrointerno;?></td>
								<td align="center">
									<form action="CE_quadropontuacao.php?idCE=<?php echo fnEncodeID($idCE);?>" method="post">
										<input type="hidden" name="idPedido" value="<?php echo $idPedido;?>"/>
										<input type="hidden" name="siape" value="<?php echo $siape;?>"/>
										<input type="submit" class="btn" value="Quadro" style="border-radius: 8px; border: 2px solid #1A5321;; color: white; background-color: #1A5321;">									
								</form>
								</td>								
								<td align="center">
									<form action="CE_finalizaavaliacaoRSC_rx1.php?idCE=<?php echo fnEncodeID($idCE);?>" method="post">
										<input type="hidden" name="idPedido" value="<?php echo $idPedido;?>"/>
<?php
						 				$nomeTab = "TabPedidoRSC_" . $siape;
										if (fnAvaliacaoProntaParaFinalizar($link, $nomeTab) == 1) {
?>											
										<input type="submit" class="btn" value="Finaliza" style="border-radius: 8px; border: 2px solid #1A5321;; color: white; background-color: #1A5321;">
<?php
										}
						 				else {
?>
										<input type="submit" disabled class="btn" value="Finaliza" style="border-radius: 8px; border: 2px solid #1A5321;; color: white; background-color: #1A5321;">
<?php
										}
?>
								</form>
								</td>								
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
	fnDesconectaBD($link);
	include "botaovoltar.php";
	include "rodape.php";
?>
		
</body>
</html>