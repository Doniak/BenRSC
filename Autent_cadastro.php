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
				<p><h2 align="center"><b>Formulário de Solicitação para o<BR>Reconhecimento de Saberes e Competências - RSC</b></h2></p>
			</div>
			<div class="row">
				<h5 align="justify" style="color: #1A5321;">Salve suas informações, por gentileza.</h5>
				<p align="justify" style="color: #1A5321;">Assim, o processo de autenticação ficará mais ágil e simples nas próximas vezes. Se você mudar de cargo e deixar de autenticar documentos para pedidos de RSC, poderá apagar seu cadastro a qualquer tempo.</p>
			</div>
		</div>
	</div>
<?php
	if ($idAuth > 0) {
		$query = "SELECT * FROM TabAutenticador WHERE id=$idAuth";
		$result = mysqli_query($link, $query);
		$row = mysqli_fetch_assoc($result);
		$nome = $row['nome'];
		$email = $row['email'];
		$siape = $row['siape'];
		$telefone = $row['telefone'];
		$ife = $row['ife'];
		$siglaife = $row['siglaife'];
		$campus = $row['campus'];
		$senha = $row['senha'];
	}
	else {
		$nome = "";
		$email = "";
		$siape = "";
		$telefone = "";
		$ife = "";
		$siglaife = "";
		$campus = "";
	}
	
?>		
	<div style="background-color: #1A5321;">
		<BR>
<?php
		if ($idAuth > 0) {
?>
			<form action="Autent_cadastro_rx.php?idAuth=<?php echo fnEncodeID($idAuth); ?>" method="post">
<?php
		}
		else {
?>
			<form action="Autent_cadastro_rx.php" method="post">
<?php			
		}
?>
		<div class="container" style="background-color: #E4EBE2;">
			<div class="row">
				<div class="coluna" align="center">
					<label>Nome completo</label><br>
					<input required="required" type="text" id="nome" name="nome" size="35px" value="<?php echo $nome; ?>"><br>
				</div>
				<div class="coluna" align="center">
					<label>Instituto Federal de Educação</label><br>
					<select required="required" name="ife">
						<option>Selecione o seu Instituto Federal</option>
<?php
						$query = "SELECT nome FROM TabInstitutosFederais ORDER BY estado";
						$result = mysqli_query($link, $query);
						while ($row = mysqli_fetch_assoc($result)) {
							$instituto = $row['nome'];
							if (strcmp($ife,$instituto) == 0) {
?>
								<option selected><?php echo $instituto;?></option>
<?php
							} else
							{
?>
								<option><?php echo $instituto;?></option>
<?php
							}
						}
?>
					</select>
				</div>
				<div class="coluna" align="center">
					<label>Campus de lotação</label><br>
					<input required="required" type="text" id="campus" name="campus" size="35px" value="<?php echo $campus; ?>"><br>
				</div>
			</div>
			<div class="row">
				<div class="coluna" align="center">
					<label>E-mail institucional</label><br>
					<input required="required" type="email" id="email" name="email" size="35px" value="<?php echo $email; ?>"><br>
				</div>
				<div class="coluna" align="center">
					<label>Telefone</label><br>
					<input required="required" type="text" id="telefone" name="telefone" value="<?php echo $telefone; ?>"><br>
				</div>
				<div class="coluna" align="center">
					<p></p>
				</div>				
			</div>
			<div class="row">
				<div class="coluna" align="center">
					<label>Matrícula SIAPE</label><br>
					<input required="required" type="text" id="siape" name="siape" value="<?php echo $siape; ?>"><br>
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
					<input type="submit" class="btn" value="Salva cadastro" style="border-radius: 8px; border: 3px solid #1A5321;; color: white; padding: 15px 30px; font-size: 18px; background-color: #1A5321;"><br>
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