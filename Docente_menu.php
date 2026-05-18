<!DOCTYPE html>
<?php
$id = 0;
$nome = "Docente";
if(isset($_GET["id"])) {
	$id = fnDecodeID($link, $_GET["id"], 'TabDocente');
	if ($id > 0) {
		$query = "SELECT nome FROM TabDocente WHERE id='$id'";
		$result = mysqli_query($link, $query) or die("Bad Query: $query");
		$row = mysqli_fetch_assoc($result);
		$nome = $row['nome'];
	}
}
?>
<nav class="navbar navbar-expand-sm navbar-expand-md navbar-expand-lg navbar-expand-xl navbar-dark bg-transparent">
	<a class="navbar-brand" href="Docente_inicio.php?id=<?php echo fnEncodeID($id); ?>"><img src="images/CPPD.jpg" width="164" height="55"></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNavDropdown">
		<ul class="navbar-nav">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Formação</a>
				<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					<li><a class="dropdown-item" href="Docente_itinerario.php?id=<?php echo fnEncodeID($id); ?>#itinerarioformacao">Itinerário de formação</a></li>
					<li><a class="dropdown-item" href="Docente_itinerariodocs.php?id=<?php echo fnEncodeID($id); ?>">Salva os documentos</a></li>
					<li><hr></li>
					<li><a class="dropdown-item" href="Docente_itinerariosalvo.php?id=<?php echo fnEncodeID($id); ?>">Itinerário salvo</a></li>
					<li><a class="dropdown-item" href="Docente_itinerarioaltera.php?id=<?php echo fnEncodeID($id); ?>">Altera Itinerário</a></li>
				</ul>
			</li>			
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">RSC-1</a>
				<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					<li><a class="dropdown-item" href="Docente_RSC1_DiretA.php?id=<?php echo fnEncodeID($id);?>">Diretriz A</a></li>
					<li><a class="dropdown-item" href="Docente_RSC1_DiretB.php?id=<?php echo fnEncodeID($id);?>">Diretriz B</a></li>
					<li><a class="dropdown-item" href="Docente_RSC1_DiretC.php?id=<?php echo fnEncodeID($id);?>">Diretriz C</a></li>
					<li><a class="dropdown-item" href="Docente_RSC1_DiretD.php?id=<?php echo fnEncodeID($id);?>">Diretriz D</a></li>
					<li><a class="dropdown-item" href="Docente_RSC1_DiretE.php?id=<?php echo fnEncodeID($id);?>">Diretriz E</a></li>
					<li><a class="dropdown-item" href="Docente_RSC1_DiretF.php?id=<?php echo fnEncodeID($id);?>">Diretriz F</a></li>
					<li><a class="dropdown-item" href="Docente_RSC1_DiretG.php?id=<?php echo fnEncodeID($id);?>">Diretriz G</a></li>
					<li><a class="dropdown-item" href="Docente_RSC1_DiretH.php?id=<?php echo fnEncodeID($id);?>">Diretriz H</a></li>
				</ul>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
				RSC-2
				</a>
				<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					<li><a class="dropdown-item" href="Docente_RSC2_DiretA.php?id=<?php echo fnEncodeID($id);?>">Diretriz A</a></li>
					<li><a class="dropdown-item" href="Docente_RSC2_DiretB.php?id=<?php echo fnEncodeID($id);?>">Diretriz B</a></li>
					<li><a class="dropdown-item" href="Docente_RSC2_DiretC.php?id=<?php echo fnEncodeID($id);?>">Diretriz C</a></li>
					<li><a class="dropdown-item" href="Docente_RSC2_DiretD.php?id=<?php echo fnEncodeID($id);?>">Diretriz D</a></li>
					<li><a class="dropdown-item" href="Docente_RSC2_DiretE.php?id=<?php echo fnEncodeID($id);?>">Diretriz E</a></li>
					<li><a class="dropdown-item" href="Docente_RSC2_DiretF.php?id=<?php echo fnEncodeID($id);?>">Diretriz F</a></li>
					<li><a class="dropdown-item" href="Docente_RSC2_DiretG.php?id=<?php echo fnEncodeID($id);?>">Diretriz G</a></li>
				</ul>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">RSC-3</a>
				<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					<li><a class="dropdown-item" href="Docente_RSC3_DiretA.php?id=<?php echo fnEncodeID($id);?>">Diretriz A</a></li>
					<li><a class="dropdown-item" href="Docente_RSC3_DiretB.php?id=<?php echo fnEncodeID($id);?>">Diretriz B</a></li>
					<li><a class="dropdown-item" href="Docente_RSC3_DiretC.php?id=<?php echo fnEncodeID($id);?>">Diretriz C</a></li>
					<li><a class="dropdown-item" href="Docente_RSC3_DiretD.php?id=<?php echo fnEncodeID($id);?>">Diretriz D</a></li>
					<li><a class="dropdown-item" href="Docente_RSC3_DiretE.php?id=<?php echo fnEncodeID($id);?>">Diretriz E</a></li>
					<li><a class="dropdown-item" href="Docente_RSC3_DiretF.php?id=<?php echo fnEncodeID($id);?>">Diretriz F</a></li>
					<li><a class="dropdown-item" href="Docente_RSC3_DiretG.php?id=<?php echo fnEncodeID($id);?>">Diretriz G</a></li>
				</ul>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Autenticação</a>
				<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					<li><a class="dropdown-item" href="Docente_autenticardocs.php?id=<?php echo fnEncodeID($id);?>">Pedir autenticação</a></li>
					<li><hr></li>
					<li><a class="dropdown-item" href="Docente_authpendentes.php?id=<?php echo fnEncodeID($id);?>">Solicitações pendentes</a></li>
					<li><a class="dropdown-item" href="Docente_authrecusadas.php?id=<?php echo fnEncodeID($id);?>">Solicitações recusadas</a></li>
					<li><hr></li>
					<li><a class="dropdown-item" href="Docente_docsautenticados.php?id=<?php echo fnEncodeID($id);?>">Documentos autenticados</a></li>
				</ul>
			</li>

			
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pedido RSC</a>
				<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					<li><a class="dropdown-item" href="Docente_planilhapont.php?id=<?php echo fnEncodeID($id);?>">Planilha de Pontuação</a></li>
					<li><a class="dropdown-item" href="Docente_planilhapont_imprime.php?id=<?php echo fnEncodeID($id);?>" target="_blank">Imprime Planilha de Pontuação</a></li>
					<li><a class="dropdown-item" href="Docente_quadropont.php?id=<?php echo fnEncodeID($id);?>">Quadro de Pontuação</a></li>
					<li><a class="dropdown-item" href="Docente_quadropont_imprime.php?id=<?php echo fnEncodeID($id);?>" target="_blank">Imprime Quadro de Pontuação</a></li>
					<li><hr></li>
					<li><a class="dropdown-item" href="Docente_memorial.php?id=<?php echo fnEncodeID($id);?>">Memorial Descritivo</a></li>
					<li><a class="dropdown-item" href="Docente_memorial_imprime.php?id=<?php echo fnEncodeID($id);?>" target="_blank">Imprime Memorial Descritivo</a></li>
					<li><hr></li>
					<li><a class="dropdown-item" href="Docente_solicitaRSC.php?id=<?php echo fnEncodeID($id);?>">Solicitação de RSC</a></li>
				</ul>
			</li>			
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $nome;?></a>
				<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					<li><a class="dropdown-item" href="Docente_identif_altera.php?id=<?php echo fnEncodeID($id);?>">Alterar cadastro</a></li>
					<li><a class="dropdown-item" href="Docente_apagaconta.php?id=<?php echo fnEncodeID($id);?>">Apagar conta</a></li>
					<li><hr></li>
					<li><a class="dropdown-item" href="tutorial.php" target="_blank">Tutorial</a></li>
					<li><a class="dropdown-item" href="lgpd.php" target="_blank">Política de privacidade</a></li>
					<li><hr></li>
					<li><a class="dropdown-item" href="index.php">Sair</a></li>
				</ul>
			</li>
		</ul>
	</div>
</nav>