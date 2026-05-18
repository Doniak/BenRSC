<?php
include "variaveis.php";

function fnQuadroPontuacaoInicializa ($link,$siape) 
{
	$nomeTab = "QuadroPontAvaliadores_" . $siape;
	fnQuadroTabAvaliacao($nomeTab,$link);
	
	$index = 0;
	$query = "SELECT * FROM QuadroPontuacaoMax ORDER BY id";
	$res = mysqli_query($link, $query);
	$nrlinhas = mysqli_num_rows($res);
	while($row = mysqli_fetch_assoc($res)) {
		$nivel[$index] = $row['nivel'];
		$diretriz[$index] = $row['diretriz'];
		$descricao[$index] = $row['descricao'];
		$PontuacaoMax[$index] = $row['PontuacaoMax'];
		$index++;
	}
	
	$query = "SELECT * FROM $nomeTab";
	$result = mysqli_query($link, $query);
	if (mysqli_num_rows($result) == 0) {
		for ($index = 0; $index < $nrlinhas; $index++) {
			$query = "INSERT INTO $nomeTab (id,nivel,diretriz,descricao,pontMax,PontRequer,PontDeferPres,PontDeferExte,PontDeferInterno) VALUES (NULL,'$nivel[$index]','$diretriz[$index]','$descricao[$index]',$PontuacaoMax[$index],0,0,0,0)";
			mysqli_query($link, $query);
		}
	}
}

/*
$tipoAvaliador: 1 - presidente; 2- membro externo; 3 - membro interno
*/
function fnQuadroPontuacaoPorAvaliador($link,$idPedidoRSC,$nomeAvaliador,$siape,$nivel,$diretriz) 
{
	$TabPedidoRSC = "TabPedidoRSC_" . $siape;
	
	$query = "SELECT pontuacaorequerida,nivel,diretriz,PontDefPresidente,PontDefMembExt,PontDefMembInterno FROM $TabPedidoRSC WHERE nivel='$nivel' AND diretriz='$diretriz'";
	$result = mysqli_query($link, $query);
	$pontosreq = 0;
	$pontosdef = 0;
	while($row = mysqli_fetch_assoc($result)) {
		$pontosreq = number_format($pontosreq + $row['pontuacaorequerida'],2);
		$pontosdef = fnAvaliadorPontDeferida($link,$pontosdef,$nomeAvaliador,$idPedidoRSC,$row);
	}
	
	$nomeTab = "QuadroPontAvaliadores_" . $siape;
	$query = "SELECT pontMax FROM $nomeTab WHERE nivel='$nivel' AND diretriz='$diretriz'";
	$res = mysqli_query($link, $query);
	$row = mysqli_fetch_assoc($res);
	$pontMax = $row['pontMax'];
	if ($pontosreq > $pontMax) {
		$pontosreq = $pontMax;
	}
	if ($pontosdef > $pontMax) {
		$pontosdef = $pontMax;
	}
	
	if (fnTipoAvaliador($link,$nomeAvaliador,$idPedidoRSC) == 1) {
		$query = "UPDATE $nomeTab SET PontDeferPres=$pontosdef,PontRequer=$pontosreq WHERE nivel='$nivel' AND diretriz='$diretriz'";
		$res = mysqli_query($link, $query);
	}
	elseif (fnTipoAvaliador($link,$nomeAvaliador,$idPedidoRSC) == 2) {
		$query = "UPDATE $nomeTab SET PontDeferExte=$pontosdef,PontRequer=$pontosreq WHERE nivel='$nivel' AND diretriz='$diretriz'";
		$res = mysqli_query($link, $query);
	}
	elseif (fnTipoAvaliador($link,$nomeAvaliador,$idPedidoRSC) == 3) {
		$query = "UPDATE $nomeTab SET PontDeferInterno=$pontosdef,PontRequer=$pontosreq WHERE nivel='$nivel' AND diretriz='$diretriz'";
		$res = mysqli_query($link, $query);
	}
}

/*
entrada:
	$link: conexão com banco de dados
	$nomeAvaliador: nome do avaliador da Comissão Especial
	$idPedidoRSC: id do pedido de RSC na tabela TabSolicitaRSC
	
saída: 
	1 - presidente; 2- membro externo; 3 - membro interno; 0 - não encontrou
*/
function fnTipoAvaliador($link,$nomeAvaliador,$idPedidoRSC) {
	$tipoAvaliador = 0;
	$query = "SELECT presidentebanca,membroexterno,membrointerno FROM TabSolicitaRSC WHERE id=$idPedidoRSC";
	$res = mysqli_query($link, $query);
	$row = mysqli_fetch_assoc($res);
	$presidente = $row['presidentebanca'];
	$membroexterno = $row['membroexterno'];
	$membrointerno = $row['membrointerno'];
	if (strcmp($presidente,$nomeAvaliador) == 0) {
		$tipoAvaliador = 1;
	}
	elseif (strcmp($membroexterno,$nomeAvaliador) == 0) {
		$tipoAvaliador = 2;
	}
	elseif (strcmp($membrointerno,$nomeAvaliador) == 0) {
		$tipoAvaliador = 3;
	}
	return $tipoAvaliador;
}

/* 
Define qual é o status do avaliador da Comissão Especial com referênica à tabela TabSolicitaRSC
*/
function fnAvaliadorPontDeferida($link,$pontosdef,$nomeAvaliador,$idPedidoRSC,$row) {
	if (fnTipoAvaliador($link,$nomeAvaliador,$idPedidoRSC) == 1) {
		// presidente
		$pontosdef = number_format($pontosdef + $row['PontDefPresidente'],2);
	}
	elseif (fnTipoAvaliador($link,$nomeAvaliador,$idPedidoRSC) == 2) {
		// membro externo
		$pontosdef = number_format($pontosdef + $row['PontDefMembExt'],2);
	}
	elseif (fnTipoAvaliador($link,$nomeAvaliador,$idPedidoRSC) == 3) {
		// membro interno
		$pontosdef = number_format($pontosdef + $row['PontDefMembInterno'],2);
	}
	return $pontosdef;
}

/* 
Entradas:
	$link: conexão com banco de dados
	$siape: número do siape do docente requerente
	
Saídas:
	Pontuações de cada membro da Comissão Especial, total e em cada nível RSC.
*/
function fnParecerPedidoRSC ($link, $siape) {
	$nomeTab = "QuadroPontAvaliadores_" . $siape;

	$PontDeferPresTotal_RSC1 = 0;
	$PontDeferExteTotal_RSC1 = 0;
	$PontDeferInternoTotal_RSC1 = 0;
	$query = "SELECT * FROM $nomeTab WHERE nivel='RSCI'";
	$result = mysqli_query($link, $query); 
	while($row = mysqli_fetch_assoc($result)) {
		$PontDeferPres = $row['PontDeferPres'];
		$PontDeferExte = $row['PontDeferExte'];
		$PontDeferInterno = $row['PontDeferInterno'];
		
		$PontDeferPresTotal_RSC1 = number_format($PontDeferPresTotal_RSC1 + $PontDeferPres,2);
		$PontDeferExteTotal_RSC1 = number_format($PontDeferExteTotal_RSC1 + $PontDeferExte,2);
		$PontDeferInternoTotal_RSC1 = number_format($PontDeferInternoTotal_RSC1 + $PontDeferInterno,2);	
	}

	$PontDeferPresTotal_RSC2 = 0;
	$PontDeferExteTotal_RSC2 = 0;
	$PontDeferInternoTotal_RSC2 = 0;
	$query = "SELECT * FROM $nomeTab WHERE nivel='RSCII'";
	$result = mysqli_query($link, $query); 
	while($row = mysqli_fetch_assoc($result)) {
		$PontDeferPres = $row['PontDeferPres'];
		$PontDeferExte = $row['PontDeferExte'];
		$PontDeferInterno = $row['PontDeferInterno'];
		
		$PontDeferPresTotal_RSC2 = number_format($PontDeferPresTotal_RSC2 + $PontDeferPres,2);
		$PontDeferExteTotal_RSC2 = number_format($PontDeferExteTotal_RSC2 + $PontDeferExte,2);
		$PontDeferInternoTotal_RSC2 = number_format($PontDeferInternoTotal_RSC2 + $PontDeferInterno,2);	
	}
	
	$PontDeferPresTotal_RSC3 = 0;
	$PontDeferExteTotal_RSC3 = 0;
	$PontDeferInternoTotal_RSC3 = 0;
	$query = "SELECT * FROM $nomeTab WHERE nivel='RSCIII'";
	$result = mysqli_query($link, $query); 
	while($row = mysqli_fetch_assoc($result)) {
		$PontDeferPres = $row['PontDeferPres'];
		$PontDeferExte = $row['PontDeferExte'];
		$PontDeferInterno = $row['PontDeferInterno'];
		
		$PontDeferPresTotal_RSC3 = number_format($PontDeferPresTotal_RSC3 + $PontDeferPres,2);
		$PontDeferExteTotal_RSC3 = number_format($PontDeferExteTotal_RSC3 + $PontDeferExte,2);
		$PontDeferInternoTotal_RSC3 = number_format($PontDeferInternoTotal_RSC3 + $PontDeferInterno,2);	
	}
	
	$pontPresidenteGlobal = 0;
	$pontMembExternoGlobal = 0;
	$pontMembInternoGlobal = 0;
	
	$PontDeferPresTotal = number_format($PontDeferPresTotal_RSC1+$PontDeferPresTotal_RSC2+$PontDeferPresTotal_RSC3,2);
	$PontDeferExteTotal = number_format($PontDeferExteTotal_RSC1+$PontDeferExteTotal_RSC2+$PontDeferExteTotal_RSC3,2);
	$PontDeferInternoTotal = number_format($PontDeferInternoTotal_RSC1+$PontDeferInternoTotal_RSC2+$PontDeferInternoTotal_RSC3,2);
	
	$Pontos = [$PontDeferPresTotal,$PontDeferPresTotal_RSC1,$PontDeferPresTotal_RSC2,$PontDeferPresTotal_RSC3,$PontDeferExteTotal,$PontDeferExteTotal_RSC1,$PontDeferExteTotal_RSC2,$PontDeferExteTotal_RSC3,$PontDeferInternoTotal,$PontDeferInternoTotal_RSC1,$PontDeferInternoTotal_RSC2,$PontDeferInternoTotal_RSC3];
	return $Pontos;
}

/* 
Verifica se a pontuação global atribuída pela Comissão Especial aprova o pedido de RSC. Se a maioria aprova, a resposta é DEFERIDO.
Entradas:
	$PontDeferPresTotal: pontuação total dada pelo presidente da comissão especial
	$PontDeferExteTotal: pontuação total dada pelo membro externo da comissão especial
	$PontDeferInternoTotal: pontuação total dada pelo membro interno da comissão especial
Saída:
	$parecer: INDEFERIDO ou DEFERIDO
*/
function fnParecerPontGlobal($PontDeferPresTotal, $PontDeferExteTotal, $PontDeferInternoTotal) {
	global $pontGlobal;		// definição em variaveis.php
	$parecer = "INDEFERIDO";

	if (($PontDeferPresTotal >= $pontGlobal) && ($PontDeferExteTotal >= $pontGlobal) && ($PontDeferInternoTotal >= $pontGlobal)) {
		$parecer = "DEFERIDO";
	}
	elseif (($PontDeferPresTotal >= $pontGlobal) && ($PontDeferExteTotal >= $pontGlobal)) {
		$parecer = "DEFERIDO";
	}
	elseif (($PontDeferPresTotal >= $pontGlobal) && ($PontDeferInternoTotal >= $pontGlobal)) {
		$parecer = "DEFERIDO";
	}
	elseif (($PontDeferExteTotal >= $pontGlobal) && ($PontDeferInternoTotal >= $pontGlobal)) {
		$parecer = "DEFERIDO";
	}
	
	return $parecer;
}

/* */
function fnParecerPontNivel($pontPresidente, $pontMembroExterno, $pontMembroInterno) {
	global $pontRSC;		// definição em variaveis.php
	$parecer = "INDEFERIDO";

	if (($pontPresidente >= $pontRSC) && ($pontMembroExterno >= $pontRSC) && ($pontMembroInterno >= $pontRSC)) {
		$parecer = "DEFERIDO";
	}
	elseif (($pontPresidente >= $pontRSC) && ($pontMembroExterno >= $pontRSC)) {
		$parecer = "DEFERIDO";
	}
	elseif (($pontPresidente >= $pontRSC) && ($pontMembroInterno >= $pontRSC)) {
		$parecer = "DEFERIDO";
	}
	elseif (($pontMembroExterno >= $pontRSC) && ($pontMembroInterno >= $pontRSC)) {
		$parecer = "DEFERIDO";
	}
	
	return $parecer;}

/* *********************************************
Busca pela data que obteve o benefício RSC
Entradas:
	$link: conexão com banco de dados
	$rsc: nível de rsc requerido
	$siapeDocente: número do siape do docente requerente
	$nomeAvaliador: nome do avaliador do pedido de RSC
	$idPedidoRSC: nº do pedido de RSC referente a tabela "TabPedidoRSC_" . $siape
	$formatodata: 
				0 = formato da data de retorno padrão dd/mm/aaaa
				1 = formato da data do banco de dados mySQL	
	
Saída:
	$datadoc: data em que o benefício foi alcançado
********************************************* */
function fnDataConcessaoPorAvaliador($link, $rsc, $siapeDocente, $nomeAvaliador, $idPedidoRSC, $formatodata=0) {
	
	$ptoMaximaRSCI_A = 0;
	$ptoMaximaRSCI_B = 0;
	$ptoMaximaRSCI_C = 0;
	$ptoMaximaRSCI_D = 0;
	$ptoMaximaRSCI_E = 0;
	$ptoMaximaRSCI_F = 0;
	$ptoMaximaRSCI_G = 0;
	$ptoMaximaRSCI_H = 0;
	$ptoMaximaRSCII_A = 0;
	$ptoMaximaRSCII_B = 0;
	$ptoMaximaRSCII_C = 0;
	$ptoMaximaRSCII_D = 0;
	$ptoMaximaRSCII_E = 0;
	$ptoMaximaRSCII_F = 0;
	$ptoMaximaRSCII_G = 0;
	$ptoMaximaRSCIII_A = 0;
	$ptoMaximaRSCIII_B = 0;
	$ptoMaximaRSCIII_C = 0;
	$ptoMaximaRSCIII_D = 0;
	$ptoMaximaRSCIII_E = 0;
	$ptoMaximaRSCIII_F = 0;
	$ptoMaximaRSCIII_G = 0;	
	// Busca os valores de pontuação máxima para cada diretriz
	$query = "SELECT nivel,diretriz,PontuacaoMax FROM QuadroPontuacaoMax";
	$result = mysqli_query($link, $query);
	while ($row = mysqli_fetch_assoc($result)) {
		$nivel = $row['nivel'];
		$diretriz = $row['diretriz'];
		$ptoMaxima = $row['PontuacaoMax'];
		
		if (strcmp($nivel,"RSCI") == 0 & strcmp($diretriz,"A") == 0) {
			$ptoMaximaRSCI_A = $ptoMaxima;
		}
		if (strcmp($nivel,"RSCI") == 0 & strcmp($diretriz,"B") == 0) {
			$ptoMaximaRSCI_B = $ptoMaxima;
		}
		if (strcmp($nivel,"RSCI") == 0 & strcmp($diretriz,"C") == 0) {
			$ptoMaximaRSCI_C = $ptoMaxima;
		}
		if (strcmp($nivel,"RSCI") == 0 & strcmp($diretriz,"D") == 0) {
			$ptoMaximaRSCI_D = $ptoMaxima;
		}
		if (strcmp($nivel,"RSCI") == 0 & strcmp($diretriz,"E") == 0) {
			$ptoMaximaRSCI_E = $ptoMaxima;
		}
		if (strcmp($nivel,"RSCI") == 0 & strcmp($diretriz,"F") == 0) {
			$ptoMaximaRSCI_F = $ptoMaxima;
		}
		if (strcmp($nivel,"RSCI") == 0 & strcmp($diretriz,"G") == 0) {
			$ptoMaximaRSCI_G = $ptoMaxima;
		}
		if (strcmp($nivel,"RSCI") == 0 & strcmp($diretriz,"H") == 0) {
			$ptoMaximaRSCI_H = $ptoMaxima;
		}
		if (strcmp($nivel,"RSCII") == 0 & strcmp($diretriz,"A") == 0) {
			$ptoMaximaRSCII_A = $ptoMaxima;
		}
		if (strcmp($nivel,"RSCII") == 0 & strcmp($diretriz,"B") == 0) {
			$ptoMaximaRSCII_B = $ptoMaxima;
		}
		if (strcmp($nivel,"RSCII") == 0 & strcmp($diretriz,"C") == 0) {
			$ptoMaximaRSCII_C = $ptoMaxima;
		}
		if (strcmp($nivel,"RSCII") == 0 & strcmp($diretriz,"D") == 0) {
			$ptoMaximaRSCII_D = $ptoMaxima;
		}
		if (strcmp($nivel,"RSCII") == 0 & strcmp($diretriz,"E") == 0) {
			$ptoMaximaRSCII_E = $ptoMaxima;
		}
		if (strcmp($nivel,"RSCII") == 0 & strcmp($diretriz,"F") == 0) {
			$ptoMaximaRSCII_F = $ptoMaxima;
		}
		if (strcmp($nivel,"RSCII") == 0 & strcmp($diretriz,"G") == 0) {
			$ptoMaximaRSCII_G = $ptoMaxima;
		}
		if (strcmp($nivel,"RSCIII") == 0 & strcmp($diretriz,"A") == 0) {
			$ptoMaximaRSCIII_A = $ptoMaxima;
		}
		if (strcmp($nivel,"RSCIII") == 0 & strcmp($diretriz,"B") == 0) {
			$ptoMaximaRSCIII_B = $ptoMaxima;
		}
		if (strcmp($nivel,"RSCIII") == 0 & strcmp($diretriz,"C") == 0) {
			$ptoMaximaRSCIII_C = $ptoMaxima;
		}
		if (strcmp($nivel,"RSCIII") == 0 & strcmp($diretriz,"D") == 0) {
			$ptoMaximaRSCIII_D = $ptoMaxima;
		}
		if (strcmp($nivel,"RSCIII") == 0 & strcmp($diretriz,"E") == 0) {
			$ptoMaximaRSCIII_E = $ptoMaxima;
		}
		if (strcmp($nivel,"RSCIII") == 0 & strcmp($diretriz,"F") == 0) {
			$ptoMaximaRSCIII_F = $ptoMaxima;
		}
		if (strcmp($nivel,"RSCIII") == 0 & strcmp($diretriz,"G") == 0) {
			$ptoMaximaRSCIII_G = $ptoMaxima;
		}
	}
	
	$ptoRSC1_A = 0;
	$ptoRSC1_B = 0;
	$ptoRSC1_C = 0;
	$ptoRSC1_D = 0;
	$ptoRSC1_E = 0;
	$ptoRSC1_F = 0;
	$ptoRSC1_G = 0;
	$ptoRSC1_H = 0;
	
	$ptoRSC2_A = 0;
	$ptoRSC2_B = 0;
	$ptoRSC2_C = 0;
	$ptoRSC2_D = 0;
	$ptoRSC2_E = 0;
	$ptoRSC2_F = 0;
	$ptoRSC2_G = 0;	
	
	$ptoRSC3_A = 0;
	$ptoRSC3_B = 0;
	$ptoRSC3_C = 0;
	$ptoRSC3_D = 0;
	$ptoRSC3_E = 0;
	$ptoRSC3_F = 0;
	$ptoRSC3_G = 0;	
	
	global $pontRSC;		// definição em variaveis.php
	global $pontGlobal;		// definição em variaveis.php
	$PtoGlobal = 0;			// Pontuação global em todos os níveis de RSC
	$PontosRSC1 = 0;		// Pontuação no nível de RSC-1
	$PontosRSC2 = 0;		// Pontuação no nível de RSC-2
	$PontosRSC3 = 0;		// Pontuação no nível de RSC-3
	$dataRSC = "";
	$numlinhas = 0;
	$TabAvaliacao = "TabPedidoRSC_" . $siapeDocente;
	$tipoAvaliador = fnTipoAvaliador($link,$nomeAvaliador,$idPedidoRSC);
	if ($tipoAvaliador == 1) {
		$query = "SELECT nivel,diretriz,datadoc,PontDefPresidente FROM $TabAvaliacao ORDER BY datadoc";
		$result = mysqli_query($link, $query);
		$numlinhas = mysqli_num_rows($result);
	}
	elseif ($tipoAvaliador == 2) {
		$query = "SELECT nivel,diretriz,datadoc,PontDefMembExt FROM $TabAvaliacao ORDER BY datadoc";
		$result = mysqli_query($link, $query);
		$numlinhas = mysqli_num_rows($result);
	}
	elseif ($tipoAvaliador == 3) {
		$query = "SELECT nivel,diretriz,datadoc,PontDefMembInterno FROM $TabAvaliacao ORDER BY datadoc";
		$result = mysqli_query($link, $query);
		$numlinhas = mysqli_num_rows($result);
	}

	if ($numlinhas > 0) {
		for ($nrows = 0; $nrows < $numlinhas; $nrows++) {
			$row = mysqli_fetch_assoc($result);
			$nivel = $row['nivel'];
			$diretriz = $row['diretriz'];
			$data = $row['datadoc'];
			if ($tipoAvaliador == 1) {
				$PontosDef = (float)$row['PontDefPresidente'];
			}
			elseif ($tipoAvaliador == 2) {
				$PontosDef = (float)$row['PontDefMembExt'];
			}
			elseif ($tipoAvaliador == 3) {
				$PontosDef = (float)$row['PontDefMembInterno'];
			}
			
			if (strcmp($nivel,"RSCI") == 0) {
				if (strcmp($diretriz,"A") == 0) {
					$ptoRSC1_A = $ptoRSC1_A + $PontosDef;
					if ($ptoRSC1_A > $ptoMaximaRSCI_A) {
						$ptoRSC1_A = $ptoMaximaRSCI_A;
					}
					$PtoGlobal = $PtoGlobal + $ptoRSC1_A;
				}
				if (strcmp($diretriz,"B") == 0) {
					$ptoRSC1_B = $ptoRSC1_B + $PontosDef;
					if ($ptoRSC1_B > $ptoMaximaRSCI_B) {
						$ptoRSC1_B = $ptoMaximaRSCI_B;
					}
					$PtoGlobal = $PtoGlobal + $ptoRSC1_B;
				}
				if (strcmp($diretriz,"C") == 0) {
					$ptoRSC1_C = $ptoRSC1_C + $PontosDef;
					if ($ptoRSC1_C > $ptoMaximaRSCI_C) {
						$ptoRSC1_C = $ptoMaximaRSCI_C;
					}
					$PtoGlobal = $PtoGlobal + $ptoRSC1_C;
				}
				if (strcmp($diretriz,"D") == 0) {
					$ptoRSC1_D = $ptoRSC1_D + $PontosDef;
					if ($ptoRSC1_D > $ptoMaximaRSCI_D) {
						$ptoRSC1_D = $ptoMaximaRSCI_D;
					}
					$PtoGlobal = $PtoGlobal + $ptoRSC1_D;
				}
				if (strcmp($diretriz,"E") == 0) {
					$ptoRSC1_E = $ptoRSC1_E + $PontosDef;
					if ($ptoRSC1_E > $ptoMaximaRSCI_E) {
						$ptoRSC1_E = $ptoMaximaRSCI_E;
					}
					$PtoGlobal = $PtoGlobal + $ptoRSC1_E;
				}
				if (strcmp($diretriz,"F") == 0) {
					$ptoRSC1_F = $ptoRSC1_F + $PontosDef;
					if ($ptoRSC1_F > $ptoMaximaRSCI_F) {
						$ptoRSC1_F = $ptoMaximaRSCI_F;
					}
					$PtoGlobal = $PtoGlobal + $ptoRSC1_F;
				}
				if (strcmp($diretriz,"G") == 0) {
					$ptoRSC1_G = $ptoRSC1_G + $PontosDef;
					if ($ptoRSC1_G > $ptoMaximaRSCI_G) {
						$ptoRSC1_G = $ptoMaximaRSCI_G;
					}
					$PtoGlobal = $PtoGlobal + $ptoRSC1_G;
				}
				if (strcmp($diretriz,"H") == 0) {
					$ptoRSC1_H = $ptoRSC1_H + $PontosDef;
					if ($ptoRSC1_H > $ptoMaximaRSCI_H) {
						$ptoRSC1_H = $ptoMaximaRSCI_H;
					}
					$PtoGlobal = $PtoGlobal + $ptoRSC1_H;
				}
				$PontosRSC1 = $ptoRSC1_A + $ptoRSC1_B + $ptoRSC1_C + $ptoRSC1_D + $ptoRSC1_E + $ptoRSC1_F + $ptoRSC1_G + $ptoRSC1_H;
				if (strcmp($rsc,"RSC-I") == 0) {
					if (($PtoGlobal >= $pontGlobal) && ($PontosRSC1 >= $pontRSC)) {
						if ($formatodata == 0) {
							$dataRSC = fnFormatoData($data);
						} 
						else {
							$dataRSC = $data;
						}
						return $dataRSC;
						break;
					}
				}
			}
			if (strcmp($nivel,"RSCII") == 0) {
				if (strcmp($diretriz,"A") == 0) {
					$ptoRSC2_A = $ptoRSC2_A + $PontosDef;
					if ($ptoRSC2_A > $ptoMaximaRSCII_A) {
						$ptoRSC2_A = $ptoMaximaRSCII_A;
					}
					$PtoGlobal = $PtoGlobal + $ptoRSC2_A;
				}
				if (strcmp($diretriz,"B") == 0) {
					$ptoRSC2_B = $ptoRSC2_B + $PontosDef;
					if ($ptoRSC2_B > $ptoMaximaRSCII_B) {
						$ptoRSC2_B = $ptoMaximaRSCII_B;
					}
					$PtoGlobal = $PtoGlobal + $ptoRSC2_B;
				}
				if (strcmp($diretriz,"C") == 0) {
					$ptoRSC2_C = $ptoRSC2_C + $PontosDef;
					if ($ptoRSC2_C > $ptoMaximaRSCII_C) {
						$ptoRSC2_C = $ptoMaximaRSCII_C;
					}
					$PtoGlobal = $PtoGlobal + $ptoRSC2_C;
				}
				if (strcmp($diretriz,"D") == 0) {
					$ptoRSC2_D = $ptoRSC2_D + $PontosDef;
					if ($ptoRSC2_D > $ptoMaximaRSCII_D) {
						$ptoRSC2_D = $ptoMaximaRSCII_D;
					}
					$PtoGlobal = $PtoGlobal + $ptoRSC2_D;
				}
				if (strcmp($diretriz,"E") == 0) {
					$ptoRSC2_E = $ptoRSC2_E + $PontosDef;
					if ($ptoRSC2_E > $ptoMaximaRSCII_E) {
						$ptoRSC2_E = $ptoMaximaRSCII_E;
					}
					$PtoGlobal = $PtoGlobal + $ptoRSC2_E;
				}
				if (strcmp($diretriz,"F") == 0) {
					$ptoRSC2_F = $ptoRSC2_F + $PontosDef;
					if ($ptoRSC2_F > $ptoMaximaRSCII_F) {
						$ptoRSC2_F = $ptoMaximaRSCII_F;
					}
					$PtoGlobal = $PtoGlobal + $ptoRSC2_F;
				}
				if (strcmp($diretriz,"G") == 0) {
					$ptoRSC2_G = $ptoRSC2_G + $PontosDef;
					if ($ptoRSC2_G > $ptoMaximaRSCII_G) {
						$ptoRSC2_G = $ptoMaximaRSCII_G;
					}
					$PtoGlobal = $PtoGlobal + $ptoRSC2_G;
				}
				$PontosRSC2 = $ptoRSC2_A + $ptoRSC2_B + $ptoRSC2_C + $ptoRSC2_D + $ptoRSC2_E + $ptoRSC2_F + $ptoRSC2_G;
				if (strcmp($rsc,"RSC-II") == 0) {
					if (($PtoGlobal >= $pontGlobal) && ($PontosRSC2 >= $pontRSC)) {
						if ($formatodata == 0) {
							$dataRSC = fnFormatoData($data);
						} 
						else {
							$dataRSC = $data;
						}
						return $dataRSC;
						break;
					}
				}				
			}
			
			if (strcmp($nivel,"RSCIII") == 0) {
				if (strcmp($diretriz,"A") == 0) {
					$ptoRSC3_A = $ptoRSC3_A + $PontosDef;
					if ($ptoRSC3_A > $ptoMaximaRSCIII_A) {
						$ptoRSC3_A = $ptoMaximaRSCIII_A;
					}
					$PtoGlobal = $PtoGlobal + $ptoRSC3_A;
				}
				if (strcmp($diretriz,"B") == 0) {
					$ptoRSC3_B = $ptoRSC3_B + $PontosDef;
					if ($ptoRSC3_B > $ptoMaximaRSCIII_B) {
						$ptoRSC3_B = $ptoMaximaRSCIII_B;
					}
					$PtoGlobal = $PtoGlobal + $ptoRSC3_B;
				}
				if (strcmp($diretriz,"C") == 0) {
					$ptoRSC3_C = $ptoRSC3_C + $PontosDef;
					if ($ptoRSC3_C > $ptoMaximaRSCIII_C) {
						$ptoRSC3_C = $ptoMaximaRSCIII_C;
					}
					$PtoGlobal = $PtoGlobal + $ptoRSC3_C;
				}
				if (strcmp($diretriz,"D") == 0) {
					$ptoRSC3_D = $ptoRSC3_D + $PontosDef;
					if ($ptoRSC3_D > $ptoMaximaRSCIII_D) {
						$ptoRSC3_D = $ptoMaximaRSCIII_D;
					}
					$PtoGlobal = $PtoGlobal + $ptoRSC3_D;
				}
				if (strcmp($diretriz,"E") == 0) {
					$ptoRSC3_E = $ptoRSC3_E + $PontosDef;
					if ($ptoRSC3_E > $ptoMaximaRSCIII_E) {
						$ptoRSC3_E = $ptoMaximaRSCIII_E;
					}
					$PtoGlobal = $PtoGlobal + $ptoRSC3_E;
				}
				if (strcmp($diretriz,"F") == 0) {
					$ptoRSC3_F = $ptoRSC3_F + $PontosDef;
					if ($ptoRSC3_F > $ptoMaximaRSCIII_F) {
						$ptoRSC3_F = $ptoMaximaRSCIII_F;
					}
					$PtoGlobal = $PtoGlobal + $ptoRSC3_F;
				}
				if (strcmp($diretriz,"G") == 0) {
					$ptoRSC3_G = $ptoRSC3_G + $PontosDef;
					if ($ptoRSC3_G > $ptoMaximaRSCIII_G) {
						$ptoRSC3_G = $ptoMaximaRSCIII_G;
					}
					$PtoGlobal = $PtoGlobal + $ptoRSC3_G;
				}
				$PontosRSC3 = $ptoRSC3_A + $ptoRSC3_B + $ptoRSC3_C + $ptoRSC3_D + $ptoRSC3_E + $ptoRSC3_F + $ptoRSC3_G;
				if (strcmp($rsc,"RSC-III") == 0) {
					if (($PtoGlobal >= $pontGlobal) && ($PontosRSC3 >= $pontRSC)) {
						if ($formatodata == 0) {
							$dataRSC = fnFormatoData($data);
						} 
						else {
							$dataRSC = $data;
						}
						return $dataRSC;
						break;
					}
				}
			}
		}
		// Se percorrer todo o for e chegou até aqui, precisamos testar novamente, porque a busca foi organizada por data, e o docente pode precisar de toda pontuação para alcançar o benefício, e o for foi pensado em atingir o benefício o quanto antes. Assim, valerá a data do documento mais recente.
		/* FALTA CONFERIR A DATA DO DIREITO AO BENEFÍCIO, DATA DA PORTARIA DE RT */
		if ((strcmp($rsc,"RSC-I") == 0) && ($PtoGlobal >= $pontGlobal) && ($PontosRSC1 >= $pontRSC)) {
			if ($formatodata == 0) {
				$dataRSC = fnFormatoData($data);
			} 
			else {
				$dataRSC = $data;
			}
			return $dataRSC;
		}
		if ((strcmp($rsc,"RSC-II") == 0) && ($PtoGlobal >= $pontGlobal) && ($PontosRSC2 >= $pontRSC)) {
			if ($formatodata == 0) {
				$dataRSC = fnFormatoData($data);
			} 
			else {
				$dataRSC = $data;
			}
			return $dataRSC;
		}
		if ((strcmp($rsc,"RSC-III") == 0) && ($PtoGlobal >= $pontGlobal) && ($PontosRSC3 >= $pontRSC)) {
			if ($formatodata == 0) {
				$dataRSC = fnFormatoData($data);
			} 
			else {
				$dataRSC = $data;
			}
			return $dataRSC;
		}
	}
	if (strcmp($dataRSC,"") == 0){
		$dataRSC = "não alcançou o benefício";
	}
	return $dataRSC;
}

/*
Entradas:
	$link: conexão com banco de dados
	$nomeTab: nome da tabela "TabPedidoRSC_" . $siape

Saída: 
	$AvalPronta = 0 -> avaliação ainda não está completa
	$AvalPronta = 1 -> todos os avaliadores já terminaram a avaliação
*/
function fnAvaliacaoProntaParaFinalizar($link, $nomeTab) {
	$AvalPronta = 0;
	
	$query = "SELECT unidDefPresidente,unidDefMembExt,unidDefMembInterno FROM $nomeTab ORDER BY id";
	$result = mysqli_query($link, $query); 
	while ($row = mysqli_fetch_assoc($result)) {
		$unidPresidente = $row['unidDefPresidente'];
		$unidMembExt = $row['unidDefMembExt'];
		$unidMembInterno = $row['unidDefMembInterno'];
		
		if (!is_null($unidPresidente) && !is_null($unidMembExt) && !is_null($unidMembInterno)) {
			$AvalPronta = 1;
		}
		else {
			$AvalPronta = 0;
		}
	}
	return $AvalPronta;
}
?>