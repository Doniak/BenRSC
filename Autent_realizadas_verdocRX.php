<?php
use Dompdf\Dompdf;
use Dompdf\Options;
// include autoloader
require_once("dompdf/autoload.inc.php");
require 'dompdf/vendor/autoload.php';
$pdf = new Dompdf();
	
if (!empty($_POST)) {
	$nomepdf = ($_POST["nomepdf"]);
	$dados = ($_POST["dados"]);

	// Instancia o metodo loadHtml e envia o conteudo do pdf
	$pdf->loadHtml($dados);
	$pdf->set_option('isRemoteEnabled',true);
	$pdf->set_option('isPhpEnabled',true);
	$pdf->setPaper('A4','portrait'); // configura o tamanho e orientacao da pagina
	$pdf->render(); // Renderiza o html como pdf
	ob_end_clean();
	$pdf->stream($nomepdf,array("Attachment"=>false)); // Gera o pdf		

}
?>