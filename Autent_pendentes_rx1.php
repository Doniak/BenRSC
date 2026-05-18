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

	<div style="background-color: #1A5321;">
		<div class="container" style="background-color: #E4EBE2;">
			<div class="row">
				<p><h1 align="center" style="color: #1A5321;">Reconhecimento de Saberes e Competências</h1></p>
				<h5 align="justify" style="color: #1A5321;">Confira e autentique o documento que foi selecionado. Você irá salvar o documento pdf, assinar e depois salvá-lo no aplicativo para que a Comissão Especial possa avaliá-lo.</h5>
			</div>
			<BR>
		</div>
	</div>
<?php
	if(!empty($_POST)) {
		$idDocAutenticar = $_POST['idDocAutenticar'];

		$query = "SELECT * FROM TabDocAutenticar WHERE id=$idDocAutenticar";
		$result = mysqli_query($link, $query);
		$row = mysqli_fetch_assoc($result);
		$idPlanilha = $row['idTabPedidoRSC'];
		$nomePlanilha = $row['nomeTabPedidoRSC'];
		$docente = $row['docente'];
		$dataSolic = ($row['dataSolicitacao']);
		$idAuth = $row['idAuth'];
		
		$nomepdf = "Autentica_" . $idDocAutenticar;
		
		$query = "SELECT * FROM TabAutenticador WHERE id=$idAuth";
		$result = mysqli_query($link, $query);
		$row = mysqli_fetch_assoc($result);
		$nomeAuth = $row['nome'];
		$siapeAuth = $row['siape'];
		$emailAuth = $row['email'];
		$ife = $row['ife'];
		$siglaife = $row['siglaife'];
		$campus = $row['campus'];
		
		$query = "SELECT datadoc,arquivo,tipoarquivo FROM $nomePlanilha WHERE id=$idPlanilha";
		$result = mysqli_query($link, $query);
		$row = mysqli_fetch_assoc($result);
		$arquivo = $row['arquivo'];
		$tipoarquivo = $row['tipoarquivo'];
		$datadoc = $row['datadoc'];
		
		$nomeDocente = preg_replace('/\s+/', '', $docente);
		
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
		
		$dados = "<html><head></head><body>";
		$dados .= "
			<div style='background-color: #1A5321; '>
				<div class='container' style='background-color: #E4EBE2;'>
					<div class='row'>
						<h1 align='center' style='color: #1A5321;'><b>Reconhecimento de Saberes e Competências</b></h1>
						<h3 align='center' style='color: #1A5321;'><b>Autenticação de Documento</b></h3><BR>
					</div>
				</div>
		  	";			
		
		$dados .= "
				<div class='container' style='background-color: #E4EBE2;'>
					<div class='row'>
						<div class='coluna' align='center'>
							<p align='center'><img src=$documento width='75%' style='border: 2px solid black; margin-left: 12px;'></p>
						</div>
					</div>
				</div>
			";
		
		$dados .= "
			<div class='container' style='background-color: #E4EBE2;'>
				<div class='row'>
					<p align='center'><b>De acordo com o original</b></p>
					<table align='center' style='background-color: #E4EBE2; border: 2px solid; border-color: #1A5321;' cellpadding='8px'>
						<tr>
							<td>Nome</td>
							<td><b>$nomeAuth</b></td>
						</tr>
						<tr>
							<td>Siape</td>
							<td><b>$siapeAuth</b></td>
						</tr>
						<tr>
							<td>E-mail</td>
							<td><b>$emailAuth</b></td>
						</tr>
						<tr>
							<td>Instituto Federal</td>
							<td><b>$ife</b> ($siglaife)</td>
						</tr>
						<tr>
							<td>Campus</td>
							<td><b>$campus</b></td>
						</tr>						
					</table>
					<BR>
				</div>
			";
		$dados .= "
			<div class='container' style='background-color: #E4EBE2;'>
				<div class='row'>
					<p align='center'><BR><BR><BR>
					________________________________
					<BR>Assinatura
					</p>
					<BR>
				</div>
			</div>
			";
		$currentDate = date('d/m/Y');
		$dados .= "
			<div class='container' style='background-color: #E4EBE2;'>
				<div class='row'>
					<p align='right'>Florianópolis - SC, $currentDate.</p>
					<BR>
				</div>
			</div>
			";
		
		$dados .= "</div></body></html>";
	}
?>
	<div style="background-color: #1A5321;">
		<div class="container" style="background-color: #E4EBE2;">
			<div class="row">
				<div class="coluna">
					<label>Docente</label><br>
					<input type="text" name="docente" value="<?php echo $docente; ?>" readonly  size="45px" style="background-color: #E9E9E9;"/><br>
				</div>
				<div class="coluna">
					<label>Data da solicitação</label><br>
					<input type="date" name="dataSolic" value="<?php echo $dataSolic; ?>" readonly style="background-color: #E9E9E9;"/><br>
				</div>
			</div>
			<div class="row">
				<div class="coluna" align="center">
					<label><b>Documento para ser autenticado</b></label><BR><BR>
					<p align="center"><img src="<?php echo $documento;?>" width="75%" style="border: 2px solid black; margin-left: 12px;"></p>
				</div>
			</div>
			<div class="row">
				<div class="coluna" align="center">
					<form action="Autent_pendentes_rx2.php?idAuth=<?php echo fnEncodeID($idAuth);?>" method="post" target="_blank">
					<p align="center">
						<input type="hidden" name="nomepdf" value="<?php echo $nomepdf;?>"/>
						<input type="hidden" name="dados" value="<?php echo $dados;?>"/>
						<input type="submit" class="btn" value="Baixe o documento para autenticar" style="border-radius: 8px; border: 3px solid #1A5321;; color: white; padding: 10px 30px; font-size: 18px; background-color: #1A5321;"/><br>
					</p>
					</form>
				</div>
				<div class="coluna" align="center">
					<form action="Autent_pendentes_rx3.php?idAuth=<?php echo fnEncodeID($idAuth);?>" method="post">
					<p align="center">
						<input type="hidden" name="idDocAuth" value="<?php echo $idDocAutenticar;?>"/>
						<input type="submit" class="btn" value="Recuse o pedido de autenticação" style="border-radius: 8px; border: 3px solid red; color: white; padding: 10px 30px; font-size: 18px; background-color: red;"/><br>
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