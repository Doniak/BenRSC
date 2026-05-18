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
		<div class="container" style="background-color: #E4EBE2;">
			<div class="row">
				<p><h2 align="center" style="color: #1A5321;"><b>Formulário de Solicitação para o<BR>Reconhecimento de Saberes e Competências - RSC</b></h2></p>
			</div>
			<div class="row">
				<p><h3 align="center" style="color: red;"><b>Exclusão da conta</b></h3></p>
			</div>
		</div>
	</div>

	<div style="background-color: #1A5321;">
		<BR>
		<div class="container" style="background-color: #E4EBE2;">
			<div class="row">
				<div class="coluna" align="center">
					<p align="center" style="color: red;">Você deseja apagar sua conta deste aplicatico?</p>
					<p align="center"><a href="Docente_apagaconta_rx.php?id=<?php echo fnEncodeID($id);?>"><button type="button" class="btn" style="border-radius: 8px; border: 3px solid #1A5321;; color: white; padding: 14px 26px; font-size: 18px; background-color: #1A5321;"><b>Apagar conta</b></button></a></p>
				</div>
			</div>
		</div>
	</div>

<?php
	include "botaovoltar.php";
	include "rodape.php";
	fnDesconectaBD($link);
?>
</body>
</html>