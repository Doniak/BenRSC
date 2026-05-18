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
				<h5 align="center" style="color: #1A5321;">Veja os documentos que já foram autenticados</h5>
			</div>
			<BR>
		</div>
	</div>

	<div style="background-color: #1A5321;">
		<div class="container" style="background-color: #E4EBE2;">
			<table align='justify' width="100%" style="background-color: #E4EBE2; border: 4px solid; border-color: #1A5321;">
			<tr align="center" style="border: 3px solid; border-color: #1A5321;">
				<th align="center" style="font-size: 14px;">Documento</th>
				<th align="center" style="font-size: 14px;">Autenticador</th>
				<th align="center" style="font-size: 14px;">E-mail</th>
				<th align="center" style="font-size: 14px;">Instituto Federal<BR>de Educação</th>
				<th align="center" style="font-size: 14px;">Data da<BR>autenticação</th>
			</tr>
<?php 
			$query = "SELECT documento,emailAuth,dataAutenticacao,authPronta FROM TabDocAutenticar";
			$result = mysqli_query($link, $query);
			while($row = mysqli_fetch_assoc($result)) {
				$documento = $row['documento'];
				$dataAuth = fnFormatoData($row['dataAutenticacao']);
				$emailAuth = $row['emailAuth'];
				$authPronta = $row['authPronta'];

//					echo nl2br("Criterio: " . $nomecriterio . "\n");

				if ($authPronta > 0) {	
					$query = "SELECT nome,siglaife FROM TabAutenticador WHERE email='$emailAuth'";
					$res2 = mysqli_query($link, $query);
					$linha2 = mysqli_fetch_assoc($res2);
					$autenticador = $linha2['nome'];
					$siglaife = $linha2['siglaife'];					
?>
					<tr align="left" style="border: 1px solid; border-color: #1A5321;">
						<td align="center"><?php echo $documento;?></td>
						<td align="center"><?php echo $autenticador;?></td>
						<td align="center"><?php echo $emailAuth;?></td>
						<td align="center"><?php echo $siglaife;?></td>
						<td align="center"><?php echo $dataAuth;?></td>
					</tr>
<?php
				}
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