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
				<h5 align="justify" style="color: #1A5321;"><b>Selecione os documentos que deseja encaminhar para autenticação.</b></h5>
				<p align="justify" style="color: #1A5321;">Você vai selecionar os documentos que serão encaminhados para um servidor autenticar. Não é possível encaminhar documentos para mais de um servidor autenticar simultaneamente.<BR>Você deverá saber o nome e e-mail institucional de quem vai autenticar seus documentos para fazer a solicitação.</p>
			</div>
			<BR>
		</div>
	</div>

<?php 
	if(!empty($_POST)) {
		$idPlanilha = $_POST['idPlanilha'];
		$nomePlanilha = $_POST['nomePlanilha'];
		
		$strTabela = explode("_", $nomePlanilha);
		$nomeTab = $strTabela[0];
		
		$query = "SELECT * FROM $nomePlanilha WHERE id=$idPlanilha";
		$result = mysqli_query($link, $query);
		$row = mysqli_fetch_assoc($result);
		
		if (strcmp($nomeTab,"TabItinerario") == 0) {
			$nrcriterio = "";
			$nomecriterio = $row['documento'];
			$datadoc = fnFormatoData($row['dataDoc']);
			$datadocmysql = $row['dataDoc'];
		} 
		else {
			$nrcriterio = $row['criterio'];
			$nomecriterio = $row['nomecriterio'];
			$datadoc = fnFormatoData($row['datadoc']);
			$datadocmysql = $row['datadoc'];
		}
		$arquivo = $row['arquivo'];
		$tipoarquivo = $row['tipoarquivo'];
		
		$nomeDocente = preg_replace('/\s+/', '', $nome);
//		echo nl2br("Docente: " . $nomeDocente . "\n");
		
		$diretorio = "Docentes";
		if (!is_dir($diretorio)) {
			mkdir($diretorio);
		}
		$diretorio = "Docentes/" . $nomeDocente;
		if (!is_dir($diretorio)) {
			mkdir($diretorio);
		}
		$datestamp = strtotime($datadoc);
		$dia = date('d',$datestamp);
		$mes = date('M',$datestamp);
		$ano = date('Y',$datestamp);
		$datadocumento = $dia . $mes . $ano;
		$nomearquivo = '/id_' . $idPlanilha . '_' . $datadocumento . "." .$tipoarquivo;
		$filename = $diretorio . $nomearquivo;
//		echo nl2br("Arquivo: " . $filename . "\n");
		file_put_contents($filename, $arquivo);
		
		$pathservidor = "http://localhost:81/RSC/";
		$documento = $pathservidor . $filename;
	}
?>
		<div style="background-color: #1A5321;">
		<div class="container" style="background-color: #E4EBE2;">
			<form action="Docente_autenticardocs_rx2.php?id=<?php echo fnEncodeID($id);?>" method="post">
				<div class="row">
					<div class="coluna" align="center">
						<label>Critério do documento</label><BR>
						<input type="text" name="nomecriterio" value="<?php echo $nomecriterio;?>" readonly size="96px" style="background-color: #E9E9E9;"/>
					</div>
					<div class="coluna" align="center">
						<label>Data do documento</label><BR>
						<input type="date" name="datadoc" value="<?php echo $datadocmysql;?>" readonly style="background-color: #E9E9E9;"/>
					</div>
				</div>
				<div class="row">
					<div class="coluna" align="center">
						<label>Nome do autenticador</label><BR>
						<input required="required" type="text" name="autenticador" size="48px"/>
					</div>
					<div class="coluna" align="center">
						<label>E-mail do documento</label><BR>
						<input required="required" type="email" name="emailautenticador" size="40px"/>
					</div>
					<div class="coluna" align="center">
						<label>Senha provisória (rsc)</label><BR>
						<input required="required" type="password" name="senha" value="rsc" size="12px"/>
					</div>
				</div>
				<div class="row">
					<div class="coluna" align="center">
						<label><b>Documento para ser autenticado</b></label><BR><BR>
						<p align="center"><img src="<?php echo $documento;?>" width="90%" style="border: 2px solid black; margin-left: 12px;"></p>
					</div>
				</div>

				<p align="center">
					<input type="hidden" name="nomearquivo" value="<?php echo $nomearquivo;?>"/>
					<input type="hidden" name="nomePlanilha" value="<?php echo $nomePlanilha;?>"/>
					<input type="hidden" name="idPlanilha" value="<?php echo $idPlanilha;?>"/>
					<input type="submit" class="btn" value="Solicitar Atenticação" style="font-size: 18px; border-radius: 8px; border: 3px solid #1A5321; color: white; background-color: #1A5321;"/>
				</p>
			</form>
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