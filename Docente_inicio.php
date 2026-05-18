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
			
<div  style="background-color: #1A5321;">
	<div class="container" style="background-color: #E4EBE2;">
		<div class="row">
			<p><h2 align="center" style="color: #32A041; font-size: 200%"><b>Ambiente Docente</b></h2></p>
		</div>
		<div class="row">
			<p align="justify">No Ambiente Docente você irá preencher o formulário de solicitação do benefício RSC, que será disponibilizado em pdf, para você solicitar a assinatura do Diretor do seu campus. Você deve ter percebido que o menu mudou, agora você tem as opções exclusivas para o preenchimento do formulário de pontuação.</p>
			<p align="justify">Os níveis de RSC foram divididos para facilitar o preenchimento de cada diretriz. Assim, você poderá facilmente conferir as diretrizes de cada nível e preencher naquela onde a atividade é a mais adequada. Você pode preencher cada diretriz de um mesmo nível mais de uma vez, porque você precisará registrar o número das páginas do Memorial Descritivo onde se encontra o documento comprobatório. Desta forma, se você achar mais fácil cadastrar cada atividade de uma mesma diretriz separadamente, fique à vontade para fazer isto.</p>
			<p align="justify">No menu Acompanhamento você poderá ver a Planilha de Pontuação, com todas as diretrizes cadastradas listadas em uma tabela. O Quadro de Pontuação mostrará a pontuação total requerida por nível de RSC e Diretriz. Lembre que cada diretriz tem uma pontuação máxima, assim, é importante verificar esse quadro para saber a pontuação total real que está requerendo. O Formulário de Pontuação vai gerar um documento em pdf para você imprimir, assinar e anexar no seu processo SIPAC de solicitação do benefício RSC. Por fim, você vai Solicitar a RSC aqui no aplicativo, para que esta solicitação siga para a CPPD e ela possa dar sequência no pedido, cadastrando o número do processo SIPAC.</p>
			<p align="justify">Agora algumas informações importantes! Mesmo realizando o seu pedido de RSC por este aplicativo, você deverá fazer a solicitação pelo SIPAC. O cadastro do seu pedido no SIPAC é que vai dar início a sua solicitação e contabilizar os prazos para conclusão de cada etapa. Lembre-se de que você deve fazer a solicitação da Retribuição por Titulação (RT) referente ao pedido de RSC que está solicitando. Para ter direito ao benefício RSC, você deve estar recebendo a RT compatível com o nível solicitado. Fique atento para não ter frustrações desnecessárias.</p>
			<p align="center"><a href="Docente_itinerario.php?id=<?php echo fnEncodeID($id); ?>"><button type="button" class="btn" style="border-radius: 8px; border: 3px solid #1A5321;; color: white; padding: 20px 30px; font-size: 20px; background-color: #1A5321;"><b>Vamos começar!</b></button></a></p>
		</div>
	</div>
</div>

<?php
include "rodape.php";
?>
		
</body>
</html>