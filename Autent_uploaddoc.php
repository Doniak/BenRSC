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
				<h5 align="center" style="color: #1A5321;">Carregue o documento autenticado no aplicativo</h5>
			</div>
			<BR>
		</div>
	</div>

	<div style="background-color: #1A5321;">
		<div class="container" style="background-color: #E4EBE2;">
		<BR>
			
<?php
			$query = "SELECT * FROM TabDocAutenticar WHERE idAuth=$idAuth AND authPronta=0";
			$result = mysqli_query($link, $query);
?>
			<table align='center' width="100%" style="background-color: #E4EBE2; border: 4px solid; border-color: #1A5321;" cellpadding="8px">
			<tr align="center" style="border: 3px solid; border-color: #1A5321;">
				<th align="center" style="font-size: 14px;">Documento</th>
				<th align="center" style="font-size: 14px;">Docente</th>
				<th align="center" style="font-size: 14px;">Data da<BR>solicitação</th>
				<th align="center" style="font-size: 14px;">Data da<BR>autenticação</th>
				<th align="center" style="font-size: 14px;">Documento<BR>autenticado</th>
				<th align="center" style="font-size: 14px;">Salva o<BR>documento</th>
			</tr>
<?php 
			while($row = mysqli_fetch_assoc($result)) {
				$idDocAuth = $row['id'];
				$documento = $row['documento'];
				$docente = $row['docente'];
				$dataSolic = fnFormatoData($row['dataSolicitacao']);		
?>
				<form action="Autent_uploaddoc_rx.php?idAuth=<?php echo fnEncodeID($idAuth);?>" method="post" enctype="multipart/form-data">
				<tr align="left" style="border: 1px solid; border-color: #1A5321;">
					<td align="center"><?php echo $documento;?></td>
					<td align="center"><?php echo $docente;?></td>
					<td align="center"><?php echo $dataSolic;?></td>
					<td align="center"><input type="date" name="dataAuth" required="required"/></td>
					<td align="center"><input type="file" name="arquivo" required="required" class="form-control" accept="application/pdf"/></td>
					<td align="center">
						<input type="hidden" name="idDocAuth" value="<?php echo $idDocAuth;?>"/>
						<input type="submit" class="btn" value="Autenticar" style="font-size: 12px; border-radius: 6px; border: 3px solid #1A5321; color: white; background-color: #1A5321;"/>
					</td>
				</tr>
				</form>
<?php 
			} // end while 
?>
			</table>
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