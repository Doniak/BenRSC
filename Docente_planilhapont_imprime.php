<!doctype html>
<html>
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
		$nomearquivo = "PlanilhaPontuacao_" . $siape;
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
						<p><h2 align='center' style='color: #1A5321;'><b>Planilha de Pontuação Docente</b></h2></p>
					</div>
				</div>
			</div>";
		
		$dados .= "
			<div style='background-color: #1A5321;'>
				<div class='container' style='background-color: #E4EBE2; page-break-after: always;'>";

		$query = "SELECT * FROM $TabPedidoRSC ORDER BY criterio";
		$result = mysqli_query($link, $query);

		$dados .= "
				<table align='justify' style='background-color: #E4EBE2; border: 4px solid; border-color: #1A5321;'>
				<tr align='center' style='border: 3px solid; border-color: #1A5321;'>
					<th align='center' style='font-size: 14px;'>Nível</th>
					<th align='center' style='font-size: 14px;'>Diretriz</th>
					<th align='center' style='font-size: 14px;'>Critério</th>
					<th align='center' style='font-size: 14px;'>Nome do critério</th>
					<th align='center' style='font-size: 14px;'>Data de conclusão</th>
					<th align='center' style='font-size: 14px;'>Quantidade de unidades</th>
					<th align='center' style='font-size: 14px;'>Pontuação requerida</th>
					<th align='center' style='font-size: 14px;'>Unidade</th>
				</tr>";

		while($row = mysqli_fetch_assoc($result)) {
			$idPlanilha = $row['id'];
			$criterio = $row['criterio'];
			$nomecriterio = $row['nomecriterio'];
			$datadoc = $row['datadoc'];
			$qtdeunidades = $row['qtdeunidades'];
			$pontrequerida = $row['pontuacaorequerida'];
			$unidade = $row['unidade'];
			$nivel = $row['nivel'];
			$diretriz = $row['diretriz'];

			$dados .= "
				<tr align='left' style='border: 1px solid; border-color: #1A5321;'>
				<td align='center'>$nivel</td>
				<td align='center'>$diretriz</td>
				<td align='center'>$criterio</td>
				<td align='left'>$nomecriterio</td>
				<td align='center'>$datadoc</td>
				<td align='center'>$qtdeunidades</td>
				<td align='center'>$pontrequerida</td>
				<td align='center'>$unidade</td>
			</tr>";

		} // end while 

		$dados .=  "</table>";
		$dados .= "	
				</div></div>";

		fnDesconectaBD($link);
		
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
		$pdf->setPaper('A4','landscape'); // configura o tamanho e orientacao da pagina

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
				<p><h2 align="center" style="color: #1A5321;"><b>Planilha de Pontuação Docente</b></h2></p>
				<p><h3 align="center" style="color: #1A5321;"><b>Não foi possível imprimir a sua planilha de pontuação neste momento, devido alguma operação indevida.</b></h3></p>
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