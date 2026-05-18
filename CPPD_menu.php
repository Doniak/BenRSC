<!DOCTYPE html>
<?php
$nome = "CPPD";
$email = "E-mail não encontrado";
$idCPPD = 0;
if(isset($_GET["idCPPD"])) {
	$idCPPD = fnDecodeID($link, $_GET["idCPPD"], 'TabCPPD');
	if ($idCPPD > 0) {
		$query = "SELECT usuario,email FROM TabCPPD WHERE id='$idCPPD'";
		$result = mysqli_query($link, $query) or die("Bad Query: $query");
		$row = mysqli_fetch_assoc($result);
		$nome = $row['usuario'];
		$email = $row['email'];
	}
}
$nomeAvaliadorCPPD = $nome;
?>
<nav class="navbar navbar-expand-sm navbar-expand-md navbar-expand-lg navbar-expand-xl navbar-dark bg-transparent">
	<a class="navbar-brand" href="CPPD_inicio.php?idCPPD=<?php echo fnEncodeID($idCPPD);?>"><img src="images/CPPD.jpg" width="164" height="55"></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNavDropdown">
		<ul class="navbar-nav">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Análise de forma</a>
				<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					<li><a class="dropdown-item" href="CPPD_novopedido.php?idCPPD=<?php echo fnEncodeID($idCPPD);?>">Distribuir para análise de forma</a></li>
					<li><a class="dropdown-item" href="CPPD_analiseforma.php?idCPPD=<?php echo fnEncodeID($idCPPD);?>">Pedidos em análise de forma</a></li>
<?php
					if ((strcmp($email,"cppd.secretaria@ifsc.edu.br") != 0) && (strcmp($email,"cdp.secretaria@ifsc.edu.br") != 0)) {
?>
						<li><hr></li>
						<li><a class="dropdown-item" href="CPPD_analiseforma.php?idCPPD=<?php echo fnEncodeID($idCPPD);?>">Análise de Forma</a></li>
						<li><a class="dropdown-item" href="CPPD_aprovadosanaliseforma.php?idCPPD=<?php echo fnEncodeID($idCPPD);?>">Concluir análise de Forma</a></li>
<?php
					}
?>					
<?php
					if ((strcmp($email,"cppd.secretaria@ifsc.edu.br") == 0) || (strcmp($email,"cdp.secretaria@ifsc.edu.br") == 0)) {
?>
						<li><hr></li>
						<li><a class="dropdown-item" href="CPPD_cadastramembrocppd.php?idCPPD=<?php echo fnEncodeID($idCPPD);?>">Cadastra membro da CPPD</a></li>
						<li><a class="dropdown-item" href="CPPD_alteramembrocppd.php?idCPPD=<?php echo fnEncodeID($idCPPD);?>">Altera dados do membro</a></li>
						<li><a class="dropdown-item" href="CPPD_excluimembrocppd.php?idCPPD=<?php echo fnEncodeID($idCPPD);?>">Excluí membro da CPPD</a></li>
<?php
					}
?>
					<li><hr></li>
					<li><a class="dropdown-item" href="CPPD_membroscppdcadastrados.php?idCPPD=<?php echo fnEncodeID($idCPPD);?>">Membros da CPPD cadastrados</a></li>
				</ul>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Análise de mérito</a>
				<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					<li><a class="dropdown-item" href="CPPD_analmerito_aguardasorteio.php?idCPPD=<?php echo fnEncodeID($idCPPD);?>">Processos aguardando sorteio</a></li>
					<li><hr></li>
					<li><a class="dropdown-item" href="CPPD_pedidosdistribuidos.php?idCPPD=<?php echo fnEncodeID($idCPPD);?>">Pedidos com a Comissão Especial</a></li>
					<li><a class="dropdown-item" href="CPPD_alteracomissaoespecial.php?idCPPD=<?php echo fnEncodeID($idCPPD);?>">Altera a Comissão Especial</a></li>
					<li><a class="dropdown-item" href="CPPD_pedidosRSCconcluidos.php?idCPPD=<?php echo fnEncodeID($idCPPD);?>">Pedidos de RSC concluídos</a></li>
					<li><hr></li>
					<li><a class="dropdown-item" href="CPPD_portariacomissao.php?idCPPD=<?php echo fnEncodeID($idCPPD);?>">Salva portaria da Comissão Especial</a></li>
					<li><hr></li>
					<li><a class="dropdown-item" href="CPPD_cadastraavaliador.php?idCPPD=<?php echo fnEncodeID($idCPPD);?>">Cadastra avaliador</a></li>
					<li><a class="dropdown-item" href="CPPD_alteraravaliador.php?idCPPD=<?php echo fnEncodeID($idCPPD);?>">Altera cadastro do avaliador</a></li>
					<li><a class="dropdown-item" href="CPPD_excluiravaliador.php?idCPPD=<?php echo fnEncodeID($idCPPD);?>">Excluir avaliador</a></li>
					<li><hr></li>
					<li><a class="dropdown-item" href="CPPD_avaliadorescadastrados.php?idCPPD=<?php echo fnEncodeID($idCPPD);?>">Avaliadores cadastrados</a></li>
				</ul>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $nome;?></a>
				<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					<li><a class="dropdown-item" href="CPPD_tutorial.php?idCPPD=<?php echo fnEncodeID($idCPPD);?>" target="_blank">Tutorial do Ambiente CPPD</a></li>
					<li><a class="dropdown-item" href="lgpd.php" target="_blank">Política de privacidade</a></li>
					<li><hr></li>
					<li><a class="dropdown-item" href="index.php">Sair</a></li>
				</ul>
			</li>
		</ul>
	</div>
</nav>