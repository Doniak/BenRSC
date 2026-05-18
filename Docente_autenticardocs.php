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
				<h5 align="center" style="color: #1A5321;"><b>Selecione os documentos que deseja encaminhar para autenticação</b></h5>
				<p align="justify" style="color: #1A5321;">Você vai selecionar os documentos que serão encaminhados para um servidor autenticar. Não é possível encaminhar documentos para mais de um servidor autenticar simultaneamente.<BR>Você deverá saber o nome e e-mail institucional de quem vai autenticar seus documentos para fazer a solicitação.</p>
			</div>
			<BR>
		</div>
	</div>

	<div style="background-color: #1A5321;">
		<div class="container" style="background-color: #E4EBE2;">
			<div class="row">
				<p><h2 align="center" style="color: #1A5321;">Documentação Comprobatória</h2></p>
			</div>
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
				
				<table align='justify' width="100%" style="background-color: #E4EBE2; border: 4px solid; border-color: #1A5321;">
				<tr align="center" style="border: 3px solid; border-color: #1A5321;">
					<th align="center" style="font-size: 14px;">Nível /<BR>Diretriz</th>
					<th align="center" style="font-size: 14px;">Critério</th>
					<th align="center" style="font-size: 14px;">Nome do critério</th>
					<th align="center" style="font-size: 14px;">Data de<BR>conclusão</th>
					<th align="center" style="font-size: 14px;">Qtde de<BR>unidades</th>
					<th align="center" style="font-size: 14px;">Pontuação<BR>requerida</th>
					<th align="center" style="font-size: 14px;">Unidade</th>
					<th align="center" style="font-size: 14px;">Autenticar</th>
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
					$datestamp = strtotime($datadoc);
					$arquivoauth = $row['arquivoauth'];
				
?>
					<tr align="left" style="border: 1px solid; border-color: #1A5321;">
						<td align="center"><?php echo $nivel . " / " . $diretriz;?></td>
						<td align="center"><?php echo $criterio;?></td>
						<td align="left"><?php echo $nomecriterio;?></td>
						<td align="center"><?php echo fnFormatoData($datadoc);?></td>
						<td align="center"><?php echo $qtdeunidades;?></td>
						<td align="center"><?php echo $pontrequerida;?></td>
						<td align="center"><?php echo $unidade;?></td>
						<td align="center">
							<form action="Docente_autenticardocs_rx.php?id=<?php echo fnEncodeID($id);?>" method="post">
								<input type="hidden" id="nomePlanilha" name="nomePlanilha" value="<?php echo $TabPedidoRSC;?>"/>
								<input type="hidden" id="idPlanilha" name="idPlanilha" value="<?php echo $idPlanilha;?>"></input>
<?php
								if ($arquivoauth == -1) {
?>
									<input type="submit" class="btn" value="Atenticação" style="font-size: 12px; border-radius: 6px; border: 3px solid #1A5321; color: white; background-color: #1A5321;"></input>
<?php
								}
								else {
?>
									<input type="submit" class="btn" value="Atenticação" style="font-size: 12px; border-radius: 6px; border: 3px solid #1A5321; color: white; background-color: #1A5321;" disabled></input>
<?php
								}
?>
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


	<div style="background-color: #1A5321;">
		<div class="container" style="background-color: #E4EBE2;">
			<div class="row">
				<p><h2 align="center" style="color: #1A5321;">Itinerário de Formação</h2></p>
			</div>
<?php
			if ($id > 0) {
				$query = "SELECT siape FROM TabDocente WHERE id=$id";
				$result = mysqli_query($link, $query); 
				$row = mysqli_fetch_assoc($result);
				$siape = $row['siape'];
				$nomeTab = "TabItinerario_" . $siape;
?>
				
				<table align='center' width="60%" style="background-color: #E4EBE2; border: 4px solid; border-color: #1A5321;">
				<tr align="center" style="border: 3px solid; border-color: #1A5321;">
					<th align="center" style="font-size: 14px;">Tipo de documento</th>
					<th align="center" style="font-size: 14px;">Data do documento</th>
					<th align="center" style="font-size: 14px;">Documento</th>
					<th align="center" style="font-size: 14px;">Autenticar</th>
				</tr>
<?php 
				$ncount = 1;
				$query = "SELECT * FROM $nomeTab WHERE documento='Graduação'";
				$result = mysqli_query($link, $query);
				while($row = mysqli_fetch_assoc($result)) {
					$idPlanilha = $row['id'];
					$documento = $row['documento'];
					$datadoc = $row['dataDoc'];
					$arquivo = $row['arquivo'];
					$extensao = $row['tipoarquivo'];
					$arquivoauth = $row['arquivoauth'];

					$diretorio = "memorial/memorial_" . $siape;
					if (!is_dir($diretorio)) {
						mkdir($diretorio);
					}
					
					$filename = $diretorio . '/graduacao_' . $ncount . "." .$extensao;
					file_put_contents($filename, $row['arquivo']);
					$ncount++;
					$imagem = $pathserver . "/" . $filename;
?>
					<tr align="left" style="border: 1px solid; border-color: #1A5321;">
						<td align="center"><?php echo $documento;?></td>
						<td align="center"><?php echo fnFormatoData($datadoc);?></td>
						<td align="center"><img src="<?php echo $imagem;?>"  width="25%" height="25%" style="border: 1px solid black"></td>
						<td align="center">
							<form action="Docente_autenticardocs_rx.php?id=<?php echo fnEncodeID($id);?>" method="post">
								<input type="hidden" id="nomePlanilha" name="nomePlanilha" value="<?php echo $nomeTab;?>"/>
								<input type="hidden" id="idPlanilha" name="idPlanilha" value="<?php echo $idPlanilha;?>"></input>
<?php
								if ($arquivoauth == -1) {
?>
									<input type="submit" class="btn" value="Atenticação" style="font-size: 12px; border-radius: 6px; border: 3px solid #1A5321; color: white; background-color: #1A5321;"></input>
<?php
								}
								else {
?>
									<input type="submit" class="btn" value="Atenticação" style="font-size: 12px; border-radius: 6px; border: 3px solid #1A5321; color: white; background-color: #1A5321;" disabled></input>
<?php
								}
?>
							</form>
						</td>
					</tr>
<?php 
				} // end while 

				$ncount = 1;
				$query = "SELECT * FROM $nomeTab WHERE documento='Especialização'";
				$result = mysqli_query($link, $query);
				while($row = mysqli_fetch_assoc($result)) {
					$idPlanilha = $row['id'];
					$documento = $row['documento'];
					$datadoc = $row['dataDoc'];
					$arquivo = $row['arquivo'];
					$extensao = $row['tipoarquivo'];
					$arquivoauth = $row['arquivoauth'];
					
					$diretorio = "memorial/memorial_" . $siape;
					if (!is_dir($diretorio)) {
						mkdir($diretorio);
					}
					
					$filename = $diretorio . '/especializacao_' . $ncount . "." .$extensao;
					file_put_contents($filename, $row['arquivo']);
					$ncount++;
					$imagem = $pathserver . "/" . $filename;
?>
					<tr align="left" style="border: 1px solid; border-color: #1A5321;">
						<td align="center"><?php echo $documento;?></td>
						<td align="center"><?php echo fnFormatoData($datadoc);?></td>
						<td align="center"><img src="<?php echo $imagem;?>"  width="25%" height="25%" style="border: 1px solid black"></td>
						<td align="center">
							<form action="Docente_autenticardocs_rx.php?id=<?php echo fnEncodeID($id);?>" method="post">
								<input type="hidden" id="nomePlanilha" name="nomePlanilha" value="<?php echo $nomeTab;?>"/>
								<input type="hidden" id="idPlanilha" name="idPlanilha" value="<?php echo $idPlanilha;?>"></input>
<?php
								if ($arquivoauth == -1) {
?>
									<input type="submit" class="btn" value="Atenticação" style="font-size: 12px; border-radius: 6px; border: 3px solid #1A5321; color: white; background-color: #1A5321;"></input>
<?php
								}
								else {
?>
									<input type="submit" class="btn" value="Atenticação" style="font-size: 12px; border-radius: 6px; border: 3px solid #1A5321; color: white; background-color: #1A5321;" disabled></input>
<?php
								}
?>
							</form>
						</td>
					</tr>
<?php 
				} // end while 
				
				$ncount = 1;
				$query = "SELECT * FROM $nomeTab WHERE documento='Mestrado'";
				$result = mysqli_query($link, $query);
				while($row = mysqli_fetch_assoc($result)) {
					$idPlanilha = $row['id'];
					$documento = $row['documento'];
					$datadoc = $row['dataDoc'];
					$arquivo = $row['arquivo'];
					$extensao = $row['tipoarquivo'];
					$arquivoauth = $row['arquivoauth'];
					
					$diretorio = "memorial/memorial_" . $siape;
					if (!is_dir($diretorio)) {
						mkdir($diretorio);
					}
					
					$filename = $diretorio . '/mestrado_' . $ncount . "." .$extensao;
					file_put_contents($filename, $row['arquivo']);
					$ncount++;
					$imagem = $pathserver . "/" . $filename;
?>
					<tr align="left" style="border: 1px solid; border-color: #1A5321;">
						<td align="center"><?php echo $documento;?></td>
						<td align="center"><?php echo fnFormatoData($datadoc);?></td>
						<td align="center"><img src="<?php echo $imagem;?>"  width="25%" height="25%" style="border: 1px solid black"></td>
						<td align="center">
							<form action="Docente_autenticardocs_rx.php?id=<?php echo fnEncodeID($id);?>" method="post">
								<input type="hidden" id="nomePlanilha" name="nomePlanilha" value="<?php echo $nomeTab;?>"/>
								<input type="hidden" id="idPlanilha" name="idPlanilha" value="<?php echo $idPlanilha;?>"></input>
<?php
								if ($arquivoauth == -1) {
?>
									<input type="submit" class="btn" value="Atenticação" style="font-size: 12px; border-radius: 6px; border: 3px solid #1A5321; color: white; background-color: #1A5321;"></input>
<?php
								}
								else {
?>
									<input type="submit" class="btn" value="Atenticação" style="font-size: 12px; border-radius: 6px; border: 3px solid #1A5321; color: white; background-color: #1A5321;" disabled></input>
<?php
								}
?>
							</form>
						</td>
					</tr>
<?php 
				} // end while 
				
				$ncount = 1;
				$query = "SELECT * FROM $nomeTab WHERE documento='Experiência profissional'";
				$result = mysqli_query($link, $query);
				while($row = mysqli_fetch_assoc($result)) {
					$idPlanilha = $row['id'];
					$documento = $row['documento'];
					$datadoc = $row['dataDoc'];
					$arquivo = $row['arquivo'];
					$extensao = $row['tipoarquivo'];
					$arquivoauth = $row['arquivoauth'];
					
					$diretorio = "memorial/memorial_" . $siape;
					if (!is_dir($diretorio)) {
						mkdir($diretorio);
					}
					
					$filename = $diretorio . '/experiencia_' . $ncount . "." .$extensao;
					file_put_contents($filename, $row['arquivo']);
					$ncount++;
					$imagem = $pathserver . "/" . $filename;
?>
					<tr align="left" style="border: 1px solid; border-color: #1A5321;">
						<td align="center"><?php echo $documento;?></td>
						<td align="center"><?php echo fnFormatoData($datadoc);?></td>
						<td align="center"><img src="<?php echo $imagem;?>"  width="25%" height="25%" style="border: 1px solid black"></td>
						<td align="center">
							<form action="Docente_autenticardocs_rx.php?id=<?php echo fnEncodeID($id);?>" method="post">
								<input type="hidden" id="nomePlanilha" name="nomePlanilha" value="<?php echo $nomeTab;?>"/>
								<input type="hidden" id="idPlanilha" name="idPlanilha" value="<?php echo $idPlanilha;?>"></input>
<?php
								if ($arquivoauth == -1) {
?>
									<input type="submit" class="btn" value="Atenticação" style="font-size: 12px; border-radius: 6px; border: 3px solid #1A5321; color: white; background-color: #1A5321;"></input>
<?php
								}
								else {
?>
									<input type="submit" class="btn" value="Atenticação" style="font-size: 12px; border-radius: 6px; border: 3px solid #1A5321; color: white; background-color: #1A5321;" disabled></input>
<?php
								}
?>
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