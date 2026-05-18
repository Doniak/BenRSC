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
				<p><h2 align="center" style="color: #1A5321;"><b>Planilha de Pontuação Docente</b></h2></p>
			</div>
		</div>
	</div>

	<div style="background-color: #1A5321;">
		<div class="container" style="background-color: #E4EBE2;">
<?php
			if ($id > 0) {
				$query = "SELECT siape FROM TabDocente WHERE id=$id";
				$result = mysqli_query($link, $query); 
				$row = mysqli_fetch_assoc($result);
				$siape = $row['siape'];
				$TabPedidoRSC = "TabPedidoRSC_" . $siape;

				$query = "SELECT * FROM $TabPedidoRSC ORDER BY criterio";
				$result = mysqli_query($link, $query);
?>
				<table align='justify' style="background-color: #E4EBE2; border: 4px solid; border-color: #1A5321;">
				<tr align="center" style="border: 3px solid; border-color: #1A5321;">
					<th align="center" style="font-size: 14px;">Nível</th>
					<th align="center" style="font-size: 14px;">Diretriz</th>
					<th align="center" style="font-size: 14px;">Critério</th>
					<th align="center" style="font-size: 14px;">Nome do critério</th>
					<th align="center" style="font-size: 14px;">Data de conclusão</th>
					<th align="center" style="font-size: 14px;">Quantidade de unidades</th>
					<th align="center" style="font-size: 14px;">Pontuação requerida</th>
					<th align="center" style="font-size: 14px;">Unidade</th>
					<th align="center" style="font-size: 14px;">Apagar</th>
				</tr>
<?php 
				while($row = mysqli_fetch_assoc($result)) {
					$idPlanilha = $row['id'];
					$criterio = $row['criterio'];
					$nomecriterio = $row['nomecriterio'];
					$datadoc = $row['datadoc'];
					$qtdeunidades = $row['qtdeunidades'];
					$pontrequerida = $row['pontuacaorequerida'];
					$unidade = $row['unidade'];
					$nivel = $row['nivel'];
					$diretriz = $row['diretriz'];
?>
					<tr align="left" style="border: 1px solid; border-color: #1A5321;">
						<td align="center"><?php echo $nivel;?></td>
						<td align="center"><?php echo $diretriz;?></td>
						<td align="center"><?php echo $criterio;?></td>
						<td align="left"><?php echo $nomecriterio;?></td>
						<td align="center"><?php echo fnFormatoData($datadoc);?></td>
						<td align="center"><?php echo $qtdeunidades;?></td>
						<td align="center"><?php echo $pontrequerida;?></td>
						<td align="center"><?php echo $unidade;?></td>
						<td align="center">
							<form action="Docente_apagacriterio.php?id=<?php echo fnEncodeID($id);?>" method="post">
								<input type="hidden" id="idPlanilha" name="idPlanilha" value="<?php echo $idPlanilha;?>"></input>
								<input type="hidden" id="nomePlanilha" name="nomePlanilha" value="<?php echo $TabPedidoRSC;?>"></input>
								<input type="submit" class="btn" value="Excluir" style="border-radius: 6px; border: 3px solid #1A5321; color: white; background-color: #1A5321;"></input>
							</form>
						</td>
					</tr>
<?php 
				} // end while 
?>
				</table>
<?php 	
			} // end if ($id > 0) 
?>
		</div>
		<div class="container" style="background-color: #E4EBE2;">
			<BR>
			<div class="row">
				<div class="coluna" align="center">
					<form action="Docente_planilhapont_imprime.php?id=<?php echo fnEncodeID($id);?>" method="post">
					<p align="center">
					<input type="hidden" name="siape" id="siape" value="<?php echo $siape;?>"/>
					<input type="submit" class="btn" value="Imprimir" style="border-radius: 8px; border: 3px solid #1A5321;; color: white; padding: 15px 30px; font-size: 18px; background-color: #1A5321;" formtarget="_blank">
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