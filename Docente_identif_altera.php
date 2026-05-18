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
				<p><h2 align="center" style="color: #1A5321;"><b>Formulário de Solicitação para o<BR>Reconhecimento de Saberes e Competências - RSC</b></h2></p>
			</div>
			<div class="row">
				<p><h3 align="justify" style="color: #1A5321;">Altere suas informações.<BR> Essas são informações necessárias para a solicitaçãodo benefício RSC.</h3></p>
			</div>
		</div>
	</div>
<?php
	$query = "SELECT * FROM TabDocente WHERE id=$id";
	$result = mysqli_query($link, $query);
	$row = mysqli_fetch_assoc($result);
	$nome = $row['nome'];
	$siape = $row['siape'];
	$rsc = $row['rsc'];
	$email = $row['email'];
	
	$query = "SELECT * FROM FormularioPedidoRSC WHERE siape=$siape";
	$result = mysqli_query($link, $query);
	$row = mysqli_fetch_assoc($result);
	$nasc = $row['nasc'];
	$campus = $row['campus'];
	$telefone = $row['telefone'];
	$portariaRT = $row['portariaRT'];
	$dataRT = $row['dataRT'];
	$ingrservpub = $row['ingrservpub'];
	$ingrifsc = $row['ingrifsc'];
	$classe = $row['classe'];
	$ife = $row['ife'];
		
?>
	<div style="background-color: #1A5321;">
		<BR>
		<form action="Docente_identif_altera_rx.php?id=<?php echo fnEncodeID($id);?>" method="post">
		<div class="container" style="background-color: #E4EBE2;">
			<BR>
			<div class="row">
				<div class="coluna" align="center">
					<label>Nome completo</label><br>
					<input required="required" type="text" id="nome" name="nome" value="<?php echo $nome;?>" size="35px"/><br>
				</div>
				<div class="coluna" align="center">
					<label>Instituto Federal de Educação</label><br>
					<select required="required" name="ife">
						<option>Selecione o seu Instituto Federal</option>
<?php
						$query = "SELECT nome FROM TabInstitutosFederais ORDER BY estado";
						$result = mysqli_query($link, $query);
						while ($row = mysqli_fetch_assoc($result)) {
							$nomeife = $row['nome'];
							if (strcmp($nomeife,$ife) == 0) {
?>
								<option selected><?php echo $nomeife;?></option>
<?php
							} else {
?>
								<option><?php echo $nomeife;?></option>
<?php
						   }
						}
?>
					</select>
				</div>				
				<div class="coluna" align="center">
					<label>Campus de lotação</label><br>
					<input required="required" type="text" id="campus" name="campus" value="<?php echo $campus;?>" size="35px"/><br>
				</div>
			</div>
			<div class="row">
				<div class="coluna" align="center">
					<label>E-mail institucional</label><br>
					<input required="required" type="email" id="email" name="email" value="<?php echo $email;?>" size="35px"/><br>
				</div>
				<div class="coluna" align="center">
					<label>Telefone</label><br>
					<input required="required" type="text" id="telefone" name="telefone" value="<?php echo $telefone;?>"/><br>
				</div>
				<div class="coluna" align="center">
					<label>Matrícula SIAPE</label><br>
					<input required="required" type="text" id="siape" name="siape" value="<?php echo $siape;?>" readonly/><br>
				</div>
			</div>
			<div class="row">
				<div class="coluna" align="center">
					<label>Data de nascimento</label><br>
					<input required="required" type="date" id="nasc" name="nasc" value="<?php echo $nasc;?>"/><br>
				</div>
				<div class="coluna" align="center">
					<label>Ingresso no serviço público</label><br>
					<input required="required" type="date" id="ingrservpub" name="ingrservpub" value="<?php echo $ingrservpub;?>"/><br>
				</div>
				<div class="coluna" align="center">
					<label>Ingresso no IFSC</label><br>
					<input required="required" type="date" id="ingrifsc" name="ingrifsc" value="<?php echo $ingrifsc;?>"/><br>
				</div>
			</div>
			<div class="row">
				<div class="coluna" align="center">
					<label>Classe da carreira</label><br>
					<select required="required" id="classe" name="classe">
						<option>Selecione a classe da carreira</option>
<?php
						if (strcmp("Classe A - Professor Assistente",$classe) == 0) { 
?>
							<option value="Classe A" selected >Classe A - Professor Assistente</option>
<?php
						} else {
?>
							<option>Classe A - Professor Assistente</option>
<?php							
						}
						if(strcmp("Classe B - Professor Adjunto",$classe) == 0) {
?>							
							<option value="Classe B" selected>Classe B - Professor Adjunto</option>
<?php
						} else {
?>
							<option>Classe B - Professor Adjunto</option>
<?php
						}
						if(strcmp("Classe C - Professor Associado",$classe) == 0) {
?>							
							<option value="Classe C" selected>Classe C - Professor Associado</option>
<?php
						} else {
?>
							<option>Classe C - Professor Associado</option>
<?php
					   }
?>
					</select>
				</div>
				<div class="coluna" align="center">
					<label>Portaria de Retribuição por Titulação</label><br>
					<input required="required" type="text" id="RTportaria" name="RTportaria" value="<?php echo $portariaRT;?>" size="35px"/><br>
				</div>
				<div class="coluna" align="center">
					<label>Data da Portaria de RT</label><br>
					<input required="required" type="date" id="dataRTportaria" name="dataRTportaria" value="<?php echo $dataRT;?>"/><br>
				</div>
			</div>
			<div class="row">
				<div class="coluna" align="center">
					<label>Nível de RSC solicitado</label><br>
					<select required="required" id="rsc" name="rsc">
						<option>Nível RSC requerido</option>
<?php 
						if (strcmp("RSC-I",$rsc) == 0) { 
?>
							<option value="RSC-I" selected>RSC-I</option>
<?php 
						} else {
?>
							<option value="RSC-I">RSC-I</option>
<?php
						}
						if (strcmp("RSC-II",$rsc) == 0) { 
?>
							<option value="RSC-II" selected>RSC-II</option>
<?php 
						} else {
?>
							<option value="RSC-II">RSC-II</option>
<?php
						}
						if (strcmp("RSC-III",$rsc) == 0) { 
?>
							<option value="RSC-III" selected>RSC-III</option>
<?php
						}
						else {
?>
							<option value="RSC-III">RSC-III</option>
<?php
						}
?>
					</select><br>
				</div>			
				<div class="coluna" align="center">
					<label>Senha</label><br>
					<input required="required" type="password" id="senha" name="senha"/><br>
				</div>
				<div class="coluna" align="center">
					<p></p>
				</div>
			</div>
			<div class="row">
				<div align="center">
					<input type="checkbox" checked required name="lgpd" id="lgpd" value="lgpd"><label for="lgpd"><a href="#" target="_blank" style="text-decoration: none; font-size: 12px;">&nbsp;&nbsp;Ao salvar você concorda com a política de privacidade</a></label></input><BR>
					<input type="submit" class="btn" value="Salvar cadastro" style="border-radius: 8px; border: 3px solid #1A5321;; color: white; padding: 15px 30px; font-size: 18px; background-color: #1A5321;"/>
				</div>
			</div>
			<BR>
		</div>
		</form>
		<BR>
	</div>

<?php
	include "botaovoltar.php";
	fnDesconectaBD($link);
	include "rodape.php";
?>
		
</body>
</html>