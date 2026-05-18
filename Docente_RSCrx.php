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
	$id = 0;
	if(isset($_GET["id"])) {
		$id = fnDecodeID($link,$_GET["id"],'TabDocente');
	}
//	echo $id . PHP_EOL;

	if (!empty($_POST) && $id > 0) {
		$criterio = intval(htmlspecialchars($_POST["criterio"]),10);
		$query = "SELECT * FROM TabRSC WHERE criterio=$criterio";
		$result = mysqli_query($link, $query);
		while ($row = mysqli_fetch_assoc($result)) {
			$nomecriterio = $row['nomecriterio'];
			$fatorpontuacao = number_format($row['fatorpontuacao'],2);
			$unidade = $row['unidade'];
			$qtdemaxunid = $row["qtdemaxunid"];
			$nivel = $row["nivel"];
			$diretriz = $row["diretriz"];
		}
		$nomecriterio = htmlspecialchars($_POST["nomecriterio"]);
		
		// procura pelo número SIAPE do docente para vincular com a tabela de pontuação
		$query = "SELECT siape FROM TabDocente WHERE id=$id";
		$result = mysqli_query($link, $query);
		$row = mysqli_fetch_assoc($result);
		$siape = $row['siape'];
		// Cria a tabela de pontuação se ela não existir
		$TabPedidoRSC = "TabPedidoRSC_" . $siape;
		fnTabPedidoRSC($TabPedidoRSC,$link);		
		
		$fatorpontuacao = htmlspecialchars($_POST["fatorpontuacao"]);
		$unidade = htmlspecialchars($_POST["unidade"]);
		$datadoc = $_POST["datadoc"];
		$qtdeunidades = intval(htmlspecialchars($_POST["qtdeunidades"]),10);
		
		// Proteção para não ultrapassar os limites definidos
		if ($qtdeunidades > $qtdemaxunid) {
			$qtdeunidades = $qtdemaxunid;
		}
		$pontrequerida = $qtdeunidades * $fatorpontuacao;
		
		$arquivo = $_FILES["arquivo"];
		//var_dump($arquivo);
		$extensao = strtolower(pathinfo($arquivo["name"],PATHINFO_EXTENSION));
		
		// Tamanho máximo de cada arquivo é de 2MB
		// 1024 bytes = 1kB e 1024*1024 = 1 MB
		$tamarquivo = intval(($arquivo["tmp_name"]));
		if ($tamarquivo > 2097152) {
?>
			<div style="background-color:#1A5321;">
				<div class="container bg-transparent">
<?php 
					$id = fnEncodeID($id);
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
				<BR>
				<div class="container" style="background-color: #E4EBE2;">
					<div class="row">
						<h3 align="center" style="color: #c8411e;">Arquivo com tamanho muito grande</h3>
						<h2 align="center" style="color: #1A5321;">O tamanho máximo aceito é de até 2MB</h2>
						<p align="center">
							<a href="JavaScript: window.history.back();">
							<button type="button" class="btn" style="border-radius: 8px; border: 3px solid #1A5321;; color: white; padding: 14px 30px; font-size: 18px; background-color: #1A5321;"><b>Voltar</b></button></a>
						</p>
					</div>
				</div>
			</div>
<?php
			include "botaovoltar.php";
			include "rodape.php";
//			echo nl2br("Arquivo muito grande, o tamanho máximo é de 2 MB.");
		} else {
			if ($extensao != "jpg" && $extensao != "png") {
?>
				<div style="background-color:#1A5321;">
					<div class="container bg-transparent">
<?php
						$id = fnEncodeID($id);
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
					<BR>
					<div class="container" style="background-color: #E4EBE2;">
						<div class="row">
							<h3 align="center" style="color: #c8411e;">Formato de arquivo inválido</h3>
							<h2 align="center" style="color: #1A5321;">Os formatos aceitos são: jpg e png</h2>
							<p align="center">
								<a href="JavaScript: window.history.back();">
								<button type="button" class="btn" style="border-radius: 8px; border: 3px solid #1A5321;; color: white; padding: 14px 30px; font-size: 18px; background-color: #1A5321;"><b>Voltar</b></button></a>
							</p>
						</div>
					</div>
				</div>
<?php
				include "botaovoltar.php";
				include "rodape.php";
			}
			else {
				if (strcmp($arquivo["tmp_name"],"") == 0) {
?>
				<div style="background-color:#1A5321;">
					<div class="container bg-transparent">
<?php 
						$id = fnEncodeID($id);
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
					<BR>
					<div class="container" style="background-color: #E4EBE2;">
						<div class="row">
							<p><h3 align="justify" style="color: #c8411e;">Ocorreu um erro ao salvar o arquivo no banco de dados. Recomendamos salvar com outro nome e depois tentar novamente.</h3></p>
							<p align="center">
								<a href="JavaScript: window.history.back();">
								<button type="button" class="btn" style="border-radius: 8px; border: 3px solid #1A5321;; color: white; padding: 14px 30px; font-size: 18px; background-color: #1A5321;"><b>Voltar</b></button></a>
							</p>
						</div>
					</div>
				</div>
<?php
				include "botaovoltar.php";
				include "rodape.php";				
				}
				else
				{
					// converte o arquivo para o formato blob
					$arquivo_blob = addslashes(file_get_contents($arquivo['tmp_name']));

					$query = "INSERT INTO $TabPedidoRSC (id, siape, criterio, nomecriterio, datadoc, qtdeunidades, pontuacaorequerida,fatorpontuacao, unidade, nivel, diretriz, arquivo, tipoarquivo,arquivoauth) VALUES (NULL, '$siape', $criterio, '$nomecriterio','$datadoc',$qtdeunidades,$pontrequerida,$fatorpontuacao, '$unidade','$nivel','$diretriz','$arquivo_blob','$extensao',-1)";
					$res = mysqli_query($link, $query) or die("Bad Query: $query");
					fnDesconectaBD($link);
					$id = fnEncodeID($id);
					header("Location: Docente_planilhapont.php?id=$id");
					exit;
				}
			}
		}
	}
	fnDesconectaBD($link);
	$id = fnEncodeID($id);
	//header("Location: index.php");
?>	
</body>
</html>