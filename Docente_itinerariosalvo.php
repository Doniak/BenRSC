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

	<div style="background-color: #1A5321;" id="itinerarioformacao">
		<div class="container" style="background-color: #E4EBE2;">
			<div class="row">
				<p><h2 align="center" style="color: #32A041;">Itinerário de Formação Salvo</h2></p>
			</div>
		</div>
	</div>

	<div style="background-color: #1A5321;">
		<BR>
		<div class="container" style="background-color: #E4EBE2;">
	
<?php
		$query = "SELECT * FROM TabDocente WHERE id=$id";
		$result = mysqli_query($link, $query) or die("Bad Query: $query");
		$row = mysqli_fetch_assoc($result);
		$siape = $row['siape'];

		$diretorio = "memorial/memorial_" . $siape;
		if (!is_dir($diretorio)) {
			mkdir($diretorio);
		}
		$pathservidor = $pathserver . $diretorio . "/";
			
		$query = "SELECT * FROM TabFormacao WHERE siape='$siape'";
		$result = mysqli_query($link, $query); 
		$nrlinhas = mysqli_num_rows($result);
		if ($nrlinhas > 0) {
			$nomeTab = "TabItinerario_" . $siape;
			$query = "SELECT arquivo,tipoarquivo FROM $nomeTab WHERE documento='Graduação'";
			$result = mysqli_query($link, $query); 
			$linhas = mysqli_num_rows($result);
			if ($linhas > 0) {
?>
				<div class="row">
					<p><h2 align="center" style="color: #32A041;">Graduação</h2></p>
				</div>
<?php
				$ncount = 1;
				while ($row = mysqli_fetch_assoc($result)) {
					$extensao = $row['tipoarquivo'];
					$filename = $diretorio . '/graduacao_' . $ncount . "." .$extensao;
					file_put_contents($filename, $row['arquivo']);
					$ncount++;
					$imagem = $pathserver . $filename;			
?>
					<div class="row">
						<div class="coluna" align="center">
							<p align="center"><img src="<?php echo $imagem;?>" width="80%" style="border: 1px solid black"></p>
						</div>
					</div>
<?php
				}
			}
			
			$nomeTab = "TabItinerario_" . $siape;
			$query = "SELECT * FROM $nomeTab WHERE documento='Especialização'";
			$result = mysqli_query($link, $query); 
			$linhas = mysqli_num_rows($result);
			if ($linhas > 0) {
?>
				<div class="row">
					<p><h2 align="center" style="color: #32A041;">Especialização</h2></p>
				</div>
<?php
				$ncount = 1;
				while ($row = mysqli_fetch_assoc($result)) {
					$extensao = $row['tipoarquivo'];
					$filename = $diretorio . '/especializacao_' . $ncount . "." .$extensao;
					file_put_contents($filename, $row['arquivo']);
					$ncount++;
					$imagem = $pathserver . $filename;
?>
					<div class="row">
						<div class="coluna" align="center">
							<p align="center"><img src="<?php echo $imagem;?>" width="80%" style="border: 1px solid black;"></p>
						</div>
					</div>
<?php
				}
			}
			$nomeTab = "TabItinerario_" . $siape;
			$query = "SELECT * FROM $nomeTab WHERE documento='Mestrado'";
			$result = mysqli_query($link, $query); 
			$linhas = mysqli_num_rows($result);
			if ($linhas > 0) {
?>
				<div class="row">
					<p><h2 align="center" style="color: #32A041;">Mestrado</h2></p>
				</div>
<?php
				$ncount = 1;
				while ($row = mysqli_fetch_assoc($result)) {
					$extensao = $row['tipoarquivo'];
					$filename = $diretorio . '/mestrado_' . $ncount . "." .$extensao;
					file_put_contents($filename, $row['arquivo']);
					$ncount++;
					$imagem = $pathserver . $filename;
?>
					<div class="row">
						<div class="coluna" align="center">
							<p align="center"><img src="<?php echo $imagem;?>" width="80%" style="border: 1px solid black;"></p>
						</div>
					</div>
<?php
				}
			}
			$nomeTab = "TabItinerario_" . $siape;
			$query = "SELECT * FROM $nomeTab WHERE documento='Experiência profissional'";
			$result = mysqli_query($link, $query); 
			$linhas = mysqli_num_rows($result);
			if ($linhas > 0) {
?>
				<div class="row">
					<p><h2 align="center" style="color: #32A041;">Experiência profissional</h2></p>
				</div>
<?php
				$ncount = 1;
				while ($row = mysqli_fetch_assoc($result)) {
					$extensao = $row['tipoarquivo'];
					$filename = $diretorio . '/experiencia_' . $ncount . "." .$extensao;
					file_put_contents($filename, $row['arquivo']);
					$ncount++;
					$imagem = $pathserver . $filename;
?>
					<div class="row">
						<div class="coluna" align="center">
							<p align="center"><img src="<?php echo $imagem;?>" width="80%" style="border: 1px solid black;"></p>
						</div>
					</div>
<?php
				}
			}
?>			
			</div>
		</div>
<?php		
	}
	fnDesconectaBD($link);
	include "botaovoltar.php";
	include "rodape.php";
?>
		
</body>
</html>