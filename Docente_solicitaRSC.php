<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php
	include "cabecalho.php";
	include "conectaBD.php";
	$link = fnConectaBancoDados();
	include "Tabelas.php";
	include "variaveis.php";
	include "Docente_funcoes.php";
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
				<p><h2 align="center" style="color: #1A5321;">Solicitação do<BR>Reconhecimento de Saberes e Competências - RSC</h2></p>
				<p><h3 align="center" style="color: #32A041;"><b>Preencha as informações e solicite o seu benefício RSC</b></h3></p>
			</div>
		</div>
	</div>
<?php
	$query = "SELECT nome,siape FROM TabDocente WHERE id=$id";
	$result = mysqli_query($link, $query);
	$row = mysqli_fetch_assoc($result);
	$nome = $row['nome'];
	$siape = $row['siape'];
?>
	<div style="background-color: #1A5321;">
		<BR>
		<form action="Docente_solicitaRSC_rx.php?id=<?php echo fnEncodeID($id);?>" method="post">
		<div class="container" style="background-color: #E4EBE2;">
			<div class="row">
				<div class="coluna" align="center">
					<label>Nome completo</label><br>
					<input readonly type="text" id="nome" name="nome" value="<?php echo $nome;?>" size="40" style="background-color: #E9E9E9;"><br>
				</div>
				<div class="coluna" align="center">
					<label>Siape</label><br>
					<input readonly type="text" id="siape" name="siape" value="<?php echo $siape;?>" style="background-color: #E9E9E9;"><br>	
				</div>
			</div>
			<div class="row">
				<div class="coluna" align="center">
					<label>Número do processo no SIPAC (23292)</label><br>
					<input required="required" type="text" id="sipac" name="sipac" size="40"><br>
				</div>
				<div class="coluna" align="center">
					<label>Data do processo no SIPAC</label><br>
					<input required="required" type="date" id="datasipac" name="datasipac"><br>
				</div>
			</div>
			<div class="row">
				<div align="center">
					<input type="checkbox" checked required name="sipacOK" id="sipacOK" value="sipacOK"><label for="lgpd">&nbsp;&nbsp;Ao solicitar, você declara que todas as informações são verdadeiras</label></input><BR>					
					<input type="submit" class="btn" value="Solicitar RSC" style="border-radius: 8px; border: 3px solid #1A5321;; color: white; padding: 15px 30px; font-size: 18px; background-color: #1A5321;"><br>
				</div>
			</div>
			<BR>
		</div>
		</form>
	</div>

<?php
	include "botaovoltar.php";
	include "rodape.php";
	fnDesconectaBD($link);
?>
		
</body>
</html>