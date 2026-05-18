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
	<div style="background-color:#1A5321;">
		<div class="container bg-transparent">
<?php 
			include "CPPD_menu.php";
?>				
		</div>
	</div>

<?php
if(!empty($_POST)) {
	$idPedido = $_POST['idPedido'];
	$docente = $_POST['docente'];
	$siape = $_POST['siape'];
	$email = $_POST['email'];
	
	$query = "SELECT * FROM TabSolicitaRSC WHERE id=$idPedido";
	$result = mysqli_query($link, $query);
	$row = mysqli_fetch_assoc($result);
	$sipac = $row['sipac'];
	$campus = $row['campus'];
	$dataCPPD = $row['dataMovimentacao'];
	
	$query = "SELECT ife FROM TabDocente WHERE siape='$siape'";
	$result = mysqli_query($link, $query);
	$row = mysqli_fetch_assoc($result);
	$ifedocente = $row['ife'];

	//header("Location: CPPD_#.php?idCPPD=$idCPPD");
}
else {
	header("Location: JavaScript: window.history.back();");
}
?>
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
				<p><h3 align="center" style="color: #1A5321;"><b>Distribui o pedido de RSC para os avaliadores sorteados<BR>para compor a Comissão Especial</b></h3></p>
			</div>
		</div>
	</div>
	
	<div style="background-color: #1A5321;">
		<BR>
		<div class="container" style="background-color: #E4EBE2;">
			<BR>
			<form action="CPPD_distribuicomissaoespecial_rx.php?idCPPD=<?php echo fnEncodeID($idCPPD);?>" method="post">
				<div class="row">
					<div class="coluna" align="center">
						<label>Nome completo</label><br>
						<input type="text" name="docente" size="35px" readonly style="background-color: #E9E9E9;" value="<?php echo $docente;?>"/><br>
					</div>
					<div class="coluna" align="center">
						<label>Matrícula SIAPE</label><br>
						<input type="text" name="siape"  size="12px" readonly style="background-color: #E9E9E9;" value="<?php echo $siape;?>"/><br>
					</div>
					<div class="coluna" align="center">
						<label>E-mail institucional</label><br>
						<input type="email" name="email" size="35px" readonly style="background-color: #E9E9E9;" value="<?php echo $email;?>"/><br>
					</div>
				</div>
				<div class="row">
					<div class="coluna" align="center">
						<label>Nº do processo no SIPAC</label><br>
						<input type="text" name="sipac" size="35px" readonly style="background-color: #E9E9E9;" value="<?php echo $sipac;?>"/><br>
					</div>
					<div class="coluna" align="center">
						<label>Campus</label><br>
						<input type="text" name="campus" size="25px" readonly style="background-color: #E9E9E9;" value="<?php echo $campus;?>"/><br>
					</div>
					<div class="coluna" align="center">
						<label>Última movimentação</label><br>
						<input type="date" name="dataCPPD" readonly style="background-color: #E9E9E9;" value="<?php echo $dataCPPD;?>"/><br>
					</div>
				</div>
				<div class="row">
					<div class="coluna" align="center">
						<label>Presidente da Comissão Especial</label><br>
						<select name="presidente" required>
							<option>Selecione o presidente da comissão</option>
<?php
						$query = "SELECT nome,ife FROM TabAvaliadoresRSC ORDER BY nome";
						$result = mysqli_query($link, $query); 
						$numlinhas = mysqli_num_rows($result);
						if ($numlinhas > 0) {
							while ($row = mysqli_fetch_assoc($result)) {
								$nome = $row['nome'];
								$ife = $row['ife'];
								if (strcmp($ife,$ifedocente) != 0) {
?>
									<option><?php echo $nome;?></option>
<?php
								}
							}
						}
?>
						</select>
					</div>
					<div class="coluna" align="center">
						<label>Membro Externo da Comissão Especial</label><br>
						<select name="membroexterno" required>
							<option>Selecione o membro externo da comissão</option>
<?php
						$query = "SELECT nome,ife FROM TabAvaliadoresRSC ORDER BY nome";
						$result = mysqli_query($link, $query); 
						$numlinhas = mysqli_num_rows($result);
						if ($numlinhas > 0) {
							while ($row = mysqli_fetch_assoc($result)) {
								$nome = $row['nome'];
								$ife = $row['ife'];
								if (strcmp($ife,$ifedocente) != 0) {
?>
									<option><?php echo $nome;?></option>
<?php
								}
							}
						}
?>
						</select>
					</div>
					<div class="coluna" align="center">
						<label>Membro Interno da Comissão Especial</label><br>
						<select name="membrointerno" required>
							<option>Selecione o membro interno da comissão</option>
<?php
						$query = "SELECT nome,ife FROM TabAvaliadoresRSC ORDER BY nome";
						$result = mysqli_query($link, $query); 
						$numlinhas = mysqli_num_rows($result);
						if ($numlinhas > 0) {
							while ($row = mysqli_fetch_assoc($result)) {
								$nome = $row['nome'];
								$ife = $row['ife'];
								if (strcmp($ife,$ifedocente) == 0) {
?>
								<option><?php echo $nome;?></option>
<?php
								}
							}
						}
?>
						</select>
					</div>
				</div>
				<div class="row">
					<div align="center">
						<input type="hidden" name="idPedido" value="<?php echo $idPedido;?>"/>
						<input type="submit" class="btn" value="Salva Comissão Especial" style="border-radius: 8px; border: 3px solid #1A5321;; color: white; padding: 10px 20px; font-size: 18px; background-color: #1A5321;"/><br>
					</div>
				</div>
				<BR>
			</form>
		</div>
	</div>
	
<?php
	include "botaovoltar.php";
	fnDesconectaBD($link);
	include "rodape.php";
?>
</body>
</html>