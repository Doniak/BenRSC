<!DOCTYPE html>
<?php
include "cabecalho.php";
include "conectaBD.php";
$link = fnConectaBancoDados();
include "Tabelas.php";
include "funcoes.php";

$id = 0;
if(isset($_GET["id"])) {
	$id = fnDecodeID($link,$_GET["id"],'TabDocente');
}
if (!empty($_POST) && $id > 0) {
	$documento = htmlspecialchars($_POST["tipodoc"]);
	$dataDoc = ($_POST["datadoc"]);
	if (strcmp($documento,"Graduação")==0){
		$doc = "graduacao";
	} elseif (strcmp($documento,"Especialização")==0){
		$doc = "especializacao";
	} elseif (strcmp($documento,"Mestrado")==0){
		$doc = "mestrado";
	} else {
		$doc = "experiencia";
	}
	
	$query = "SELECT siape FROM TabDocente WHERE id=$id";
	$result = mysqli_query($link, $query); 
	$rows = mysqli_fetch_assoc($result);
	$siape = $rows['siape'];

	$nomeTab = "TabItinerario_" . $siape;
	fnTabItinerario ($nomeTab,$link);

	$query = "SELECT * FROM TabFormacao WHERE siape=$siape";
	$result = mysqli_query($link, $query); 
	$nrlinhas = mysqli_num_rows($result);

	if($nrlinhas > 0) {
		$rows = mysqli_fetch_assoc($result);
		$graduacao = $rows["graduacao"];
		$especializacao = $rows["especializacao"];
		$mestrado = $rows["mestrado"];
		$experiencia = $rows["experiencia"];
		
		if (((strcmp($doc,"graduacao") == 0) && ($graduacao == 0)) || ((strcmp($doc,"especializacao") == 0) && ($especializacao == 0)) || ((strcmp($doc,"mestrado") == 0) && ($mestrado == 0)) || ((strcmp($doc,"experiencia") == 0) && ($experiencia == 0))) {
?>
			<div style="background-color:#1A5321;">
				<div class="container bg-transparent">
<?php 
					include "Docente_menu.php";
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
			<div style="background-color: #1A5321;">
				<BR>
				<div class="container" style="background-color: #E4EBE2;">
					<div class="row">
						<h3 align="center" style="color: #c8411e;">Tipo de arquivo selecionado incorreto.</h3>
						<p align="center">
							<a href="JavaScript: window.history.back();">
							<button type="button" class="btn" style="border-radius: 8px; border: 3px solid #1A5321;; color: white; padding: 14px 30px; font-size: 18px; background-color: #1A5321;"><b>Voltar</b></button></a>
						</p>
					</div>
				</div>
			</div>
<?php
		}
		else {
			$id = fnEncodeID($id);
			$dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);
			$arquivo = $_FILES["arquivo"];
			//var_dump($arquivo);
			$extensao = strtolower(pathinfo($arquivo["name"],PATHINFO_EXTENSION));
			if (($extensao == "jpg") || ($extensao == "png")) {
				$arquivo_blob = addslashes(file_get_contents($arquivo['tmp_name']));
				$query = "INSERT INTO $nomeTab (id,documento,dataDoc,arquivo,tipoarquivo,arquivoauth) VALUES (NULL,'$documento','$dataDoc','$arquivo_blob','$extensao',-1)";
				$result = mysqli_query($link, $query);
				//echo nl2br("OK.");
?>
			<div style="background-color:#1A5321;">
				<div class="container bg-transparent">
<?php 
					include "Docente_menu.php";	
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
			<div style="background-color: #1A5321;">
				<BR>
				<div class="container" style="background-color: #E4EBE2;">
					<div class="row">
						<h3 align="center" style="color: #1A5321;">Arquivo salvo com sucesso.</h3>
						<div class="coluna">
						<p align="center">
							<a href="Docente_itinerariodocs.php?id=<?php echo fnEncodeID($id);?>">
							<button type="button" class="btn" style="border-radius: 8px; border: 3px solid #1A5321;; color: white; padding: 14px 30px; font-size: 18px; background-color: #1A5321;"><b>Salvar próximo documento</b></button></a>
						</p>
						</div>
						<div class="coluna">
						<p align="center">
							<a href="Docente_itinerariosalvo.php?id=<?php echo fnEncodeID($id);?>">
							<button type="button" class="btn" style="border-radius: 8px; border: 3px solid #1A5321;; color: white; padding: 14px 30px; font-size: 18px; background-color: #1A5321;"><b>Itinerário salvo</b></button></a>
						</p>
						</div>
					</div>
				</div>
			</div>
<?php
			} 
			else {
?>
			<div style="background-color:#1A5321;">
				<div class="container bg-transparent">
<?php 
					include "Docente_menu.php";
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
			<div style="background-color: #1A5321;">
				<BR>
				<div class="container" style="background-color: #E4EBE2;">
					<div class="row">
						<h3 align="center" style="color: #1A5321;">Extensão do arquivo precisa ser jpg ou png.</h3>
					</div>
				</div>
			</div>
<?php
			}
		}
	}
}
include "botaovoltar.php";
include "rodape.php";
fnDesconectaBD($link);
?>