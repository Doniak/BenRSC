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
<?php
?>	
	<div style="background-color:#1A5321;">
		<div class="container bg-transparent">
<?php 
			include "menu.php";
			$rsc = "";
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
				<p><h2 align="center"><b>Formulário de Solicitação para o<BR>Reconhecimento de Saberes e Competências - RSC</b></h2></p>
			</div>
			<div class="row">
				<p><h3 align="justify" style="color: #1A5321;">Salve suas informações, por gentileza.<BR> Essas são informações necessárias para a solicitaçãodo benefício RSC.</h3></p>
			</div>
		</div>
	</div>
		
	<div style="background-color: #1A5321;">
		<BR>
		<form action="Docente_identificacaoRX.php" method="post">
		<div class="container" style="background-color: #E4EBE2;">
			<div class="row">
				<div class="coluna" align="center">
					<label>Nome completo</label><br>
					<input required="required" type="text" id="nome" name="nome" size="35px"><br>
				</div>
				<div class="coluna" align="center">
					<label>Instituto Federal de Educação</label><br>
					<select required="required" name="ife">
						<option>Selecione o seu Instituto Federal</option>
<?php
						$query = "SELECT nome FROM TabInstitutosFederais ORDER BY estado";
						$result = mysqli_query($link, $query);
						while ($row = mysqli_fetch_assoc($result)) {
							$ife = $row['nome'];
?>
							<option><?php echo $ife;?></option>
<?php
						}
?>
					</select>
				</div>
				<div class="coluna" align="center">
					<label>Campus de lotação</label><br>
					<input required="required" type="text" id="campus" name="campus" size="35px"><br>
				</div>
			</div>
			<div class="row">
				<div class="coluna" align="center">
					<label>E-mail institucional</label><br>
					<input required="required" type="email" id="email" name="email" size="35px"><br>
				</div>
				<div class="coluna" align="center">
					<label>Telefone</label><br>
					<input required="required" type="text" id="telefone" name="telefone"><br>
				</div>
				<div class="coluna" align="center">
					<label>Matrícula SIAPE</label><br>
					<input required="required" type="text" id="siape" name="siape"><br>
				</div>
			</div>
			<div class="row">
				<div class="coluna" align="center">
					<label>Data de nascimento</label><br>
					<input required="required" type="date" id="nasc" name="nasc"><br>
				</div>
				<div class="coluna" align="center">
					<label>Ingresso no serviço público</label><br>
					<input required="required" type="date" id="ingrservpub" name="ingrservpub"><br>
				</div>
				<div class="coluna" align="center">
					<label>Ingresso no Insituto Federal</label><br>
					<input required="required" type="date" id="ingrifsc" name="ingrifsc"><br>
				</div>
			</div>
			<div class="row">
				<div class="coluna" align="center">
					<label>Classe da carreira</label><br>
					<select required="required" id="classe" name="classe">
						<option>Selecione a classe da carreira</option>
						<option>Classe A - Professor Assistente</option>
						<option>Classe B - Professor Adjunto</option>
						<option>Classe C - Professor Associado</option>
					</select>
				</div>
				<div class="coluna" align="center">
					<label>Portaria de Retribuição por Titulação</label><br>
					<input required="required" type="text" id="RTportaria" name="RTportaria" size="35px"><br>
				</div>
				<div class="coluna" align="center">
					<label>Data da Portaria de RT</label><br>
					<input required="required" type="date" id="dataRTportaria" name="dataRTportaria"><br>
				</div>
			</div>
			<div class="row">
				<div class="coluna" align="center">
					<label>Nível de RSC solicitado</label><br>
					<select required="required" id="rsc" name="rsc">
						<option>Nível RSC requerido</option>
						<option value="RSC-I">RSC-I</option>
						<option value="RSC-II">RSC-II</option>
						<option value="RSC-III">RSC-III</option>
					</select><br>
				</div>					
				<div class="coluna" align="center">
					<label>Senha</label><br>
					<input required="required" type="password" id="senha" name="senha"><br>
				</div>
				<div class="coluna" align="center">
					<p></p>
				</div>				
			</div>
			<div class="row">
				<div align="center">
					<input type="checkbox" checked required name="lgpd" id="lgpd" value="lgpd"><label for="lgpd"><a href="#" target="_blank" style="text-decoration: none; font-size: 12px;">&nbsp;&nbsp;Ao salvar você concorda com a política de privacidade</a></label></input><BR>
					<input type="submit" class="btn" value="Salvar cadastro" style="border-radius: 8px; border: 3px solid #1A5321;; color: white; padding: 15px 30px; font-size: 18px; background-color: #1A5321;"><br>
				</div>
			</div>
			<BR>
		</div>
		</form>
	</div>

<?php
	include "botaovoltar.php";
	fnDesconectaBD($link);
	include "rodape.php";
?>
</body>
</html>