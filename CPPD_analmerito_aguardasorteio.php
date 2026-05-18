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
?>	
	<div style="background-color:#1A5321;">
		<div class="container bg-transparent">
<?php 
			include "CPPD_menu.php";
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
			
	<div  style="background-color: #1A5321;">
		<div class="container" style="background-color: #E4EBE2;">
			<div class="row">
				<p><h2 align="center" style="color: #32A041;"><b>Ambiente CPPD</b></h2></p>
				<p><h3 align="center" style="color: #1A5321;"><b>Pedidos de RSC aguardando sorteio da Comissão Especial</b></h3></p>
				<p align="justify" style="color: #1A5321;">Os pedidos que chegaram até aqui é porque já foram aprovados na análise de forma realizada pela CPPD. Assim, agora a Comissão Especial precisa ser sorteada na plataforma SIMEC, para que os avaliadores convidados sejam distribuídos para o referido pedido. Antes de alocar o avaliador à Comissão Especial, será necessário fazer o seu cadastro no aplicativo. </p>
			</div>
		</div>
	</div>
<?php
	$query = "SELECT * FROM TabSolicitaRSC WHERE estado='aguarda_sorteio_banca'";
	$result = mysqli_query($link, $query); 
	$numlinhas = mysqli_num_rows($result);
	if ($numlinhas > 0) {
?>		
	<div  style="background-color: #1A5321;">
		<BR>
		<div class="container" style="background-color: #E4EBE2; ">
			<BR>
			<table align='justify' width="100%" style="border: 4px solid #1A5321;">
				<tr align="center" style="border: 2px solid #1A5321;">
					<th align="center" style="color: #1A5321;">RSC</th>
					<th align="center" style="color: #1A5321;">Docente</th>
					<th align="center" style="color: #1A5321;">Campus</th>
					<th align="center" style="color: #1A5321;">E-mail</th>
					<th align="center" style="color: #1A5321;">Data do<BR>pedido</th>
					<th align="center" style="color: #1A5321;">Entrada p/<BR>sorteio</th>
					<th align="center" style="color: #1A5321;">Distribui p/<BR>Comissão Especial</th>
				</tr>
<?php
					while ($row = mysqli_fetch_assoc($result)) {
						$idPedido = $row['id'];
						$docente = $row['docente'];
						$rsc = $row['rsc'];
						$siape = $row['siape'];
						$email = $row['email'];
						$datapedido = $row['datapedido'];
						$dataAprovAnaliseForma = $row['dataMovimentacao'];
						$campus = $row['campus'];
						$avaliadorCPPD = $row['avaliadorCPPD'];
?>
						<tr>
							<td align="center"><?php echo $rsc;?></td>
							<td align="center"><?php echo $docente;?></td>
							<td align="center"><?php echo $campus;?></td>
							<td align="center"><?php echo $email;?></td>
							<td align="center"><?php echo fnFormatoData($datapedido);?></td>
							<td align="center"><?php echo fnFormatoData($dataAprovAnaliseForma);?></td>
							<td align="center">
								<form action="CPPD_distribuicomissaoespecial.php?idCPPD=<?php echo fnEncodeID($idCPPD);?>" method="post">
									<input type="hidden" name="idPedido" value="<?php echo $idPedido;?>">
									<input type="hidden" name="docente" value="<?php echo $docente;?>">
									<input type="hidden" name="siape" value="<?php echo $siape;?>">
									<input type="hidden" name="email" value="<?php echo $email;?>">
<?php
									if ($idCPPD <= 3) {
?>
									<input type="submit" class="btn" value="Ditribuir" style="border-radius: 8px; border: 3px solid #1A5321;; color: white; padding: 8px 8px; font-size: 15px; background-color: #1A5321;">
<?php
									}
									else {
?>
									<input type="submit" disabled="disabled" class="btn" value="Ditribuir" style="border-radius: 8px; border: 3px solid #1A5321;; color: white; padding: 8px 8px; font-size: 15px; background-color: #1A5321;">
<?php
									}
?>
								</form>
							</td>
						</tr>
<?php
					}
?>
			</table>
			<BR>
		</div>
	</div>
<?php
	}
	include "botaovoltar.php";
	fnDesconectaBD($link);
	include "rodape.php";
?>
		
</body>
</html>