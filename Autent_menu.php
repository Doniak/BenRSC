<!DOCTYPE html>
<?php
$nome = "Autenticador";
$idAuth = 0;
if(isset($_GET["idAuth"])) {
	$idAuth = fnDecodeID($link, $_GET["idAuth"], 'TabAutenticador');
	if ($idAuth > 0) {
		$query = "SELECT nome FROM TabAutenticador WHERE id='$idAuth'";
		$result = mysqli_query($link, $query) or die("Bad Query: $query");
		$row = mysqli_fetch_assoc($result);
		$nome = $row['nome'];
	}
}
?>
<nav class="navbar navbar-expand-sm navbar-expand-md navbar-expand-lg navbar-expand-xl navbar-dark bg-transparent">
	<a class="navbar-brand" href="Autent_inicio.php?idAuth=<?php echo fnEncodeID($idAuth);?>"><img src="images/CPPD.jpg" width="164" height="55"></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNavDropdown">
		<ul class="navbar-nav">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Atenticação de documentos</a>
				<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					<li><a class="dropdown-item" href="Autent_pendentes.php?idAuth=<?php echo fnEncodeID($idAuth);?>">Autenticações pendentes</a></li>
					<li><a class="dropdown-item" href="Autent_uploaddoc.php?idAuth=<?php echo fnEncodeID($idAuth);?>">Carrega documento autenticado</a></li>
					<li><hr></li>
					<li><a class="dropdown-item" href="Autent_realizadas.php?idAuth=<?php echo fnEncodeID($idAuth);?>">Autenticações realizadas</a></li>
					<li><a class="dropdown-item" href="Autent_recusadas.php?idAuth=<?php echo fnEncodeID($idAuth);?>">Autenticações recusadas</a></li>
				</ul>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $nome;?></a>
				<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					<li><a class="dropdown-item" href="Autent_cadastro.php?idAuth=<?php echo fnEncodeID($idAuth);?>">Meu cadastro</a></li>
					<li><a class="dropdown-item" href="Autent_alterarcadastro.php?idAuth=<?php echo fnEncodeID($idAuth);?>">Alterar cadastro</a></li>
					<li><a class="dropdown-item" href="Autent_excluircadastro.php?idAuth=<?php echo fnEncodeID($idAuth);?>">Excluir cadastro</a></li>
					<li><hr></li>
					<li><a class="dropdown-item" href="Autent_tutorial.php?idAuth=<?php echo fnEncodeID($idAuth);?>" target="_blank">Tutorial do Ambiente Autenticador</a></li>
					<li><a class="dropdown-item" href="lgpd.php" target="_blank">Política de privacidade</a></li>
					<li><hr></li>
					<li><a class="dropdown-item" href="index.php">Sair</a></li>
				</ul>
			</li>
		</ul>
	</div>
</nav>