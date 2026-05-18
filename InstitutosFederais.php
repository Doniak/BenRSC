<?php	
fnTabRSC($link);

$result = mysqli_query($link,"SELECT id FROM TabInstitutosFederais");
$nrlinhas = mysqli_num_rows($result);

if ($nrlinhas == 0) {
	$nomeIFE = "Instituto Federal do Acre";
	$sigla = "IFAC";
	$estado = "Acre";
	$query = "INSERT INTO TabInstitutosFederais (id,nome,sigla,estado) VALUES (NULL,'$nomeIFE','$sigla','$estado')";
	$result = mysqli_query($link,$query);
	
	$nomeIFE = "Instituto Federal de Alagoas";
	$sigla = "IFAL";
	$estado = "Alagoas";
	$query = "INSERT INTO TabInstitutosFederais (id,nome,sigla,estado) VALUES (NULL,'$nomeIFE','$sigla','$estado')";
	$result = mysqli_query($link,$query);
	
	$nomeIFE = "Instituto Federal do Amapá";
	$sigla = "IFAP";
	$estado = "Amapá";
	$query = "INSERT INTO TabInstitutosFederais (id,nome,sigla,estado) VALUES (NULL,'$nomeIFE','$sigla','$estado')";
	$result = mysqli_query($link,$query);
	
	$nomeIFE = "Instituto Federal do Amazonas";
	$sigla = "IFAM";
	$estado = "Amazonas";
	$query = "INSERT INTO TabInstitutosFederais (id,nome,sigla,estado) VALUES (NULL,'$nomeIFE','$sigla','$estado')";
	$result = mysqli_query($link,$query);
	
	$nomeIFE = "Instituto Federal da Bahia";
	$sigla = "IFBA";
	$estado = "Bahia";
	$query = "INSERT INTO TabInstitutosFederais (id,nome,sigla,estado) VALUES (NULL,'$nomeIFE','$sigla','$estado')";
	$result = mysqli_query($link,$query);
	
	$nomeIFE = "Instituto Federal Baiano";
	$sigla = "IFBaiano";
	$estado = "Bahia";
	$query = "INSERT INTO TabInstitutosFederais (id,nome,sigla,estado) VALUES (NULL,'$nomeIFE','$sigla','$estado')";
	$result = mysqli_query($link,$query);
	
	$nomeIFE = "Instituto Federal de Brasília";
	$sigla = "IFB";
	$estado = "Distrito Federal";
	$query = "INSERT INTO TabInstitutosFederais (id,nome,sigla,estado) VALUES (NULL,'$nomeIFE','$sigla','$estado')";
	$result = mysqli_query($link,$query);
	
	$nomeIFE = "Instituto Federal do Ceará";
	$sigla = "IFCE";
	$estado = "Ceará";
	$query = "INSERT INTO TabInstitutosFederais (id,nome,sigla,estado) VALUES (NULL,'$nomeIFE','$sigla','$estado')";
	$result = mysqli_query($link,$query);	
	
	$nomeIFE = "Instituto Federal do Espírito Santo";
	$sigla = "IFES";
	$estado = "Espírito Santo";
	$query = "INSERT INTO TabInstitutosFederais (id,nome,sigla,estado) VALUES (NULL,'$nomeIFE','$sigla','$estado')";
	$result = mysqli_query($link,$query);
	
	$nomeIFE = "Instituto Federal de Goiás";
	$sigla = "IFG";
	$estado = "Goiás";
	$query = "INSERT INTO TabInstitutosFederais (id,nome,sigla,estado) VALUES (NULL,'$nomeIFE','$sigla','$estado')";
	$result = mysqli_query($link,$query);
	
	$nomeIFE = "Instituto Federal Goiano";
	$sigla = "IFGoiano";
	$estado = "Goiás";
	$query = "INSERT INTO TabInstitutosFederais (id,nome,sigla,estado) VALUES (NULL,'$nomeIFE','$sigla','$estado')";
	$result = mysqli_query($link,$query);

	$nomeIFE = "Instituto Federal do Maranhão";
	$sigla = "IFMA";
	$estado = "Maranhão";
	$query = "INSERT INTO TabInstitutosFederais (id,nome,sigla,estado) VALUES (NULL,'$nomeIFE','$sigla','$estado')";
	$result = mysqli_query($link,$query);

	$nomeIFE = "Instituto Federal de Minas Gerais";
	$sigla = "IFMG";
	$estado = "Minas Gerais";
	$query = "INSERT INTO TabInstitutosFederais (id,nome,sigla,estado) VALUES (NULL,'$nomeIFE','$sigla','$estado')";
	$result = mysqli_query($link,$query);

	$nomeIFE = "Instituto Federal do Norte de Minas Gerais";
	$sigla = "IFNMG";
	$estado = "Minas Gerais";
	$query = "INSERT INTO TabInstitutosFederais (id,nome,sigla,estado) VALUES (NULL,'$nomeIFE','$sigla','$estado')";
	$result = mysqli_query($link,$query);

	$nomeIFE = "Instituto Federal do Sudeste de Minas Gerais";
	$sigla = "IFSudesteMG";
	$estado = "Minas Gerais";
	$query = "INSERT INTO TabInstitutosFederais (id,nome,sigla,estado) VALUES (NULL,'$nomeIFE','$sigla','$estado')";
	$result = mysqli_query($link,$query);

	$nomeIFE = "Instituto Federal do Sul de Minas Gerais";
	$sigla = "IFSuldeMinas";
	$estado = "Minas Gerais";
	$query = "INSERT INTO TabInstitutosFederais (id,nome,sigla,estado) VALUES (NULL,'$nomeIFE','$sigla','$estado')";
	$result = mysqli_query($link,$query);

	$nomeIFE = "Instituto Federal do Triângulo Mineiro";
	$sigla = "IFTM";
	$estado = "Minas Gerais";
	$query = "INSERT INTO TabInstitutosFederais (id,nome,sigla,estado) VALUES (NULL,'$nomeIFE','$sigla','$estado')";
	$result = mysqli_query($link,$query);

	$nomeIFE = "Instituto Federal do Mato Grosso";
	$sigla = "IFMT";
	$estado = "Mato Grosso";
	$query = "INSERT INTO TabInstitutosFederais (id,nome,sigla,estado) VALUES (NULL,'$nomeIFE','$sigla','$estado')";
	$result = mysqli_query($link,$query);

	$nomeIFE = "Instituto Federal de Mato Grosso do Sul";
	$sigla = "IFMS";
	$estado = "Mato Grosso do Sul";
	$query = "INSERT INTO TabInstitutosFederais (id,nome,sigla,estado) VALUES (NULL,'$nomeIFE','$sigla','$estado')";
	$result = mysqli_query($link,$query);

	$nomeIFE = "Instituto Federal do Pará";
	$sigla = "IFPA";
	$estado = "Pará";
	$query = "INSERT INTO TabInstitutosFederais (id,nome,sigla,estado) VALUES (NULL,'$nomeIFE','$sigla','$estado')";
	$result = mysqli_query($link,$query);

	$nomeIFE = "Instituto Federal da Paraíba";
	$sigla = "IFPB";
	$estado = "Paraíba";
	$query = "INSERT INTO TabInstitutosFederais (id,nome,sigla,estado) VALUES (NULL,'$nomeIFE','$sigla','$estado')";
	$result = mysqli_query($link,$query);

	$nomeIFE = "Instituto Federal de Sergipe";
	$sigla = "IFS";
	$estado = "Sergipe";
	$query = "INSERT INTO TabInstitutosFederais (id,nome,sigla,estado) VALUES (NULL,'$nomeIFE','$sigla','$estado')";
	$result = mysqli_query($link,$query);

	$nomeIFE = "Instituto Federal de Pernambuco";
	$sigla = "IFPE";
	$estado = "Pernambuco";
	$query = "INSERT INTO TabInstitutosFederais (id,nome,sigla,estado) VALUES (NULL,'$nomeIFE','$sigla','$estado')";
	$result = mysqli_query($link,$query);

	$nomeIFE = "Instituto Federal do Sertão Pernambucano";
	$sigla = "IFSertãoPE";
	$estado = "Pernambuco";
	$query = "INSERT INTO TabInstitutosFederais (id,nome,sigla,estado) VALUES (NULL,'$nomeIFE','$sigla','$estado')";
	$result = mysqli_query($link,$query);

	$nomeIFE = "Instituto Federal do Piauí";
	$sigla = "IFPI";
	$estado = "Piauí";
	$query = "INSERT INTO TabInstitutosFederais (id,nome,sigla,estado) VALUES (NULL,'$nomeIFE','$sigla','$estado')";
	$result = mysqli_query($link,$query);

	$nomeIFE = "Instituto Federal do Paraná";
	$sigla = "IFPR";
	$estado = "Paraná";
	$query = "INSERT INTO TabInstitutosFederais (id,nome,sigla,estado) VALUES (NULL,'$nomeIFE','$sigla','$estado')";
	$result = mysqli_query($link,$query);

	$nomeIFE = "Instituto Federal do Rio de Janeiro";
	$sigla = "IFRJ";
	$estado = "Rio de Janeiro";
	$query = "INSERT INTO TabInstitutosFederais (id,nome,sigla,estado) VALUES (NULL,'$nomeIFE','$sigla','$estado')";
	$result = mysqli_query($link,$query);

	$nomeIFE = "Instituto Federal Fluminense";
	$sigla = "IFF";
	$estado = "Rio de Janeiro";
	$query = "INSERT INTO TabInstitutosFederais (id,nome,sigla,estado) VALUES (NULL,'$nomeIFE','$sigla','$estado')";
	$result = mysqli_query($link,$query);

	$nomeIFE = "Instituto Federal do Rio Grande do Norte";
	$sigla = "IFRN";
	$estado = "Rio Grande do Norte";
	$query = "INSERT INTO TabInstitutosFederais (id,nome,sigla,estado) VALUES (NULL,'$nomeIFE','$sigla','$estado')";
	$result = mysqli_query($link,$query);

	$nomeIFE = "Instituto Federal do Tocantins";
	$sigla = "IFTO";
	$estado = "Tocantins";
	$query = "INSERT INTO TabInstitutosFederais (id,nome,sigla,estado) VALUES (NULL,'$nomeIFE','$sigla','$estado')";
	$result = mysqli_query($link,$query);

	$nomeIFE = "Instituto Federal do Rio Grande do Sul";
	$sigla = "IFRS";
	$estado = "Rio Grande do Sul";
	$query = "INSERT INTO TabInstitutosFederais (id,nome,sigla,estado) VALUES (NULL,'$nomeIFE','$sigla','$estado')";
	$result = mysqli_query($link,$query);

	$nomeIFE = "Instituto Federal Farroupilha";
	$sigla = "IFFar";
	$estado = "Rio Grande do Sul";
	$query = "INSERT INTO TabInstitutosFederais (id,nome,sigla,estado) VALUES (NULL,'$nomeIFE','$sigla','$estado')";
	$result = mysqli_query($link,$query);

	$nomeIFE = "Instituto Federal Sul-rio-grandense";
	$sigla = "IFSul";
	$estado = "Rio Grande do Sul";
	$query = "INSERT INTO TabInstitutosFederais (id,nome,sigla,estado) VALUES (NULL,'$nomeIFE','$sigla','$estado')";
	$result = mysqli_query($link,$query);

	$nomeIFE = "Instituto Federal de Rondônia";
	$sigla = "IFRO";
	$estado = "Rondônia";
	$query = "INSERT INTO TabInstitutosFederais (id,nome,sigla,estado) VALUES (NULL,'$nomeIFE','$sigla','$estado')";
	$result = mysqli_query($link,$query);

	$nomeIFE = "Instituto Federal de Roraima";
	$sigla = "IFRR";
	$estado = "Roraima";
	$query = "INSERT INTO TabInstitutosFederais (id,nome,sigla,estado) VALUES (NULL,'$nomeIFE','$sigla','$estado')";
	$result = mysqli_query($link,$query);

	$nomeIFE = "Instituto Federal de Santa Catarina";
	$sigla = "IFSC";
	$estado = "Santa Catarina";
	$query = "INSERT INTO TabInstitutosFederais (id,nome,sigla,estado) VALUES (NULL,'$nomeIFE','$sigla','$estado')";
	$result = mysqli_query($link,$query);

	$nomeIFE = "Instituto Federal Catarinense";
	$sigla = "IFC";
	$estado = "Santa Catarina";
	$query = "INSERT INTO TabInstitutosFederais (id,nome,sigla,estado) VALUES (NULL,'$nomeIFE','$sigla','$estado')";
	$result = mysqli_query($link,$query);

	$nomeIFE = "Instituto Federal de São Paulo";
	$sigla = "IFSP";
	$estado = "São Paulo";
	$query = "INSERT INTO TabInstitutosFederais (id,nome,sigla,estado) VALUES (NULL,'$nomeIFE','$sigla','$estado')";
	$result = mysqli_query($link,$query);
}
?>