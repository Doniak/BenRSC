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
				<h5 align="justify" style="color: #1A5321;"><b>Veja as suas autenticações já realizadas</b></h5>
			</div>
			<BR>
		</div>
	</div>

	<div style="background-color: #1A5321;">
		<div class="container" style="background-color: #E4EBE2;">
		<BR>
			
<?php
			$query = "SELECT * FROM TabDocAutenticar WHERE idAuth=$idAuth AND authPronta=1 ORDER BY dataAutenticacao";
			$result = mysqli_query($link, $query);
?>
			<form action="Autent_realizadas_verdoc.php?idAuth=<?php echo fnEncodeID($idAuth);?>" method="post">
			<table align='center' style="background-color: #E4EBE2; border: 4px solid; border-color: #1A5321;" cellpadding="8px">
			<tr align="center" style="border: 3px solid; border-color: #1A5321;">
				<th align="center" style="font-size: 14px;">Docente</th>
				<th align="center" style="font-size: 14px;">Data da<BR>solicitação</th>
				<th align="center" style="font-size: 14px;">Data da<BR>autenticação</th>
				<th align="center" style="font-size: 14px;">Ver documento</th>
			</tr>
<?php 
			while($row = mysqli_fetch_assoc($result)) {
				$idDocAuth = $row['id'];
				$docente = $row['docente'];
				$dataSolic = fnFormatoData($row['dataSolicitacao']);
				$dataAuth = fnFormatoData($row['dataAutenticacao']);
?>
				<tr align="left" style="border: 1px solid; border-color: #1A5321;">
					<td align="center"><?php echo $docente;?></td>
					<td align="center"><?php echo $dataSolic;?></td>
					<td align="center"><?php echo $dataAuth;?></td>
					<td align="center">
						<input type="hidden" name="idDocAuth" value="<?php echo $idDocAuth;?>"/>
						<input type="hidden" name="docente" value="<?php echo $docente;?>"/>
						<input type="submit" class="btn" value="Ver documento" style="font-size: 12px; border-radius: 6px; border: 3px solid #1A5321; color: white; background-color: #1A5321;"/>
					</td>
				</tr>
<?php 
			} // end while 
?>
			</table>
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