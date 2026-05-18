<?php

function fnMostraArquivo($descricao,$imagem,$pagina) {
	$mostraarquivo = "<img src=$imagem . width='75%' style='border: 2px solid black;'/>";
	$dados = "<div style='background-color: #1A5321; page-break-after: always;'>
			<div class='row'>
				<p align='right' style='color: white;'> página - $pagina</p>
			</div>
			<div class='container' style='background-color: #E4EBE2;'>
				<div class='row'>
					<div class='coluna'>
						<p align='left'>$descricao</p>
						<p align='center'>$mostraarquivo</p>
					</div>
				</div>
			</div>
		</div>";	
	return $dados;
}

function fnSumario($descricao,$page){
	$textoSumario = "
					<tr>
					<td align='left' >$descricao</td>
					<td align='right'>$page</td>
					</tr>";
	
	return $textoSumario;
}

/* Funções do Quadro de Pontuação */
function fnIniciaQuadroPontos($QuadroPontos,$siape,$link) {
	$QuadroPontos = "QuadroPontuacao_" . $siape;
	fnQuadroPontosDocente($QuadroPontos,$link);
	$query = "SELECT * FROM $QuadroPontos";
	$res = mysqli_query($link, $query);
	$Nrlinhas = mysqli_num_rows($res);
	if($Nrlinhas == 0){ // se a tabela ainda está vazia
		$query = "INSERT INTO $QuadroPontos (id,nivel,diretriz,Pontuacao) VALUES (NULL,'RSCI','A',0)";
		$result = mysqli_query($link, $query);

		$query = "INSERT INTO $QuadroPontos (id,nivel,diretriz,Pontuacao) VALUES (NULL,'RSCI','B',0)";
		$result = mysqli_query($link, $query);

		$query = "INSERT INTO $QuadroPontos (id,nivel,diretriz,Pontuacao) VALUES (NULL,'RSCI','C',0)";
		$result = mysqli_query($link, $query);

		$query = "INSERT INTO $QuadroPontos (id,nivel,diretriz,Pontuacao) VALUES (NULL,'RSCI','D',0)";
		$result = mysqli_query($link, $query);

		$query = "INSERT INTO $QuadroPontos (id,nivel,diretriz,Pontuacao) VALUES (NULL,'RSCI','E',0)";
		$result = mysqli_query($link, $query);

		$query = "INSERT INTO $QuadroPontos (id,nivel,diretriz,Pontuacao) VALUES (NULL,'RSCI','F',0)";
		$result = mysqli_query($link, $query);

		$query = "INSERT INTO $QuadroPontos (id,nivel,diretriz,Pontuacao) VALUES (NULL,'RSCI','G',0)";
		$result = mysqli_query($link, $query);

		$query = "INSERT INTO $QuadroPontos (id,nivel,diretriz,Pontuacao) VALUES (NULL,'RSCI','H',0)";
		$result = mysqli_query($link, $query);		

		$query = "INSERT INTO $QuadroPontos (id,nivel,diretriz,Pontuacao) VALUES (NULL,'RSCII','A',0)";
		$result = mysqli_query($link, $query);

		$query = "INSERT INTO $QuadroPontos (id,nivel,diretriz,Pontuacao) VALUES (NULL,'RSCII','B',0)";
		$result = mysqli_query($link, $query);

		$query = "INSERT INTO $QuadroPontos (id,nivel,diretriz,Pontuacao) VALUES (NULL,'RSCII','C',0)";
		$result = mysqli_query($link, $query);

		$query = "INSERT INTO $QuadroPontos (id,nivel,diretriz,Pontuacao) VALUES (NULL,'RSCII','D',0)";
		$result = mysqli_query($link, $query);

		$query = "INSERT INTO $QuadroPontos (id,nivel,diretriz,Pontuacao) VALUES (NULL,'RSCII','E',0)";
		$result = mysqli_query($link, $query);

		$query = "INSERT INTO $QuadroPontos (id,nivel,diretriz,Pontuacao) VALUES (NULL,'RSCII','F',0)";
		$result = mysqli_query($link, $query);

		$query = "INSERT INTO $QuadroPontos (id,nivel,diretriz,Pontuacao) VALUES (NULL,'RSCII','G',0)";
		$result = mysqli_query($link, $query);

		$query = "INSERT INTO $QuadroPontos (id,nivel,diretriz,Pontuacao) VALUES (NULL,'RSCIII','A',0)";
		$result = mysqli_query($link, $query);

		$query = "INSERT INTO $QuadroPontos (id,nivel,diretriz,Pontuacao) VALUES (NULL,'RSCIII','B',0)";
		$result = mysqli_query($link, $query);

		$query = "INSERT INTO $QuadroPontos (id,nivel,diretriz,Pontuacao) VALUES (NULL,'RSCIII','C',0)";
		$result = mysqli_query($link, $query);

		$query = "INSERT INTO $QuadroPontos (id,nivel,diretriz,Pontuacao) VALUES (NULL,'RSCIII','D',0)";
		$result = mysqli_query($link, $query);

		$query = "INSERT INTO $QuadroPontos (id,nivel,diretriz,Pontuacao) VALUES (NULL,'RSCIII','E',0)";
		$result = mysqli_query($link, $query);

		$query = "INSERT INTO $QuadroPontos (id,nivel,diretriz,Pontuacao) VALUES (NULL,'RSCIII','F',0)";
		$result = mysqli_query($link, $query);

		$query = "INSERT INTO $QuadroPontos (id,nivel,diretriz,Pontuacao) VALUES (NULL,'RSCIII','G',0)";
		$result = mysqli_query($link, $query);		
	}
}

function fnAtualizaTabQuadroPont_RSC1($QuadroPontos, $TabPedidoRSC, $link) {
	/* *************************************** */
	// Pontuação solicitada pelo docente RSC-I
	/* *************************************** */
	$query = "SELECT pontuacaorequerida FROM $TabPedidoRSC WHERE nivel='RSCI' AND diretriz='A'";
	$result = mysqli_query($link, $query);
	$pontos_RSC1_DA = 0;
	while($row = mysqli_fetch_assoc($result)) {
		$pontos_RSC1_DA = $pontos_RSC1_DA + $row['pontuacaorequerida'];
	}
	
	$query = "SELECT pontuacaorequerida FROM $TabPedidoRSC WHERE nivel='RSCI' AND diretriz='B'";
	$result = mysqli_query($link, $query);
	$pontos_RSC1_DB = 0;
	while($row = mysqli_fetch_assoc($result)) {
		$pontos_RSC1_DB = $pontos_RSC1_DB + $row['pontuacaorequerida'];
	}
	
	$query = "SELECT pontuacaorequerida FROM $TabPedidoRSC WHERE nivel='RSCI' AND diretriz='C'";
	$result = mysqli_query($link, $query);
	$pontos_RSC1_DC = 0;
	while($row = mysqli_fetch_assoc($result)) {
		$pontos_RSC1_DC = $pontos_RSC1_DC + $row['pontuacaorequerida'];
	}
	
	$query = "SELECT pontuacaorequerida FROM $TabPedidoRSC WHERE nivel='RSCI' AND diretriz='D'";
	$result = mysqli_query($link, $query);
	$pontos_RSC1_DD = 0;
	while($row = mysqli_fetch_assoc($result)) {
		$pontos_RSC1_DD = $pontos_RSC1_DD + $row['pontuacaorequerida'];
	}		

	$query = "SELECT pontuacaorequerida FROM $TabPedidoRSC WHERE nivel='RSCI' AND diretriz='E'";
	$result = mysqli_query($link, $query);
	$pontos_RSC1_DE = 0;
	while($row = mysqli_fetch_assoc($result)) {
		$pontos_RSC1_DE = $pontos_RSC1_DE + $row['pontuacaorequerida'];
	}
	
	$query = "SELECT pontuacaorequerida FROM $TabPedidoRSC WHERE nivel='RSCI' AND diretriz='F'";
	$result = mysqli_query($link, $query);
	$pontos_RSC1_DF = 0;
	while($row = mysqli_fetch_assoc($result)) {
		$pontos_RSC1_DF = $pontos_RSC1_DF + $row['pontuacaorequerida'];
	}
	
	$query = "SELECT pontuacaorequerida FROM $TabPedidoRSC WHERE nivel='RSCI' AND diretriz='G'";
	$result = mysqli_query($link, $query);
	$pontos_RSC1_DG = 0;
	while($row = mysqli_fetch_assoc($result)) {
		$pontos_RSC1_DG = $pontos_RSC1_DG + $row['pontuacaorequerida'];
	}
	
	$query = "SELECT pontuacaorequerida FROM $TabPedidoRSC WHERE nivel='RSCI' AND diretriz='H'";
	$result = mysqli_query($link, $query);
	$pontos_RSC1_DH = 0;
	while($row = mysqli_fetch_assoc($result)) {
		$pontos_RSC1_DH = $pontos_RSC1_DH + $row['pontuacaorequerida'];
	}		

	/* ********************************* */
	// Pontuação máxima de cada diretriz
	/* ********************************* */
	$query = "SELECT descricao,PontuacaoMax FROM QuadroPontuacaoMax WHERE nivel='RSCI' AND diretriz='A'";
	$result = mysqli_query($link, $query);	
	$row = mysqli_fetch_assoc($result);
	$descricao_RSC1_DA = $row['descricao'];
	$pontMax_RSC1_DA = $row['PontuacaoMax'];

	$query = "SELECT descricao,PontuacaoMax FROM QuadroPontuacaoMax WHERE nivel='RSCI' AND diretriz='B'";
	$result = mysqli_query($link, $query);	
	$row = mysqli_fetch_assoc($result);
	$descricao_RSC1_DB = $row['descricao'];
	$pontMax_RSC1_DB = $row['PontuacaoMax'];

	$query = "SELECT descricao,PontuacaoMax FROM QuadroPontuacaoMax WHERE nivel='RSCI' AND diretriz='C'";
	$result = mysqli_query($link, $query);	
	$row = mysqli_fetch_assoc($result);
	$descricao_RSC1_DC = $row['descricao'];
	$pontMax_RSC1_DC = $row['PontuacaoMax'];

	$query = "SELECT descricao,PontuacaoMax FROM QuadroPontuacaoMax WHERE nivel='RSCI' AND diretriz='D'";
	$result = mysqli_query($link, $query);	
	$row = mysqli_fetch_assoc($result);
	$descricao_RSC1_DD = $row['descricao'];
	$pontMax_RSC1_DD = $row['PontuacaoMax'];
	
	$query = "SELECT descricao,PontuacaoMax FROM QuadroPontuacaoMax WHERE nivel='RSCI' AND diretriz='E'";
	$result = mysqli_query($link, $query);	
	$row = mysqli_fetch_assoc($result);
	$descricao_RSC1_DE = $row['descricao'];
	$pontMax_RSC1_DE = $row['PontuacaoMax'];

	$query = "SELECT descricao,PontuacaoMax FROM QuadroPontuacaoMax WHERE nivel='RSCI' AND diretriz='F'";
	$result = mysqli_query($link, $query);	
	$row = mysqli_fetch_assoc($result);
	$descricao_RSC1_DF = $row['descricao'];
	$pontMax_RSC1_DF = $row['PontuacaoMax'];

	$query = "SELECT descricao,PontuacaoMax FROM QuadroPontuacaoMax WHERE nivel='RSCI' AND diretriz='G'";
	$result = mysqli_query($link, $query);	
	$row = mysqli_fetch_assoc($result);
	$descricao_RSC1_DG = $row['descricao'];
	$pontMax_RSC1_DG = $row['PontuacaoMax'];

	$query = "SELECT descricao,PontuacaoMax FROM QuadroPontuacaoMax WHERE nivel='RSCI' AND diretriz='H'";
	$result = mysqli_query($link, $query);	
	$row = mysqli_fetch_assoc($result);
	$descricao_RSC1_DH = $row['descricao'];
	$pontMax_RSC1_DH = $row['PontuacaoMax'];
	
	$desc_pontmax = new clQuadroPontRSC();
	
	$desc_pontmax->descricao = array($descricao_RSC1_DA,$descricao_RSC1_DB,$descricao_RSC1_DC,$descricao_RSC1_DD,$descricao_RSC1_DE,$descricao_RSC1_DF,$descricao_RSC1_DG,$descricao_RSC1_DH);
	
	$desc_pontmax->pontMax = array($pontMax_RSC1_DA,$pontMax_RSC1_DB,$pontMax_RSC1_DC,$pontMax_RSC1_DD,$pontMax_RSC1_DE,$pontMax_RSC1_DF,$pontMax_RSC1_DG,$pontMax_RSC1_DH);
	
	/* ************************************* */
	// Atualiza a tabela Quadro de Pontuacao
	/* ************************************* */
	$Total_RSC1 = 0;
	if ($pontos_RSC1_DA > $pontMax_RSC1_DA)
		$pontos_RSC1_DA = $pontMax_RSC1_DA;
	if ($pontos_RSC1_DB > $pontMax_RSC1_DB)
		$pontos_RSC1_DB = $pontMax_RSC1_DB;
	if ($pontos_RSC1_DC > $pontMax_RSC1_DC)
		$pontos_RSC1_DC = $pontMax_RSC1_DC;
	if ($pontos_RSC1_DD > $pontMax_RSC1_DD)
		$pontos_RSC1_DD = $pontMax_RSC1_DD;
	if ($pontos_RSC1_DE > $pontMax_RSC1_DE)
		$pontos_RSC1_DE = $pontMax_RSC1_DE;
	if ($pontos_RSC1_DF > $pontMax_RSC1_DF)
		$pontos_RSC1_DF = $pontMax_RSC1_DF;
	if ($pontos_RSC1_DG > $pontMax_RSC1_DG)
		$pontos_RSC1_DG = $pontMax_RSC1_DG;
	if ($pontos_RSC1_DH > $pontMax_RSC1_DH)
		$pontos_RSC1_DH = $pontMax_RSC1_DH;

	$Total_RSC1 = $pontos_RSC1_DA + $pontos_RSC1_DB + $pontos_RSC1_DC + $pontos_RSC1_DD + $pontos_RSC1_DE + $pontos_RSC1_DF + $pontos_RSC1_DG + $pontos_RSC1_DH;
	
	$desc_pontmax->totalpontos = $Total_RSC1;
	
	$query = "UPDATE $QuadroPontos SET Pontuacao=$pontos_RSC1_DA WHERE nivel='RSCI' AND diretriz='A'";
	$result = mysqli_query($link, $query);

	$query = "UPDATE $QuadroPontos SET Pontuacao=$pontos_RSC1_DB WHERE nivel='RSCI' AND diretriz='B'";
	$result = mysqli_query($link, $query);

	$query = "UPDATE $QuadroPontos SET Pontuacao=$pontos_RSC1_DC WHERE nivel='RSCI' AND diretriz='C'";
	$result = mysqli_query($link, $query);

	$query = "UPDATE $QuadroPontos SET Pontuacao=$pontos_RSC1_DD WHERE nivel='RSCI' AND diretriz='D'";
	$result = mysqli_query($link, $query);

	$query = "UPDATE $QuadroPontos SET Pontuacao=$pontos_RSC1_DE WHERE nivel='RSCI' AND diretriz='E'";
	$result = mysqli_query($link, $query);

	$query = "UPDATE $QuadroPontos SET Pontuacao=$pontos_RSC1_DF WHERE nivel='RSCI' AND diretriz='F'";
	$result = mysqli_query($link, $query);

	$query = "UPDATE $QuadroPontos SET Pontuacao=$pontos_RSC1_DG WHERE nivel='RSCI' AND diretriz='G'";
	$result = mysqli_query($link, $query);

	$query = "UPDATE $QuadroPontos SET Pontuacao=$pontos_RSC1_DH WHERE nivel='RSCI' AND diretriz='H'";
	$result = mysqli_query($link, $query);
	
	return $desc_pontmax;
}

function fnAtualizaTabQuadroPont_RSC2($QuadroPontos, $TabPedidoRSC, $link) {
	/* **************************************** */
	// Pontuação solicitada pelo docente RSC-II
	/* **************************************** */
	$query = "SELECT pontuacaorequerida FROM $TabPedidoRSC WHERE nivel='RSCII' AND diretriz='A'";
	$result = mysqli_query($link, $query);
	$pontos_RSC2_DA = 0;
	while($row = mysqli_fetch_assoc($result)) {
		$pontos_RSC2_DA = $pontos_RSC2_DA + $row['pontuacaorequerida'];
	}
	
	$query = "SELECT pontuacaorequerida FROM $TabPedidoRSC WHERE nivel='RSCII' AND diretriz='B'";
	$result = mysqli_query($link, $query);
	$pontos_RSC2_DB = 0;
	while($row = mysqli_fetch_assoc($result)) {
		$pontos_RSC2_DB = $pontos_RSC2_DB + $row['pontuacaorequerida'];
	}
	
	$query = "SELECT pontuacaorequerida FROM $TabPedidoRSC WHERE nivel='RSCII' AND diretriz='C'";
	$result = mysqli_query($link, $query);
	$pontos_RSC2_DC = 0;
	while($row = mysqli_fetch_assoc($result)) {
		$pontos_RSC2_DC = $pontos_RSC2_DC + $row['pontuacaorequerida'];
	}
	
	$query = "SELECT pontuacaorequerida FROM $TabPedidoRSC WHERE nivel='RSCII' AND diretriz='D'";
	$result = mysqli_query($link, $query);
	$pontos_RSC2_DD = 0;
	while($row = mysqli_fetch_assoc($result)) {
		$pontos_RSC2_DD = $pontos_RSC2_DD + $row['pontuacaorequerida'];
	}		

	$query = "SELECT pontuacaorequerida FROM $TabPedidoRSC WHERE nivel='RSCII' AND diretriz='E'";
	$result = mysqli_query($link, $query);
	$pontos_RSC2_DE = 0;
	while($row = mysqli_fetch_assoc($result)) {
		$pontos_RSC2_DE = $pontos_RSC2_DE + $row['pontuacaorequerida'];
	}
	
	$query = "SELECT pontuacaorequerida FROM $TabPedidoRSC WHERE nivel='RSCII' AND diretriz='F'";
	$result = mysqli_query($link, $query);
	$pontos_RSC2_DF = 0;
	while($row = mysqli_fetch_assoc($result)) {
		$pontos_RSC2_DF = $pontos_RSC2_DF + $row['pontuacaorequerida'];
	}
	
	$query = "SELECT pontuacaorequerida FROM $TabPedidoRSC WHERE nivel='RSCII' AND diretriz='G'";
	$result = mysqli_query($link, $query);
	$pontos_RSC2_DG = 0;
	while($row = mysqli_fetch_assoc($result)) {
		$pontos_RSC2_DG = $pontos_RSC2_DG + $row['pontuacaorequerida'];
	}
	
	/* ********************************* */
	// Pontuação máxima de cada diretriz
	/* ********************************* */
	$query = "SELECT descricao,PontuacaoMax FROM QuadroPontuacaoMax WHERE nivel='RSCII' AND diretriz='A'";
	$result = mysqli_query($link, $query);	
	$row = mysqli_fetch_assoc($result);
	$descricao_RSC2_DA = $row['descricao'];
	$pontMax_RSC2_DA = $row['PontuacaoMax'];

	$query = "SELECT descricao,PontuacaoMax FROM QuadroPontuacaoMax WHERE nivel='RSCII' AND diretriz='B'";
	$result = mysqli_query($link, $query);	
	$row = mysqli_fetch_assoc($result);
	$descricao_RSC2_DB = $row['descricao'];
	$pontMax_RSC2_DB = $row['PontuacaoMax'];

	$query = "SELECT descricao,PontuacaoMax FROM QuadroPontuacaoMax WHERE nivel='RSCII' AND diretriz='C'";
	$result = mysqli_query($link, $query);	
	$row = mysqli_fetch_assoc($result);
	$descricao_RSC2_DC = $row['descricao'];
	$pontMax_RSC2_DC = $row['PontuacaoMax'];

	$query = "SELECT descricao,PontuacaoMax FROM QuadroPontuacaoMax WHERE nivel='RSCII' AND diretriz='D'";
	$result = mysqli_query($link, $query);	
	$row = mysqli_fetch_assoc($result);
	$descricao_RSC2_DD = $row['descricao'];
	$pontMax_RSC2_DD = $row['PontuacaoMax'];
	
	$query = "SELECT descricao,PontuacaoMax FROM QuadroPontuacaoMax WHERE nivel='RSCII' AND diretriz='E'";
	$result = mysqli_query($link, $query);	
	$row = mysqli_fetch_assoc($result);
	$descricao_RSC2_DE = $row['descricao'];
	$pontMax_RSC2_DE = $row['PontuacaoMax'];

	$query = "SELECT descricao,PontuacaoMax FROM QuadroPontuacaoMax WHERE nivel='RSCII' AND diretriz='F'";
	$result = mysqli_query($link, $query);	
	$row = mysqli_fetch_assoc($result);
	$descricao_RSC2_DF = $row['descricao'];
	$pontMax_RSC2_DF = $row['PontuacaoMax'];

	$query = "SELECT descricao,PontuacaoMax FROM QuadroPontuacaoMax WHERE nivel='RSCII' AND diretriz='G'";
	$result = mysqli_query($link, $query);	
	$row = mysqli_fetch_assoc($result);
	$descricao_RSC2_DG = $row['descricao'];
	$pontMax_RSC2_DG = $row['PontuacaoMax'];

	$desc_pontmax = new clQuadroPontRSC();
	
	$desc_pontmax->descricao = array($descricao_RSC2_DA,$descricao_RSC2_DB,$descricao_RSC2_DC,$descricao_RSC2_DD,$descricao_RSC2_DE,$descricao_RSC2_DF,$descricao_RSC2_DG);
	
	$desc_pontmax->pontMax = array($pontMax_RSC2_DA,$pontMax_RSC2_DB,$pontMax_RSC2_DC,$pontMax_RSC2_DD,$pontMax_RSC2_DE,$pontMax_RSC2_DF,$pontMax_RSC2_DG);
	
	/* ************************************ */
	// Atualiza a tabela QuadroPontuacaoMax
	/* ************************************ */
	$Total_RSC2 = 0;
	if ($pontos_RSC2_DA > $pontMax_RSC2_DA)
		$pontos_RSC2_DA = $pontMax_RSC2_DA;
	if ($pontos_RSC2_DB > $pontMax_RSC2_DB)
		$pontos_RSC2_DB = $pontMax_RSC2_DB;
	if ($pontos_RSC2_DC > $pontMax_RSC2_DC)
		$pontos_RSC2_DC = $pontMax_RSC2_DC;
	if ($pontos_RSC2_DD > $pontMax_RSC2_DD)
		$pontos_RSC2_DD = $pontMax_RSC2_DD;
	if ($pontos_RSC2_DE > $pontMax_RSC2_DE)
		$pontos_RSC2_DE = $pontMax_RSC2_DE;
	if ($pontos_RSC2_DF > $pontMax_RSC2_DF)
		$pontos_RSC2_DF = $pontMax_RSC2_DF;
	if ($pontos_RSC2_DG > $pontMax_RSC2_DG)
		$pontos_RSC2_DG = $pontMax_RSC2_DG;

	$Total_RSC2 = $pontos_RSC2_DA + $pontos_RSC2_DB + $pontos_RSC2_DC + $pontos_RSC2_DD + $pontos_RSC2_DE + $pontos_RSC2_DF + $pontos_RSC2_DG;
	$desc_pontmax->totalpontos = $Total_RSC2;
	
	$query = "UPDATE $QuadroPontos SET Pontuacao=$pontos_RSC2_DA WHERE nivel='RSCII' AND diretriz='A'";
	$result = mysqli_query($link, $query);

	$query = "UPDATE $QuadroPontos SET Pontuacao=$pontos_RSC2_DB WHERE nivel='RSCII' AND diretriz='B'";
	$result = mysqli_query($link, $query);

	$query = "UPDATE $QuadroPontos SET Pontuacao=$pontos_RSC2_DC WHERE nivel='RSCII' AND diretriz='C'";
	$result = mysqli_query($link, $query);
	
	$query = "UPDATE $QuadroPontos SET Pontuacao=$pontos_RSC2_DD WHERE nivel='RSCII' AND diretriz='D'";
	$result = mysqli_query($link, $query);

	$query = "UPDATE $QuadroPontos SET Pontuacao=$pontos_RSC2_DE WHERE nivel='RSCII' AND diretriz='E'";
	$result = mysqli_query($link, $query);

	$query = "UPDATE $QuadroPontos SET Pontuacao=$pontos_RSC2_DF WHERE nivel='RSCII' AND diretriz='F'";
	$result = mysqli_query($link, $query);

	$query = "UPDATE $QuadroPontos SET Pontuacao=$pontos_RSC2_DG WHERE nivel='RSCII' AND diretriz='G'";
	$result = mysqli_query($link, $query);

	return $desc_pontmax;
}

function fnAtualizaTabQuadroPont_RSC3($QuadroPontos, $TabPedidoRSC, $link) {
	$desc_pontmax = new clQuadroPontRSC();
	/* ***************************************** */
	// Pontuação solicitada pelo docente RSC-III
	/* ***************************************** */
	$query = "SELECT pontuacaorequerida FROM $TabPedidoRSC WHERE nivel='RSCIII' AND diretriz='A'";
	$result = mysqli_query($link, $query);
	$pontos_RSC3_DA = 0;
	while($row = mysqli_fetch_assoc($result)) {
		$pontos_RSC3_DA = $pontos_RSC3_DA + $row['pontuacaorequerida'];
	}
	
	$query = "SELECT pontuacaorequerida FROM $TabPedidoRSC WHERE nivel='RSCIII' AND diretriz='B'";
	$result = mysqli_query($link, $query);
	$pontos_RSC3_DB = 0;
	while($row = mysqli_fetch_assoc($result)) {
		$pontos_RSC3_DB = $pontos_RSC3_DB + $row['pontuacaorequerida'];
	}
	
	$query = "SELECT pontuacaorequerida FROM $TabPedidoRSC WHERE nivel='RSCIII' AND diretriz='C'";
	$result = mysqli_query($link, $query);
	$pontos_RSC3_DC = 0;
	while($row = mysqli_fetch_assoc($result)) {
		$pontos_RSC3_DC = $pontos_RSC3_DC + $row['pontuacaorequerida'];
	}
	
	$query = "SELECT pontuacaorequerida FROM $TabPedidoRSC WHERE nivel='RSCIII' AND diretriz='D'";
	$result = mysqli_query($link, $query);
	$pontos_RSC3_DD = 0;
	while($row = mysqli_fetch_assoc($result)) {
		$pontos_RSC3_DD = $pontos_RSC3_DD + $row['pontuacaorequerida'];
	}		

	$query = "SELECT pontuacaorequerida FROM $TabPedidoRSC WHERE nivel='RSCIII' AND diretriz='E'";
	$result = mysqli_query($link, $query);
	$pontos_RSC3_DE = 0;
	while($row = mysqli_fetch_assoc($result)) {
		$pontos_RSC3_DE = $pontos_RSC3_DE + $row['pontuacaorequerida'];
	}
	
	$query = "SELECT pontuacaorequerida FROM $TabPedidoRSC WHERE nivel='RSCIII' AND diretriz='F'";
	$result = mysqli_query($link, $query);
	$pontos_RSC3_DF = 0;
	while($row = mysqli_fetch_assoc($result)) {
		$pontos_RSC3_DF = $pontos_RSC3_DF + $row['pontuacaorequerida'];
	}
	
	$query = "SELECT pontuacaorequerida FROM $TabPedidoRSC WHERE nivel='RSCIII' AND diretriz='G'";
	$result = mysqli_query($link, $query);
	$pontos_RSC3_DG = 0;
	while($row = mysqli_fetch_assoc($result)) {
		$pontos_RSC3_DG = $pontos_RSC3_DG + $row['pontuacaorequerida'];
	}
	
	/* ********************************* */
	// Pontuação máxima de cada diretriz
	/* ********************************* */
	$query = "SELECT descricao,PontuacaoMax FROM QuadroPontuacaoMax WHERE nivel='RSCIII' AND diretriz='A'";
	$result = mysqli_query($link, $query);	
	$row = mysqli_fetch_assoc($result);
	$descricao_RSC3_DA = $row['descricao'];
	$pontMax_RSC3_DA = $row['PontuacaoMax'];

	$query = "SELECT descricao,PontuacaoMax FROM QuadroPontuacaoMax WHERE nivel='RSCIII' AND diretriz='B'";
	$result = mysqli_query($link, $query);	
	$row = mysqli_fetch_assoc($result);
	$descricao_RSC3_DB = $row['descricao'];
	$pontMax_RSC3_DB = $row['PontuacaoMax'];

	$query = "SELECT descricao,PontuacaoMax FROM QuadroPontuacaoMax WHERE nivel='RSCIII' AND diretriz='C'";
	$result = mysqli_query($link, $query);	
	$row = mysqli_fetch_assoc($result);
	$descricao_RSC3_DC = $row['descricao'];
	$pontMax_RSC3_DC = $row['PontuacaoMax'];

	$query = "SELECT descricao,PontuacaoMax FROM QuadroPontuacaoMax WHERE nivel='RSCIII' AND diretriz='D'";
	$result = mysqli_query($link, $query);	
	$row = mysqli_fetch_assoc($result);
	$descricao_RSC3_DD = $row['descricao'];
	$pontMax_RSC3_DD = $row['PontuacaoMax'];
	
	$query = "SELECT descricao,PontuacaoMax FROM QuadroPontuacaoMax WHERE nivel='RSCIII' AND diretriz='E'";
	$result = mysqli_query($link, $query);	
	$row = mysqli_fetch_assoc($result);
	$descricao_RSC3_DE = $row['descricao'];
	$pontMax_RSC3_DE = $row['PontuacaoMax'];

	$query = "SELECT descricao,PontuacaoMax FROM QuadroPontuacaoMax WHERE nivel='RSCIII' AND diretriz='F'";
	$result = mysqli_query($link, $query);	
	$row = mysqli_fetch_assoc($result);
	$descricao_RSC3_DF = $row['descricao'];
	$pontMax_RSC3_DF = $row['PontuacaoMax'];

	$query = "SELECT descricao,PontuacaoMax FROM QuadroPontuacaoMax WHERE nivel='RSCIII' AND diretriz='G'";
	$result = mysqli_query($link, $query);	
	$row = mysqli_fetch_assoc($result);
	$descricao_RSC3_DG = $row['descricao'];
	$pontMax_RSC3_DG = $row['PontuacaoMax'];

	$desc_pontmax->descricao = array($descricao_RSC3_DA,$descricao_RSC3_DB,$descricao_RSC3_DC,$descricao_RSC3_DD,$descricao_RSC3_DE,$descricao_RSC3_DF,$descricao_RSC3_DG);
	
	$desc_pontmax->pontMax = array($pontMax_RSC3_DA,$pontMax_RSC3_DB,$pontMax_RSC3_DC,$pontMax_RSC3_DD,$pontMax_RSC3_DE,$pontMax_RSC3_DF,$pontMax_RSC3_DG);
	
	/* ************************************ */
	// Atualiza a tabela QuadroPontuacaoMax
	/* ************************************ */
	$Total_RSC3 = 0;
	if ($pontos_RSC3_DA > $pontMax_RSC3_DA)
		$pontos_RSC3_DA = $pontMax_RSC3_DA;
	if ($pontos_RSC3_DB > $pontMax_RSC3_DB)
		$pontos_RSC3_DB = $pontMax_RSC3_DB;
	if ($pontos_RSC3_DC > $pontMax_RSC3_DC)
		$pontos_RSC3_DC = $pontMax_RSC3_DC;
	if ($pontos_RSC3_DD > $pontMax_RSC3_DD)
		$pontos_RSC3_DD = $pontMax_RSC3_DD;
	if ($pontos_RSC3_DE > $pontMax_RSC3_DE)
		$pontos_RSC3_DE = $pontMax_RSC3_DE;
	if ($pontos_RSC3_DF > $pontMax_RSC3_DF)
		$pontos_RSC3_DF = $pontMax_RSC3_DF;
	if ($pontos_RSC3_DG > $pontMax_RSC3_DG)
		$pontos_RSC3_DG = $pontMax_RSC3_DG;
	
	$Total_RSC3 = $pontos_RSC3_DA + $pontos_RSC3_DB + $pontos_RSC3_DC + $pontos_RSC3_DD + $pontos_RSC3_DE + $pontos_RSC3_DF + $pontos_RSC3_DG;
	$desc_pontmax->totalpontos = $Total_RSC3;

	$query = "UPDATE $QuadroPontos SET Pontuacao=$pontos_RSC3_DA WHERE nivel='RSCIII' AND diretriz='A'";
	$result = mysqli_query($link, $query);

	$query = "UPDATE $QuadroPontos SET Pontuacao=$pontos_RSC3_DB WHERE nivel='RSCIII' AND diretriz='B'";
	$result = mysqli_query($link, $query);

	$query = "UPDATE $QuadroPontos SET Pontuacao=$pontos_RSC3_DC WHERE nivel='RSCIII' AND diretriz='C'";
	$result = mysqli_query($link, $query);

	$query = "UPDATE $QuadroPontos SET Pontuacao=$pontos_RSC3_DD WHERE nivel='RSCIII' AND diretriz='D'";
	$result = mysqli_query($link, $query);

	$query = "UPDATE $QuadroPontos SET Pontuacao=$pontos_RSC3_DE WHERE nivel='RSCIII' AND diretriz='E'";
	$result = mysqli_query($link, $query);

	$query = "UPDATE $QuadroPontos SET Pontuacao=$pontos_RSC3_DF WHERE nivel='RSCIII' AND diretriz='F'";
	$result = mysqli_query($link, $query);

	$query = "UPDATE $QuadroPontos SET Pontuacao=$pontos_RSC3_DG WHERE nivel='RSCIII' AND diretriz='G'";
	$result = mysqli_query($link, $query);
	
	return $desc_pontmax;
}

function fnRSCminimaReq($Total_RSC1, $Total_RSC2, $Total_RSC3, $rsc, $pontRSC) {
	$Total = $Total_RSC1 + $Total_RSC2 + $Total_RSC3;
	$MinRSC_req = 0; // mínimo de 25 pontos na RSC requerida
	if (strcmp("RSC-I",$rsc) == 0) {
		if ($Total_RSC1 >= $pontRSC) {
			$MinRSC_req = 1;
		}
	}
	if (strcmp("RSC-II",$rsc) == 0) {
		if ($Total_RSC2 >= $pontRSC) {
			$MinRSC_req = 1;
		}
	}
	if (strcmp("RSC-III",$rsc) == 0) {
		if ($Total_RSC3 >= $pontRSC) {
			$MinRSC_req = 1;
		}
	}
	return $MinRSC_req;
}

function fnPontoRSCrequerido($Total_RSC1, $Total_RSC2, $Total_RSC3, $rsc) {
	$pontTotal = 0;
	if (strcmp("RSC-I",$rsc) == 0) {
		$pontTotal = $Total_RSC1;
	}
	if (strcmp("RSC-II",$rsc) == 0) {
		$pontTotal = $Total_RSC2;
	}
	if (strcmp("RSC-III",$rsc) == 0) {
		$pontTotal = $Total_RSC3;
	}
	return $pontTotal;
}

/* Funções ... */
?>