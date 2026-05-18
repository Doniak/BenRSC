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
				<h3 align="center" style="color: #1A5321;">Quadro de pontuação da Comissão Especial</h3>
			</div>
		</div>
	</div>
<?php	

if(!empty($_POST)) {
	$idPedido = $_POST['idPedido'];
	$siape = $_POST['siape'];
	
	fnQuadroPontuacaoInicializa($link,$siape);
	
	$nomeTab = "QuadroPontAvaliadores_" . $siape;
	$selquery = "SELECT nivel,diretriz FROM $nomeTab";
	$resultquery = mysqli_query($link, $selquery);
	while ($linha = mysqli_fetch_assoc($resultquery)) {
		fnQuadroPontuacaoPorAvaliador ($link,$idPedido,$nomeAvaliador,$siape,$linha['nivel'],$linha['diretriz']);
	}
	
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
			$PontRequerTotal_RSC1 = 0;
			$PontDeferPresTotal_RSC1 = 0;
			$PontDeferExteTotal_RSC1 = 0;
			$PontDeferInternoTotal_RSC1 = 0;
			$nomeTab = "QuadroPontAvaliadores_" . $siape;
			$query = "SELECT * FROM $nomeTab WHERE nivel='RSCI'";
			$result = mysqli_query($link, $query); 
			$numlinhas = mysqli_num_rows($result);
			if ($numlinhas > 0) {
?>
			<div class="row">
				<h3 align="center"><b>Quadro de pontuação do nível RSC-1</b></h3>
				<table align='justify' width="100%" style="border: 4px solid #1A5321; margin-left: 10px;">
					<thead>
					<tr align="center">
						<th align="center" style="color: #1A5321;" rowspan="2">Diretriz</th>
						<th align="center" style="color: #1A5321;" rowspan="2">Descrição da diretriz</th>
						<th align="center" style="color: #1A5321;border-left: solid 2px #1A5321;" rowspan="2">Pont.<BR>máxima</th>
						<th align="center" style="color: #1A5321;border-left: solid 2px #1A5321;" rowspan="2">Pont.<BR>requerida</th>
						<th align="center" style="color: #1A5321; border-left: solid 2px #1A5321; border-bottom: solid 1px #1A5321;">Presidente</th>
						<th align="center" style="color: #1A5321; border-left: solid 2px #1A5321; border-bottom: solid 1px #1A5321;">Membro externo</th>
						<th align="center" style="color: #1A5321; border-left: solid 2px #1A5321; border-bottom: solid 1px #1A5321;">Membro interno</th>
					</tr>
					<tr align="center" style="border-bottom: solid 4px #1A5321;">
						<th align="center" style="color: #1A5321;border-left: solid 2px #1A5321;">Pont. deferida</th>
						<th align="center" style="color: #1A5321;border-left: solid 2px #1A5321;">Pont. deferida</th>
						<th align="center" style="color: #1A5321;border-left: solid 2px #1A5321;">Pont. deferida</th>
					</tr>
					</thead>
<?php
					while ($row = mysqli_fetch_assoc($result)) {
						$diretriz = $row['diretriz'];
						$descricao = $row['descricao'];
						$pontMax = $row['pontMax'];
						$PontRequer = $row['PontRequer'];
						$PontDeferPres = $row['PontDeferPres'];
						$PontDeferExte = $row['PontDeferExte'];
						$PontDeferInterno = $row['PontDeferInterno'];
						
						$PontRequerTotal_RSC1 = number_format($PontRequerTotal_RSC1 + $PontRequer,2);
						$PontDeferPresTotal_RSC1 = number_format($PontDeferPresTotal_RSC1 + $PontDeferPres,2);
						$PontDeferExteTotal_RSC1 = number_format($PontDeferExteTotal_RSC1 + $PontDeferExte,2);
						$PontDeferInternoTotal_RSC1 = number_format($PontDeferInternoTotal_RSC1 + $PontDeferInterno,2);
?>
						<tr align="center" style="border: 2px solid #1A5321;">
							<td align="center"><?php echo $diretriz;?></td>
							<td align="left"><?php echo $descricao;?></td>
							<td align="center" style="border-left: solid 2px #1A5321;"><?php echo $pontMax;?></td>
							<td align="center" style="border-left: solid 2px #1A5321;"><?php echo $PontRequer;?></td>
							<td align="center" style="border-left: solid 2px #1A5321;"><?php echo $PontDeferPres;?></td>
							<td align="center" style="border-left: solid 2px #1A5321;"><?php echo $PontDeferExte;?></td>
							<td align="center" style="border-left: solid 2px #1A5321;"><?php echo $PontDeferInterno;?></td>
						</tr>
<?php						
					}
?>
					<tr align="center" style="border-bottom: solid 4px #1A5321;">
						<td align="right" style="border-left: solid 2px #1A5321;" colspan="3"><b>Pontuação total deferida no nível RSC-1 &ensp;</b></td>
						<td align="center" style="border-left: solid 2px #1A5321;"><b><?php echo $PontRequerTotal_RSC1;?></b></td>
						<td align="center" style="border-left: solid 2px #1A5321;"><b><?php echo $PontDeferPresTotal_RSC1;?></b></td>
						<td align="center" style="border-left: solid 2px #1A5321;"><b><?php echo $PontDeferExteTotal_RSC1;?></b></td>
						<td align="center" style="border-left: solid 2px #1A5321;"><b><?php echo $PontDeferInternoTotal_RSC1;?></b></td>
					</tr>
				</table>
				<BR>
			</div>
<?php
			}
?>
			<BR>
<?php
			$PontRequerTotal_RSC2 = 0;
			$PontDeferPresTotal_RSC2 = 0;
			$PontDeferExteTotal_RSC2 = 0;
			$PontDeferInternoTotal_RSC2 = 0;
			$nomeTab = "QuadroPontAvaliadores_" . $siape;
			$query = "SELECT * FROM $nomeTab WHERE nivel='RSCII'";
			$result = mysqli_query($link, $query); 
			$numlinhas = mysqli_num_rows($result);
			if ($numlinhas > 0) {
?>
			<div class="row">
				<h3 align="center"><b>Quadro de pontuação do nível RSC-2</b></h3>
				<table align='justify' width="100%" style="border: 4px solid #1A5321; margin-left: 10px;">
					<thead>
					<tr align="center">
						<th align="center" style="color: #1A5321;" rowspan="2">Diretriz</th>
						<th align="center" style="color: #1A5321;" rowspan="2">Descrição da diretriz</th>
						<th align="center" style="color: #1A5321;border-left: solid 2px #1A5321;" rowspan="2">Pont.<BR>máxima</th>
						<th align="center" style="color: #1A5321;border-left: solid 2px #1A5321;" rowspan="2">Pont.<BR>requerida</th>
						<th align="center" style="color: #1A5321; border-left: solid 2px #1A5321; border-bottom: solid 1px #1A5321;">Presidente</th>
						<th align="center" style="color: #1A5321; border-left: solid 2px #1A5321; border-bottom: solid 1px #1A5321;">Membro externo</th>
						<th align="center" style="color: #1A5321; border-left: solid 2px #1A5321; border-bottom: solid 1px #1A5321;">Membro interno</th>
					</tr>
					<tr align="center" style="border-bottom: solid 4px #1A5321;">
						<th align="center" style="color: #1A5321;border-left: solid 2px #1A5321;">Pont. deferida</th>
						<th align="center" style="color: #1A5321;border-left: solid 2px #1A5321;">Pont. deferida</th>
						<th align="center" style="color: #1A5321;border-left: solid 2px #1A5321;">Pont. deferida</th>
					</tr>
					</thead>
<?php
					while ($row = mysqli_fetch_assoc($result)) {
						$diretriz = $row['diretriz'];
						$descricao = $row['descricao'];
						$pontMax = $row['pontMax'];
						$PontRequer = $row['PontRequer'];
						$PontDeferPres = $row['PontDeferPres'];
						$PontDeferExte = $row['PontDeferExte'];
						$PontDeferInterno = $row['PontDeferInterno'];
						
						$PontRequerTotal_RSC2 = number_format($PontRequerTotal_RSC2 + $PontRequer,2);
						$PontDeferPresTotal_RSC2 = number_format($PontDeferPresTotal_RSC2 + $PontDeferPres,2);
						$PontDeferExteTotal_RSC2 = number_format($PontDeferExteTotal_RSC2 + $PontDeferExte,2);
						$PontDeferInternoTotal_RSC2 = number_format($PontDeferInternoTotal_RSC2 + $PontDeferInterno,2);
?>
						<tr align="center" style="border: 2px solid #1A5321;">
							<td align="center"><?php echo $diretriz;?></td>
							<td align="left"><?php echo $descricao;?></td>
							<td align="center" style="border-left: solid 2px #1A5321;"><?php echo $pontMax;?></td>
							<td align="center" style="border-left: solid 2px #1A5321;"><?php echo $PontRequer;?></td>
							<td align="center" style="border-left: solid 2px #1A5321;"><?php echo $PontDeferPres;?></td>
							<td align="center" style="border-left: solid 2px #1A5321;"><?php echo $PontDeferExte;?></td>
							<td align="center" style="border-left: solid 2px #1A5321;"><?php echo $PontDeferInterno;?></td>
						</tr>
<?php						
					}
?>
					<tr align="center" style="border-bottom: solid 4px #1A5321;">
						<td align="right" style="border-left: solid 2px #1A5321;" colspan="3"><b>Pontuação total deferida no nível RSC-2 &ensp;</b></td>
						<td align="center" style="border-left: solid 2px #1A5321;"><b><?php echo $PontRequerTotal_RSC2;?></b></td>
						<td align="center" style="border-left: solid 2px #1A5321;"><b><?php echo $PontDeferPresTotal_RSC2;?></b></td>
						<td align="center" style="border-left: solid 2px #1A5321;"><b><?php echo $PontDeferExteTotal_RSC2;?></b></td>
						<td align="center" style="border-left: solid 2px #1A5321;"><b><?php echo $PontDeferInternoTotal_RSC2;?></b></td>
					</tr>
				</table>
				<BR>
			</div>
<?php
			}
?>
			<BR>
<?php
			$PontRequerTotal_RSC3 = 0;
			$PontDeferPresTotal_RSC3 = 0;
			$PontDeferExteTotal_RSC3 = 0;
			$PontDeferInternoTotal_RSC3 = 0;
			$nomeTab = "QuadroPontAvaliadores_" . $siape;
			$query = "SELECT * FROM $nomeTab WHERE nivel='RSCIII'";
			$result = mysqli_query($link, $query); 
			$numlinhas = mysqli_num_rows($result);
			if ($numlinhas > 0) {
?>
			<div class="row">
				<h3 align="center"><b>Quadro de pontuação do nível RSC-3</b></h3>
				<table align='justify' width="100%" style="border: 4px solid #1A5321; margin-left: 10px;">
					<thead>
					<tr align="center">
						<th align="center" style="color: #1A5321;" rowspan="2">Diretriz</th>
						<th align="center" style="color: #1A5321;" rowspan="2">Descrição da diretriz</th>
						<th align="center" style="color: #1A5321;border-left: solid 2px #1A5321;" rowspan="2">Pont.<BR>máxima</th>
						<th align="center" style="color: #1A5321;border-left: solid 2px #1A5321;" rowspan="2">Pont.<BR>requerida</th>
						<th align="center" style="color: #1A5321; border-left: solid 2px #1A5321; border-bottom: solid 1px #1A5321;">Presidente</th>
						<th align="center" style="color: #1A5321; border-left: solid 2px #1A5321; border-bottom: solid 1px #1A5321;">Membro externo</th>
						<th align="center" style="color: #1A5321; border-left: solid 2px #1A5321; border-bottom: solid 1px #1A5321;">Membro interno</th>
					</tr>
					<tr align="center" style="border-bottom: solid 4px #1A5321;">
						<th align="center" style="color: #1A5321;border-left: solid 2px #1A5321;">Pont. deferida</th>
						<th align="center" style="color: #1A5321;border-left: solid 2px #1A5321;">Pont. deferida</th>
						<th align="center" style="color: #1A5321;border-left: solid 2px #1A5321;">Pont. deferida</th>
					</tr>
					</thead>
<?php
					while ($row = mysqli_fetch_assoc($result)) {
						$diretriz = $row['diretriz'];
						$descricao = $row['descricao'];
						$pontMax = $row['pontMax'];
						$PontRequer = $row['PontRequer'];
						$PontDeferPres = $row['PontDeferPres'];
						$PontDeferExte = $row['PontDeferExte'];
						$PontDeferInterno = $row['PontDeferInterno'];
						
						$PontRequerTotal_RSC3 = number_format($PontRequerTotal_RSC3 + $PontRequer,2);
						$PontDeferPresTotal_RSC3 = number_format($PontDeferPresTotal_RSC3 + $PontDeferPres,2);
						$PontDeferExteTotal_RSC3 = number_format($PontDeferExteTotal_RSC3 + $PontDeferExte,2);
						$PontDeferInternoTotal_RSC3 = number_format($PontDeferInternoTotal_RSC3 + $PontDeferInterno,2);
?>
						<tr align="center" style="border: 2px solid #1A5321;">
							<td align="center"><?php echo $diretriz;?></td>
							<td align="left"><?php echo $descricao;?></td>
							<td align="center" style="border-left: solid 2px #1A5321;"><?php echo $pontMax;?></td>
							<td align="center" style="border-left: solid 2px #1A5321;"><?php echo $PontRequer;?></td>
							<td align="center" style="border-left: solid 2px #1A5321;"><?php echo $PontDeferPres;?></td>
							<td align="center" style="border-left: solid 2px #1A5321;"><?php echo $PontDeferExte;?></td>
							<td align="center" style="border-left: solid 2px #1A5321;"><?php echo $PontDeferInterno;?></td>
						</tr>
<?php						
					}
?>
					<tr align="center" style="border-bottom: solid 4px #1A5321;">
						<td align="right" style="border-left: solid 2px #1A5321;" colspan="3"><b>Pontuação total deferida no nível RSC-3 &ensp;</b></td>
						<td align="center" style="border-left: solid 2px #1A5321;"><b><?php echo $PontRequerTotal_RSC3;?></b></td>
						<td align="center" style="border-left: solid 2px #1A5321;"><b><?php echo $PontDeferPresTotal_RSC3;?></b></td>
						<td align="center" style="border-left: solid 2px #1A5321;"><b><?php echo $PontDeferExteTotal_RSC3;?></b></td>
						<td align="center" style="border-left: solid 2px #1A5321;"><b><?php echo $PontDeferInternoTotal_RSC3;?></b></td>
					</tr>
				</table>
				<BR>
			</div>
<?php
			}
?>
			<BR>
			<div class="row">
				<h3 align="center"><b>Resultado da avaliação feita pela Comissão Especial</b></h3>
				<table align='justify' width="100%" style="border: 4px solid #1A5321; margin-left: 10px;">
					<thead>
					<tr align="center">
						<th align="center" rowspan="2" style="color: #1A5321;">Pontuação total</th>
						<th align="center" rowspan="2" style="color: #1A5321; border-left: solid 2px #1A5321;">Pontuação Requerida</th>
						<th align="center" colspan="3" style="color: #1A5321;border-left: solid 2px #1A5321; border-bottom: solid 2px #1A5321;">Pontuação Deferida</th>
					</tr>
					<tr align="center" style="border-bottom: solid 4px #1A5321;">
						<th align="center" style="color: #1A5321;border-left: solid 2px #1A5321;">Presidente</th>
						<th align="center" style="color: #1A5321;border-left: solid 2px #1A5321;">Membro<BR>externo</th>
						<th align="center" style="color: #1A5321;border-left: solid 2px #1A5321;">Membro<BR>interno</th>
					</tr>						
					</thead>
					<tr align="center" style="border: 2px solid #1A5321;">
						<td align="left">&ensp;Total no nível RSC-1</td>
						<td align="center" style="border-left: solid 2px #1A5321;"><?php echo $PontRequerTotal_RSC1;?></td>
						<td align="center" style="border-left: solid 2px #1A5321;"><?php echo $PontDeferPresTotal_RSC1;?></td>
						<td align="center" style="border-left: solid 2px #1A5321;"><?php echo $PontDeferExteTotal_RSC1;?></td>
						<td align="center" style="border-left: solid 2px #1A5321;"><?php echo $PontDeferInternoTotal_RSC1;?></td>
					</tr>
					<tr align="center" style="border: 2px solid #1A5321;">
						<td align="left">&ensp;Total no nível RSC-2</td>
						<td align="center" style="border-left: solid 2px #1A5321;"><?php echo $PontRequerTotal_RSC2;?></td>
						<td align="center" style="border-left: solid 2px #1A5321;"><?php echo $PontDeferPresTotal_RSC2;?></td>
						<td align="center" style="border-left: solid 2px #1A5321;"><?php echo $PontDeferExteTotal_RSC2;?></td>
						<td align="center" style="border-left: solid 2px #1A5321;"><?php echo $PontDeferInternoTotal_RSC2;?></td>
					</tr>
					<tr align="center" style="border: 2px solid #1A5321;">
						<td align="left">&ensp;Total no nível RSC-3</td>
						<td align="center" style="border-left: solid 2px #1A5321;"><?php echo $PontRequerTotal_RSC3;?></td>
						<td align="center" style="border-left: solid 2px #1A5321;"><?php echo $PontDeferPresTotal_RSC3;?></td>
						<td align="center" style="border-left: solid 2px #1A5321;"><?php echo $PontDeferExteTotal_RSC3;?></td>
						<td align="center" style="border-left: solid 2px #1A5321;"><?php echo $PontDeferInternoTotal_RSC3;?></td>
					</tr>
					<tr align="center" style="border: 2px solid #1A5321;">
						<td align="left" rowspan="2"><b>&ensp;Resultado final</b></td>
						<td align="center" rowspan="2" style="border-left: solid 2px #1A5321;"><b><?php echo number_format($PontRequerTotal_RSC1+$PontRequerTotal_RSC2+$PontRequerTotal_RSC3,2);?></b></td>
						<td align="center" style="border-left: solid 2px #1A5321;"><b><?php echo number_format($PontDeferPresTotal_RSC1+$PontDeferPresTotal_RSC2+$PontDeferPresTotal_RSC3,2);?></b></td>
						<td align="center" style="border-left: solid 2px #1A5321;"><b><?php echo number_format($PontDeferExteTotal_RSC1+$PontDeferExteTotal_RSC2+$PontDeferExteTotal_RSC3,2);?></b></td>
						<td align="center" style="border-left: solid 2px #1A5321;"><b><?php echo number_format($PontDeferInternoTotal_RSC1+$PontDeferInternoTotal_RSC2+$PontDeferInternoTotal_RSC3,2);?></b></td>
					</tr>
					<tr align="center" style="border: 2px solid #1A5321;">
<?php
						$PontuacaoRSC_ok = 0;
						$PontuacaoGlobal_ok = 0;
						$ResultadoPedido = "Pedido não aprovado";
						if (strcmp($rsc,"RSC-I") == 0){
							if (($PontDeferPresTotal_RSC1 >= $pontRSC) & ($PontDeferExteTotal_RSC1 >= $pontRSC) & ($PontDeferInternoTotal_RSC1 >= $pontRSC))
							{
								$PontuacaoRSC_ok = 1;
							}
						}
						elseif (strcmp($rsc,"RSC-II") == 0){
							if (($PontDeferPresTotal_RSC2 >= $pontRSC) & ($PontDeferExteTotal_RSC2 >= $pontRSC) & ($PontDeferInternoTotal_RSC2 >= $pontRSC))
							{
								$PontuacaoRSC_ok = 1;
							}
						}
						elseif (strcmp($rsc,"RSC-III") == 0){
							if (($PontDeferPresTotal_RSC3 >= $pontRSC) & ($PontDeferExteTotal_RSC3 >= $pontRSC) & ($PontDeferInternoTotal_RSC3 >= $pontRSC))
							{
								$PontuacaoRSC_ok = 1;
							}
						}
						$PontGlobalPresidente = $PontDeferPresTotal_RSC1 + $PontDeferPresTotal_RSC2 + $PontDeferPresTotal_RSC3;
						$PontGlobalMembroExterno = $PontDeferExteTotal_RSC1 + $PontDeferExteTotal_RSC2 + $PontDeferExteTotal_RSC3;
						$PontGlobalMembroInterno = $PontDeferInternoTotal_RSC1 + $PontDeferInternoTotal_RSC2 + $PontDeferInternoTotal_RSC3;
						
						if (($PontGlobalPresidente >= $pontGlobal) & ($PontGlobalMembroExterno >= $pontGlobal) & ($PontGlobalMembroInterno >= $pontGlobal)) {
							$PontuacaoGlobal_ok = 1;
						}
						if (($PontuacaoRSC_ok == 1) & ($PontuacaoGlobal_ok == 1)) {
							$ResultadoPedido = "Pedido deferido";
						}
						if (strcmp($ResultadoPedido,"Pedido deferido") == 0) {
?>
						<td align="center" colspan="3" style="color:#1A5321;  border-left: solid 2px #1A5321;"><b><?php echo $ResultadoPedido;?></b></td>
<?php
						}
						else {
?>
						<td align="center" colspan="3" style="color: red; border-left: solid 2px #1A5321;"><b><?php echo $ResultadoPedido;?></b></td>
<?php
						 }
?>
					</tr>
				</table>
			</div>
			<BR>
			<div class="row">
				<h3 align="center"><b>Resultado da avaliação feita pela Comissão Especial</b></h3>
				<table align='center' width="50%" style="border: 4px solid #1A5321; margin-left: 10px;">
					<thead>
					<tr align="center">
						<th align="center" style="color: #1A5321;">Avaliador</th>
						<th align="center" style="color: #1A5321;">Nome do avaliador</th>
						<th align="center" style="color: #1A5321;">Data de concessão do<BR>benefício RSC</th>
					</tr>
					</thead>
					<tr align="center" style="border: 2px solid #1A5321;">
						<td align="center">Presidente</td>
						<td align="center"><?php echo $presidente;?></td>
						<td align="center">
							<?php echo fnDataConcessaoPorAvaliador($link,$rsc,$siape,$presidente,$idPedido);?>
						</td>
					</tr>
					<tr align="center" style="border: 2px solid #1A5321;">
						<td align="center">Membro externo</td>
						<td align="center"><?php echo $membroexterno;?></td>
						<td align="center">
							<?php echo fnDataConcessaoPorAvaliador($link,$rsc,$siape,$membroexterno,$idPedido);?>
						</td>
					</tr>
					<tr align="center" style="border: 2px solid #1A5321;">
						<td align="center">Membro interno</td>
						<td align="center"><?php echo $membrointerno;?></td>
						<td align="center">
							<?php echo fnDataConcessaoPorAvaliador($link,$rsc,$siape,$membrointerno,$idPedido);?>
						</td>
					</tr>
				</table>
			</div>
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
