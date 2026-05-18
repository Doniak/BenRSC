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
	if(!empty($_POST) && isset($_GET["id"])) {
		$id = fnDecodeID($link,$_GET["id"],'TabDocente');
		$nome = $_POST['nome'];
		$siape = $_POST['siape'];
		$email = $_POST['email'];
		$nasc = $_POST['nasc'];
		$campus = $_POST['campus'];
		$telefone = $_POST['telefone'];
		$portariaRT = $_POST['RTportaria'];
		$dataRT = $_POST['dataRTportaria'];
		$ingrservpub = $_POST['ingrservpub'];
		$ingrifsc = $_POST['ingrifsc'];
		$classe = $_POST['classe'];
		$rsc = $_POST['rsc'];
		$ife = $_POST['ife'];
		$senha = $_POST['senha'];
		$password = password_hash($senha, PASSWORD_DEFAULT);
			
		$nivelRSC_OK = 0;
		if ((strcmp("RSC-I",$rsc) == 0) || (strcmp("RSC-II",$rsc) == 0) || (strcmp("RSC-III",$rsc) == 0)) {
			$nivelRSC_OK = 1;
	//		echo nl2br("Nível RSC OK: " . $nivelRSC_OK . "\n");
		}
		if ($nivelRSC_OK == 0) {
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
						<p><h2 align="center" style="color: #1A5321;"><b>Formulário de Solicitação para o<BR>Reconhecimento de Saberes e Competências - RSC</b></h2></p>
					</div>
					<div class="row">
						<p><h3 align="center" style="color: #1A5321;"><b>Cadastro da sua conta</b></h3></p>
					</div>
				</div>
			</div>
			<div style="background-color: #1A5321;">
				<BR>
				<div class="container" style="background-color: #E4EBE2;">
					<div class="row">
						<div class="coluna">
							<p align="justify">Você não preencheu corretamente o nível de Reconhecimento de Saberes e Competências corretamente. Por gentileza, volte a página de cadastro e revise novamente suas informações.</p>
						</div>
					</div>
				</div>
			</div>
<?php
		} else {
			// Tabela Docente
			$query = "UPDATE TabDocente SET nome='$nome',siape='$siape',senha='$password',email='$email',rsc='$rsc',ife='$ife' WHERE id=$id";
			$result = mysqli_query($link, $query) or die("Bad Query: $query");

			// Tabela FormularioPedidoRSC
			$query = "UPDATE FormularioPedidoRSC SET docente='$nome', nasc='$nasc', email='$email', campus='$campus', telefone='$telefone', portariaRT='$portariaRT', dataRT='$dataRT', ingrservpub='$ingrservpub', ingrifsc='$ingrifsc', rsc='$rsc', classe='$classe', ife='$ife' WHERE siape='$siape'";
			$result = mysqli_query($link, $query) or die("Bad Query: $query");

			fnDesconectaBD($link);
			$idCoded = fnEncodeID($id);
			header("Location: Docente_inicio.php?id=$idCoded");
			exit;
		}
	}
	include "botaovoltar.php";
	include "rodape.php";
	fnDesconectaBD($link);
?>
</body>
</html>
