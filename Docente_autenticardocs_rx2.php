<!doctype html>
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
	$id = 0;
	$nome = "Docente";
	$emaildocente = "cppd.secretaria@ifsc.edu.br";
	if(isset($_GET["id"])) {
		$id = fnDecodeID($link, $_GET["id"], 'TabDocente');
		if ($id > 0) {
			$query = "SELECT nome,email,siape FROM TabDocente WHERE id='$id'";
			$result = mysqli_query($link, $query) or die("Bad Query: $query");
			$row = mysqli_fetch_assoc($result);
			$nome = $row['nome'];
			$emaildocente = $row['email'];
			$siape = $row['siape'];
		}
	}
	if(!empty($_POST)) {
		$idPlanilha = $_POST['idPlanilha'];
		$nomePlanilha = $_POST['nomePlanilha'];
		$autenticador = $_POST['autenticador'];
		$emailautenticador = $_POST['emailautenticador'];
		$senha = $_POST['senha'];
		$password = password_hash($senha, PASSWORD_DEFAULT);
		$nomearquivo = $_POST['nomearquivo'];
		$documento = $_POST['nomecriterio'];

		// Verifica se o autenticador já está cadastrado no banco de dados
		$query = "SELECT id,nome FROM TabAutenticador WHERE email='$emailautenticador'";
		$result = mysqli_query($link, $query);
		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
			$idAuth = $row['id'];
			$nomeAuth = $row['nome'];
		}
		else {
			// Cadastra o autenticador no banco de dados
			$query = "INSERT INTO TabAutenticador (id, nome, email, senha) VALUES (NULL, '$autenticador', '$emailautenticador', '$password')";
			$result = mysqli_query($link, $query);

			$query = "SELECT id,nome FROM TabAutenticador WHERE email='$emailautenticador'";
			$result = mysqli_query($link, $query);
			$row = mysqli_fetch_assoc($result);
			$idAuth = $row['id'];
			$nomeAuth = $row['nome'];			
		}
		// Cadastra o documento no banco de dados para o autenticador validar no aplicativo
		$authPronta = 0;
		$query = "INSERT INTO TabDocAutenticar (id, idAuth, emailAuth, nomeTabPedidoRSC, idTabPedidoRSC, docente, siape, dataSolicitacao, documento, authPronta) VALUES (NULL, $idAuth, '$emailautenticador', '$nomePlanilha', $idPlanilha, '$nome', '$siape', CURDATE(), '$documento', $authPronta)";
		$result = mysqli_query($link, $query);
		
		$query = "UPDATE $nomePlanilha SET arquivoauth=$authPronta,emailAuth='$emailautenticador' WHERE id=$idPlanilha";
		$result = mysqli_query($link, $query);
		
		$query = "SELECT arquivo,tipoarquivo,datadoc FROM $nomePlanilha WHERE id=$idPlanilha";
		$result = mysqli_query($link, $query);
		$row = mysqli_fetch_assoc($result);
		$arquivo = $row['arquivo'];
		$tipoarquivo = $row['tipoarquivo'];
		$datadoc = $row['datadoc'];
		
		$nomeDocente = preg_replace('/\s+/', '', $nome);
		$diretorio = "Docentes";
		if (!is_dir($diretorio)) {
			mkdir($diretorio);
		}
		$diretorio = "Docentes/" . $nomeDocente;
		if (!is_dir($diretorio)) {
			mkdir($diretorio);
		}
		$datestamp = strtotime($datadoc);
		$dia = date('d',$datestamp);
		$mes = date('M',$datestamp);
		$ano = date('Y',$datestamp);
		$datadocumento = $dia . $mes . $ano;
		$nomearquivo = '/id_' . $idPlanilha . '_' . $datadocumento . "." .$tipoarquivo;
		$filename = $diretorio . $nomearquivo;
//		echo nl2br("Arquivo: " . $filename . "\n");
		file_put_contents($filename, $arquivo);
		
		$pathservidor = "http://localhost:81/RSC/";
		$documento = $pathservidor . $filename;
		
		fnDesconectaBD($link);

/*		// Read the file and encode its content
		$handle = fopen($tmp_name, "r"); // Open file for reading
		$content = fread($handle, $size); // Read file content
		fclose($handle); // Close file
*/
		// Base64 encode the file content and define boundary
		$encoded_content = chunk_split(base64_encode($arquivo)); // Encode content
		$boundary = md5("random"); // Generate a unique boundary
		
		$mensagem = "Prezado(a) " . $nomeAuth . "\n\n";
		$mensagem .= "Estou solicitando o benefício Reconhecimento de Saberes e Competências (RSC) e preciso da autenticação do documento que está copiado em anexo. Mas vou solicitar para entrar no aplicativo para realizar a conferência e fazer a autenticação do documento. O seu login é o e-mail e a senha provisória para o seu primeiro acesso é: rsc-ifsc.";
		$mensagem = "Autenciosamente" . "\n";
		
		// Construct email body with message and attachment
		$body = "--$boundary\r\n";
		$body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
		$body .= "Content-Transfer-Encoding: base64\r\n\r\n";
		$body .= chunk_split(base64_encode($mensagem)); // Encode message

		// Add attachment to the email body
		$body .= "--$boundary\r\n";
		$body .= "Content-Type: $tipoarquivo; name=\"$nomearquivo\"\r\n";
		$body .= "Content-Disposition: attachment; filename=\"$nomearquivo\"\r\n";
		$body .= "Content-Transfer-Encoding: base64\r\n";
		$body .= "X-Attachment-Id: " . rand(1000, 99999) . "\r\n\r\n";
		$body .= $encoded_content; // Append encoded file content
		
		//$destinatario = $emailautenticador;
		$destinatario = "mdoniak@ifsc.edu.br";
		$assunto = "Solicitação de autenticação de documento para pedido de RSC";
		$headers = 'MIME-Version: 1.0' .  "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: cppd.secretaria@ifsc.edu.br' . "\r\n";
		//$headers .= 'Reply-To: ' . $emaildocente;
		$headers .= 'Reply-To: mdoniak@ifsc.edu.br';

		$enviarEmail = mail($destinatario,$assunto,$body,$headers);
		if($enviarEmail){
			$mgm = "E-MAIL ENVIADO COM SUCESSO!";
		}
		else {
			$mgm = "ERRO AO ENVIAR E-MAIL!";
		}
		$idcoded = fnEncodeID($id);
		echo " <meta http-equiv='refresh' content='3;URL=Docente_autenticardocs.php?id=$idcoded'>";
		echo nl2br("Envio: " . $mgm . "\n");
		//header("Location: Docente_autenticardocs_rx3.php?id=$idcoded");
	}
	else {
		fnDesconectaBD($link);
		$idcoded = fnEncodeID($id);
		header("Location: Docente_autenticardocs.php?id=$idcoded");
	}
?>	
