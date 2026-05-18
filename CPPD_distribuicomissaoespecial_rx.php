<?php
include "cabecalho.php";
include "conectaBD.php";
$link = fnConectaBancoDados(); 
include "Tabelas.php";
include "funcoes.php";

$idCPPD = 0;
if(isset($_GET["idCPPD"])) {
	$idCPPD = fnDecodeID($link,$_GET["idCPPD"],'TabCPPD');
}
if(!empty($_POST)) {
	$idPedido = $_POST['idPedido'];
	$sipac = $_POST['sipac'];
	$docente = $_POST['docente'];
	$siape = $_POST['siape'];
	$email = $_POST['email'];
	$campus = $_POST['campus'];
	$telefone = $_POST['telefone'];
	$dataCPPD = $_POST['dataCPPD'];
	$presidente = $_POST['presidente'];
	$membroExterno = $_POST['membroexterno'];
	$membrointerno = $_POST['membrointerno'];
	
	$query = "SELECT siape,ife FROM TabAvaliadoresRSC WHERE nome='$presidente'";
	$result = mysqli_query($link, $query);
	$row = mysqli_fetch_assoc($result);
	$ifepresidente = $row['ife'];
	$siapepresidente = $row['siape'];
	
	$query = "SELECT siape,ife FROM TabAvaliadoresRSC WHERE nome='$membroExterno'";
	$result = mysqli_query($link, $query);
	$row = mysqli_fetch_assoc($result);
	$ifemembroexterno = $row['ife'];
	$siapemembroexterno = $row['siape'];
	
	$query = "SELECT siape,ife FROM TabAvaliadoresRSC WHERE nome='$membrointerno'";
	$result = mysqli_query($link, $query);
	$row = mysqli_fetch_assoc($result);
	$ifemembrointerno = $row['ife'];
	$siapemembrointerno = $row['siape'];
	
	$query = "UPDATE TabSolicitaRSC SET presidentebanca='$presidente', membroexterno='$membroExterno', membrointerno='$membroIFSC', ifepresidente='$ifepresidente', ifemembroexterno='$ifemembroexterno', membrointerno='$membrointerno', ifemembrointerno='$ifemembrointerno', estado='aguarda_avaliacao', dataMovimentacao=CURRENT_DATE() WHERE id='$idPedido'";
	$result = mysqli_query($link, $query);
	
	$nomeTab = "TabMinhasAvaliacoes_" . $siapepresidente;
	$query = "INSERT INTO $nomeTab (id,idPedido,siapeDocente,nomeDocente,siapePresidente,nomePresidente,siapeExterno,nomeExterno,siapeInterno,nomeInterno,dataDistribuicao,Estado) VALUES (NULL,$idPedido,'$siape','$docente','$siapepresidente','$presidente','$siapemembroexterno','$membroExterno','$siapemembrointerno','$membrointerno',CURRENT_DATE(),'0_pendente')";
	$result = mysqli_query($link, $query);
	
	$nomeTab = "TabMinhasAvaliacoes_" . $siapemembroexterno;
	$query = "INSERT INTO $nomeTab (id,idPedido,siapeDocente,nomeDocente,siapePresidente,nomePresidente,siapeExterno,nomeExterno,siapeInterno,nomeInterno,dataDistribuicao,Estado) VALUES (NULL,$idPedido,'$siape','$docente','$siapepresidente','$presidente','$siapemembroexterno','$membroExterno','$siapemembrointerno','$membrointerno',CURRENT_DATE(),'0_pendente')";
	$result = mysqli_query($link, $query);
	
	$nomeTab = "TabMinhasAvaliacoes_" . $siapemembrointerno;
	$query = "INSERT INTO $nomeTab (id,idPedido,siapeDocente,nomeDocente,siapePresidente,nomePresidente,siapeExterno,nomeExterno,siapeInterno,nomeInterno,dataDistribuicao,Estado) VALUES (NULL,$idPedido,'$siape','$docente','$siapepresidente','$presidente','$siapemembroexterno','$membroExterno','$siapemembrointerno','$membrointerno',CURRENT_DATE(),'0_pendente')";
	$result = mysqli_query($link, $query);		
	
	$idCPPD = fnEncodeID($idCPPD);
	header("Location: CPPD_analmerito_aguardasorteio.php?idCPPD=$idCPPD");
}
else {
	header("Location: JavaScript: window.history.back();");
}
fnDesconectaBD($link);
?>
