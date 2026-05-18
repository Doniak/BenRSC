<!doctype html>
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
				<h5 align="center" style="color: #1A5321;">Veja os documentos que você solicitou autenticação e ainda não foram autenticados</h5>
			</div>
			<BR>
		</div>
	</div>

	<div style="background-color: #1A5321;">
		<div class="container" style="background-color: #E4EBE2;">
			<div class="row">
				<p><h2 align="center" style="color: #1A5321;">Documentação Comprobatória</h2></p>
			</div>
<?php
			if ($id > 0) {
				$query = "SELECT siape FROM TabDocente WHERE id=$id";
				$result = mysqli_query($link, $query); 
				$row = mysqli_fetch_assoc($result);
				$siape = $row['siape'];
				$TabPedidoRSC = "TabPedidoRSC_" . $siape;

				$query = "SELECT criterio,nomecriterio,emailAuth FROM $TabPedidoRSC WHERE arquivoauth = 0";
				$result = mysqli_query($link, $query);
?>
				
				<table align='justify' width="100%" style="background-color: #E4EBE2; border: 4px solid; border-color: #1A5321;">
				<tr align="center" style="border: 3px solid; border-color: #1A5321;">
					<th align="center" style="font-size: 14px;">Nº critério</th>
					<th align="center" style="font-size: 14px;">Critério</th>
					<th align="center" style="font-size: 14px;">Autenticador</th>
					<th align="center" style="font-size: 14px;">E-mail</th>
					<th align="center" style="font-size: 14px;">Instituto Federal<BR>de Educação</th>
					<th align="center" style="font-size: 14px;">Data da<BR>solicitação</th>
				</tr>
<?php 
				while($row = mysqli_fetch_assoc($result)) {
					$criterio = $row['criterio'];
					$nomecriterio = $row['nomecriterio'];
					$emailAuth = $row['emailAuth'];
					
//					echo nl2br("Criterio: " . $nomecriterio . "\n");
//					echo nl2br("Email: " . $emailAuth . "\n");

					$query = "SELECT dataSolicitacao,authPronta FROM TabDocAutenticar WHERE documento = '$nomecriterio' AND emailAuth = '$emailAuth'";
					$res1 = mysqli_query($link, $query);
					$linha1 = mysqli_fetch_assoc($res1);
					$dataSolic = $linha1['dataSolicitacao'];
					$authPronta = $linha1['authPronta'];
					
					if ($authPronta == 0) {	
						$query = "SELECT nome,siglaife FROM TabAutenticador WHERE email='$emailAuth'";
						$res2 = mysqli_query($link, $query);
						$linha2 = mysqli_fetch_assoc($res2);
						$autenticador = $linha2['nome'];
						$siglaife = $linha2['siglaife'];					
?>
						<tr align="left" style="border: 1px solid; border-color: #1A5321;">
							<td align="center"><?php echo $criterio;?></td>
							<td align="left"><?php echo $nomecriterio;?></td>
							<td align="center"><?php echo $autenticador;?></td>
							<td align="center"><?php echo $emailAuth;?></td>
							<td align="center"><?php echo $siglaife;?></td>
							<td align="center"><?php echo fnFormatoData($dataSolic);?></td>
						</tr>
<?php
					}
				} // end while 
?>
				</table>
				<BR>
				
<?php 	
			} // end if ($id > 0) 
?>
		</div>
	</div>

	<div style="background-color: #1A5321;">
		<div class="container" style="background-color: #E4EBE2;">
			<div class="row">
				<p><h2 align="center" style="color: #1A5321;">Itinerário de Formação</h2></p>
			</div>
<?php
			if ($id > 0) {
				$query = "SELECT siape FROM TabDocente WHERE id=$id";
				$result = mysqli_query($link, $query); 
				$row = mysqli_fetch_assoc($result);
				$siape = $row['siape'];
				$nomeTab = "TabItinerario_" . $siape;
				
				$query = "SELECT documento,arquivoauth,emailAuth FROM $nomeTab";
				$result = mysqli_query($link, $query);
?>
				
				<table align='justify' width="100%" style="background-color: #E4EBE2; border: 4px solid; border-color: #1A5321;">
				<tr align="center" style="border: 3px solid; border-color: #1A5321;">
					<th align="center" style="font-size: 14px;">Documento</th>
					<th align="center" style="font-size: 14px;">Autenticador</th>
					<th align="center" style="font-size: 14px;">E-mail</th>
					<th align="center" style="font-size: 14px;">Instituto Federal<BR>de Educação</th>
					<th align="center" style="font-size: 14px;">Data da<BR>solicitação</th>
				</tr>
<?php 
				while($row = mysqli_fetch_assoc($result)) {
					$documento = $row['documento'];
					$arquivoauth = $row['arquivoauth'];
					$emailAuth = $row['emailAuth'];
					if ($arquivoauth == 0) {
						$query = "SELECT idAuth,dataSolicitacao,authPronta FROM TabDocAutenticar WHERE documento='$documento' AND emailAuth='$emailAuth'";
						$res1 = mysqli_query($link, $query);
						$linha1 = mysqli_fetch_assoc($res1);
						$idAuth = $linha1['idAuth'];
						$dataSolic = $linha1['dataSolicitacao'];
						$authPronta = $linha1['authPronta'];
						
						if ($authPronta == 0) {
							$query = "SELECT nome,siglaife FROM TabAutenticador WHERE email='$emailAuth'";
							$res2 = mysqli_query($link, $query);
							$linha2 = mysqli_fetch_assoc($res2);
							$autenticador = $linha2['nome'];
							$siglaife = $linha2['siglaife'];
?>
							<tr align="left" style="border: 1px solid; border-color: #1A5321;">
								<td align="left"><?php echo $documento;?></td>
								<td align="center"><?php echo $autenticador;?></td>
								<td align="center"><?php echo $emailAuth;?></td>
								<td align="center"><?php echo $siglaife;?></td>
								<td align="center"><?php echo fnFormatoData($dataSolic);?></td>
							</tr>
<?php
						}
					}
				} // end while 
?>
				</table>
				<BR>
				
<?php 	
			} // end if ($id > 0) 
?>
		</div>
	</div>

<?php 
	fnDesconectaBD($link);
	include "botaovoltar.php";
	include "rodape.php"; 
?>

</body>
</html>