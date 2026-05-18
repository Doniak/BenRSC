<!doctype html>
<head>
<?php
	use Dompdf\Dompdf;
	use Dompdf\Options;
	// include autoloader
	require_once("dompdf/autoload.inc.php");
	require 'dompdf/vendor/autoload.php';
	$pdf = new Dompdf();

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
<?php
	$id = 0;
	if(isset($_GET["id"])) {
		$id = fnDecodeID($link, $_GET["id"], 'TabDocente');
	}
	if (!empty($_POST)) {
		$siape = $_POST["siape"];
		$rsc = $_POST["rsc"];
	}
	else {
		$query = "SELECT siape FROM TabDocente WHERE id=$id";
		$result = mysqli_query($link, $query); 
		$row = mysqli_fetch_assoc($result);
		$siape = $row['siape'];
	}
	if ($id > 0) {
		$TabPedidoRSC = "TabPedidoRSC_" . $siape;
		$QuadroPontos = "QuadroPontuacao_" . $siape;
		
		$nomearquivo = "QuadroPontuacao_" . $siape;
		$pathservidor = "http://localhost:81/RSC/";
		$imagem = $pathservidor . "images/IFSC_horizontal.png";

		$dados = "<html><head></head><body>";
		$dados .= "
		<div style='background-color: #1A5321;'>
			<BR>
			<div class='container' style='background-color: whitesmoke;'>
				<div class='row'>
					<p align='center'><img src=$imagem width='40%'></p>
				</div>
			</div>
		</div>";
		
		$dados .= "	
			<div style='background-color: #1A5321;'>
				<div class='container' style='background-color: #E4EBE2;'>
					<div class='row'>
						<p><h2 align='center' style='color: #1A5321;'><b>Quadro de Pontuação Docente</b></h2></p>
					</div>
				</div>
			</div>";
		
		// RSC-I
		$descricao_pontmax = new clQuadroPontRSC();
		$descricao_pontmax = fnAtualizaTabQuadroPont_RSC1($QuadroPontos, $TabPedidoRSC, $link);
		$descricao = $descricao_pontmax->descricao;
		$pontMax = $descricao_pontmax->pontMax;
		$Total_RSC1 = $descricao_pontmax->totalpontos;		

		$dados .= "		
			<div class='container' style='background-color: #E4EBE2; page-break-after: always;'>
			<table align='center' style='background-color: #E4EBE2; border: 4px solid; border-color: #1A5321;'>
				<tr align='center' style='border: 3px solid; border-color: #1A5321;'>
					<th align='center' width='70%' style='font-size: 16px; border-right: 3px solid #1A5321; border-bottom: 3px solid #1A5321;'><b>Diretrizes do RSC nível 1</b></th>
					<th align='center' width='10%' style='font-size: 14px; border-right: 3px solid #1A5321; border-bottom: 3px solid #1A5321;'><b>Pontuação<BR>máxima</b></th>
					<th align='center' width='20%' style='font-size: 14px; border-bottom: 3px solid #1A5321;'><b>Pontuação<BR>requerida</b></th>
				</tr>";
		
		$index = 0;
		$query = "SELECT Pontuacao FROM $QuadroPontos WHERE nivel='RSCI' ORDER BY id";
		$result = mysqli_query($link, $query);
		if($result) {
			while($row = mysqli_fetch_assoc($result)) {
				$pontuacao = $row['Pontuacao'];
				$dados .= "
					<tr style='border: 1px solid; border-color: #1A5321;'>
						<td align='left' style='border-right: 3px solid; border-right-color: #1A5321;'>$descricao[$index]</td>
						<td align='center' style='border-right: 3px solid; border-right-color: #1A5321;'> $pontMax[$index]</td>
						<td align='center'>$pontuacao</td>
					</tr>";
				$index++;
			}
		}		
		$dados .= "
				<tr style='border: 3px solid; border-color: #1A5321;'>
					<td align='right' style='border-right: 3px solid; border-right-color: #1A5321; border-top: 3px solid #1A5321;'><b>TOTAL &nbsp;</b></td>
					<td align='center' style='border-right: 3px solid; border-right-color: #1A5321; border-top: 3px solid #1A5321;'><b>100</b></td>
					<td align='center' style='border-top: 3px solid #1A5321;'><b>$Total_RSC1</b></td>
				</tr>		
			</div></table><BR>";

		// RSC-II
		$descricao_pontmax = fnAtualizaTabQuadroPont_RSC2($QuadroPontos, $TabPedidoRSC, $link);
		$descricao = $descricao_pontmax->descricao;
		$pontMax = $descricao_pontmax->pontMax;
		$Total_RSC2 = $descricao_pontmax->totalpontos;
		
		$dados .= "
			<div class='container' style='background-color: #E4EBE2; page-break-after: always;'>
			<table align='center' style='background-color: #E4EBE2; border: 4px solid; border-color: #1A5321;'>
				<tr align='center' style='border: 3px solid; border-color: #1A5321;'>
					<th align='center' width='70%' style='font-size: 16px; border-right: 3px solid #1A5321; border-bottom: 3px solid #1A5321;'><b>Diretrizes do RSC nível 2</b></th>
					<th align='center' width='10%' style='font-size: 14px; border-right: 3px solid #1A5321; border-bottom: 3px solid #1A5321;'><b>Pontuação<BR>máxima</b></th>
					<th align='center' width='20%' style='font-size: 14px; border-bottom: 3px solid #1A5321;'><b>Pontuação<BR>requerida</b></th>
				</tr>";
		
		$index = 0;
		$query = "SELECT Pontuacao FROM $QuadroPontos WHERE nivel='RSCII' ORDER BY id";
		$result = mysqli_query($link, $query);
		if($result) {
			while($row = mysqli_fetch_assoc($result)) {
				$pontuacao = $row['Pontuacao'];
				$dados .= "
					<tr style='border: 1px solid; border-color: #1A5321;'>
						<td align='left' style='border-right: 3px solid; border-right-color: #1A5321;'>$descricao[$index]</td>
						<td align='center' style='border-right: 3px solid; border-right-color: #1A5321;'>$pontMax[$index]</td>
						<td align='center'>$pontuacao</td>
					</tr>";
				$index++;
			}
		}
		
		$dados .= "
				<tr style='border: 3px solid; border-color: #1A5321;'>
					<td align='right' style='border-right: 3px solid; border-right-color: #1A5321; border-top: 3px solid #1A5321;'><b>TOTAL &nbsp;</b></td>
					<td align='center' style='border-right: 3px solid; border-right-color: #1A5321; border-top: 3px solid #1A5321;'><b>100</b></td>
					<td align='center' style='border-top: 3px solid #1A5321;'><b>$Total_RSC2</b></td>
				</tr>
			</div></table><BR>";
		
		// RSC-III
		$descricao_pontmax = fnAtualizaTabQuadroPont_RSC3($QuadroPontos, $TabPedidoRSC, $link);
		$descricao = $descricao_pontmax->descricao;
		$pontMax = $descricao_pontmax->pontMax;
		$Total_RSC3 = $descricao_pontmax->totalpontos;
		
		$dados .= "
				<div class='container' style='background-color: #E4EBE2; page-break-after: always;'>
				<table align='center' style='background-color: #E4EBE2; border: 4px solid; border-color: #1A5321;'>
					<tr align='center' style='border: 3px solid; border-color: #1A5321;'>
						<th align='center' width='70%' style='font-size: 16px; border-right: 3px solid #1A5321; border-bottom: 3px solid #1A5321;'><b>Diretrizes do RSC nível 3</b></th>
						<th align='center' width='10%' style='font-size: 14px; border-right: 3px solid #1A5321; border-bottom: 3px solid #1A5321;'><b>Pontuação<BR>máxima</b></th>
						<th align='center' width='20%' style='font-size: 14px; border-bottom: 3px solid #1A5321;'><b>Pontuação<BR>requerida</b></th>
					</tr>";
		
		$index = 0;
		$query = "SELECT Pontuacao FROM $QuadroPontos WHERE nivel='RSCIII' ORDER BY id";
		$result = mysqli_query($link, $query);
		if($result) {
			while($row = mysqli_fetch_assoc($result)) {
				$pontuacao = $row['Pontuacao'];		
				$dados .= "		
					<tr style='border: 1px solid; border-color: #1A5321;'>
						<td align='left' style='border-right: 3px solid; border-right-color: #1A5321;'>$descricao[$index]</td>
						<td align='center' style='border-right: 3px solid; border-right-color: #1A5321;'>$pontMax[$index]</td>
						<td align='center'>$pontuacao</td>
					</tr>";
				$index++; 
			}
		}
		$dados .= "
			<tr style='border: 3px solid; border-color: #1A5321;'>
				<td align='right' style='border-right: 3px solid; border-right-color: #1A5321; border-top: 3px solid #1A5321;'><b>TOTAL &nbsp;</b></td>
				<td align='center' style='border-right: 3px solid; border-right-color: #1A5321; border-top: 3px solid #1A5321;'><b>100</b></td>
				<td align='center' style='border-top: 3px solid #1A5321;'><b>$Total_RSC3</b></td>
			</tr>		
		</table>";

		$MinRSC_req = fnRSCminimaReq($Total_RSC1, $Total_RSC2, $Total_RSC3, $rsc, $pontRSC);
		$pontTotalRSCreq = fnPontoRSCrequerido($Total_RSC1, $Total_RSC2, $Total_RSC3, $rsc);
		$Total = $Total_RSC1 + $Total_RSC2 + $Total_RSC3;

		$dados .= "
			<BR>
			<table align='center' width='100%' style='background-color: #E4EBE2; border: 4px solid; border-color: #1A5321;'>
				<tr align='center' style='border: 4px solid; border-color: #1A5321;'>
					<th align='center' style='border-right: 3px solid; border-right-color: #1A5321;'><b>Resultado da pontuação</b></th>
					<th align='center' style='border-right: 3px solid; border-right-color: #1A5321;'><b>Pontuação total</b></th>
					<th align='center'><b>Pontuação no nível<BR>RSC pretendido</b></th>
				</tr>
				<tr align='center' style='border: 4px solid; border-color: #1A5321;'>";
		if (($MinRSC_req == 1) && ($Total >= $pontGlobal)) {
			$dados .= "
				<td align='left' style='font-size: 16px; color #1A5321; border-right: 3px solid; border-right-color: #1A5321;'>Pontuação <b>SUFICIENTE</b></td>
				<td align='center' style='font-size: 16px; border-right: 3px solid; border-right-color: #1A5321;'>$Total &nbsp; pontos</td>
				<td align='center' style='font-size: 16px;'>$pontTotalRSCreq &nbsp; pontos</td>";
		}
		else {
			$dados .= "
				<td align='left' style='font-size: 16px; color: #c8411e; border-right: 3px solid; border-right-color: #1A5321;'>Pontuação <b>INSUFICIENTE</b> para solicitar o RSC</td>
				<td align='center' style='font-size: 16px; border-right: 3px solid; border-right-color: #1A5321;'>$Total &nbsp; pontos</td>
				<td align='center' style='font-size: 16px;'>$pontTotalRSCreq &nbsp; pontos</td>";
		}
		
		
		$dados .= "</tr></table><BR></div>";

// rodapé
		$dados .= "
			<div style='background-color:#1A5321;'>
				<BR>
				<div class='container' style='background-color:#E4EBE2;'>
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
		
		$dados .= "</body></html>";
		
		// ARQUIVO PDF	
		$pdf->loadHtml($dados);
		$pdf->set_option('isRemoteEnabled',true);
		$pdf->set_option('isPhpEnabled',true);
		$pdf->setPaper('A4','portrait'); // configura o tamanho e orientacao da pagina

		$pdf->render(); // Renderiza o html como pdf
		ob_end_clean();
		$pdf->stream($nomearquivo,array("Attachment"=>false)); // Gera o pdf	
	}
	else {
		$id = fnEncodeID($id);
?>
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
				<p><h2 align="center" style="color: #1A5321;"><b>Quadro de Pontuação Docente</b></h2></p>
				<p><h3 align="center" style="color: #1A5321;"><b>Não foi possível imprimir o seu quadro de pontuação neste momento, devido alguma operação indevida.</b></h3></p>
			</div>
		</div>
	</div>
<?php
		include "botaovoltar.php";
		include "rodape.php";
	}
	fnDesconectaBD($link);
?>
</body>
</html>