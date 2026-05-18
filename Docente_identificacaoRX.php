<head>
<?php
	include "cabecalho.php";
	include "conectaBD.php";
	$link = fnConectaBancoDados(); 
	include "Tabelas.php";
	include "funcoes.php";
	include "Docente_funcoes.php";
?>
</head>
<body>
<?php
	if(isset($_GET["id"])) {
		$id = fnDecodeID($link, $_GET["id"], 'TabDocente');

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
		$dataPedido = $row['dataPedido'];
	} 
	else {
		if(!empty($_POST)) {
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
			$senha = $_POST['senha'];
			$password = password_hash($senha, PASSWORD_DEFAULT);
			$ife = $_POST['ife'];
			
			$query = "SELECT sigla FROM TabInstitutosFederais WHERE nome='$ife'";
			$result = mysqli_query($link, $query);
			$row = mysqli_fetch_assoc($result);
			$siglaife = $row['sigla'];
			
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
				$query = "INSERT INTO TabDocente (id, nome, siape, senha, email, rsc, ife, siglaife) VALUES (NULL, '$nome', '$siape', '$password', '$email', '$rsc', '$ife','$siglaife')";
				$result = mysqli_query($link, $query) or die("Bad Query: $query");

				$query = "SELECT id FROM TabDocente WHERE siape=$siape";
				$result = mysqli_query($link, $query);
				$row = mysqli_fetch_assoc($result);
				$id = $row['id'];

				// Cria a tabela de pedido RSC - uma tabela para cada docente
				$TabPedidoRSC = "TabPedidoRSC_" . $siape;
				fnTabPedidoRSC($TabPedidoRSC,$link);
				
				// Cria a tabela Quadro de Pontuação RSC para cada nível e diretriz - uma tabela para cada docente
				$QuadroPontos = "QuadroPontuacao_" . $siape;
				fnQuadroPontosDocente($QuadroPontos,$link);
				fnIniciaQuadroPontos($QuadroPontos,$siape,$link); // inicializa a tabela com valores zerados		

				// Tabela FormularioPedidoRSC
				$query = "INSERT INTO FormularioPedidoRSC (id,docente,siape,nasc,email,campus,telefone,portariaRT,dataRT,ingrservpub,ingrifsc,rsc,classe,ife) VALUES (NULL,'$nome','$siape','$nasc','$email','$campus','$telefone','$portariaRT','$dataRT','$ingrservpub','$ingrifsc','$rsc','$classe','$ife')";
				$result = mysqli_query($link, $query) or die("Bad Query: $query");

				fnDesconectaBD($link);
				$idCoded = fnEncodeID($id);
				header("Location: Docente_inicio.php?id=$idCoded");
				exit;
			}
		}
	}
	include "botaovoltar.php";
	include "rodape.php";
	fnDesconectaBD($link);
?>
</body>
</html>
