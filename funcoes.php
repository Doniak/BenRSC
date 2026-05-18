<?php

// Pontuações definidas na nova resolução da CPRSC
//$pontRSC = 36;
//$pontGlobal = 60;

// Pontuações definidas na resolução
$pontRSC = 25;
$pontGlobal = 50;

class clQuadroPontRSC {
	public $descricao;
	public $pontMax;
	public $totalpontos;
}

$pathserver = "http://localhost:81/RSC/";

/* Funções Gerais */
function fnNomeMes($mes) {
	switch ($mes) {
		case 1:
			return "janeiro";
		case 2:
			return "fevereiro";
		case 3:
			return "março";
		case 4: 
			return "abril";
		case 5:
			return "maio";
		case 6: 
			return "junho";
		case 7:
			return "julho";
		case 8:
			return "agosto";
		case 9:
			return "setembro";
		case 10:
			return "outubro";
		case 11:
			return "novembro";
		case 12:
			return "dezembro";
		default:
			return "";
	}
}

function fnFormatoData($dataSQL) {
	$datestamp = strtotime($dataSQL);
	$dia = date('d',$datestamp);
	$mes = date('m',$datestamp);
	$ano = date('Y',$datestamp);
	
	$data = $dia . "/" . $mes . "/" . $ano;
	return $data;
}

/*
	Codifica o ID de cada usuário quando ele passado pela URL
*/
function fnEncodeID($idHash) {
	$criptoID = password_hash($idHash, PASSWORD_DEFAULT);
	return $criptoID;
}

/*
	Decodifica o ID do usuário que foi passado pela URL
*/
function fnDecodeID($link,$criptoID,$tabela) {
	$IDdecoded = 0;
	$query = "SELECT id FROM $tabela";
	$result = mysqli_query($link, $query);
	while ($row = mysqli_fetch_assoc($result)) {
		$idHash = $row['id'];
		// Verify the hash code against the unencrypted password entered 
  		$verify = password_verify($idHash, $criptoID);
		if ($verify) {
			$IDdecoded = $idHash;
			break;
		}
	}
	return $IDdecoded;
}

/* 
Apresenta mensagem de erro ao usuário com duração de 3 segundos e depois vai para a página indicada
Entradas:
	$url -> página de destino após 3s que a mensagem de erro é exibida
	$msgErro -> mensagem de erro
*/
function fnMsgErro($url, $msgErro) {
	//echo "<meta http-equiv='refresh' content='3;URL=index.php'>";
	echo "<meta http-equiv='refresh' content='3; URL=". $url ."'>";
	
	echo "<div style='background-color:#1A5321;'><div class='container bg-transparent'></div></div>" ;
	echo "<div style='background-color: #1A5321;'><BR>
			<div class='container' style='background-color: whitesmoke;'>
				<div class='row'>
					<p align='center'><img src='images/IFSC_horizontal.png' width='40%'></p>
				</div>
			</div>
		</div>
		<div style='background-color: #1A5321;'>
			<div class='container' style='background-color: #E4EBE2;'>
				<div class='row'><p><h3 align='center' style='color: #C50923;'>";

	echo nl2br($msgErro . "\n");
	
	echo "</h3></p></div></div></div>";
	include "rodape.php";
}

?>