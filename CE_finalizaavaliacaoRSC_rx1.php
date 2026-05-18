<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php
	include "cabecalho.php";
	include "conectaBD.php";
	$link = fnConectaBancoDados(); 
	include "Tabelas.php";
	include "CE_funcoes.php";
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
				<p><h3 align="center" style="color: #1A5321;"><b>Parecer Técnico sobre o Relatório Descritivo para fins de concessão do Reconhecimento de Saberes e Competências</b></h3></p>
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
		$rsc = $row['rsc'];
		$siape = $row['siape'];
		$datapedido = $row['datapedido'];
		$ultimaMovimentacao = $row['dataMovimentacao'];
		$presidente = $row['presidentebanca'];
		$ifepresidente = $row['ifepresidente'];
		$membroexterno = $row['membroexterno'];
		$ifemembroexterno = $row['ifemembroexterno'];
		$membrointerno = $row['membrointerno'];
		$ifemembrointerno = $row['ifemembrointerno'];
		
		$ParecerPontos = fnParecerPedidoRSC($link,$siape);
		
		// Indicar a pontuação total e no nível RSC requerido deferido pela Comissão Especial. Permitir que a Comissão Especial altere o valor das pontuações. A pontuação apresentada será a do presidente.
		// presidente
		$pontPresidenteGlobal = $ParecerPontos[0];
		$PontDeferPresTotal_RSC1 = $ParecerPontos[1];
		$PontDeferPresTotal_RSC2 = $ParecerPontos[2];
		$PontDeferPresTotal_RSC3 = $ParecerPontos[3];
		// membro externo
		$PontDeferExteTotal = $ParecerPontos[4];
		$PontDeferExteTotal_RSC1 = $ParecerPontos[5];
		$PontDeferExteTotal_RSC2 = $ParecerPontos[6];
		$PontDeferExteTotal_RSC3 = $ParecerPontos[7];
		// membro interno
		$PontDeferInternoTotal = $ParecerPontos[8];
		$PontDeferInternoTotal_RSC1 = $ParecerPontos[9];
		$PontDeferInternoTotal_RSC2 = $ParecerPontos[10];
		$PontDeferInternoTotal_RSC3 = $ParecerPontos[11];
		
		$parecerPtoGlobal = fnParecerPontGlobal($pontPresidenteGlobal,$PontDeferExteTotal,$PontDeferInternoTotal);
		$pontuacaoTotalFinal = $pontPresidenteGlobal;
		
		if (strcmp($rsc,"RSC-I") == 0) {
			$parecerNivelRSC = fnParecerPontNivel($PontDeferPresTotal_RSC1,$PontDeferExteTotal_RSC1,$PontDeferInternoTotal_RSC1);
			$pontuacaoNivelRSC = $PontDeferPresTotal_RSC1;
		}
		elseif (strcmp($rsc,"RSC-II") == 0) {
			$parecerNivelRSC = fnParecerPontNivel($PontDeferPresTotal_RSC2,$PontDeferExteTotal_RSC2,$PontDeferInternoTotal_RSC2);
			$pontuacaoNivelRSC = $PontDeferPresTotal_RSC2;
		}
		elseif (strcmp($rsc,"RSC-III") == 0) {
			$parecerNivelRSC = fnParecerPontNivel($PontDeferPresTotal_RSC3,$PontDeferExteTotal_RSC3,$PontDeferInternoTotal_RSC3);
			$pontuacaoNivelRSC = $PontDeferPresTotal_RSC3;
		}
		else {
			$parecerNivelRSC = "INDEFERIDO";
			$pontuacaoNivelRSC = 0;
		}
		
		// Verificar qual é a data indicada para a concessão do benefício. Permitir que a Comissão Especial altere a data.
		$datarequisitos = "";
		$dataConcessao = "";
		if ((strcmp($parecerPtoGlobal,"DEFERIDO") == 0) && (strcmp($parecerNivelRSC,"DEFERIDO") == 0)) {
			$formatodata = 1; // data no formato do banco de dados
			$dataRequisPresidente = fnDataConcessaoPorAvaliador($link, $rsc, $siape, $presidente, $idPedido, $formatodata);
			$dataRequisMembExterno = fnDataConcessaoPorAvaliador($link, $rsc, $siape, $membroexterno, $idPedido, $formatodata);
			$dataRequisMembInterno = fnDataConcessaoPorAvaliador($link, $rsc, $siape, $membrointerno, $idPedido, $formatodata);

			// Precisa testar as combinações para definir a data de concessão do benefício ou pedir para a comissão entrar em acordo de editar a data
			if (($dataRequisPresidente === $dataRequisMembExterno) && ($dataRequisPresidente === $dataRequisMembInterno)) {
				$dataConcessao = $dataRequisPresidente;
				$datarequisitos = fnFormatoData($dataRequisPresidente);
			}
			elseif (($dataRequisPresidente === $dataRequisMembExterno) || ($dataRequisPresidente === $dataRequisMembInterno)) {
				$dataConcessao = $dataRequisPresidente;
				$datarequisitos = fnFormatoData($dataRequisPresidente);
			}
			elseif (($dataRequisMembExterno === $dataRequisMembInterno) || ($dataRequisMembExterno === $dataRequisPresidente)){
				$dataConcessao = $dataRequisMembExterno;
				$datarequisitos = fnFormatoData($dataRequisMembExterno);
			}
			elseif (($dataRequisMembInterno === $dataRequisMembExterno) || ($dataRequisMembInterno === $dataRequisPresidente)) {
				$dataConcessao = $dataRequisMembInterno;
				$datarequisitos = fnFormatoData($dataRequisMembInterno);
			}
		}
?>	
		<div  style="background-color: #1A5321;">
			<BR>
			<div class="container" style="background-color: #E4EBE2; ">
				<BR>
				<form action="CE_finalizaavaliacaoRSC_rx2.php?idCE=<?php echo fnEncodeID($idCE);?>" method="post" target="_blank">
				<div class="row">
					<div class="coluna" align="center">
						<label>Nome do requerente</label><BR>
						<input type="text" readonly name="docente" value="<?php echo $docente;?>" size="48px" style="background-color: #E9E9E9;"/>
					</div>
					<div class="coluna" align="center">
					</div>
					<div class="coluna" align="center">
					</div>
				</div>
				<div class="row">
					<div class="coluna" align="center">
						<label>Nível RSC solicitado</label><BR>
						<input type="text" readonly name="rsc" value="<?php echo $rsc;?>" style="background-color: #E9E9E9;"/>
					</div>
					<div class="coluna" align="center">
						<label>Data da solicitação</label><BR>
						<input type="date" readonly name="datapedido" value="<?php echo $datapedido;?>" style="background-color: #E9E9E9;"/>
					</div>
					<div class="coluna" align="center">
					</div>
				</div>
				<BR>
				<div class="row">
					<p align="left"><b>Comissão Especial de Avaliação</b></p>
					<div class="coluna" align="center">
						<label>Presidente</label><BR>
						<input type="text" readonly name="presidente" value="<?php echo $presidente;?>" size="36px" style="background-color: #E9E9E9;"/><BR>
						<label>IFE do presidente</label><BR>
						<input type="text" readonly name="ifepresidente" value="<?php echo $ifepresidente;?>" size="36px" style="background-color: #E9E9E9;"/>				
					</div>
					<div class="coluna" align="center">
						<label>Membro externo</label><BR>
						<input type="text" readonly name="membroexterno" value="<?php echo $membroexterno;?>" size="36px" style="background-color: #E9E9E9;"/><BR>
						<label>IFE do membro externo</label><BR>
						<input type="text" readonly name="ifemembroexterno" value="<?php echo $ifemembroexterno;?>" size="36px" style="background-color: #E9E9E9;"/>
					</div>
					<div class="coluna" align="center">
						<label>Membro interno</label><BR>
						<input type="text" readonly name="membrointerno" value="<?php echo $membrointerno;?>" size="36px" style="background-color: #E9E9E9;"/><BR>
						<label>IFE do membro externo</label><BR>
						<input type="text" readonly name="ifemembrointerno" value="<?php echo $ifemembrointerno;?>" size="36px" style="background-color: #E9E9E9;"/>
					</div>
				</div>						
				<BR>
				<div class="row">
					<p align="justify">Após análise da documentação comprobatória apresentada, a Comissão Especial de Avaliação, deferiu as pontuações, de acordo com o que segue:</p>
					<div class="coluna" align="center">
						<label><b>Pontuação no RSC pretendido&ensp;</b></label>
						<input type="text" name="ptoRSCprentendido" size="8px" value="<?php echo $pontuacaoNivelRSC;?>"/>
					</div>
					<div class="coluna" align="center">
						<label><b>Pontuação total&ensp;</b></label>
						<input type="text" name="ptoTotal" size="8px" value="<?php echo $pontuacaoTotalFinal;?>"/>
					</div>
				</div>
				<div class="row">
					<div align="left">
						<label><b>Data de concessão do benefício&ensp;</b></label>
						<input type="date" name="dataConcessao" value="<?php echo $dataConcessao;?>" />
					</div>
				</div>
				<BR>
				<div class="row" align="center">
					<p align="left"><b>Justificativa para indeferimento das pontuações e observações gerais:</b></p>
					<textarea name="justificativa" style="margin-left: 12px;" rows="16">
<?php
						$obstextarea = "";
						$nomeTab = "TabPedidoRSC_" . $siape;
						$query = "SELECT criterio, nomecriterio, observPresidente, observMembExt, observMembInterno FROM $nomeTab ORDER BY criterio";
						$result = mysqli_query($link, $query); 
						while($row = mysqli_fetch_assoc($result)) {
							$observPresidente = $row['observPresidente'];
							$observMembExt = $row['observMembExt'];
							$observMembInterno = $row['observMembInterno'];
							$criterio = $row['criterio'];
							$nomecriterio = $row['nomecriterio'];
							
							if ((strcmp("",$observPresidente) != 0) || (strcmp("",$observMembExt) != 0) || (strcmp("",$observMembInterno) != 0)) {
								$obstextarea .= "Critério " . $criterio . " - " . $nomecriterio . ":" . "\n";
								if (strcmp("",$observPresidente) != 0) {
									$obstextarea .= "Presidente: " . $observPresidente . "\n";
								}
								if (strcmp("",$observMembExt) != 0) {
									$obstextarea .= "Membro externo: " . $observMembExt . "\n";
								}
								if (strcmp("",$observMembInterno) != 0) {
									$obstextarea .= "Membro interno: " . $observMembInterno . "\n";
								}
								$obstextarea .= "\n";
							}
						}
						echo $obstextarea;
?>					
					</textarea>
				</div>
				<BR>
				<div class="row" align="center">
<?php
					//$resultadoparecer = "<p align='justify'>Tendo em vista a pontuação recebida, e de acordo com os Artigos nº 12, 13 e 14, da Resolução nº 29/2014/Consup, de 24/07/2014, o postulante foi <b>$parecer</b> na análise do Parecer Descritivo por esta Comissão Especial de Avaliação, e está <b>$apto</b> para receber a concessão do RSC pretendido, a partir da data que cumpriu os requisitos, indicada por esta Comissão Especial de Avaliação.</p>";

					//echo $resultadoparecer;
?>
				</div>
				<BR>
				<div class="row" align="center">
					<p align="left">Assinaturas:</p>
				</div>
				<BR><BR>
				<div class="row" align="center">
					<div class="coluna" align="center">
						<p align="center">__________________________________<BR>Presidente<BR><?php echo $presidente;?></p>
					</div>
					<div class="coluna" align="center">
						<p align="center">__________________________________<BR>Membro externo<BR><?php echo $membroexterno;?></p>
					</div>
					<div class="coluna" align="center">
						<p align="center">__________________________________<BR>Membro interno<BR><?php echo $membrointerno;?></p>
					</div>
				</div>
				<div class="row" align="center">
<?php 
					$diahoje = date("d");
					$meshoje = fnNomeMes(date("m"));
					$anohoje = date("Y");
					$localData = "Florianópolis - SC, " . $diahoje . " de " . $meshoje . " de " . $anohoje . ".";
?>
					<p align="right"><?php echo $localData;?></p>
				</div>
				<div class="row">
					<div align="center">
						<input type="hidden" name="pontuacaoTotalFinal" value="<?php echo $pontuacaoTotalFinal;?>"/>
						<input type="hidden" name="pontuacaoNivelRSC" value="<?php echo $pontuacaoNivelRSC;?>"/>
						<input type="hidden" name="datarequisitos" value="<?php echo $datarequisitos;?>"/>
						<input type="hidden" name="parecerPtoGlobal" value="<?php echo $parecerPtoGlobal;?>"/>
						<input type="hidden" name="parecerNivelRSC" value="<?php echo $parecerNivelRSC;?>"/>
						<input type="hidden" name="localData" value="<?php echo $localData;?>"/>
						<input type="hidden" name="idPedido" value="<?php echo $idPedido;?>"/>
						<input type="hidden" name="siape" value="<?php echo $siape;?>"/>
						<label>Gera o arquivo pdf para assinatura<BR>e finaliza a avaliação</label><BR>
						<input type="submit" class="btn" value="Prepara aquivo pdf" style="border-radius: 8px; border: 3px solid #1A5321;; color: white; padding: 15px 30px; font-size: 18px; background-color: #1A5321;"/><br>
					</div>
				</div>
				</form>
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