<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php
	include "cabecalho.php";
	include "conectaBD.php";
	$link = fnConectaBancoDados();
	include "Tabelas.php";
	include "variaveis.php";
	include "Docente_funcoes.php";
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
				<p><h1 align="center">Memorial Descritivo</h1></p>
				<p><h3 align="center">Estamos preparando o seu memorial para impressão</h3></p>
			</div>
		</div>
	</div>
	
<?php
	$pagina = 1;

	$pathservidor = "http://localhost:81/RSC/";

	$query = "SELECT nome,siape,rsc FROM TabDocente WHERE id=$id";
	$result = mysqli_query($link, $query);
	$row = mysqli_fetch_assoc($result);
	$nome = $row['nome'];
	$siape = $row['siape'];
	$rsc = $row['rsc'];
	$TabPedidoRSC = "TabPedidoRSC_" . $siape;

	$query = "SELECT * FROM FormularioPedidoRSC WHERE siape=$siape";
	$result = mysqli_query($link, $query);
	$row = mysqli_fetch_assoc($result);
	$email = $row['email'];
	$campus = $row['campus'];
	$telefone = $row['telefone'];
	$nasc = $row['nasc'];
	$classe = $row['classe'];
//	$nivel = $row['nivel'];
	$portariaRT = $row['portariaRT'];
	$dataRT = $row['dataRT'];
	$ingrservpub = $row['ingrservpub'];
	$ingrifsc = $row['ingrifsc'];
	
	$imagem = $pathservidor . "images/IFSC_horizontal.png";
	
	$cabecalho = "<html><head></head><body>";

	$cabecalho .= "
	<div style='background-color: #1A5321;'>
		<BR>
		<div class='container' style='background-color: whitesmoke;'>
			<div class='row'>
				<p align='center'><img src=$imagem width='40%'></p>
			</div>
		</div>
	</div>";
	
	$diahoje = date("d");
	$meshoje = fnNomeMes(date("m"));
	$anohoje = date("Y");
	$cabecalho .= "<div style='background-color: #1A5321; page-break-after: always;'>
		<div class='container' style='background-color: #E4EBE2;'>
			<div class='row'>
				<p><h2 align='center' style='color: #1A5321;'><b>Memorial Descritivo</b></h2></p>
				<p><h3 align='center' style='color: #1A5321;'>Solicitação de<BR><b>Reconhecimento de Saberes e Competências (RSC)</b><BR>na carreira EBTT</h3></p><BR>
				<p align='left' style='padding-left: 120px;'>Nome: &nbsp; <b>$nome</b></p>
				<p align='left' style='padding-left: 120px;'>Matrícula Siape: &nbsp; <b>$siape</b></p>
				<p align='left' style='padding-left: 120px;'>Campus: &nbsp; <b>$campus</b></p>
				<p align='left' style='padding-left: 120px;'>E-mail: &nbsp; <b>$email</b></p>
				<BR><BR><BR><BR>
				<p align='center'>Florianópolis, $diahoje de $meshoje de $anohoje.</p>
			</div>
		</div>
	</div>";
	$pagina++;
	$cabecalho .= "<div style='background-color: #1A5321; page-break-after: always;'><BR>
		<div class='container' style='background-color: #E4EBE2;'>
			<div class='row'>
				<p><h2 align='center' style='color: #1A5321;'><b>Formulário para Solicitação de RSC</b></h2></p><BR>
			</div>
			<div class='row'>
				<div class='coluna'>
					<span align='left' style='padding-left: 40px;'>Nome: &nbsp; <b>$nome</b></span>
				</div>
				<div class='coluna'>
					<span align='left' style='padding-left: 40px;'>Matrícula Siape: &nbsp; <b>$siape</b></span>
				</div>
			</div>
			<div class='row'>
				<div class='coluna'>
					<span align='left' style='padding-left: 40px;'>Campus: &nbsp; <b>$campus</b></span>
				</div>
				<div class='coluna'>
					<span align='left' style='padding-left: 40px;'>Data de nascimento: &nbsp; <b>$nasc</b></span>
				</div>
			</div>
			<div class='row'>
				<div class='coluna'>
					<span align='left' style='padding-left: 40px;'>E-mail: &nbsp; <b>$email</b></span>
				</div>
				<div class='coluna'>
					<span align='left' style='padding-left: 40px;'>Telefone: &nbsp; <b>$telefone</b></span>
				</div>
			</div>
			<BR>
			<div class='row'>
				<span align='left' style='padding-left: 50px;'><b>Retribuição por titulação:</b></span>
				<div class='coluna'>
					<span align='left' style='padding-left: 40px;'>Nº da portaria: &nbsp; <b>$portariaRT</b></span>
				</div>
				<div class='coluna'>
					<span align='left' style='padding-left: 40px;'>Data da portaria: <b>$dataRT</b></span>
				</div>
			</div>
			<div class='row'>
				<div class='coluna'>
					<span align='left' style='padding-left: 40px;'>Classe da carreira: &nbsp; <b>$classe</b></span>
				</div>
			</div>
			<div class='row'>
				<div class='coluna'>
					<span align='left' style='padding-left: 40px;'>Data de ingresso no serviço público federal: &nbsp; <b>$ingrservpub</b>
				</div>
				<div class='coluna'>
					<span align='left' style='padding-left: 40px;'>Data de ingresso no IFSC:  &nbsp; <b>$ingrifsc</b></span>
				</div>
			</div>
			<div class='row'>
				<span align='left' style='padding-left: 40px;'>Nível de RSC solicitado:  &nbsp; <b>$rsc</b></span>
			</div>
			<BR><BR><BR><BR>
			<div class='row'>
				<div class='coluna'>
					<p align='center'>__________________________________________________
					<BR>$nome</p>
				</div>
				<BR><BR><BR><BR>
				<div class='coluna'>
					<p align='center'>__________________________________________________
					<BR>Assinatura e carimbo do diretor do campus</p>
				</div>
			</div>
			<BR><BR><BR><BR>
			<div class='row'>
				<p align='right'>Florianópolis, $diahoje de $meshoje de $anohoje.</p>
			</div>
		</div>
	</div>";

	$pagina++;
	$sumario = "
		<div style='background-color: #1A5321; page-break-after: always;'><BR>
			<div class='container' style='background-color: #E4EBE2;'>
				<div class='row'>
					<h2 align='center' style='color: #1A5321;'><b>Sumário</b></h2><BR>
				</div>
				";
	$sumario .= "<table width='100%' style='border: 2px solid #1A5321'>";
	
	// Itinerário de Formação - Apresentação de diplomas e certificados que são requisitos para o RSC requerido
	$pagina++;
	$desc = "Itinerário de Formação";
	$dados = "
		<div style='background-color: #1A5321; page-break-after: always;'>
			<div class='row'>
				<p align='right' style='color: white;'> página - $pagina</p>
			</div>
			<div class='container' style='background-color: #E4EBE2;'>
				<div class='row'>
					<p><h1 align='center' style='color: #1A5321;'><b>Itinerário de Formação</b></h1></p><BR>
				</div>
			</div>
		  </div>";
	$sumario .= fnSumario($desc,$pagina);
	
	$query = "SELECT * FROM TabFormacao WHERE siape='$siape'";
	$res = mysqli_query($link, $query); 
	$nrlinhas = mysqli_num_rows($res);
	if ($nrlinhas > 0) {
		$rows = mysqli_fetch_assoc($res);
		$graduacao = intval($rows["graduacao"]);
		$especializacao = intval($rows["especializacao"]);
		$mestrado = intval($rows["mestrado"]);
		$experiencia = intval($rows["experiencia"]);
		$descricao = $rows['descricao'];
		
		if (strcmp($descricao,NULL) != 0) {
			$pagina++;
			$dados .= " <div style='background-color: #1A5321; page-break-after: always;'>
							<div class='row'>
								<p align='right' style='color: white;'> página - $pagina</p>
							</div>
							<div class='container' style='background-color: #E4EBE2;'>
								<div class='row'>
									<p><h2 align='center' style='color: #32A041;'>Descrição da experiência profissional</h2></p>
								</div>
								<div class='row'>
									<textarea rows='20' margin-left='10px' margin-right='10px' readonly>$descricao</textarea>
								</div>
								<BR>
							</div>
						</div>";
			$desc = "Descrição da experiência profissional";
			$sumario .= fnSumario($desc,$pagina);
			
			$nomeTab = "TabItinerario_" . $siape;
			$query = "SELECT arquivo,tipoarquivo FROM $nomeTab WHERE documento='Experiência profissional'";
			$result = mysqli_query($link, $query); 
			$linhas = mysqli_num_rows($result);
			if ($linhas > 0) {
				$ncount = 1;
				while ($row = mysqli_fetch_assoc($result)) {
					$arquivo = base64_encode($row['arquivo']);
					$extensao = $row['tipoarquivo'];
					$filename = 'memorial/experiencia_' . $ncount . "." .$extensao;
					file_put_contents($filename, $row['arquivo']);
					$ncount++;
					$imagem = $pathservidor . $filename;
					$mostraarquivo = "<img src=$imagem . width='75%' style='border: 2px solid black;'/>";
					$pagina++;
					$descricao = "Comprovação de Experiência Profissional";
					$dados .= fnMostraArquivo($descricao,$imagem,$pagina);
				}				
			}
		}
		
		if ($graduacao > 0) {
			$nomeTab = "TabItinerario_" . $siape;
			$query = "SELECT arquivo,tipoarquivo FROM $nomeTab WHERE documento='Graduação'";
			$result = mysqli_query($link, $query); 
			$linhas = mysqli_num_rows($result);
			if ($linhas > 0) {
				$pagina++;
				$dados .= "<div style='background-color: #1A5321; page-break-after: always;'>
								<div class='row'>
									<p align='right' style='color: white;'> página - $pagina</p>
								</div>
								<div class='container' style='background-color: #E4EBE2;'>
									<div class='row'>
										<p><h2 align='center' style='color: #32A041;'>Graduação</h2></p>
									</div>
								</div>
							</div>";
				$desc = "Graduação";
				$sumario .= fnSumario($desc,$pagina);

				$ncount = 1;
				while ($row = mysqli_fetch_assoc($result)) {
					$arquivo = base64_encode($row['arquivo']);
					$extensao = $row['tipoarquivo'];
					$filename = 'memorial/graduacao_' . $ncount . "." .$extensao;
					file_put_contents($filename, $row['arquivo']);
					$ncount++;
					$imagem = $pathservidor . $filename;
					$mostraarquivo = "<img src=$imagem . width='75%' style='border: 2px solid black;'/>";
					$pagina++;
					$descricao = "Diploma de Graduação";
					$dados .= fnMostraArquivo($descricao,$imagem,$pagina);
				}				
			}
		}
		if ($especializacao > 0) {
			$nomeTab = "TabItinerario_" . $siape;
			$query = "SELECT arquivo,tipoarquivo FROM $nomeTab WHERE documento='Especialização'";
			$result = mysqli_query($link, $query); 
			$linhas = mysqli_num_rows($result);
			if ($linhas > 0) {
				$pagina++;
				$dados .= "<div style='background-color: #1A5321; page-break-after: always;'>
								<div class='row'>
									<p align='right' style='color: white;'> página - $pagina</p>
								</div>
								<div class='container' style='background-color: #E4EBE2;'>
									<div class='row'>
										<p><h2 align='center' style='color: #32A041;'>Especialização</h2></p>
									</div>
								</div>
						  </div>";
				$desc = "Especialização";
				$sumario .= fnSumario($desc,$pagina);
				
				$ncount = 1;
				while ($row = mysqli_fetch_assoc($result)) {
					$arquivo = base64_encode($row['arquivo']);
					$extensao = $row['tipoarquivo'];
					$filename = 'memorial/especializacao_' . $ncount . "." .$extensao;
					file_put_contents($filename, $row['arquivo']);
					$ncount++;
					$imagem = $pathservidor . $filename;
					$mostraarquivo = "<img src=$imagem . width='75%' style='border: 2px solid black;'/>";
					$pagina++;
					$descricao = "Certificado de Especialização";
					$dados .= fnMostraArquivo($descricao,$imagem,$pagina);
				}				
			}
		}
		if ($mestrado > 0) {
			$nomeTab = "TabItinerario_" . $siape;
			$query = "SELECT arquivo,tipoarquivo FROM $nomeTab WHERE documento='Mestrado'";
			$result = mysqli_query($link, $query); 
			$linhas = mysqli_num_rows($result);
			if ($linhas > 0) {
				$pagina++;
				$dados .= "<div style='background-color: #1A5321; page-break-after: always;'>
								<div class='row'>
									<p align='right' style='color: white;'> página - $pagina</p>
								</div>
								<div class='container' style='background-color: #E4EBE2;'>
									<div class='row'>
										<p><h2 align='center' style='color: #32A041;'>Mestrado</h2></p>
									</div>
								</div>
							</div>";
				$desc = "Mestrado";
				$sumario .= fnSumario($desc,$pagina);

				$ncount = 1;
				while ($row = mysqli_fetch_assoc($result)) {
					$arquivo = base64_encode($row['arquivo']);
					$extensao = $row['tipoarquivo'];
					$filename = 'memorial/mestrado_' . $ncount . "." .$extensao;
					file_put_contents($filename, $row['arquivo']);
					$ncount++;
					$imagem = $pathservidor . $filename;
					$mostraarquivo = "<img src=$imagem . width='75%' style='border: 2px solid black;'/>";
					$pagina++;
					$descricao = "Diploma de Mestrado";
					$dados .= fnMostraArquivo($descricao,$imagem,$pagina);
				}				
			}
		}
		if ($experiencia > 0) {
			$nomeTab = "TabItinerario_" . $siape;
			$query = "SELECT arquivo,tipoarquivo FROM $nomeTab WHERE documento='Experiência'";
			$result = mysqli_query($link, $query); 
			$linhas = mysqli_num_rows($result);
			if ($linhas > 0) {
				$pagina++;
				$dados .= "<div style='background-color: #1A5321; page-break-after: always;'>
								<div class='row'>
									<p align='right' style='color: white;'> página - $pagina</p>
								</div>
								<div class='container' style='background-color: #E4EBE2;'>
									<div class='row'>
										<p><h2 align='center' style='color: #32A041;'>Documentos da experiência profissional</h2></p>
									</div>
								</div>
							</div>";
				$desc = "Documentos da experiência profissional";
				$sumario .= fnSumario($desc,$pagina);

				$ncount = 1;
				while ($row = mysqli_fetch_assoc($result)) {
					$arquivo = base64_encode($row['arquivo']);
					$extensao = $row['tipoarquivo'];
					$filename = 'memorial/experiencia_' . $ncount . "." .$extensao;
					file_put_contents($filename, $row['arquivo']);
					$ncount++;
					$imagem = $pathservidor . $filename;
					$mostraarquivo = "<img src=$imagem . width='75%' style='border: 2px solid black;'/>";
					$pagina++;
					$descricao = "Comprovante de experiência profissional";
					$dados .= fnMostraArquivo($descricao,$imagem,$pagina);
				}				
			}
		}
	}

	// DOCUMENTOS COMPROBATÓRIOS
	// RSC-1
	$query = "SELECT criterio,nomecriterio,nivel,arquivo,tipoarquivo FROM $TabPedidoRSC WHERE nivel='RSCI' ORDER BY criterio";
	$result = mysqli_query($link, $query);
	$linhas = mysqli_num_rows($result);
//	echo nl2br("Nome da tabela: " .$TabPedidoRSC .   "\n");
//	echo nl2br("Linhas: " .$linhas .   "\n");
	if ($linhas > 0) {
		$pagina++;
		$dados .= "<div style='background-color: #1A5321; page-break-after: always;'>
						<div class='row'>
							<p align='right' style='color: white;'> página - $pagina</p>
						</div>
						<div class='container' style='background-color: #E4EBE2;'>
							<div class='row'>
								<p><h2 align='center' style='color: #1A5321;'><b>Documentação comprobatória</b></h2></p>
								<p><h3 align='center' style='color: #1A5321;'><b>Nível RSC-1</b></h3></p><BR>
							</div>
						</div>
					</div>";
	
		$ncount = 1;
		while ($row = mysqli_fetch_assoc($result)) {
			$criterio = $row['criterio'];
			$nomecriterio = $row['nomecriterio'];
			$nivel = $row['nivel'];
			$arquivo = base64_encode($row['arquivo']);
			$extensao = $row['tipoarquivo'];
			$filename = 'memorial/' . $nivel . "_" . $ncount . "." . $extensao;
			file_put_contents($filename, $row['arquivo']);
			$ncount++;
			
			$imagem = $pathservidor . $filename;
			$mostraarquivo = "<img src=$imagem . width='75%'/>";
			$pagina++;
			$descricao = $criterio . " - " . $nomecriterio;
			$dados .= fnMostraArquivo($descricao,$imagem,$pagina);
			$desc = $nivel . ' - Critério: ' . $criterio . ' - ' . $nomecriterio;
			$sumario .= fnSumario($desc,$pagina);
		}
	}
	
	// RSC-2
	$query = "SELECT criterio,nomecriterio,nivel,arquivo,tipoarquivo FROM $TabPedidoRSC WHERE nivel='RSCII' ORDER BY criterio";
	$result = mysqli_query($link, $query);
	$linhas = mysqli_num_rows($result);
	if ($linhas > 0) {
		$pagina++;
		$dados .= "<div style='background-color: #1A5321; page-break-after: always;'>
						<div class='row'>
							<p align='right' style='color: white;'> página - $pagina</p>
						</div>
						<div class='container' style='background-color: #E4EBE2;'>
							<div class='row'>
								<p><h2 align='center' style='color: #1A5321;'><b>Documentação comprobatória</b></h2></p>
								<p><h3 align='center' style='color: #1A5321;'><b>Nível RSC-2</b></h3></p><BR>
							</div>
						</div>
					</div>";
	
		$ncount = 1;
		while ($row = mysqli_fetch_assoc($result)) {
			$criterio = $row['criterio'];
			$nomecriterio = $row['nomecriterio'];
			$nivel = $row['nivel'];
			$arquivo = base64_encode($row['arquivo']);
			$extensao = $row['tipoarquivo'];
			$filename = 'memorial/' . $nivel . "_" . $ncount . "." . $extensao;
			file_put_contents($filename, $row['arquivo']);
			$ncount++;
			
			$imagem = $pathservidor . $filename;
			$mostraarquivo = "<img src=$imagem . width='75%'/>";
			$pagina++;
			$descricao = $criterio . " - " . $nomecriterio;
			$dados .= fnMostraArquivo($descricao,$imagem,$pagina);
			$desc = $nivel . ' - Critério: ' . $criterio . ' - ' . $nomecriterio;
			$sumario .= fnSumario($desc,$pagina);
		}
	}
	
	// RSC-3
	$query = "SELECT criterio,nomecriterio,nivel,arquivo,tipoarquivo FROM $TabPedidoRSC WHERE nivel='RSCIII' ORDER BY criterio";
	$result = mysqli_query($link, $query);
	$linhas = mysqli_num_rows($result);
	if ($linhas > 0) {
		$pagina++;
		$dados .= "<div style='background-color: #1A5321; page-break-after: always;'>
						<div class='row'>
							<p align='right' style='color: white;'> página - $pagina</p>
						</div>
						<div class='container' style='background-color: #E4EBE2;'>
							<div class='row'>
								<p><h2 align='center' style='color: #1A5321;'><b>Documentação comprobatória</b></h2></p>
								<p><h3 align='center' style='color: #1A5321;'><b>Nível RSC-3</b></h3></p><BR>
							</div>
						</div>
					</div>";
	
		$ncount = 1;
		while ($row = mysqli_fetch_assoc($result)) {
			$criterio = $row['criterio'];
			$nomecriterio = $row['nomecriterio'];
			$nivel = $row['nivel'];
			$arquivo = base64_encode($row['arquivo']);
			$extensao = $row['tipoarquivo'];
			$filename = 'memorial/' . $nivel . "_" . $ncount . "." . $extensao;
			file_put_contents($filename, $row['arquivo']);
			$ncount++;
			
			$imagem = $pathservidor . $filename;
			$mostraarquivo = "<img src=$imagem . width='75%'/>";
			$pagina++;
			$descricao = $criterio . " - " . $nomecriterio;
			$dados .= fnMostraArquivo($descricao,$imagem,$pagina);
			$desc = $nivel . ' - Critério: ' . $criterio . ' - ' . $nomecriterio;
			$sumario .= fnSumario($desc,$pagina);
		}
	}
	
	// LISTA DOS CRITÉRIOS SOLICITADOS:
	$pagina++;
	$dados .= "<div style='page-break-after: always; background-color: #1A5321;'>
					<div class='row'>
						<p align='right' style='color: white;'> página - $pagina</p>
					</div>
					<div class='container' style='background-color: #E4EBE2;'>
						<div class='row'>
							<p><h2 align='center' style='color: #1A5321;'><b>Lista dos critério de pontuação solicitados</b></h2></p>
						</div>";
	
	$desc = "Lista dos critério de pontuação solicitados";
	$sumario .= fnSumario($desc,$pagina);
	
	$query = "SELECT siape,rsc FROM TabDocente WHERE id=$id";
	$result = mysqli_query($link, $query); 
	$row = mysqli_fetch_assoc($result);
	$siape = $row['siape'];
	$rsc = $row['rsc'];
	$TabPedidoRSC = "TabPedidoRSC_" . $siape;
	
	$dados .= "
		<table align='center' width='100%' style='background-color: #E4EBE2; border: 4px solid; border-color: #1A5321;'>
			<tr align='center' style='border: 3px solid; border-color: #1A5321;'>
				<th align='center' style='font-size: 14px; border-right: 2px solid #1A5321; border-bottom:  2px solid #1A5321;'><b>Nível</b></th>
				<th align='center' style='font-size: 14px; border-right: 2px solid; border-right-color: #1A5321; border-bottom:  2px solid #1A5321;'><b>Nº do<BR>critério</b></th>
				<th align='center' style='font-size: 14px; border-right: 2px solid; border-right-color: #1A5321; border-bottom:  2px solid #1A5321;'><b>Critério</b></th>
				<th align='center' style='font-size: 14px; border-right: 2px solid; border-right-color: #1A5321; border-bottom:  2px solid #1A5321;'><b>Unidade</b></th>
				<th align='center' style='font-size: 14px; border-right: 2px solid; border-right-color: #1A5321; border-bottom:  2px solid #1A5321;'><b>Quantidade<BR>unidades</b></th>
				<th align='center' style='font-size: 14px; border-right: 2px solid; border-right-color: #1A5321; border-bottom:  2px solid #1A5321;'><b>Fator de<BR>pontuação</b></th>
				<th align='center' style='font-size: 14px; border-bottom:  2px solid #1A5321;'><b>Pontuação</b></th>
			</tr>";	
	
	$index = 1;
	$query = "SELECT nomecriterio,nivel,fatorpontuacao,qtdeunidades,unidade,pontuacaorequerida,criterio FROM $TabPedidoRSC ORDER BY criterio";
	$result = mysqli_query($link, $query);
	while($row = mysqli_fetch_assoc($result)) {
		$nomecriterio = $row['nomecriterio'];
		$criterio = $row['criterio'];
		$nivel = $row['nivel'];
		$fatorpontuacao = $row['fatorpontuacao'];
		$qtdeunidades = $row['qtdeunidades'];
		$unidade = $row['unidade'];
		$pontuacaorequerida = $row['pontuacaorequerida'];
	
		$dados .= "
			<tr>
				<td align='center' style='font-size: 14px; border-right: 2px solid; border-right-color: #1A5321; border-bottom:  1px solid #1A5321;'>$nivel</td>
				<td align='center' style='font-size: 14px; border-right: 2px solid; border-right-color: #1A5321; border-bottom:  1px solid #1A5321;'>$criterio</td>
				<td align='center' style='font-size: 14px; border-right: 2px solid; border-right-color: #1A5321; border-bottom:  1px solid #1A5321;'>$nomecriterio</td>
				<td align='center' style='font-size: 14px; border-right: 2px solid; border-right-color: #1A5321; border-bottom:  1px solid #1A5321;'>$unidade</td>
				<td align='center' style='font-size: 14px; border-right: 2px solid; border-right-color: #1A5321; border-bottom:  1px solid #1A5321;'>$qtdeunidades</td>
				<td align='center' style='font-size: 14px; border-right: 2px solid; border-right-color: #1A5321; border-bottom:  1px solid #1A5321;'>$fatorpontuacao</td>
				<td align='center' style='font-size: 14px; border-bottom:  1px solid #1A5321;'>$pontuacaorequerida</td>
			</tr>";
		
		if ($index >= 14) {
			$dados .= "</table></div></div>";
			$index = 0;

			$pagina++;
			$dados .= "<div style='page-break-after: always; background-color: #1A5321;'>
					<div class='row'>
						<p align='right' style='color: white;'> página - $pagina</p>
					</div>
					<div class='container' style='background-color: #E4EBE2;'><BR>";
			
			$dados .= "
				<table align='center' width='100%' style='background-color: #E4EBE2; border: 4px solid; border-color: #1A5321;'>
					<tr align='center' style='border: 3px solid; border-color: #1A5321;'>
						<th align='center' style='font-size: 14px; border-right: 2px solid #1A5321; border-bottom:  2px solid #1A5321;'><b>Nível</b></th>
						<th align='center' style='font-size: 14px; border-right: 2px solid; border-right-color: #1A5321; border-bottom:  2px solid #1A5321;'><b>Nº do<BR>critério</b></th>
						<th align='center' style='font-size: 14px; border-right: 2px solid; border-right-color: #1A5321; border-bottom:  2px solid #1A5321;'><b>Critério</b></th>
						<th align='center' style='font-size: 14px; border-right: 2px solid; border-right-color: #1A5321; border-bottom:  2px solid #1A5321;'><b>Unidade</b></th>
						<th align='center' style='font-size: 14px; border-right: 2px solid; border-right-color: #1A5321; border-bottom:  2px solid #1A5321;'><b>Quantidade<BR>unidades</b></th>
						<th align='center' style='font-size: 14px; border-right: 2px solid; border-right-color: #1A5321; border-bottom:  2px solid #1A5321;'><b>Fator de<BR>pontuação</b></th>
						<th align='center' style='font-size: 14px; border-bottom:  2px solid #1A5321;'><b>Pontuação</b></th>
					</tr>";	
		}
		$index++;
	}
	
	$dados .= "</table></div></div>";
	
	
	// QUADRO DE PONTUAÇÃO:
	$pagina++;
	$dados .= "<div style='page-break-after: always; background-color: #1A5321;'>
					<div class='row'>
						<p align='right' style='color: white;'> página - $pagina</p>
					</div>
					<div class='container' style='background-color: #E4EBE2;'>
						<div class='row'>
							<p><h2 align='center' style='color: #1A5321;'><b>Quadro de Pontuação Docente</b></h2></p>
						</div>";
	
	$desc = "Quadro de Pontuação Docente";
	$sumario .= fnSumario($desc,$pagina);
	
	$query = "SELECT siape,rsc FROM TabDocente WHERE id=$id";
	$result = mysqli_query($link, $query); 
	$row = mysqli_fetch_assoc($result);
	$siape = $row['siape'];
	$rsc = $row['rsc'];
	$TabPedidoRSC = "TabPedidoRSC_" . $siape;

	$QuadroPontos = "QuadroPontuacao_" . $siape;
	// se a tabela do quadro de pontuação não existir, cria
	fnQuadroPontosDocente($QuadroPontos,$link);
	// se o quadro de pontuação estiver vazio, inicializa
	fnIniciaQuadroPontos($QuadroPontos,$siape,$link); 

	$descricao_pontmax = new clQuadroPontRSC();
	$descricao_pontmax = fnAtualizaTabQuadroPont_RSC1($QuadroPontos, $TabPedidoRSC, $link);
	$descricao = $descricao_pontmax->descricao;
	$pontMax = $descricao_pontmax->pontMax;
	$Total_RSC1 = $descricao_pontmax->totalpontos;
	
	$dados .= "
		<table align='center' style='background-color: #E4EBE2; border: 4px solid; border-color: #1A5321;'>
			<tr align='center' style='border: 3px solid; border-color: #1A5321;'>
				<th align='center' width='70%' style='font-size: 16px; border-right: 3px solid; border-right-color: #1A5321;'><b>Diretrizes do RSC nível 1</b></th>
				<th align='center' width='10%' style='font-size: 14px; border-right: 3px solid; border-right-color: #1A5321;'><b>Pontuação<BR>máxima</b></th>
				<th align='center' width='20%' style='font-size: 14px;'><b>Pontuação<BR>requerida</b></th>
			</tr>";

	$index = 0;
	$query = "SELECT Pontuacao FROM $QuadroPontos WHERE nivel='RSCI' ORDER BY id";
	$result = mysqli_query($link, $query);
	if($result) {
		while($row = mysqli_fetch_assoc($result)) {
			$pontuacao = $row['Pontuacao'];
			$dados .= "<tr style='border: 1px solid; border-color: #1A5321;'>
				<td align='left' style='border-right: 3px solid; border-right-color: #1A5321;'>$descricao[$index]</td>
				<td align='center' style='border-right: 3px solid; border-right-color: #1A5321;'>$pontMax[$index]</td>
				<td align='center'>$pontuacao</td>
			</tr>";

			$index++; 
		}
	}
	$dados .="<tr style='border: 3px solid; border-color: #1A5321;'>
				<td align='right' style='border-right: 3px solid; border-right-color: #1A5321;'><b>TOTAL</b></td>
				<td align='center' style='border-right: 3px solid; border-right-color: #1A5321;'><b>100</b></td>
				<td align='center'><b>$Total_RSC1</b></td>
			</tr>		
		</table><BR>";

	$descricao_pontmax = fnAtualizaTabQuadroPont_RSC2($QuadroPontos, $TabPedidoRSC, $link);
	$descricao = $descricao_pontmax->descricao;
	$pontMax = $descricao_pontmax->pontMax;
	$Total_RSC2 = $descricao_pontmax->totalpontos;

	$dados .="<table align='center' style='background-color: #E4EBE2; border: 4px solid; border-color: #1A5321;'>
		<tr align='center' style='border: 3px solid; border-color: #1A5321;'>
			<th align='center' width='70%' style='font-size: 16px; border-right: 3px solid; border-right-color: #1A5321;'><b>Diretrizes do RSC nível 2</b></th>
			<th align='center' width='10%' style='font-size: 14px; border-right: 3px solid; border-right-color: #1A5321;'><b>Pontuação<BR>máxima</b></th>
			<th align='center' width='20%' style='font-size: 14px;'><b>Pontuação<BR>requerida</b></th>
		</tr>";

	$index = 0;
	$query = "SELECT Pontuacao FROM $QuadroPontos WHERE nivel='RSCII' ORDER BY id";
	$result = mysqli_query($link, $query);
	if($result) {
		while($row = mysqli_fetch_assoc($result)) {
			$pontuacao = $row['Pontuacao'];
			$dados .=	"<tr style='border: 1px solid; border-color: #1A5321;'>
					<td align='left' style='border-right: 3px solid; border-right-color: #1A5321;'>$descricao[$index]</td>
					<td align='center' style='border-right: 3px solid; border-right-color: #1A5321;'>$pontMax[$index]</td>
					<td align='center'> $pontuacao</td>
				</tr>";
 			$index++; 
		}
	}
				
	$dados .="<tr style='border: 3px solid; border-color: #1A5321;'>
				<td align='right' style='border-right: 3px solid; border-right-color: #1A5321;'><b>TOTAL</b></td>
				<td align='center' style='border-right: 3px solid; border-right-color: #1A5321;'><b>100</b></td>
				<td align='center'><b>$Total_RSC2</b></td>
			</tr>		
		</table><BR>";
	$dados .= "</div></div>";

	$pagina++;
	$dados .= "	<div style='background-color: #1A5321; page-break-after: always;'>
					<div class='row'>
						<p align='right' style='color: white;'> página - $pagina</p>
					</div>
					<div class='container' style='background-color: #E4EBE2;'>";

	$descricao_pontmax = fnAtualizaTabQuadroPont_RSC3($QuadroPontos, $TabPedidoRSC, $link);
	$descricao = $descricao_pontmax->descricao;
	$pontMax = $descricao_pontmax->pontMax;
	$Total_RSC3 = $descricao_pontmax->totalpontos;

	$dados .="<table align='center' style='background-color: #E4EBE2; border: 4px solid; border-color: #1A5321;'>
			<tr align='center' style='border: 3px solid; border-color: #1A5321;'>
				<th align='center' width='70%' style='font-size: 16px; border-right: 3px solid; border-right-color: #1A5321;'><b>Diretrizes do RSC nível 3</b></th>
				<th align='center' width='10%' style='font-size: 14px; border-right: 3px solid; border-right-color: #1A5321;'><b>Pontuação<BR>máxima</b></th>
				<th align='center' width='20%' style='font-size: 14px;'><b>Pontuação<BR>requerida</b></th>
			</tr>";

	$index = 0;
	$query = "SELECT Pontuacao FROM $QuadroPontos WHERE nivel='RSCIII' ORDER BY id";
	$result = mysqli_query($link, $query);
	if($result) {
		while($row = mysqli_fetch_assoc($result)) {
			$pontuacao = $row['Pontuacao'];
			$dados .= "<tr style='border: 1px solid; border-color: #1A5321;'>
				<td align='left' style='border-right: 3px solid; border-right-color: #1A5321;'> $descricao[$index]</td>
				<td align='center' style='border-right: 3px solid; border-right-color: #1A5321;'>$pontMax[$index]</td>
				<td align='center'>$pontuacao</td>
				</tr>";
 			$index++; 
		}
	}

	$dados .="<tr style='border: 3px solid; border-color: #1A5321;'>
				<td align='right' style='border-right: 3px solid; border-right-color: #1A5321;'><b> TOTAL</b></td>
				<td align='center' style='border-right: 3px solid; border-right-color: #1A5321;'><b>100</b></td>
				<td align='center'><b>$Total_RSC3</b></td>
			</tr>		
			</table><BR>";		


	$MinRSC_req = fnRSCminimaReq($Total_RSC1, $Total_RSC2, $Total_RSC3, $rsc, $pontRSC);
	$pontTotalRSCreq = fnPontoRSCrequerido($Total_RSC1, $Total_RSC2, $Total_RSC3, $rsc);
	$Total = $Total_RSC1 + $Total_RSC2 + $Total_RSC3;

	$dados .= "
			<table align='center' width='100%' style='background-color: #E4EBE2; border: 4px solid; border-color: #1A5321;'>
			<tr align='center' style='border: 4px solid; border-color: #1A5321;'>
				<th align='center' style='border-right: 3px solid; border-right-color: #1A5321;'><b>Resultado da pontuação</b></th>
				<th align='center' style='border-right: 3px solid; border-right-color: #1A5321;'><b>Pontuação total</b></th>
				<th align='center'><b>Pontuação no nível<BR>RSC pretendido</b></th>
			</tr>
			<tr align='center' style='border: 4px solid; border-color: #1A5321;'>";

	if (($MinRSC_req == 1) && ($Total >= $pontGlobal)){
		$dados .= "<td align='center' style='font-size: 14px; color #1A5321; border-right: 3px solid; border-right-color: #1A5321;'>Pontuação <b>SUFICIENTE</b></td>
			<td align='center' style='font-size: 14px; border-right: 3px solid; border-right-color: #1A5321;'>$Total pontos</td>
			<td align='center' style='font-size: 14px;'>$pontTotalRSCreq pontos</td>";
	} 
	else {
		$dados .= "<td align='center' style='font-size: 14px; color: #c8411e; border-right: 3px solid; border-right-color: #1A5321;'>Pontuação <b>INSUFICIENTE</b> para solicitar o RSC </td>
		<td align='center' style='font-size: 14px; border-right: 3px solid; border-right-color: #1A5321;'> $Total pontos</td>
		<td align='center' style='font-size: 14px;'>$pontTotalRSCreq  pontos</td>";
	 }
	$dados .= "</tr></table><BR></div></div>";
	
// rodapé
	$dados .= "
		<div style='background-color:#1A5321;'>
			<BR>
			<div class='container' style='background-color:#E4EBE2;'>
				<div class='row'>
					<p align='center' style='font-size:125%;'><b>ForSolRSC - Formulário de Solicitação RSC</b></p>
					<p align='center' style='font-size:110%;'>
						<b>Comissão Permanente de Pessoal Docente - CPPD</b><BR>
						<a href='mailto:cppd.secretaria@ifsc.edu.br' target='_blank'>cppd.secretaria@ifsc.edu.br</a>
					</p>
					<p align='center'><b>Instituto Federal de Santa Catarina - IFSC</b><BR><a href='https://www.ifsc.edu.br' target='_blank'>www.ifsc.edu.br</a></p>
					<p align='center' style='font-size: 75%'>Rua 14 de Julho, 150, Coqueiros, CEP: 88075-010, Florianópolis-SC</p>
				</div>
			</div>
		</div>
		<div style='background-color: #1A5321;'>
			<BR>
		</div>";	
	
	$dados .= "</body></html>";
	
	
	$sumario .= "</table><BR>
			</div>
		</div>";	

	$nomearquivo = "MemorialDescritivoRSC_" . $siape;

?>
	<div style="background-color: #1A5321;">
		<BR>
		<div class="container" style="background-color: #E4EBE2;">
			<div class="row">
				<div class="coluna" align="center">
					<form action="Docente_memorial_impresso.php?<?php echo fnEncodeID($id);?>" method="post">
					<p align="center">Imprime o Memorial Descritivo<br>
					<input type="hidden" name="cabecalho" id="cabecalho" value="<?php echo $cabecalho;?>"/>
					<input type="hidden" name="sumario" id="sumario" value="<?php echo $sumario;?>"/>
					<input type="hidden" name="dados" id="dados" value="<?php echo $dados;?>"/>
					<input type="hidden" name="nomearquivo" id="nomearquivo" value="<?php echo $nomearquivo;?>"/>
					<input type="submit" class="btn" value="Continuar" style="border-radius: 8px; border: 3px solid #1A5321;; color: white; padding: 15px 30px; font-size: 18px; background-color: #1A5321;" formtarget="_blank"></p>
					</form>
				</div>
			</div>
		</div>		
	</div>
<?php
	include "botaovoltar.php";
	include "rodape.php";
	fnDesconectaBD($link);
?>
</body>
</html>	
