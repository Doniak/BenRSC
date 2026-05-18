<!DOCTYPE html>
<html lang="pt-br">
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
<?php
	if (!empty($_POST)) {
		$dados = $_POST["dados"];
		$cabecalho = $_POST["cabecalho"];
		$sumario = $_POST["sumario"];
		$nomearquivo = $_POST["nomearquivo"];

		$memorialdescritivo = $cabecalho . $sumario . $dados;

//		echo $memorialdescritivo;
		
		$pdf->loadHtml($memorialdescritivo);
		$pdf->set_option('isRemoteEnabled',true);
		$pdf->set_option('isPhpEnabled',true);
		$pdf->setPaper('A4','portrait'); // configura o tamanho e orientacao da pagina

		$pdf->render(); // Renderiza o html como pdf
		ob_end_clean();
		$pdf->stream($nomearquivo,array("Attachment"=>false)); // Gera o pdf
	} else {
?>
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
						<p><h1 align="center">Memorial Descritivo</h1></p>
						<p><h3 align="center">Ocorreu algum problema ao preparar seu memorial.</h3></p>
					</div>
					<div class="row">
						<div class="coluna" align="center">
								<a href="JavaScript: window.history.back();"><button type="button" class="btn" style="border-radius: 8px; border: 3px solid #1A5321;; color: white; padding: 14px 26px; font-size: 18px; background-color: #1A5321;">Voltar</button></a>
						</div>						
					</div>
				</div>
			</div>
<?php
		include "rodape.php";
?>
	</body>
	</html>		
<?php
	}
?>
