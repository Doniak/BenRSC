<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php
	include "cabecalho.php";
	include "conectaBD.php";
	$link = fnConectaBancoDados();
	if (!$link) {
		die('Could not connect to the database: ' . mysql_error());
	}	
	include "Tabelas.php";
	include "variaveis.php";
	include "Docente_funcoes.php";
	include "funcoes.php";
	
	$id = 0;
	if(isset($_GET["id"])) {
		$id = fnDecodeID($link,$_GET["id"],'TabDocente');
	}
?>
</head>
<body>
<?php
	if (!empty($_POST) && $id > 0) {
		$nome = $_POST['nome'];
		$siape = $_POST['siape'];
		$sipac = $_POST['sipac'];
		$datasipac = $_POST['datasipac'];

		// Atualiza o formulário de pedido RSC com o número do processo SIPAC:
		$query = "UPDATE FormularioPedidoRSC SET sipac='$sipac',dataPedido='$datasipac' WHERE siape='$siape'";
		$result = mysqli_query($link, $query);
		
		// Confere se atualizou corretamente:
		$query = "SELECT sipac FROM FormularioPedidoRSC WHERE siape='$siape'";
		$result = mysqli_query($link, $query);
		$row = mysqli_fetch_assoc($result);
		$sipacBD = $row['sipac'];
		
		$id = fnEncodeID($id);

?>
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
				</div>
			</div>
		</div>
<?php
		if (strcmp($sipac,$sipacBD) == 0) {
?>				
			<div style="background-color: #1A5321;">
				<BR>
				<div class="container" style="background-color: #E4EBE2;">
					<BR>
					<div class="row">
						<p align="left" style="color: #1A5321;">Número do processo no SIPAC salvo no banco de dados.</p>
					</div>
				</div>
			</div>
<?php
			// Envia o pedido de RSC para a CPPD fazer a análise de forma:
			$query = "SELECT siape FROM TabDocente WHERE id=$id";
			$result = mysqli_query($link, $query);
			$row = mysqli_fetch_assoc($result);
			$siape = $row['siape'];
			
			$query = "SELECT * FROM FormularioPedidoRSC WHERE siape=$siape";
			$result = mysqli_query($link, $query);
			$row = mysqli_fetch_assoc($result);			
			$docente = $row['docente'];
			$rsc = $row['rsc'];
			$email = $row['email'];
			$campus = $row['campus'];
			$NomeTabPedidoRSC = "TabPedidoRSC_" . $siape;
			$nomeTabQuadroPontos = "QuadroPontuacao_" . $siape;

			$query = "SELECT id FROM TabSolicitaRSC WHERE siape=$siape";
			$result = mysqli_query($link,$query);
			$numrows = mysqli_num_rows($result);
			if ($numrows == 0) {
				$query = "INSERT INTO TabSolicitaRSC (id,docente,siape,email,rsc,datapedido,dataMovimentacao,nomeTabCriterios,nomeTabQuadroPontos,campus,sipac,estado) VALUES (NULL,'$docente','$siape','$email','$rsc','$datasipac',CURRENT_DATE(),'$NomeTabPedidoRSC','$nomeTabQuadroPontos','$campus','$sipac','ditribuir_analise_forma')";
				$result = mysqli_query($link,$query);
				
				$query = "SELECT COUNT(*) FROM AnaliseFormaCPPD";
				$result = mysqli_query($link,$query);
				$qtde = mysqli_fetch_assoc($result);
				$qtde++;
				echo nl2br("Quantidade na tabela AnaliseFormaCPPD: " . $qtde . " registros" . "\n");
				
				$query = "INSERT INTO AnaliseFormaCPPD (id,numAnaliseForma,anoAnaliseForma,siape,sipac,status) VALUES (NULL,$qtde,YEAR(CURDATE()),'$siape','$sipac','novo')";
				$result = mysqli_query($link,$query);
?>
				<div style="background-color: #1A5321;">
					<div class="container" style="background-color: #E4EBE2;">
						<div class="row">
							<p align="left" style="color: #1A5321;">Pedido encaminhado para a análise de forma pela CPPD.</p>
						</div>
					</div>
				</div>
<?php
			}
			else {
?>
				<div style="background-color: #1A5321;">
					<div class="container" style="background-color: #E4EBE2;">
						<div class="row">
							<p align="left">Seu pedido de RSC já está em análise de forma pela CPPD.</p>
						</div>
					</div>
				</div>					
<?php
			}
		}
		else {
?>
			<div style="background-color: #1A5321;">
				<BR>
				<div class="container" style="background-color: #E4EBE2;">
					<div class="row">
						<p align="left" style="color: red;">Ocorreu um erro ao salvar o número do seu processo no SIPAC no banco de dados. Por favor, tente novamente.</p>
					</div>
				</div>
			</div>
<?php
		}
?>
		<div style="background-color: #1A5321;">
			<BR>
			<div class="container" style="background-color: #E4EBE2;">
				<BR>
				<div class="row" align="center">
					<a href="index.php"><button type="button" class="btn" style="border-radius: 8px; border: 3px solid #1A5321;; color: white; padding: 14px 32px; font-size: 18px; background-color: #1A5321;"><b>Sair</b></button></a>
				</div>
				<BR>
			</div>
		</div>
<?php
		include "botaovoltar.php";
		include "rodape.php";
	}
	else {
		header("Location: JavaScript: window.history.back();");
	}

	fnDesconectaBD($link);
?>
		
</body>
</html>