<?php
use Dompdf\Dompdf;
use Dompdf\Options;
// include autoloader
require_once("dompdf/autoload.inc.php");
require 'dompdf/vendor/autoload.php';
$pdf = new Dompdf();
?>
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
<?php
$idCE = fnDecodeID($link, $_GET["idCE"], 'TabAvaliadoresRSC');
if (!empty($_POST)) {
	$cabecalho = ($_POST["cabecalho"]);
	$dadospdf = ($_POST["dadospdf"]);
	$rodape = ($_POST["rodape"]);
	$siape = ($_POST["siape"]);
	$nomearquivo = "ParecerRSC_" . $siape;
	
	$dados = $cabecalho . $dadospdf;

	// Instancia o metodo loadHtml e envia o conteudo do pdf
	$pdf->loadHtml($dados);
	$pdf->set_option('isRemoteEnabled',true);
	$pdf->set_option('isPhpEnabled',true);
	$pdf->setPaper('A4','portrait'); // configura o tamanho e orientacao da pagina
	$pdf->render(); // Renderiza o html como pdf
	ob_end_clean();
	$pdf->stream($nomearquivo,array("Attachment"=>false)); // Gera o pdf		
}
?>
</body>
</html>