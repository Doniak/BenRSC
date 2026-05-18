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
		
<?php
	$query = "SELECT nome,siape,rsc FROM TabDocente WHERE id=$id";
	$result = mysqli_query($link, $query);
	$row = mysqli_fetch_assoc($result);
	$nome = $row['nome'];
	$siape = $row['siape'];
	$rsc = $row['rsc'];
	$TabPedidoRSC = "TabPedidoRSC_" . $siape;

	$diretorio = "memorial/memorial_" . $siape;
	if (!is_dir($diretorio)) {
		mkdir($diretorio);
	}
	$pathservidor = $pathserver . "/";
	
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
	$dados = "
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
	$dados .= "<div class='page-number' style='background-color: #1A5321; page-break-after: always;'>
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
	
	$dados .= "<div class='page-number'></div>";
	
	$dados .= "<div style='background-color: #1A5321; page-break-after: always;'><BR>
		<div class='container' style='background-color: #E4EBE2;'>
			<div class='row'>
				<p><h3 align='center' style='color: #1A5321;'><b>Formulário para Solicitação de RSC</b></h3></p><BR>
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
			<div class='row'>
				<span align='left' style='padding-left: 30px;'><b>Retribuição por titulação:</b></span>
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
			<div class='row'>
				<p align='right'>Florianópolis, $diahoje de $meshoje de $anohoje.</p>
			</div>
		</div>
	</div>";
	
	$dados .= "
		<div style='background-color: #1A5321; page-break-after: always;'><BR>
			<div class='container' style='background-color: #E4EBE2;'>
				<div class='row'>
					<p><h3 align='center' style='color: #1A5321;'><b>Sumário</b></h3></p><BR>
				</div>
			</div>
		</div>";
	
	// Itinerário de Formação - Apresentação de diplomas e certificados que são requisitos para o RSC requerido
	$dados .= "
		<div style='background-color: #1A5321;'><BR>
			<div class='container' style='background-color: #E4EBE2;'>
				<div style='page-break-after: always;'> 
					<div class='row'>
						<p><h3 align='center' style='color: #1A5321;'><b>Itinerário de Formação</b></h3></p><BR>
					</div>";
	
	$query = "SELECT * FROM TabFormacao WHERE siape='$siape'";
	$res = mysqli_query($link, $query); 
	$nrlinhas = mysqli_num_rows($res);
	if ($nrlinhas > 0) {
		$rows = mysqli_fetch_assoc($res);
		$graduacao = intval($rows["graduacao"]);
		$especializacao = intval($rows["especializacao"]);
		$mestrado = intval($rows["mestrado"]);
		$experiencia = intval($rows["experiencia"]);
		$descricao = $rows["descricao"];
		
		if (strcmp($descricao,NULL) != 0) {
			$dados .= "
					<div class='row'>
						<p><h2 align='center' style='color: #32A041;'>Descrição da experiência profissional</h2></p>
					</div>";
			$dados .= "<div class='row'>
					<p align='center'><textarea rows='8' cols='90%' readonly>$descricao</textarea></p>
					</div>";
		}
		$dados .= "</div>"; // Fecha o <div style='page-break-after: always;'> 
		
		if ($graduacao > 0) {
			$nomeTab = "TabItinerario_" . $siape;
			$query = "SELECT arquivo,tipoarquivo FROM $nomeTab WHERE documento='Graduação'";
			$result = mysqli_query($link, $query); 
			$linhas = mysqli_num_rows($result);
			if ($linhas > 0) {
				$dados .= "
					<div class='row'>
						<p><h2 align='center' style='color: #32A041;'>Graduação</h2></p>
					</div>";

				$ncount = 1;
				while ($row = mysqli_fetch_assoc($result)) {
					$arquivo = base64_encode($row['arquivo']);
					$extensao = $row['tipoarquivo'];
					
					$filename = $diretorio . '/graduacao_' . $ncount . "." .$extensao;
					file_put_contents($filename, $row['arquivo']);
					$ncount++;
					$imagem = $pathservidor . $filename;
					$imagem = $filename;
					$mostraarquivo = "<img src=$imagem . width='75%' style='border: 1px solid black;'/>";
					$dados .="
							<div class='row' style='page-break-after: always;'>
								<div class='coluna'>
									<p align='center'>$mostraarquivo</p>
								</div>
							</div>";
				}				
			}
		}
		if ($especializacao > 0) {
			$nomeTab = "TabItinerario_" . $siape;
			$query = "SELECT arquivo,tipoarquivo FROM $nomeTab WHERE documento='Especialização'";
			$result = mysqli_query($link, $query); 
			$linhas = mysqli_num_rows($result);
			if ($linhas > 0) {
				$dados .= "
					<div class='row'>
						<p><h2 align='center' style='color: #32A041;'>Especialização</h2></p>
					</div>";

				$ncount = 1;
				while ($row = mysqli_fetch_assoc($result)) {
					$arquivo = base64_encode($row['arquivo']);
					$extensao = $row['tipoarquivo'];
					$filename = $diretorio . '/especializacao_' . $ncount . "." .$extensao;
					file_put_contents($filename, $row['arquivo']);
					$ncount++;
					$imagem = $pathservidor . $filename;
					$mostraarquivo = "<img src=$imagem . width='75%' style='border: 1px solid black;'/>";
					$dados .="
							<div class='row' style='page-break-after: always;'>
								<div class='coluna'>
									<p align='center'>$mostraarquivo</p>
								</div>
							</div>";
				}				
			}
		}
		if ($mestrado > 0) {
			$nomeTab = "TabItinerario_" . $siape;
			$query = "SELECT arquivo,tipoarquivo FROM $nomeTab WHERE documento='Mestrado'";
			$result = mysqli_query($link, $query); 
			$linhas = mysqli_num_rows($result);
			if ($linhas > 0) {
				$dados .= "
					<div class='row'>
						<p><h2 align='center' style='color: #32A041;'>Mestrado</h2></p>
					</div>";

				$ncount = 1;
				while ($row = mysqli_fetch_assoc($result)) {
					$arquivo = base64_encode($row['arquivo']);
					$extensao = $row['tipoarquivo'];
					$filename = $diretorio . '/mestrado_' . $ncount . "." .$extensao;
					file_put_contents($filename, $row['arquivo']);
					$ncount++;
					$imagem = $pathservidor . $filename;
					$mostraarquivo = "<img src=$imagem . width='75%' style='border: 1px solid black;'/>";
					$dados .="
							<div class='row' style='page-break-after: always;'>
								<div class='coluna'>
									<p align='center'>$mostraarquivo</p>
								</div>
							</div>";
				}				
			}
		}
		if ($experiencia > 0) {
			$nomeTab = "TabItinerario_" . $siape;
			$query = "SELECT arquivo,tipoarquivo FROM $nomeTab WHERE documento='Experiência profissional'";
			$result = mysqli_query($link, $query); 
			$linhas = mysqli_num_rows($result);
			if ($linhas > 0) {
				$dados .= "
					<div class='row'>
						<p><h2 align='center' style='color: #32A041;'>Documentos da experiência profissional</h2></p>
					</div>";

				$ncount = 1;
				while ($row = mysqli_fetch_assoc($result)) {
					$arquivo = base64_encode($row['arquivo']);
					$extensao = $row['tipoarquivo'];
					$filename =  $diretorio . '/experiencia_' . $ncount . "." .$extensao;
					file_put_contents($filename, $row['arquivo']);
					$ncount++;
					$imagem = $pathservidor . $filename;
					$mostraarquivo = "<img src=$imagem . width='75%' style='border: 1px solid black;'/>";
					$dados .="
							<div class='row' style='page-break-after: always;'>
								<div class='coluna'>
									<p align='center'>$mostraarquivo</p>
								</div>
							</div>";
				}				
			}
		}
	}
	$dados .= "
			</div>
		</div>";	
	
	// Documentos comprobatórios
	// RSC-1
	$dados .= "
		<div style='background-color: #1A5321;'><BR>
			<div class='container' style='background-color: #E4EBE2;'>
				<div class='row' style='page-break-after: always;'>
					<p><h2 align='center' style='color: #1A5321;'><b>Documentação comprobatória</b></h2></p>
					<p><h3 align='center' style='color: #1A5321;'><b>Nível RSC-1</b></h3></p><BR>
				</div>";
	
	$query = "SELECT arquivo,tipoarquivo,arquivoauth FROM $TabPedidoRSC WHERE nivel='RSCI' ORDER BY criterio";
	$result = mysqli_query($link, $query);
	$linhas = mysqli_num_rows($result);
//	echo nl2br("Nome da tabela: " .$TabPedidoRSC .   "\n");
//	echo nl2br("Linhas: " . $linhas . "\n");
	if ($linhas > 0) {
		$ncount = 1;
		while ($row = mysqli_fetch_assoc($result)) {
			$arquivo = base64_encode($row['arquivo']);
			$extensao = $row['tipoarquivo'];
			$filename = 'memorial/RSCI_' . $ncount . "." . $extensao;
			file_put_contents($filename, $row['arquivo']);
			$ncount++;
			
			$imagem = $pathservidor . $filename;
			$mostraarquivo = "<img src=$imagem . width='75%'/>";
			$dados .="
					<div class='row' style='page-break-after: always;'>
						<div class='coluna'>
							<p align='center'>$mostraarquivo</p>
						</div>
					</div>";
			$indexarquivoauth = $row['arquivoauth'];
			if ($indexarquivoauth > 0) {
				$res = mysqli_query($link, "SELECT arquivo,tipoarquivo FROM TabDocAutenticar WHERE id=$indexarquivoauth");
				$valor = mysqli_fetch_assoc($res);
				$extensao = $valor['tipoarquivo'];
				$filename = 'memorial/RSCI_Auth_' . $indexarquivoauth . "." . $extensao;
				file_put_contents($filename, $valor['arquivo']);
				$fileAuth = $pathservidor . $filename;
				$mostraarquivo = "<iframe align='middle' src=$fileAuth . width='100%' height='800px'></iframe>";
				$dados .="
					<div class='row' style='page-break-after: always;'>
						<div class='coluna'>
							<p align='center'>$mostraarquivo</p>
						</div>
					</div>";
			}
			
		}
		
	}
	$dados .= "
			</div>
		</div>";	
	
	// RSC-2
	$dados .= "
		<div style='background-color: #1A5321;'><BR>
			<div class='container' style='background-color: #E4EBE2;'>
				<div class='row' style='page-break-after: always;'>
					<p><h2 align='center' style='color: #1A5321;'><b>Documentação comprobatória</b></h2></p>
					<p><h3 align='center' style='color: #1A5321;'><b>Nível RSC-2</b></h3></p><BR>
				</div>";
	
	$query = "SELECT arquivo,tipoarquivo,arquivoauth FROM $TabPedidoRSC WHERE nivel='RSCII' ORDER BY criterio";
	$result = mysqli_query($link, $query);
	$linhas = mysqli_num_rows($result);
//	echo nl2br("Nome da tabela: " .$TabPedidoRSC .   "\n");
//	echo nl2br("Linhas: " .$linhas .   "\n");
	if ($linhas > 0) {
		$ncount = 1;
		while ($row = mysqli_fetch_assoc($result)) {
			$arquivo = base64_encode($row['arquivo']);
			$extensao = $row['tipoarquivo'];
			$filename = 'memorial/RSCII_' . $ncount . "." . $extensao;
			file_put_contents($filename, $row['arquivo']);
			$ncount++;
			
			$imagem = $pathservidor . $filename;
			$mostraarquivo = "<img src=$imagem . width='75%'/>";
			$dados .="
					<div class='row' style='page-break-after: always;'>
						<div class='coluna'>
							<p align='center'>$mostraarquivo</p>
						</div>
					</div>";
			$indexarquivoauth = $row['arquivoauth'];
			if ($indexarquivoauth > 0) {
				$res = mysqli_query($link, "SELECT arquivo,tipoarquivo FROM TabDocAutenticar WHERE id=$indexarquivoauth");
				$valor = mysqli_fetch_assoc($res);
				$extensao = $valor['tipoarquivo'];
				$filename = 'memorial/RSCI_Auth_' . $indexarquivoauth . "." . $extensao;
				file_put_contents($filename, $valor['arquivo']);
				$fileAuth = $pathservidor . $filename;
				$mostraarquivo = "<iframe align='middle' src=$fileAuth . width='100%' height='800px'></iframe>";
				$dados .="
					<div class='row' style='page-break-after: always;'>
						<div class='coluna'>
							<p align='center'>$mostraarquivo</p>
						</div>
					</div>";
			}
		}
		
	}
	$dados .= "
			</div>
		</div>";	

	// RSC-3
	$dados .= "
		<div style='background-color: #1A5321;'><BR>
			<div class='container' style='background-color: #E4EBE2;'>
				<div class='row' style='page-break-after: always;'>
					<p><h2 align='center' style='color: #1A5321;'><b>Documentação comprobatória</b></h2></p>
					<p><h3 align='center' style='color: #1A5321;'><b>Nível RSC-3</b></h3></p><BR>
				</div>";
	
	$query = "SELECT arquivo,tipoarquivo,arquivoauth FROM $TabPedidoRSC WHERE nivel='RSCIII' ORDER BY criterio";
	$result = mysqli_query($link, $query);
	$linhas = mysqli_num_rows($result);
//	echo nl2br("Nome da tabela: " .$TabPedidoRSC .   "\n");
//	echo nl2br("Linhas: " .$linhas .   "\n");
	if ($linhas > 0) {
		$ncount = 1;
		while ($row = mysqli_fetch_assoc($result)) {
			$arquivo = base64_encode($row['arquivo']);
			$extensao = $row['tipoarquivo'];
			$filename = 'memorial/RSCIII_' . $ncount . "." . $extensao;
			file_put_contents($filename, $row['arquivo']);
			$ncount++;
			
			$imagem = $pathservidor . $filename;
			$mostraarquivo = "<img src=$imagem . width='75%'/>";
			$dados .="
					<div class='row' style='page-break-after: always;'>
						<div class='coluna'>
							<p align='center'>$mostraarquivo</p>
						</div>
					</div>";
			$indexarquivoauth = $row['arquivoauth'];
			if ($indexarquivoauth > 0) {
				$res = mysqli_query($link, "SELECT arquivo,tipoarquivo FROM TabDocAutenticar WHERE id=$indexarquivoauth");
				$valor = mysqli_fetch_assoc($res);
				$extensao = $valor['tipoarquivo'];
				$filename = 'memorial/RSCI_Auth_' . $indexarquivoauth . "." . $extensao;
				file_put_contents($filename, $valor['arquivo']);
				$fileAuth = $pathservidor . $filename;
				$mostraarquivo = "<iframe align='middle' src=$fileAuth . width='100%' height='800px'></iframe>";
				$dados .="
					<div class='row' style='page-break-after: always;'>
						<div class='coluna'>
							<p align='center'>$mostraarquivo</p>
						</div>
					</div>";
			}
		}
		
	}
	$dados .= "
			</div>
		</div>";		
	
	// QUADRO DE PONTUAÇÃO:
	$dados .= "<div style='background-color: #1A5321;'><BR>
		<div class='container' style='background-color: #E4EBE2;'>
			<div class='row'>
				<p><h2 align='center' style='color: #1A5321;'><b>Quadro de Pontuação Docente</b></h2></p>
			</div>";
	
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
	$dados .=	"<tr style='border: 3px solid; border-color: #1A5321;'>
			<td align='right' style='border-right: 3px solid; border-right-color: #1A5321;'><b>TOTAL &nbsp;</b></td>
			<td align='center' style='border-right: 3px solid; border-right-color: #1A5321;'><b>100</b></td>
			<td align='center'><b>$Total_RSC1</b></td>
		</tr>		
	</table>
	<BR>";

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
				
	$dados .=	"<tr style='border: 3px solid; border-color: #1A5321;'>
			<td align='right' style='border-right: 3px solid; border-right-color: #1A5321;'><b>TOTAL &nbsp;</b></td>
			<td align='center' style='border-right: 3px solid; border-right-color: #1A5321;'><b>100</b></td>
			<td align='center'><b>$Total_RSC2</b></td>
		</tr>		
	</table>
	<BR>";

	$descricao_pontmax = fnAtualizaTabQuadroPont_RSC3($QuadroPontos, $TabPedidoRSC, $link);
	$descricao = $descricao_pontmax->descricao;
	$pontMax = $descricao_pontmax->pontMax;
	$Total_RSC3 = $descricao_pontmax->totalpontos;

	$dados .=	"<table align='center' style='background-color: #E4EBE2; border: 4px solid; border-color: #1A5321;'>
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

	$dados .=	"<tr style='border: 3px solid; border-color: #1A5321;'>
			<td align='right' style='border-right: 3px solid; border-right-color: #1A5321;'><b>TOTAL &nbsp;</b></td>
			<td align='center' style='border-right: 3px solid; border-right-color: #1A5321;'><b>100</b></td>
			<td align='center'><b>$Total_RSC3</b></td>
		</tr>		
	</table>";		


	$MinRSC_req = fnRSCminimaReq($Total_RSC1, $Total_RSC2, $Total_RSC3, $rsc, $pontRSC);
	$pontTotalRSCreq = fnPontoRSCrequerido($Total_RSC1, $Total_RSC2, $Total_RSC3, $rsc);
	$Total = $Total_RSC1 + $Total_RSC2 + $Total_RSC3;

	$dados .= "<BR>
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


	echo $dados;
?>
	<div style="background-color: #1A5321;">
		<BR>
		<div class="container" style="background-color: #E4EBE2;">
			<BR>
			<div class="row">
				<p align="justify" style="font-size: 125%;">Visualize e baixe o seu memorial descritivo em pdf. Você poderá salvar o memorial criado para assinaturas e abertura do pedido de Reconhecimento de Saberes e Competências (RSC) no SIPAC. Mas antes, recomendamos que você revise o documento conferindo se está tudo correto e se não faltou nada.</p>
				<p align="justify" style="font-size: 125%;">Você poderá também visualizar e baixar a planilha de pontuação para anexar no processo. A CPPD também recomenda uma revisão da pontuação requerida, associando-a com o respectivo documento comprobatório, disponível no memorial.</p>
			</div>
			<BR>
			<div class="row">
				<div class="coluna">
					<p align="center">
					<form action="Docente_memorial_imprime.php?id=<?php echo fnEncodeID($id);?>" method="post">
						<input type="hidden" id="dados" name="dados" value="<?php echo $dados; ?>">
						<input type="hidden" id="siape" name="siape" value="<?php echo $siape; ?>">
						<input type="submit" class="btn" value="Memorial Descritivo em pdf" style="border-radius: 8px; border: 3px solid #1A5321;; color: white; padding: 15px 30px; font-size: 18px; background-color: #1A5321;">
					</form>
					</p>
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