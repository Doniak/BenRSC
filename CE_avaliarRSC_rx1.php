<!DOCTYPE html>
<html lang="pt-br">
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

<?php
	$idPedido = $_POST['idPedido'];
	$idCriterio = $_POST['idCriterio'];
	$datapedido = $_POST['datapedido'];
	$siape = $_POST['siape'];
	$docente = $_POST['docente'];
	$rsc = $_POST['rsc'];
		
	$unidDefPresidente = 0;
	$unidDefMembExt = 0;
	$unidDefMembInterno = 0;
		
	$nomeTab = "TabPedidoRSC_" . $siape;
	$query = "SELECT * FROM $nomeTab WHERE id=$idCriterio";
	$result = mysqli_query($link, $query); 
	$numlinhas = mysqli_num_rows($result);
	if ($numlinhas > 0) 
	{
		$row = mysqli_fetch_assoc($result);
		$nivelRSC = $row['nivel'];
		$diretriz = $row['diretriz'];
		$nrcriterio = $row['criterio'];
		$nomecriterio = $row['nomecriterio'];
		$datadoc = $row['datadoc'];
		$fatorpontuacao = $row['fatorpontuacao'];
		$pontuacaorequerida = $row['pontuacaorequerida'];
		$unidade = $row['unidade'];
		$qtdeunidades = $row['qtdeunidades'];
		$extensao = $row['tipoarquivo'];
		$unidDefPresidente = $row['unidDefPresidente'];
		$unidDefMembExt = $row['unidDefMembExt'];
		$unidDefMembInterno = $row['unidDefMembInterno'];
		$arquivoauth = $row['arquivoauth'];	// indice na tabela TabDocAutenticar do arquivo autenticado
		
		$datestamp = strtotime($datadoc);
		$dia = date('d',$datestamp);
		$mes = date('M',$datestamp);
		$ano = date('Y',$datestamp);
		$datadocumento = $dia . $mes . $ano;
		$avaliador = preg_replace('/\s+/', '', $nomeAvaliador);
//		echo nl2br("Avaliador: " . $avaliador . "\n");
		
		$diretorio = "avaliadores/" . $avaliador . "/";
		if (!is_dir($diretorio)) {
			mkdir($diretorio);
		}
		$filename = $diretorio . 'Criterio_' . $nrcriterio . '_' . $datadocumento . "." .$extensao;
		file_put_contents($filename, $row['arquivo']);
		
		$pathservidor = "http://localhost:81/RSC/";
		$documento = $pathservidor . $filename;		
	}
	$query = "SELECT presidentebanca,membroexterno,membrointerno FROM TabSolicitaRSC WHERE siape='$siape'";
	$result = mysqli_query($link, $query);
	$row = mysqli_fetch_assoc($result);
	$presidente = $row['presidentebanca'];
	$membroexterno = $row['membroexterno'];
	$membrointerno = $row['membrointerno'];
	
	// Se o arquivo foi autenticado, mostra a versão autenticada também.
	if ($arquivoauth > 0) {
		$query = "SELECT arquivo,tipoarquivo FROM TabDocAutenticar WHERE id=$arquivoauth";
		$result = mysqli_query($link, $query);
		$row = mysqli_fetch_assoc($result);
		$extensaoAuth = $row['tipoarquivo'];
		
		$filenameAuth = $diretorio . 'DocAuth_' . $arquivoauth . '.' . $extensaoAuth;
		file_put_contents($filenameAuth, $row['arquivo']);
		$docAuth = $pathservidor . $filenameAuth;	
	}
?>	
		
	<div  style="background-color: #1A5321;">
		<div class="container" style="background-color: #E4EBE2;">
			<div class="row">
				<p><h2 align="center" style="color: #32A041;"><b>Ambiente Avaliador</b></h2></p>
				<h3 align="center" style="color: #1A5321;">Avaliar o critério <b><?php echo $nrcriterio;?></b> da Diretriz <b><?php echo $diretriz;?></b> pertencente ao nível <b><?php echo $nivelRSC?></b></h3>
			</div>
		</div>
	</div>

	<div  style="background-color: #1A5321;">
		<BR>
		<div class="container" style="background-color: #E4EBE2;">
			<BR>
			<div class="row">
				<div class="coluna" align="center">
					<label>Requerente</label><BR>
					<input type="text" readonly name="docente" value="<?php echo $docente;?>" size="40px" style="background-color: #E9E9E9;"/>
				</div>
				<div class="coluna" align="center">
					<label>RSC requerido</label><BR>
					<input type="text" readonly name="nivelRSC" value="<?php echo $rsc;?>" style="background-color: #E9E9E9;"/>
				</div>
				<div class="coluna" align="center">
					<label>Data do pedido</label><BR>
					<input type="date" readonly name="datapedido" value="<?php echo $datapedido;?>" style="background-color: #E9E9E9;"/>
				</div>
			</div>
			<div class="row">
				<label>Critério <?php echo $nrcriterio;?></label><BR>
				<input type="text" readonly name="nomecriterio" value="<?php echo $nomecriterio;?>" size="70px" style="background-color: #E9E9E9; margin-left: 12px; margin-right: 12px;"/>
			</div>
			<div class="row">
				<div class="coluna" align="center">
					<label>Diretriz</label><BR>
					<input type="text" readonly name="diretriz" value="<?php echo $diretriz;?>" size="20px" style="background-color: #E9E9E9;"/>
				</div>
				<div class="coluna" align="center">
					<label>Data do documento</label><BR>
					<input type="date" readonly name="datadoc" value="<?php echo $datadoc;?>" style="background-color: #E9E9E9;"/>
				</div>
				<div class="coluna" align="center">
					<label>Fator de pontuação</label><BR>
					<input type="text" readonly name="fatorpontuacao" value="<?php echo $fatorpontuacao;?>" size="16px" style="background-color: #E9E9E9;"/>
				</div>
			</div>
			<div class="row">
				<div class="coluna" align="center">
					<label>Quantidade de unidades requerida</label><BR>
					<input type="text" readonly name="qtdeunidades" value="<?php echo $qtdeunidades;?>" size="16px" style="background-color: #E9E9E9;"/>
				</div>
				<div class="coluna" align="center">
					<label>Pontuação requerida</label><BR>
					<input type="text" readonly name="pontuacaorequerida" value="<?php echo $pontuacaorequerida;?>" size="16px" style="background-color: #E9E9E9;"/>
				</div>
				<div class="coluna" align="center">
					<label>Unidade</label><BR>
					<input type="text" readonly name="unidade" value="<?php echo $unidade;?>" style="background-color: #E9E9E9;"/>
				</div>
			</div>
			<form action="CE_avaliarRSC_rx2.php?idCE=<?php echo fnEncodeID($idCE);?>" method="post">
			<div class="row">
				<div class="coluna" align="center">
					<label><b>Quantidade de unidades deferida</b></label><BR>
<?php
					if ((strcmp($presidente,$nomeAvaliador) == 0) && ($unidDefPresidente > 0)) {
?>
						<input type="number" required name="unidadesdeferida" value="<?php echo $unidDefPresidente;?>"/>
<?php
					}
					elseif ((strcmp($membroexterno,$nomeAvaliador) == 0) && ($unidDefMembExt > 0)) {
?>
						<input type="number" required name="unidadesdeferida" value="<?php echo $unidDefMembExt;?>"/>
<?php
					}
					elseif ((strcmp($membrointerno,$nomeAvaliador) == 0) && ($unidDefMembInterno > 0)) {
?>
						<input type="number" required name="unidadesdeferida" value="<?php echo $unidDefMembInterno;?>"/>
<?php
					}
					else {
?>
						<input type="number" required name="unidadesdeferida" value="<?php echo $qtdeunidades;?>"/>
<?php
					}
?>
				</div>
				<div class="coluna" align="center">
					<input type="hidden" name="idCriterio" value="<?php echo $idCriterio;?>"/>
					<input type="hidden" name="siape" value="<?php echo $siape;?>"/>
					<input type="hidden" name="fatorpontuacao" value="<?php echo $fatorpontuacao;?>"/>
					<input type="hidden" name="idPedido" value="<?php echo $idPedido;?>"/>
					<input type="submit" class="btn" value="Salva pontuação" style="border-radius: 8px; border: 3px solid #1A5321;; color: white; padding: 10px 10px; font-size: 15px; background-color: #1A5321;">
				</div>
				<div class="coluna" align="center">
				</div>
			</div>
			<div class="row">
				<label><b>Observações</b></label><BR>
				<label>Justifique aqui o motivo de indeferir parcialmente ou totalmente a pontuação requerida.</label>
				<textarea name="observacao" style="margin-left: 12px;" rows="3"></textarea>
			</div>
			</form>
			<BR>
			<div class="row">
				<div class="coluna" align="center">
					<label><b>Documento comprobatório</b></label><BR><BR>
					<p align="center"><img src="<?php echo $documento;?>" width="90%" style="border: 2px solid black; margin-left: 12px;"></p>
				</div>
			</div>
<?php
			if ($arquivoauth > 0) {
?>
			<BR>
			<div class="row">
				<div class="coluna" align="center">
					<label><b>Documento autenticado</b></label><BR><BR>
					<p align="center">
					<iframe align="middle" src="<?php echo $docAuth; ?>" width="100%" height="800px"></iframe>
					</p>
				</div>
			</div>
<?php
			}
?>
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