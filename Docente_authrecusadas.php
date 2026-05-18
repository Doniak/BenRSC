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
				<p><h1 align="center" style="color: #1A5321;">Reconhecimento de Saberes e Competências</h1></p>
				<h5 align="center" style="color: #1A5321;"><b>Veja as suas solicitações de autenticações recusadas</b></h5>
			</div>
			<BR>
		</div>
	</div>

	<div style="background-color: #1A5321;">
		<div class="container" style="background-color: #E4EBE2;">
		<BR>
<?php
			$query = "SELECT nome FROM TabDocente WHERE id='$id'";
			$result = mysqli_query($link, $query) or die("Bad Query: $query");
			$row = mysqli_fetch_assoc($result);
			$docente = $row['nome'];
			
			$query = "SELECT idAuth,documento,dataSolicitacao,dataAutenticacao FROM TabDocAutenticar WHERE docente='$docente' AND authPronta = -1 ORDER BY dataAutenticacao";
			$result = mysqli_query($link, $query);
?>
			<table align='center' width="100%" style="background-color: #E4EBE2; border: 4px solid; border-color: #1A5321;" cellpadding="8px">
			<tr align="center" style="border: 3px solid; border-color: #1A5321;">
				<th align="center" style="font-size: 14px;">Documento</th>
				<th align="center" style="font-size: 14px;">Autenticador</th>
				<th align="center" style="font-size: 14px;">E-mail do<BR>Autenticador</th>
				<th align="center" style="font-size: 14px;">Data da<BR>solicitação</th>
				<th align="center" style="font-size: 14px;">Data da<BR>visualização</th>
			</tr>
<?php 
			while($row = mysqli_fetch_assoc($result)) {
				$idAuth = $row['idAuth'];
				$documento = $row['documento'];
				$dataSolic = fnFormatoData($row['dataSolicitacao']);
				$dataAuth = fnFormatoData($row['dataAutenticacao']);
				
				$query = "SELECT nome,email FROM TabAutenticador WHERE id=$idAuth";
				$res = mysqli_query($link, $query);
				$linha = mysqli_fetch_assoc($res);
				$nomeAuth = $linha['nome'];
				$emailAuth = $linha['email'];
?>
				<tr align="left" style="border: 1px solid; border-color: #1A5321;">
					<td align="left"><?php echo $documento;?></td>
					<td align="center"><?php echo $nomeAuth;?></td>
					<td align="center"><?php echo $emailAuth;?></td>
					<td align="center"><?php echo $dataSolic;?></td>
					<td align="center"><?php echo $dataAuth;?></td>
				</tr>
<?php
			} // end while 
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