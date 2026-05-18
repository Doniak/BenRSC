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

	<div style="background-color: #1A5321;">
		<div class="container" style="background-color: #E4EBE2;">
			<div class="row">
				<p><h2 align="center">RSC - I</h2></p>
				<p><h3 align="center" style="color: #32A041;"><b>Diretriz H</b></h3></p>
			</div>
		</div>
	</div>

	<div style="background-color: #1A5321;" id="selcriterio">
		<BR>
		<form action="Docente_RSC1_DiretH.php?id=<?php echo fnEncodeID($id);?>#criterio" method="post">
		<div class="container" style="background-color: #E4EBE2;">
<?php
			$query = "SELECT criterio FROM TabRSC WHERE nivel='RSCI' AND diretriz='H'";
			$result = mysqli_query($link, $query); 
			$rows = mysqli_num_rows($result);
			if ($rows > 0) {	
?>	
			<div class="row">
				<div class="coluna" align="center">
					<label>Critério: </label>
					<select required="required" id="criterio" name="criterio">
						<option>Selecione um critério</option>
		<?php
						while ($row = mysqli_fetch_assoc($result)) {
							$Nrcriterio = $row['criterio'];
		?>
							<option><?php echo $Nrcriterio;?></option>
						<?php }	?>
					</select>
				</div>
				<div class="coluna" align="center">
					<input type="submit" class="btn" value="Carrega critério" style="border-radius: 8px; border: 3px solid #1A5321;; color: white; padding: 10px 30px; font-size: 18px; background-color: #1A5321;"><br>
				</div>
			</div>
		</div>
<?php 
		} 
?>				
		</form>
	</div>

	<div style="background-color: #1A5321;" id="criterio">
		<BR>
		<div class="container" style="background-color: #E4EBE2;">
		<?php
			if (!empty($_POST)) {
				$criterio = $_POST["criterio"];
				$query = "SELECT nomecriterio,fatorpontuacao,unidade,qtdemaxunid FROM TabRSC WHERE criterio=$criterio";
				$result = mysqli_query($link, $query); 
				if (!empty($result)) {
					while ($row = mysqli_fetch_assoc($result)) {
						$nomecriterio = $row['nomecriterio'];
						$fatorpontuacao = $row['fatorpontuacao'];
						$unidade = $row['unidade'];
						$qtdemaxunid = $row["qtdemaxunid"];
					}
		?>
					<form action="Docente_RSCrx.php?id=<?php echo fnEncodeID($id);?>" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="coluna">
							<label>Critério</label><br>
							<input type="text" id="criterio" name="criterio" value="<?php echo $criterio; ?>" readonly  size="5px" style="background-color: #E9E9E9;"><br>
						</div>
						<div class="coluna">
							<label>Fator de pontuação</label><br>
							<input type="text" id="fatorpontuacao" name="fatorpontuacao" value="<?php echo $fatorpontuacao; ?>" readonly size="10px" style="background-color: #E9E9E9;"><br>
						</div>			
						<div class="coluna">
							<label>Unidade</label><br>
							<input type="text" id="unidade" name="unidade" value="<?php echo $unidade; ?>" readonly style="background-color: #E9E9E9;"><br>
						</div>
					</div>
					<div class="row">
						<div class="coluna">
							<label>Nome do critério</label><br>
							<input type="text" id="nomecriterio" name="nomecriterio" value="<?php echo $nomecriterio; ?>" readonly size="122px" style="background-color: #E9E9E9;"><br>
						</div>
					</div>
					<div class="row">
						<div class="coluna">
							<label>Data do documento</label><br>
							<input type="date" id="datadoc" name="datadoc" required="required" ><br>
						</div>	
						<div class="coluna">
							<label>Quantidade de unidades</label><br>
							<input type="text" id="qtdeunidades" name="qtdeunidades" required="required" ><br>
						</div>	
						<div class="coluna">
							<label>Documento comprobatório</label><br>
							<input type="file" name="arquivo" id="arquivo" required="required" class="form-control" accept="image/*"><BR>
						</div>			
					</div>
					<div class="row">
						<div class="coluna" align="center">
							<input type="submit" class="btn" value="Cadastra atividade" style="border-radius: 8px; border: 3px solid #1A5321;; color: white; padding: 10px 30px; font-size: 18px; background-color: #1A5321;"><br>
						</div>
					</div>
					</form>
<?php
				}
			}
?>
		</div>
	</div>
	
	<div style="background-color: #1A5321;">
		<BR>
	</div>

	<div style="background-color: #1A5321;">
		<div class="container" style="background-color: #E4EBE2;">
<?php
			$query = "SELECT * FROM TabRSC WHERE nivel='RSCI' AND diretriz='H'";
			$result = mysqli_query($link, $query); 
?>
			<table align='center'>
				<tr>
					<th align="center" style="font-size: 12px;">#</th>
					<th align="center" style="font-size: 12px;">Nome do critério</th>
					<th align="center" style="font-size: 12px;">Fator pontuação</th>
					<th align="center" style="font-size: 12px;">Unidade</th>
					<th align="center" style="font-size: 12px;">Qtde máxima</th>
					<th align="center" style="font-size: 12px;">Nível</th>
					<th align="center" style="font-size: 12px;">Diretriz</th>
				</tr>
				<BR>
		<?php 
				while($row = mysqli_fetch_assoc($result)) {
					$criterio = $row['criterio'];
					$nomecriterio = $row['nomecriterio'];
					$fatorpontuacao = $row['fatorpontuacao'];
					$unidade = $row['unidade'];
					$qtdemaxunid = $row['qtdemaxunid'];
					$nivel = $row['nivel'];
					$diretriz = $row['diretriz'];
		?>
				<tr>
					<td align="center"><?php echo $criterio;?></td>
					<td align="left"><?php echo $nomecriterio;?></td>
					<td align="center"><?php echo $fatorpontuacao;?></td>
					<td align="center"><?php echo $unidade;?></td>
					<td align="center"><?php echo $qtdemaxunid;?></td>
					<td align="center"><?php echo $nivel;?></td>
					<td align="center"><?php echo $diretriz;?></td>
				</tr>
				<?php } ?>
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