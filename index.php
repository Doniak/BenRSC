<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php
	include "cabecalho.php";
	include "conectaBD.php";
	fnCriaBancoDados();
	$link = fnConectaBancoDados();	
	include "Tabelas.php";
	include "TabelaRSC.php";	
	fnTabDocente($link);
	fnTabSolicitaRSC($link);
	fnTabAvaliadoresRSC($link);
	fnTabFormularioPedidoRSC($link);
	fnTabCPPD($link);
	fnAnaliseFormaCPPD($link);
	fnTabFormacao($link);
	fnTabAutenticador($link);
	fnTabDocAutenticar($link);
	fnTabInstitutosFederais($link);
	include "InstitutosFederais.php";

	$query = "SELECT * FROM TabCPPD";
	$result = mysqli_query($link, $query);
	$numrows = mysqli_num_rows($result);
	//	echo nl2br("Tabela CPPD, número de linhas: " . $numrows . "\n");
	if ($numrows == 0) {
		$ife = "Instituto Federal de Santa Catarina";
		$siglaife = "IFSC";
		$senha = "12";//$senha = "cppd#formRSC@2024";
		$password = password_hash($senha, PASSWORD_DEFAULT);
		$query = "INSERT INTO TabCPPD (id,ife,siglaife,usuario,senha,email,campus) VALUES (NULL,'$ife','$siglaife','Secretaria da CPPD','$password','cppd.secretaria@ifsc.edu.br','Reitoria')";
		$result = mysqli_query($link, $query);

		$senha = "cdp#formRSC@2024";
		$password = password_hash($senha, PASSWORD_DEFAULT);
		$query = "INSERT INTO TabCPPD (id,ife,siglaife,usuario,senha,email,campus) VALUES (NULL,'$ife','$siglaife','Secretaria do CDP','$password','cdp.secretaria@ifsc.edu.br','Reitoria')";
		$result = mysqli_query($link, $query);

		// Usuário criado apenas para teste
		$senha = "12";
		$password = password_hash($senha, PASSWORD_DEFAULT);
		$query = "INSERT INTO TabCPPD (id,ife,siglaife,usuario,senha,email,siape,campus,telefone) VALUES (NULL,'$ife','$siglaife','Marcio Doniak','$password','mdoniak@ifsc.edu.br','1667171','São José','(48) 98843 6221')";
		$result = mysqli_query($link, $query);
		
		$siapeAvaliador = "1667171";
		$nomeTab = "TabAnaliseForma_" . $siapeAvaliador;
		fnTabAnaliseFormaAvaliador($nomeTab,$link);
	}
	
	$query = "SELECT * FROM TabAutenticador";
	$result = mysqli_query($link, $query);
	$numrows = mysqli_num_rows($result);
	if ($numrows == 0) {
		// Usuário criado apenas para teste
		$senha = "12";
		$password = password_hash($senha, PASSWORD_DEFAULT);
		$query = "INSERT INTO TabAutenticador (id,nome,senha,email) VALUES (NULL,'Marcio H. Doniak','$password','mdoniak@ifsc.edu.br')";
		$result = mysqli_query($link, $query);	
	}
	
	fnDesconectaBD($link);
?>
</head>

<body>
	<div style="background-color:#1A5321;">
		<div class="container bg-transparent">
<?php 
			include "menu.php";
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

	<div  style="background-color: #1A5321;">
		<div class="container" style="background-color: #E4EBE2;">
			<div class="row">
				<p><h2 align="center">Formulário de Solicitação para o benefício<BR><b>Reconhecimento de Saberes e Competências - RSC</b></h2></p>
				<p><h3 align="center" style="color: #32A041;"><b>ForSolRSC - Formulário de Solicitação RSC</b></h3></p>
			</div>
			<div class="row">
				<p align="justify">A <b>Comissão Permanente de Pessoal Docente (CPPD)</b> do IFSC desenvolveu este aplicativo para facilitar o preenchimento do Formulário de Pontuação RSC. Este aplicativo também irá proporcionar maior agilidade, segurança e transparência ao processo. A CPPD elaborou um tutorial para que você possa tirar suas dúvidas ao usar este aplicativo.</p>
				<p align="justify">O ForPoRSC é composto de 4 ambientes. No ambiente <b>Docente</b> você irá para preencher o seu Formulário de Pontuação para dar entrada no pedido do benefício RSC. O ambiente <b>Avaliador</b> é para a Comissão Especial conferir as pontuações solicitadas, atribuindo as pontuações em cada critério conforme a conferência da documentação apresentada no Memorial Descritivo. O ambiente <b>CPPD</b> é para a gestão do andamento do processo pela CPPD e pela Diretoria de Gestão de Pessoas (DGP) do IFSC. Por fim, temos o ambiente <b>Tutorial</b> que são perguntas com respostas para sanar as principais dúvidas que possam surgir e orientá-los no uso deste aplicativo.</p>
			</div>
		</div>
	</div>

	<div style="background-color: #1A5321;">
		<BR>
		<div class="container" style="background-color: #E4EBE2;">
			<div class="row">
				<p><h2 align="center">Ambientes do aplicativo ForPoRSC</h2></p>
			</div>
			<BR>
			<div class="row">
				<div class="coluna">
					<p align="center"><a href="Docente_login.php#docentelogin"><button type="button" class="btn" style="border-radius: 8px; border: 3px solid #1A5321;; color: white; padding: 20px 35px; font-size: 20px; background-color: #1A5321;"><b>Ambiente Docente</b></button></a></p>
				</div>
				<div class="coluna">
					<p align="center"><a href="CE_login.php#CElogin"><button type="button" class="btn" style="border-radius: 8px; border: 3px solid #1A5321;; color: white; padding: 20px 30px; font-size: 20px; background-color: #1A5321;"><b>Ambiente Avaliador</b></button></a></p>
				</div>
				<div class="coluna">
					<p align="center"><a href="CPPD_login.php#CPPDlogin"><button type="button" class="btn" style="border-radius: 8px; border: 3px solid #1A5321;; color: white; padding: 20px 50px; font-size: 20px; background-color: #1A5321;"><b>Ambiente CPPD</b></button></a></p>
				</div>
				<div class="coluna">
					<p align="center"><a href="Autent_login.php#Autentlogin"><button type="button" class="btn" style="border-radius: 8px; border: 3px solid #1A5321;; color: white; padding: 20px 40px; font-size: 20px; background-color: #1A5321;"><b>Ambiente Autenticador</b></button></a></p>
				</div>
			</div>
		</div>
	</div>
<?php
	include "rodape.php";
?>
	
</body>
</html>