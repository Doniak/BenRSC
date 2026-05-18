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
				<p><h2 align="center">Itinerário de Formação</h2></p>
				<p align="justify" style="color: #32A041; font-size: 150%;"><b>Infome a quantidade de cada formação que você possui. Na sequência você será direcionado para a página onde poderá enviar os documentos comprobatórios.</b><BR>
				A experiência profissional a ser considerada neste pedido do benefício RSC é de até os 5 anos anteriores ao seu ingresso no Instituto Federal.
				</p>
			</div>
		</div>
	</div>

<?php
	$query = "SELECT siape FROM TabDocente WHERE id=$id";
	$result = mysqli_query($link, $query); 
	$rows = mysqli_fetch_assoc($result);
	$siape = $rows['siape'];
	
	$query = "SELECT * FROM TabFormacao WHERE siape='$siape'";
	$result = mysqli_query($link, $query); 
	$rows = mysqli_fetch_assoc($result);
	$nrlinhas = mysqli_num_rows($result);
	if ($nrlinhas > 0) {
		$graduacao = intval($rows["graduacao"]);
		$especializacao = intval($rows["especializacao"]);
		$mestrado = intval($rows["mestrado"]);
		$experiencia = intval($rows["experiencia"]);
		$descricao = $rows["descricao"];
	}
	else {
		$graduacao = 0;
		$especializacao = 0;
		$mestrado = 0;
		$experiencia = 0;
		$descricao = "";
	}
?>	
	
	<div style="background-color: #1A5321;">
		<BR>
		<form action="Docente_itinerarioRX.php?id=<?php echo fnEncodeID($id);?>" method="post">
		<div class="container" style="background-color: #E4EBE2;">
			<div class="row">
				<div class="coluna" align="center">
					<BR>
					<label>Quantidade de Graduações: </label>
					<input type="number" name="graduacao" required="required" value="<?php echo $graduacao;?>">
				</div>
				<div class="coluna" align="center">
					<BR>
					<label>Quantidade de Especializações: </label>
					<input type="number" name="especializacao" required="required" value="<?php echo $especializacao;?>">
				</div>
				<div class="coluna" align="center">
					<BR>
					<label>Quantidade de Mestrados: </label>
					<input type="number" name="mestrado" required="required" value="<?php echo $mestrado;?>">
				</div>
				<div class="coluna" align="center">
					<label>Quantidade de documentos da experiência profissional: </label>
					<input type="number" name="experiencia" required="required" value="<?php echo $experiencia;?>">
				</div>
			</div>
			<div class="row">
				<p align="center">
				<label>Descrição da formação e experiência profissional:</label><BR>
				<textarea name="descricao" rows="16" cols="96" required="required"><?php echo $descricao;?></textarea>
				</p>
			</div>
			<div class="row">
				<div align="center">
					<input type="submit" class="btn" value="Salvar" style="border-radius: 8px; border: 3px solid #1A5321;; color: white; padding: 10px 30px; font-size: 18px; background-color: #1A5321;"><br>
				</div>
			</div>
			<BR>
		</div>
		</form>
	</div>
<?php
	fnDesconectaBD($link);
	include "botaovoltar.php";
	include "rodape.php";
?>
		
</body>
</html>