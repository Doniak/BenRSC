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
				<h3 align="center" style="color: #1A5321;">Visualização das avaliações do pedido de RSC</h3>
			</div>
		</div>
	</div>
<?php	

if(!empty($_POST)) {
	$idPedido = $_POST['idPedido'];
	$siape = $_POST['siape'];
	
	$query = "SELECT presidentebanca,membroexterno,membrointerno,docente,rsc,datapedido FROM TabSolicitaRSC WHERE siape='$siape'";
	$result = mysqli_query($link, $query);
	$row = mysqli_fetch_assoc($result);
	$presidente = $row['presidentebanca'];
	$membroexterno = $row['membroexterno'];
	$membrointerno = $row['membrointerno'];
	$docente = $row['docente'];
	$rsc = $row['rsc'];
	$datapedido = $row['datapedido'];
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
					<thead>
					<tr align="center">
						<th align="center" style="color: #1A5321;" rowspan="2">RSC</th>
						<th align="center" style="color: #1A5321;" rowspan="2">Nº critério</th>
						<th align="center" style="color: #1A5321;" rowspan="2">Critério</th>
						<th align="center" style="color: #1A5321;" rowspan="2">Unidade</th>
						<th align="center" style="color: #1A5321;" rowspan="2">Qtde unid</th>
						<th align="center" style="color: #1A5321;" rowspan="2">Pontuação<BR>requerida</th>
						<th align="center" style="color: #1A5321; border-left: solid 2px #1A5321;" colspan="2">Presidente</th>
						<th align="center" style="color: #1A5321; border-left: solid 2px #1A5321;" colspan="2">Membro externo</th>
						<th align="center" style="color: #1A5321; border-left: solid 2px #1A5321;" colspan="2">Membro interno</th>
					</tr>
					<tr align="center" style="border-bottom: solid 4px #1A5321;">
						<th align="center" style="color: #1A5321; border-left: solid 2px #1A5321;">Unid deferida</th>
						<th align="center" style="color: #1A5321;">Pont deferida</th>
						<th align="center" style="color: #1A5321; border-left: solid 2px #1A5321;">Unid deferida</th>
						<th align="center" style="color: #1A5321;">Pont deferida</th>
						<th align="center" style="color: #1A5321; border-left: solid 2px #1A5321;">Unid deferida</th>
						<th align="center" style="color: #1A5321;">Pont deferida</th>
					</tr>
					</thead>
<?php
					while ($row = mysqli_fetch_assoc($result)) {
						$nivelRSC = $row['nivel'];
						$diretriz = $row['diretriz'];
						$nrcriterio = $row['criterio'];
						$nomecriterio = $row['nomecriterio'];
						$datadoc = $row['datadoc'];
						$fatorpontuacao = $row['fatorpontuacao'];
						$pontuacaorequerida = $row['pontuacaorequerida'];
						$unidade = $row['unidade'];
						$qtdeunidades = $row['qtdeunidades'];
						$unidDefPresidente = $row['unidDefPresidente'];
						$PontDefPresidente = $row['PontDefPresidente'];
						$unidDefMembExt = $row['unidDefMembExt'];
						$PontDefMembExt = $row['PontDefMembExt'];
						$unidDefMembInterno = $row['unidDefMembInterno'];
						$PontDefMembInterno = $row['PontDefMembInterno'];
?>
						<tr align="center" style="border: 2px solid #1A5321;">
							<form action="CE_avaliarRSC_rx1.php?idCE=<?php echo fnEncodeID($idCE);?>.php" method="post">
								<td align="center"><?php echo $nivelRSC;?></td>
								<td align="center"><?php echo $nrcriterio;?></td>
								<td align="left"><?php echo $nomecriterio;?></td>
								<td align="center"><?php echo $unidade;?></td>
								<td align="center"><?php echo $qtdeunidades;?></td>
								<td align="center"><?php echo $pontuacaorequerida;?></td>
								<td align="center" style="border-left: solid 2px #1A5321;"><?php echo $unidDefPresidente;?></td>
								<td align="center"><?php echo $PontDefPresidente;?></td>
								<td align="center" style="border-left: solid 2px #1A5321;"><?php echo $unidDefMembExt;?></td>
								<td align="center"><?php echo $PontDefMembExt;?></td>
								<td align="center" style="border-left: solid 2px #1A5321;"><?php echo $unidDefMembInterno;?></td>
								<td align="center"><?php echo $PontDefMembInterno;?></td>
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
}
else {
	fnDesconectaBD($link);
	header("Location: JavaScript: window.history.back();");
}
?>
