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
				<h5 align="justify" style="color: #1A5321;"><b>Selecione os documentos que deseja autenticar.</b></h5>
				<p align="justify" style="color: #1A5321;">Você vai selecionar os documentos que serão encaminhados para um servidor autenticar. Não é possível encaminhar documentos para mais de um servidor autenticar simultaneamente.<BR>Você deverá saber o nome e e-mail institucional de quem vai autenticar seus documentos para fazer a solicitação.</p>
			</div>
			<BR>
		</div>
	</div>

	<div style="background-color: #1A5321;">
		<div class="container" style="background-color: #E4EBE2;">
<?php
			if ($idAuth > 0) {
				$query = "SELECT * FROM TabDocAutenticar WHERE idAuth=$idAuth AND authPronta=0";
				$result = mysqli_query($link, $query);

?>
				<table align='center' width="100%" style="background-color: #E4EBE2; border: 4px solid; border-color: #1A5321;" cellpadding="8px">
				<tr align="center" style="border: 3px solid; border-color: #1A5321;">
					<th align="center" style="font-size: 14px;">Documento</th>
					<th align="center" style="font-size: 14px;">Docente</th>
					<th align="center" style="font-size: 14px;">Data da<BR>solicitação</th>
					<th align="center" style="font-size: 14px;">Autenticar</th>
				</tr>
<?php 
				while($row = mysqli_fetch_assoc($result)) {
					$idDocAutenticar = $row['id'];
					$idPlanilha = $row['idTabPedidoRSC'];
					$nomePlanilha = $row['nomeTabPedidoRSC'];
					$docente = $row['docente'];
					$documento = $row['documento'];
					$dataSolic = fnFormatoData($row['dataSolicitacao']);		
?>
					<tr align="left" style="border: 1px solid; border-color: #1A5321;">
						<td align="center"><?php echo $documento;?></td>
						<td align="center"><?php echo $docente;?></td>
						<td align="center"><?php echo $dataSolic;?></td>
						<td align="center">
							<form action="Autent_pendentes_rx1.php?idAuth=<?php echo fnEncodeID($idAuth);?>" method="post">
								<input type="hidden" name="idDocAutenticar" value="<?php echo $idDocAutenticar;?>"/>
								<input type="submit" class="btn" value="Atenticar" style="font-size: 12px; border-radius: 6px; border: 3px solid #1A5321; color: white; background-color: #1A5321;"/>
							</form>
						</td>
					</tr>
<?php 
				} // end while 
?>
				</table>
				<BR>
				
<?php 	
			} // end if ($id > 0) 
?>
		</div>
	</div>

<?php 
	fnDesconectaBD($link);
	include "botaovoltar.php";
	include "rodape.php"; 
?>

</body>
</html>