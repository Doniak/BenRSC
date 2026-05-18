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
				<div class="coluna">
				<p><h2 align="center">Documentos do Itinerário de Formação</h2></p>
				<p align="justify" style="color: #32A041; font-size: 150%;">Agora você irá salvar cada documento comprobatório da sua formação e experiência profissional. Os documentos serão salvos um a um. Você deverá indicar a qual formação ou experiência profissional o documento se refere.</p>
				<p align="justify" style="color: #32A041; font-size: 150%;">Os tipos de arquivos aceitos são imagens com extensão *.jpg ou *.png. O nome do arquivo não pode ter espaços ou pontos. Veja um exemplo:<BR>
					<ul style="padding-left: 150px;">
						<li>CORRETO: diplomagraduacação.png</li>
						<li>ERRADO: certificado especialização 20.05.2025.jpg</li>
					</ul>
				</p>
				</div>
			</div>
		</div>
	</div>

	<div style="background-color: #1A5321;">
		<BR>
		<form action="Docente_itinerariodocsRX.php?id=<?php echo fnEncodeID($id);?>" method="post" enctype="multipart/form-data">
		<div class="container" style="background-color: #E4EBE2;">
			<div class="row">
				<div class="coluna" align="center">
					<label>Tipo do documento que vai salvar:</label><BR>
					<select required="required" id="tipodoc" name="tipodoc">
						<option>Selecione um tipo de documento</option>
						<option>Graduação</option>
						<option>Especialização</option>
						<option>Mestrado</option>
						<option>Experiência profissional</option>
					</select>
				</div>
				<div class="coluna" align="center">
					<label>Data do documento:</label><BR>
					<input type="date" name="datadoc" required="required"><BR>
				</div>
				<div class="coluna" align="center">
					<label>Selecione o documento:</label><BR>
					<input type="file" name="arquivo" id="arquivo" required="required" class="form-control" accept="image/*"><BR>
				</div>
			</div>
			<div class="row">
				<div class="coluna" align="center">
					<input type="submit" class="btn" value="Salvar" style="border-radius: 8px; border: 3px solid #1A5321;; color: white; padding: 10px 30px; font-size: 18px; background-color: #1A5321;"><br>
				</div>
			</div>
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