<!DOCTYPE html>
<?php
$nome = "Avaliador";
$idCE = 0;
if(isset($_GET["idCE"])) {
	$idCE = fnDecodeID($link, $_GET["idCE"], 'TabAvaliadoresRSC');
	if ($idCE > 0) {
		$query = "SELECT nome FROM TabAvaliadoresRSC WHERE id='$idCE'";
		$result = mysqli_query($link, $query) or die("Bad Query: $query");
		$row = mysqli_fetch_assoc($result);
		$nome = $row['nome'];
	}
}
$nomeAvaliador = $nome;
$EhPresidente = 0;
$query = "SELECT * FROM TabSolicitaRSC WHERE presidentebanca='$nomeAvaliador'";
$result = mysqli_query($link, $query);
$numlinhas = mysqli_num_rows($result);
if ($numlinhas > 0) {
	$row = mysqli_fetch_assoc($result);
	$EhPresidente = 1;
}
?>
<nav class="navbar navbar-expand-sm navbar-expand-md navbar-expand-lg navbar-expand-xl navbar-dark bg-transparent">
	<a class="navbar-brand" href="CE_inicio.php?idCE=<?php echo fnEncodeID($idCE);?>"><img src="images/CPPD.jpg" width="164" height="55"></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNavDropdown">
		<ul class="navbar-nav">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Comissão Especial de Avaliação</a>
				<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					<li><a class="dropdown-item" href="CE_avaliacoespendentes.php?idCE=<?php echo fnEncodeID($idCE);?>">Avaliar pedido de RSC</a></li>
					<li><a class="dropdown-item" href="CE_quadropontuacaolista.php?idCE=<?php echo fnEncodeID($idCE);?>">Quadro de pontuação</a></li>
					<li><a class="dropdown-item" href="CE_avaliacaoemandamento.php?idCE=<?php echo fnEncodeID($idCE);?>">Minhas avaliações em curso</a></li>
<?php
					if ($EhPresidente == 1) {
?>						
					<li><a class="dropdown-item" href="CE_finalizaavaliacaoRSC.php?idCE=<?php echo fnEncodeID($idCE);?>">Finaliza avaliação de RSC</a></li>
<?php
					}
?>
					<li><a class="dropdown-item" href="CE_#.php?idCE=<?php echo fnEncodeID($idCE);?>">Minhas avaliações concluídas</a></li>
					<li><hr></li>
					<li><a class="dropdown-item" href="CE_#.php?idCE=<?php echo fnEncodeID($idCE);?>">Solicitar saída de Comissão Especial</a></li>
					<li><hr></li>
					<li><a class="dropdown-item" href="CE_#.php?idCE=<?php echo fnEncodeID($idCE);?>">Minhas Comissões Especiais</a></li>
					<li><a class="dropdown-item" href="CE_#.php?idCE=<?php echo fnEncodeID($idCE);?>">Minhas Portarias</a></li>					
				</ul>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $nome;?></a>
				<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					<li><a class="dropdown-item" href="CE_#.php?idCE=<?php echo fnEncodeID($idCE);?>">Alterar cadastro</a></li>
					<li><a class="dropdown-item" href="CE_#.php?idCE=<?php echo fnEncodeID($idCE);?>">Excluir cadastro</a></li>
					<li><hr></li>
					<li><a class="dropdown-item" href="CE_tutorial.php?idCE=<?php echo fnEncodeID($idCE);?>" target="_blank">Tutorial do Ambiente Avaliador</a></li>
					<li><a class="dropdown-item" href="lgpd.php" target="_blank">Política de privacidade</a></li>
					<li><hr></li>
					<li><a class="dropdown-item" href="index.php">Sair</a></li>
				</ul>
			</li>
		</ul>
	</div>
</nav>