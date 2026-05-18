<!doctype html>
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
			include "Autent_menu.php";
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

<?php
	if(!empty($_POST)) {
		$idDocAuth = $_POST['idDocAuth'];
		$docente = $_POST['docente'];

		$query = "SELECT arquivo,tipoarquivo,dataAutenticacao FROM TabDocAutenticar WHERE id=$idDocAuth";
		$result = mysqli_query($link, $query);
		$row = mysqli_fetch_assoc($result);
		$arquivo = $row['arquivo'];
		$tipoarquivo = $row['tipoarquivo'];
		$dataAuth = $row['dataAutenticacao'];
		
		$nomeDocente = preg_replace('/\s+/', '', $docente);
		
		$diretorio = "Docentes";
		if (!is_dir($diretorio)) {
			mkdir($diretorio);
		}
		$diretorio = "Docentes/" . $nomeDocente;
		if (!is_dir($diretorio)) {
			mkdir($diretorio);
		}
		$datestamp = strtotime($dataAuth);
		$dia = date('d',$datestamp);
		$mes = date('M',$datestamp);
		$ano = date('Y',$datestamp);
		$datadocumento = $dia . $mes . $ano;
		$nomearquivo = '/id_' . $idDocAuth . '_' . $datadocumento . "." .$tipoarquivo;
		$filename = $diretorio . $nomearquivo;
//		echo nl2br("Arquivo: " . $filename . "\n");
		file_put_contents($filename, $arquivo);
		
		$pathservidor = "http://localhost:81/RSC/";
		$documento = $pathservidor . $filename;
	}
?>
	<div style="background-color: #1A5321;">
		<div class="container" style="background-color: #E4EBE2;">
			<div class="row">
				<p><h1 align="center" style="color: #1A5321;">Reconhecimento de Saberes e Competências</h1></p>
				<p><h3 align="center" style="color: #1A5321;">Confira o documento autenticado</h3></p>
			</div>
			<div class="row">
				<iframe align="middle" src="<?php echo $documento; ?>" width="100%" height="800px"></iframe>
			</div>
			<BR>
		</div>
	</div>

<?php 
	fnDesconectaBD($link);
	include "botaovoltar.php";
	include "rodape.php";
?>

</body>
</html>