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
				<p><h3 align="center" style="color: #1A5321;"><b>Relatório Descritivo para fins de concessão de<BR>Reconhecimento de Saberes e Competências</b></h3></p>
			</div>
		</div>
	</div>
<?php
	$idPedido = $_POST['idPedido'];
	$pontuacaoTotalFinal = $_POST['pontuacaoTotalFinal'];
	$pontuacaoNivelRSC = $_POST['pontuacaoNivelRSC'];
	$parecerNivelRSC = $_POST['parecerNivelRSC'];
	$parecerPtoGlobal = $_POST['parecerPtoGlobal'];
	$dataConcessao = fnFormatoData($_POST['dataConcessao']);
	$localData = $_POST['localData'];
	$presidente = $_POST['presidente'];
	$membroexterno = $_POST['membroexterno'];
	$membrointerno = $_POST['membrointerno'];
	$ifepresidente = $_POST['ifepresidente'];
	$ifemembroexterno = $_POST['ifemembroexterno'];
	$ifemembrointerno = $_POST['ifemembrointerno'];
	$datapedido = fnFormatoData($_POST['datapedido']);
	$rsc = $_POST['rsc'];
	$docente = $_POST['docente'];
	$siape = $_POST['siape'];
	$justificativa = $_POST['justificativa'];

	$pathservidor = "http://localhost:81/RSC/";
	$imagem = $pathservidor . "images/IFSC_horizontal.png";
	
	$cabecalho = "<html><head></head><body>";

	$cabecalho .= "
	<div style='background-color: #1A5321;'>
		<BR>
		<div class='container' style='background-color: whitesmoke;'>
			<div class='row'>
				<p align='center'><img src=$imagem width='40%'></p>
			</div>
		</div>
	</div>";
	$cabecalho .= "<div style='background-color: #1A5321;'>
		<div class='container' style='background-color: #E4EBE2;'>
			<div class='row'>
				<p><h2 align='center' style='color: #1A5321;'><b>Parecer Técnico da Comissão Especial de Avaliação</b></h2></p>
				<p><h3 align='center' style='color: #1A5321;'>Relatório Descritivo para fins de concessão de<BR>Reconhecimento de Saberes e Competências</h3></p><BR>
			</div>
		</div>
	</div>";

// Corpo do arquivo pdf	
	$dadospdf = "<div  style='background-color: #1A5321;'><BR>
					<div class='container' style='background-color: #E4EBE2;'><BR>
						<div class='row'>
							<div class='coluna'>
								<span style='margin-left: 33px;'>Requerente: &nbsp; <b>$docente</b></span>
							</div>
							<div class='coluna'>
								<span style='margin-left: 33px;'>Nº Siape: &nbsp; <b>$siape</b></span>
							</div>
						</div>
						<div class='row'>
							<div class='coluna'>
								<span style='margin-left: 33px;'>Nível de RSC solicitado: &nbsp; <b>$rsc</b></span>
							</div>
							<div class='coluna'>
								<span style='margin-left: 33px;'>Data do pedido: &nbsp; <b>$datapedido</b></span>
							</div>
						</div><BR>";
	$dadospdf .= "	<div class='row'>
						<p align='left' style='margin-left: 33px;'><b>Comissão Especial de Avaliação:</b></p>
						<p align='left' style='margin-left: 33px;'>Presidente:&ensp;<b>$presidente</b></p>
						<p align='left' style='margin-left: 33px;'>IFE do(a) presidente:&ensp;$ifepresidente</p>
						<p align='left' style='margin-left: 33px;'>Membro externo:&ensp;<b>$membroexterno</b></p>
						<p align='left' style='margin-left: 33px;'>IFE do(a) membro externo:&ensp;$ifemembroexterno</p>
						<p align='left' style='margin-left: 33px;'>Membro interno:&ensp;<b>$membrointerno</b></p>
						<p align='left' style='margin-left: 33px;'>IFE do(a) membro interno:&ensp;$ifemembrointerno</p>
					</div>
					<div class='row'>
						<p align='left' style='margin-left: 33px; margin-right: 16px;'>Após análise da documentação comprobatória apresentada, a Comissão Especial de Avaliação deferiu as pontuações de acordo com o que segue:</p>
						<p align='left' style='margin-left: 33px; margin-right: 16px;'>Pontuação no RSC pretendido: &ensp; <b>$pontuacaoNivelRSC</b></p>
						<p align='left' style='margin-left: 33px; margin-right: 16px;'>Pontuação total: &ensp; <b>$pontuacaoTotalFinal</b></p>
						<p align='left' style='margin-left: 33px; margin-right: 16px;'>Data de concessão do benefício RSC: &ensp; <b>$dataConcessao</b></p>
					</div>
					";
/*	$dadospdf .= "
					<div class='row'>
						<p align='left' style='margin-left: 33px;'>Justificativa para indeferimento das pontuações e observações realizadas:</p>
					</div>
					<div class='row'>
						<textarea name='justificativa' style='margin-left: 12px;' rows='16' readonly>$justificativa</textarea>
					</div>
					<BR>";
*/				
	$quebrajustif = nl2br($justificativa);
	$dadospdf .= "
					<div class='row'>
						<p align='left' style='margin-left: 33px; margin-right: 16px;'>Justificativa para indeferimento das pontuações e observações realizadas:</p>
						<p align='left' style='margin-left: 33px; margin-right: 16px; border: solid 2px;'>$quebrajustif</p>
					</div>
					<BR>";
	
	if ((strcmp($parecerNivelRSC,"DEFERIDO") == 0) && (strcmp($parecerPtoGlobal,"DEFERIDO") == 0)) {
		$dadospdf .= "
					<div class='row'>
						<p align='left' style='margin-left: 33px;'>Tendo em vista a pontuação recebida, e de acordo com os Artigos nº 12, 13 e 14, da Resolução nº 29/2014/Consup, de 24/07/2014, o pedido do postulante foi <b>DEFERIDO</b> na análise do Parecer Descritivo por esta Comissão Especial de Avaliação, e está <b>APTO</b> para receber a concessão do RSC pretendido, a partir da data que cumpriu os requisitos, <b>$dataConcessao</b>, indicada por esta Comissão Especial de Avaliação.</p>
					</div>
				";
	}
	else {
		$dadospdf .= "
					<div class='row'>
						<p align='left' style='margin-left: 33px;'>Tendo em vista a pontuação recebida, e de acordo com os Artigos nº 12, 13 e 14, da Resolução nº 29/2014/Consup, de 24/07/2014, o pedido do postulante foi <b>$parecer</b> na análise do Parecer Descritivo por esta Comissão Especial de Avaliação, e <b>NÃO</b> está <b>apto</b> para receber a concessão do RSC pretendido.</p>
					</div>
				";
	}
	
	$dadospdf .= "
					<div class='row'>
						<p align='left' style='margin-left: 33px;'><b>Assinaturas:</b></p>
					</div>
					<div class='row'>
						<div class='coluna' align='center'>
							<BR><BR>
							<p align='center'>________________________________<BR>
							$presidente<BR>
							Presidente</p>
						</div>
						<div class='coluna' align='center'>
							<BR><BR>
							<p align='center'>________________________________<BR>
							$membroexterno<BR>
							Membro externo</p>
						</div>
						<div class='coluna' align='center'>
							<BR><BR>
							<p align='center'>________________________________<BR>
							$membrointerno<BR>
							Membro interno</p>
						</div>
					</div>
				";
	$dadospdf .= "
					<div class='row'>
						<p align='right'>$localData</p>
					</div>";
	
	$dadospdf .= "<BR></div></div>";
	
// rodapé
	$rodape = "
		<div style='background-color:#1A5321;'>
			<BR>
			<div class='container' style='background-color:#E4EBE2;'><BR>
				<div class='row'>
					<p align='center' style='font-size:125%;'><b>ForSolRSC - Formulário de Solicitação RSC</b></p>
					<p align='center' style='font-size:110%;'>
						<b>Comissão Permanente de Pessoal Docente - CPPD</b><BR>
						<a href='mailto:cppd.secretaria@ifsc.edu.br' target='_blank'>cppd.secretaria@ifsc.edu.br</a>
					</p>
					<p align='center'><b>Instituto Federal de Santa Catarina - IFSC</b><BR><a href='https://www.ifsc.edu.br' target='_blank'>www.ifsc.edu.br</a></p>
					<p align='center' style='font-size: 75%'>Rua 14 de Julho, 150, Coqueiros, CEP: 88075-010, Florianópolis-SC</p>
				</div>
			</div>
		</div>
		<div style='background-color: #1A5321;'>
			<BR>
		</div>";	
	
	$rodape .= "</body></html>";

?>
	<div  style="background-color: #1A5321;">
		<div class="container" style="background-color: #E4EBE2;"><BR>
			<div class="row">
				<div align="center">
				<form action="CE_finalizaavaliacaoRSC_rx3.php?idCE=<?php echo fnEncodeID($idCE);?>" method="post">
					<input type="hidden" name="cabecalho" value="<?php echo $cabecalho;?>"/>
					<input type="hidden" name="dadospdf" value="<?php echo $dadospdf;?>"/>
					<input type="hidden" name="rodape" value="<?php echo $rodape;?>"/>
					<input type="hidden" name="siape" value="<?php echo $siape;?>"/>
					<p align="center" style="color: #1A5321;"><b>Gera o arquivo pdf</b></p>
					<input type="submit" class="btn" value="Finaliza avaliação" style="border-radius: 8px; border: 3px solid #1A5321;; color: white; padding: 15px 30px; font-size: 18px; background-color: #1A5321;"/><br>
				</form>
				</div>
			</div><BR>
		</div>
	</div>
<?php
	include "botaovoltar.php";
	include "rodape.php";
	fnDesconectaBD($link);
?>
		
