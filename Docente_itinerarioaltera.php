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

<?php
	if (!empty($_POST) && $id > 0) {
		$iddoc = intval($_POST["iddoc"]);
		
		$query = "SELECT siape FROM TabDocente WHERE id=$id";
		$result = mysqli_query($link, $query); 
		$rows = mysqli_fetch_assoc($result);
		$siape = $rows["siape"];
		
		$nomeTab = "TabItinerario_" . $siape;
		$query = "SELECT * FROM $nomeTab WHERE id=$iddoc";
		$result = mysqli_query($link, $query);
		$linhas = mysqli_num_rows($result);
		if ($linhas > 0) {
			$row = mysqli_fetch_assoc($result);
			$documento = $row["documento"];
			$query = "DELETE FROM $nomeTab WHERE id=$iddoc";
			$result = mysqli_query($link, $query);
			
			if (strcmp($documento,"Graduação")==0) {
				$query = "SELECT graduacao FROM TabFormacao WHERE siape='$siape'";
				$result = mysqli_query($link, $query);
				$row = mysqli_fetch_assoc($result);
				$graduacao = intval($row["graduacao"]);
				if ($graduacao > 0) {
					$graduacao = $graduacao - 1;
					$query = "UPDATE TabFormacao SET graduacao=$graduacao WHERE siape='$siape'";
					$result = mysqli_query($link, $query);
				}
			}
			if (strcmp($documento,"Especialização")==0) {
				$query = "SELECT especializacao FROM TabFormacao WHERE siape='$siape'";
				$result = mysqli_query($link, $query);
				$row = mysqli_fetch_assoc($result);
				$especializacao = intval($row["especializacao"]);
				if ($especializacao > 0) {
					$especializacao = $especializacao - 1;
					$query = "UPDATE TabFormacao SET especializacao=$especializacao WHERE siape='$siape'";
					$result = mysqli_query($link, $query);
				}
			}
			if (strcmp($documento,"Mestrado")==0) {
				$query = "SELECT mestrado FROM TabFormacao WHERE siape='$siape'";
				$result = mysqli_query($link, $query);
				$row = mysqli_fetch_assoc($result);
				$mestrado = intval($row["mestrado"]);
				if ($mestrado > 0) {
					$mestrado = $mestrado - 1;
					$query = "UPDATE TabFormacao SET mestrado=$mestrado WHERE siape='$siape'";
					$result = mysqli_query($link, $query);
				}
			}
			if (strcmp($documento,"Experiência profissional")==0) {
				$query = "SELECT experiencia FROM TabFormacao WHERE siape='$siape'";
				$result = mysqli_query($link, $query);
				$row = mysqli_fetch_assoc($result);
				$experiencia = intval($row["experiencia"]);
				if ($experiencia > 0) {
					$experiencia = $experiencia - 1;
					$query = "UPDATE TabFormacao SET experiencia=$experiencia WHERE siape='$siape'";
					$result = mysqli_query($link, $query);
				}
			}
		}
	}
?>		
		
	<div style="background-color: #1A5321;" id="itinerarioformacao">
		<div class="container" style="background-color: #E4EBE2;" id="altereitinerario">
			<div class="row">
				<p><h2 align="center" style="color: #32A041;">Altere o seu Itinerário de Formação</h2></p>
			</div>
		</div>
	</div>

	<div style="background-color: #1A5321;">
		<BR>
		<div class="container" style="background-color: #E4EBE2;">
			<BR>
			<table align='justify' style="background-color: #E4EBE2; border: 4px solid; border-color: #1A5321;">
				<tr align="center" style="border: 3px solid; border-color: #1A5321;">
					<th align="center" style="font-size: 14px;">Tipo de documento</th>
					<th align="center" style="font-size: 14px;">Documento</th>
					<th align="center" style="font-size: 14px;">Excluir</th>
				</tr>				
<?php
				$query = "SELECT siape FROM TabDocente WHERE id=$id";
				$result = mysqli_query($link, $query); 
				$rows = mysqli_fetch_assoc($result);
				$siape = $rows["siape"];
		
				$diretorio = "memorial/memorial_" . $siape;
				if (!is_dir($diretorio)) {
					mkdir($diretorio);
				}
				$pathservidor = $pathserver . $diretorio . "/";				

				$query = "SELECT * FROM TabFormacao WHERE siape='$siape'";
				$result = mysqli_query($link, $query); 
				$rows = mysqli_fetch_assoc($result);
				$nrlinhas = mysqli_num_rows($result);
				if ($nrlinhas > 0) {
					$nomeTab = "TabItinerario_" . $siape;
					$query = "SELECT * FROM $nomeTab WHERE documento='Graduação'";
					$result = mysqli_query($link, $query); 
					$linhas = mysqli_num_rows($result);
					if ($linhas > 0) {
						$ncount = 1;
						while ($row = mysqli_fetch_assoc($result)) {
							$documento = $row["documento"];
							$extensao = $row['tipoarquivo'];
							$filename = 'graduacao_' . $ncount . "." .$extensao;
							file_put_contents($filename, $row['arquivo']);
							$ncount++;
							$imagem = $pathservidor . $filename;
							
?>
							<tr align="center" width="100%" style="border: 2px solid #1A5321;">
								<td align="left"><?php echo $documento;?></td>
								<td align="center"><img src="<?php echo $imagem;?>"  width="40%" style="border: 1px solid black"></td>
								<td align="center">
									<form action="Docente_itinerarioaltera.php?id=<?php echo fnEncodeID($id);?>#altereitinerario" method="post">
										<input type="hidden" name="iddoc" value="<?php echo $row['id'];?>"></input>
										<input type="submit" class="btn" value="Excluir" style="border-radius: 4px; border: 3px solid #c8411e; color: white; background-color: #c8411e;">
									</form>
								</td>
							</tr>

<?php
						}
					}
					$nomeTab = "TabItinerario_" . $siape;
					$query = "SELECT * FROM $nomeTab WHERE documento='Especialização'";
					$result = mysqli_query($link, $query); 
					$linhas = mysqli_num_rows($result);
					if ($linhas > 0) {
						$ncount = 1;
						while ($row = mysqli_fetch_assoc($result)) {
							$documento = $row["documento"];
							$extensao = $row['tipoarquivo'];
							$filename = 'especializacao_' . $ncount . "." .$extensao;
							file_put_contents($filename, $row['arquivo']);
							$ncount++;
							$imagem = $pathservidor . $filename;
?>
							<tr align="center" width="100%" style="border: 2px solid #1A5321;">
								<td align="left"><?php echo $documento;?></td>
								<td align="center"><img src="<?php echo $imagem;?>" width="40%" style="border: 1px solid black;"></td>
								<td align="center">
									<form action="Docente_itinerarioaltera.php?id=<?php echo fnEncodeID($id);?>#altereitinerario" method="post">
										<input type="hidden" name="iddoc" value="<?php echo $row['id'];?>"></input>
										<input type="submit" class="btn" value="Excluir" style="border-radius: 4px; border: 3px solid #c8411e; color: white; background-color: #c8411e;">
									</form>
								</td>
							</tr>

<?php
						}
					}
					$nomeTab = "TabItinerario_" . $siape;
					$query = "SELECT * FROM $nomeTab WHERE documento='Mestrado'";
					$result = mysqli_query($link, $query); 
					$linhas = mysqli_num_rows($result);
					if ($linhas > 0) {
						$ncount = 1;
						while ($row = mysqli_fetch_assoc($result)) {
							$documento = $row["documento"];
							$extensao = $row['tipoarquivo'];
							$filename = 'mestrado_' . $ncount . "." .$extensao;
							file_put_contents($filename, $row['arquivo']);
							$ncount++;
							$imagem = $pathservidor . $filename;
?>
							<tr align="center" width="100%" style="border: 2px solid #1A5321;">
								<td align="left"><?php echo $documento;?></td>
								<td align="center"><img src="<?php echo $imagem;?>" width="40%" style="border: 1px solid black;"></td>
								<td align="center">
									<form action="Docente_itinerarioaltera.php?id=<?php echo fnEncodeID($id);?>#altereitinerario" method="post">
										<input type="hidden" name="iddoc" value="<?php echo $row['id'];?>"></input>
										<input type="submit" class="btn" value="Excluir" style="border-radius: 4px; border: 3px solid #c8411e; color: white; background-color: #c8411e;">
									</form>
								</td>
							</tr>

<?php
						}
					}
					$nomeTab = "TabItinerario_" . $siape;
					$query = "SELECT * FROM $nomeTab WHERE documento='Experiência profissional'";
					$result = mysqli_query($link, $query); 
					$linhas = mysqli_num_rows($result);
					if ($linhas > 0) {
						$ncount = 1;
						while ($row = mysqli_fetch_assoc($result)) {
							$documento = $row["documento"];
							$extensao = $row['tipoarquivo'];
							$filename = 'experiencia_' . $ncount . "." .$extensao;
							file_put_contents($filename, $row['arquivo']);
							$ncount++;
							$imagem = $pathservidor . $filename;
?>
							<tr align="center" width="100%" style="border: 2px solid #1A5321;">
								<td align="left"><?php echo $documento;?></td>
								<td align="center"><img src="<?php echo $imagem;?>" width="40%" style="border: 1px solid black;"></td>
								<td align="center">
									<form action="Docente_itinerarioaltera.php?id=<?php echo fnEncodeID($id);?>#altereitinerario" method="post">
										<input type="hidden" name="iddoc" value="<?php echo $row['id'];?>"></input>
										<input type="submit" class="btn" value="Excluir" style="border-radius: 4px; border: 3px solid #c8411e; color: white; background-color: #c8411e;">
									</form>
								</td>
							</tr>
<?php
						}
					}				
				}
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