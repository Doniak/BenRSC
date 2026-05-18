<!doctype html>
<head>
<?php
	include "cabecalho.php";
	include "conectaBD.php";
	$link = fnConectaBancoDados(); 
	include "Tabelas.php";
	include "variaveis.php";
	include "Docente_funcoes.php";
	include "funcoes.php";
?>
</head>
<body>
	<div style="background-color:#1A5321;">
		<div class="container bg-transparent">
<?php 
			include "Docente_menu.php";
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

	<div style="background-color: #1A5321;">
		<div class="container" style="background-color: #E4EBE2;">
			<div class="row">
				<p><h1 align="center" style="color: #1A5321;">Reconhecimento de Saberes e Competências</h1></p>
				<p><h2 align="center" style="color: #1A5321;"><b>Quadro de Pontuação Docente</b></h2></p>
			</div>
		</div>
	</div>

	<div style="background-color: #1A5321;">
		<div class="container" style="background-color: #E4EBE2;">
<?php
			if ($id > 0) {
				$query = "SELECT siape,rsc FROM TabDocente WHERE id=$id";
				$result = mysqli_query($link, $query); 
				$row = mysqli_fetch_assoc($result);
				$siape = $row['siape'];
				$rsc = $row['rsc'];
				$TabPedidoRSC = "TabPedidoRSC_" . $siape;
				
				$QuadroPontos = "QuadroPontuacao_" . $siape;
				fnQuadroPontosDocente($QuadroPontos,$link);
				fnIniciaQuadroPontos($QuadroPontos,$siape,$link);
				
				$descricao_pontmax = new clQuadroPontRSC();
				$descricao_pontmax = fnAtualizaTabQuadroPont_RSC1($QuadroPontos, $TabPedidoRSC, $link);
				$descricao = $descricao_pontmax->descricao;
				$pontMax = $descricao_pontmax->pontMax;
				$Total_RSC1 = $descricao_pontmax->totalpontos;
?>
				<table align='center' style="background-color: #E4EBE2; border: 4px solid; border-color: #1A5321;">
					<tr align="center" style="border: 3px solid; border-color: #1A5321;">
						<th align="center" width="70%" style="font-size: 16px; border-right: 3px solid; border-right-color: #1A5321;"><b>Diretrizes do RSC nível 1</b></th>
						<th align="center" width="10%" style="font-size: 14px; border-right: 3px solid; border-right-color: #1A5321;"><b>Pontuação<BR>máxima</b></th>
						<th align="center" width="20%" style="font-size: 14px;"><b>Pontuação<BR>requerida</b></th>
					</tr>
<?php 
					$index = 0;
					$query = "SELECT Pontuacao FROM $QuadroPontos WHERE nivel='RSCI' ORDER BY id";
					$result = mysqli_query($link, $query);
					if($result) {
						while($row = mysqli_fetch_assoc($result)) {
							$pontuacao = $row['Pontuacao'];
?>
							<tr style="border: 1px solid; border-color: #1A5321;">
								<td align="left" style="border-right: 3px solid; border-right-color: #1A5321;"><?php echo $descricao[$index];?></td>
								<td align="center" style="border-right: 3px solid; border-right-color: #1A5321;"><?php echo $pontMax[$index];?></td>
								<td align="center"><?php echo $pontuacao;?></td>
							</tr>
<?php 
							$index++;
						}
					}
?>				
					<tr style="border: 3px solid; border-color: #1A5321;">
						<td align="right" style="border-right: 3px solid; border-right-color: #1A5321;"><b><?php echo "TOTAL";?></b></td>
						<td align="center" style="border-right: 3px solid; border-right-color: #1A5321;"><b><?php echo "100";?></b></td>
						<td align="center"><b><?php echo $Total_RSC1;?></b></td>
					</tr>		
				</table>
				<BR>
<?php
				$descricao_pontmax = fnAtualizaTabQuadroPont_RSC2($QuadroPontos, $TabPedidoRSC, $link);
				$descricao = $descricao_pontmax->descricao;
				$pontMax = $descricao_pontmax->pontMax;
				$Total_RSC2 = $descricao_pontmax->totalpontos;
?>
				<table align='center' style="background-color: #E4EBE2; border: 4px solid; border-color: #1A5321;">
					<tr align="center" style="border: 3px solid; border-color: #1A5321;">
						<th align="center" width="70%" style="font-size: 16px; border-right: 3px solid; border-right-color: #1A5321;"><b>Diretrizes do RSC nível 2</b></th>
						<th align="center" width="10%" style="font-size: 14px; border-right: 3px solid; border-right-color: #1A5321;"><b>Pontuação<BR>máxima</b></th>
						<th align="center" width="20%" style="font-size: 14px;"><b>Pontuação<BR>requerida</b></th>
					</tr>
<?php 
					$index = 0;
					$query = "SELECT Pontuacao FROM $QuadroPontos WHERE nivel='RSCII' ORDER BY id";
					$result = mysqli_query($link, $query);
					if($result) {
						while($row = mysqli_fetch_assoc($result)) {
							$pontuacao = $row['Pontuacao'];
?>
							<tr style="border: 1px solid; border-color: #1A5321;">
								<td align="left" style="border-right: 3px solid; border-right-color: #1A5321;"><?php echo $descricao[$index];?></td>
								<td align="center" style="border-right: 3px solid; border-right-color: #1A5321;"><?php echo $pontMax[$index];?></td>
								<td align="center"><?php echo $pontuacao;?></td>
							</tr>
<?php 
							$index++;
						}
					}
?>				
					<tr style="border: 3px solid; border-color: #1A5321;">
						<td align="right" style="border-right: 3px solid; border-right-color: #1A5321;"><b><?php echo "TOTAL";?></b></td>
						<td align="center" style="border-right: 3px solid; border-right-color: #1A5321;"><b><?php echo "100";?></b></td>
						<td align="center"><b><?php echo $Total_RSC2;?></b></td>
					</tr>		
				</table>
				<BR>
<?php
				$descricao_pontmax = fnAtualizaTabQuadroPont_RSC3($QuadroPontos, $TabPedidoRSC, $link);
				$descricao = $descricao_pontmax->descricao;
				$pontMax = $descricao_pontmax->pontMax;
				$Total_RSC3 = $descricao_pontmax->totalpontos;
?>
				<table align='center' style="background-color: #E4EBE2; border: 4px solid; border-color: #1A5321;">
					<tr align="center" style="border: 3px solid; border-color: #1A5321;">
						<th align="center" width="70%" style="font-size: 16px; border-right: 3px solid; border-right-color: #1A5321;"><b>Diretrizes do RSC nível 3</b></th>
						<th align="center" width="10%" style="font-size: 14px; border-right: 3px solid; border-right-color: #1A5321;"><b>Pontuação<BR>máxima</b></th>
						<th align="center" width="20%" style="font-size: 14px;"><b>Pontuação<BR>requerida</b></th>
					</tr>
<?php 
					$index = 0;
					$query = "SELECT Pontuacao FROM $QuadroPontos WHERE nivel='RSCIII' ORDER BY id";
					$result = mysqli_query($link, $query);
					if($result) {
						while($row = mysqli_fetch_assoc($result)) {
							$pontuacao = $row['Pontuacao'];
?>
							<tr style="border: 1px solid; border-color: #1A5321;">
								<td align="left" style="border-right: 3px solid; border-right-color: #1A5321;"><?php echo $descricao[$index];?></td>
								<td align="center" style="border-right: 3px solid; border-right-color: #1A5321;"><?php echo $pontMax[$index];?></td>
								<td align="center"><?php echo $pontuacao;?></td>
							</tr>
<?php 
							$index++; 
						}
					}
?>				
					<tr style="border: 3px solid; border-color: #1A5321;">
						<td align="right" style="border-right: 3px solid; border-right-color: #1A5321;"><b><?php echo "TOTAL";?></b></td>
						<td align="center" style="border-right: 3px solid; border-right-color: #1A5321;"><b><?php echo "100";?></b></td>
						<td align="center"><b><?php echo $Total_RSC3;?></b></td>
					</tr>		
				</table>

<?php 
				$MinRSC_req = fnRSCminimaReq($Total_RSC1, $Total_RSC2, $Total_RSC3, $rsc, $pontRSC);
				$pontTotalRSCreq = fnPontoRSCrequerido($Total_RSC1, $Total_RSC2, $Total_RSC3, $rsc);
				$Total = $Total_RSC1 + $Total_RSC2 + $Total_RSC3;
?>
				<BR>
				<table align='center' width="100%" style="background-color: #E4EBE2; border: 4px solid; border-color: #1A5321;">
					<tr align="center" style="border: 4px solid; border-color: #1A5321;">
						<th align="center" style="border-right: 3px solid; border-right-color: #1A5321;"><b>Resultado da pontuação</b></th>
						<th align="center" style="border-right: 3px solid; border-right-color: #1A5321;"><b>Pontuação total</b></th>
						<th align="center"><b>Pontuação no nível<BR>RSC pretendido</b></th>
					</tr>
					<tr align="center" style="border: 4px solid; border-color: #1A5321;">
<?php
					if (($MinRSC_req == 1) && ($Total >= $pontGlobal)){
?>
						<td align="center" style="font-size: 16px; color #1A5321; border-right: 3px solid; border-right-color: #1A5321;">Pontuação <b>SUFICIENTE</b></td>
						<td align="center" style="font-size: 16px; border-right: 3px solid; border-right-color: #1A5321;"><?php echo $Total . " pontos";?></td>
						<td align="center" style="font-size: 16px;"><?php echo $pontTotalRSCreq . " pontos";?></td>
<?php
					} 
					else {
?>
						<td align="center" style="font-size: 16px; color: #c8411e; border-right: 3px solid; border-right-color: #1A5321;">Pontuação <b>INSUFICIENTE</b> para solicitar o RSC</td>
						<td align="center" style="font-size: 16px; border-right: 3px solid; border-right-color: #1A5321;"><?php echo $Total . " pontos";?></td>
						<td align="center" style="font-size: 16px;"><?php echo $pontTotalRSCreq . " pontos";?></td>
<?php
					 }
?>
				</tr>
				</table><BR>
<?php
			} // end if ($id > 0) 
?>
		</div>
	</div>
	
	<div style="background-color: #1A5321;">
		<div class="container" style="background-color: #E4EBE2;">
			<BR>
			<div class="row">
				<div class="coluna" align="center">
					<form action="Docente_quadropont_imprime.php?id=<?php echo fnEncodeID($id);?>" method="post">
						<p align="center">
						<input type="hidden" name="siape" id="siape" value="<?php echo $siape;?>"/>
						<input type="hidden" name="rsc" id="rsc" value="<?php echo $rsc;?>"/>
						<input type="submit" class="btn" value="Imprimir" style="border-radius: 8px; border: 3px solid #1A5321;; color: white; padding: 15px 30px; font-size: 18px; background-color: #1A5321;" formtarget="_blank">
						</p>
					</form>
				</div>
			</div>
		</div>
	</div>

<?php 
	fnDesconectaBD($link);
	include "botaovoltar.php";
	include "rodape.php"; 
?>
</body>
</html>