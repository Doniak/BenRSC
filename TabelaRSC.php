<?php	
fnTabRSC($link);

$res = mysqli_query($link,"SELECT id FROM TabRSC");
$rows = mysqli_num_rows($res);

if ($rows == 0) {
	/* ***** */
	/* RSC-I */
	/* ***** */
	// Critério 01:
	$criterio = 1;
	$nomecriterio = "Gestão Escolar (Direção, Assistente de Direção, Gerente, outros equivalentes)";
	$fatorpontuacao = 0.10;
	$unidade = "mês";
	$qtdemaxunid = 100;
	$nivel = "RSCI";
	$diretriz = "A";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 02:
	$criterio = 2;
	$nomecriterio = "Gestão Escolar (Supervisão, Coordenação, Orientação Educacional)";
	$fatorpontuacao = 0.10;
	$unidade = "mês";
	$qtdemaxunid = 100;
	$nivel = "RSCI";
	$diretriz = "A";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 03:
	$criterio = 3;
	$nomecriterio = "Exercício de Magistério (Educação Infantil, Básica e Superior)";
	$fatorpontuacao = 0.20;
	$unidade = "mês";
	$qtdemaxunid = 50;
	$nivel = "RSCI";
	$diretriz = "A";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 04:
	$criterio = 4;
	$nomecriterio = "Gestão Iniciativa Privada na Área de atuação (Presidência, Superintendência, Direção, Gerência, Chefia, Supervisão e coordenação em Empresas ou Entidades)";
	$fatorpontuacao = 0.05;
	$unidade = "mês";
	$qtdemaxunid = 200;
	$nivel = "RSCI";
	$diretriz = "A";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 05:
	$criterio = 5;
	$nomecriterio = "Experiência na área de atuação ou formação em nível técnico, administrativo, operacional, comercial ou profissional liberal";
	$fatorpontuacao = 0.10;
	$unidade = "mês";
	$qtdemaxunid = 100;
	$nivel = "RSCI";
	$diretriz = "A";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 06:
	$criterio = 6;
	$nomecriterio = "Participação em Colegiados ou Conselhos de Empresas, Entidades ou Instituições de Ensino";
	$fatorpontuacao = 0.10;
	$unidade = "mês";
	$qtdemaxunid = 100;
	$nivel = "RSCI";
	$diretriz = "A";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 07:
	$criterio = 7;
	$nomecriterio = "Atividade em Organizações Sociais e assistenciais reconhecidas como de utilidade pública ou organização da sociedade civil de interesse público";
	$fatorpontuacao = 0.10;
	$unidade = "mês";
	$qtdemaxunid = 100;
	$nivel = "RSCI";
	$diretriz = "A";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 08:
	$criterio = 8;
	$nomecriterio = "Atividades na função de Instrutor em capacitação ou treinamento em empresas, instituições de ensino ou entidades";
	$fatorpontuacao = 0.20;
	$unidade = "mês";
	$qtdemaxunid = 50;
	$nivel = "RSCI";
	$diretriz = "A";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 09:
	$criterio = 9;
	$nomecriterio = "Atuação como conferencista ou palestrante";
	$fatorpontuacao = 0.40;
	$unidade = "evento";
	$qtdemaxunid = 25;
	$nivel = "RSCI";
	$diretriz = "A";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 10:
	$criterio = 10;
	$nomecriterio = "Participação em conferência, simpósio, congresso ou similares na área de atuação";
	$fatorpontuacao = 0.10;
	$unidade = "evento";
	$qtdemaxunid = 100;
	$nivel = "RSCI";
	$diretriz = "A";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 11:
	$criterio = 11;
	$nomecriterio = "Participação em palestra, seminário, colóquio ou similares na área de atuação";
	$fatorpontuacao = 0.05;
	$unidade = "evento";
	$qtdemaxunid = 200;
	$nivel = "RSCI";
	$diretriz = "A";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 12:
	$criterio = 12;
	$nomecriterio = "Avaliação de projetos, protótipos";
	$fatorpontuacao = 1.00;
	$unidade = "evento";
	$qtdemaxunid = 10;
	$nivel = "RSCI";
	$diretriz = "A";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 13:
	$criterio = 13;
	$nomecriterio = "Avaliação de Invenções";
	$fatorpontuacao = 1.00;
	$unidade = "atividade concluída";
	$qtdemaxunid = 10;
	$nivel = "RSCI";
	$diretriz = "A";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 14:
	$criterio = 14;
	$nomecriterio = "Participação em comissões e representações institucionais, sindicais e profissionais";
	$fatorpontuacao = 0.10;
	$unidade = "mês";
	$qtdemaxunid = 100;
	$nivel = "RSCI";
	$diretriz = "A";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 15:
	$criterio = 15;
	$nomecriterio = "Produção de material didático e/ou implantação de ambientes de aprendizagem, nas atividades de ensino, pesquisa, extensão e/ou material, inovação, artigo completo publicado em periódico científico ou apresentação artística em mostras ou similares, na área/subárea do curso";
	$fatorpontuacao = 0.50;
	$unidade = "material";
	$qtdemaxunid = 20;
	$nivel = "RSCI";
	$diretriz = "A";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 16:
	$criterio = 16;
	$nomecriterio = "Revisão técnica, tradução ou organização de material didático, paradidático em atividades de ensino, pesquisa, extensão e/ou inovação";
	$fatorpontuacao = 0.50;
	$unidade = "material";
	$qtdemaxunid = 20;
	$nivel = "RSCI";
	$diretriz = "A";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 17:
	$criterio = 17;
	$nomecriterio = "Participação em processos seletivos, em bancas de avaliação acadêmica e/ou de concursos, grupos de trabalho, oficinas institucionais, visitas técnicas com alunos, projetos de interesse institucional de ensino, pesquisa, extensão e/ou inovação, projetos e/ou práticas pedagógicas de reconhecida relevância";
	$fatorpontuacao = 0.10;
	$unidade = "atividade concluída";
	$qtdemaxunid = 100;
	$nivel = "RSCI";
	$diretriz = "A";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 18:
	$criterio = 18;
	$nomecriterio = "Participação em depósitos e/ou registros de propriedade intelectual";
	$fatorpontuacao = 5.00;
	$unidade = "atividade concluída";
	$qtdemaxunid = 2;
	$nivel = "RSCI";
	$diretriz = "A";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 19:
	$criterio = 19;
	$nomecriterio = "Prêmios por atividades científicas, artísticas, esportivas e culturais";
	$fatorpontuacao = 2.00;
	$unidade = "prêmio";
	$qtdemaxunid = 5;
	$nivel = "RSCI";
	$diretriz = "A";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 20:
	$criterio = 20;
	$nomecriterio = "Organização de eventos científicos, tecnológicos, esportivos, sociais, filantrópicos ou culturais";
	$fatorpontuacao = 1.00;
	$unidade = "evento";
	$qtdemaxunid = 10;
	$nivel = "RSCI";
	$diretriz = "A";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 21:
	$criterio = 21;
	$nomecriterio = "Cursos de capacitação com no mínimo 120 horas";
	$fatorpontuacao = 10.0;
	$unidade = "curso concluído";
	$qtdemaxunid = 1;
	$nivel = "RSCI";
	$diretriz = "B";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 22:
	$criterio = 22;
	$nomecriterio = "Cursos de capacitação na área de atuação do servidor de no mínimo 20 horas e menos de 120 horas";
	$fatorpontuacao = 1.50;
	$unidade = "curso concluído";
	$qtdemaxunid = 6;
	$nivel = "RSCI";
	$diretriz = "B";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 23:
	$criterio = 23;
	$nomecriterio = "Programas e/ou cursos de formação inicial e continuada, qualificação e/ou capacitação";
	$fatorpontuacao = 0.20;
	$unidade = "mês";
	$qtdemaxunid = 100;
	$nivel = "RSCI";
	$diretriz = "C";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 24:
	$criterio = 24;
	$nomecriterio = "Educação de Jovens e Adultos";
	$fatorpontuacao = 0.20;
	$unidade = "mês";
	$qtdemaxunid = 100;
	$nivel = "RSCI";
	$diretriz = "C";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 25:
	$criterio = 25;
	$nomecriterio = "Ensino Médio";
	$fatorpontuacao = 0.20;
	$unidade = "mês";
	$qtdemaxunid = 100;
	$nivel = "RSCI";
	$diretriz = "C";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 26:
	$criterio = 26;
	$nomecriterio = "Técnico";
	$fatorpontuacao = 0.20;
	$unidade = "mês";
	$qtdemaxunid = 100;
	$nivel = "RSCI";
	$diretriz = "C";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 27:
	$criterio = 27;
	$nomecriterio = "Cursos de Graduação (Bacharelado, Licenciatura e Tecnológico)";
	$fatorpontuacao = 0.20;
	$unidade = "mês";
	$qtdemaxunid = 100;
	$nivel = "RSCI";
	$diretriz = "C";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 28:
	$criterio = 28;
	$nomecriterio = "Pós Graduação lato sensu";
	$fatorpontuacao = 0.20;
	$unidade = "mês";
	$qtdemaxunid = 100;
	$nivel = "RSCI";
	$diretriz = "C";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 29:
	$criterio = 29;
	$nomecriterio = "Pós Graduação Stricto Sensu (Mestrado)";
	$fatorpontuacao = 0.20;
	$unidade = "mês";
	$qtdemaxunid = 100;
	$nivel = "RSCI";
	$diretriz = "C";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 30:
	$criterio = 30;
	$nomecriterio = "Orientação ou coorientação de TCC de cursos técnicos";
	$fatorpontuacao = 0.50;
	$unidade = "orientação concluída";
	$qtdemaxunid = 40;
	$nivel = "RSCI";
	$diretriz = "C";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 31:
	$criterio = 31;
	$nomecriterio = "Orientação de Projeto Integrador nos cursos (ou similares)";
	$fatorpontuacao = 0.50;
	$unidade = "orientação concluída";
	$qtdemaxunid = 40;
	$nivel = "RSCI";
	$diretriz = "C";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 32:
	$criterio = 32;
	$nomecriterio = "Orientação ou coorientação de TCC de cursos de graduação";
	$fatorpontuacao = 1.00;
	$unidade = "orientação concluída";
	$qtdemaxunid = 20;
	$nivel = "RSCI";
	$diretriz = "C";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 33:
	$criterio = 33;
	$nomecriterio = "Orientação de estudantes em atividades de ensino, pesquisa e extensão";
	$fatorpontuacao = 1.00;
	$unidade = "orientação concluída";
	$qtdemaxunid = 20;
	$nivel = "RSCI";
	$diretriz = "C";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 34:
	$criterio = 34;
	$nomecriterio = "Orientação ou supervisão de estágios curriculares, obrigatório ou não";
	$fatorpontuacao = 0.20;
	$unidade = "mês";
	$qtdemaxunid = 50;
	$nivel = "RSCI";
	$diretriz = "C";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 35:
	$criterio = 35;
	$nomecriterio = "Participação como TITULAR em Atividades Regulares previstas em Lei, Estatuto ou Regimento (conselhos, colegiados ou comissões de Ética, CPPD, CPA, ou outras de interesse da Instituição)";
	$fatorpontuacao = 0.15;
	$unidade = "mês";
	$qtdemaxunid = 50;
	$nivel = "RSCI";
	$diretriz = "D";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 36:
	$criterio = 36;
	$nomecriterio = "Participação como SUPLENTE em Atividades Regulares previstas em Lei, Estatuto ou Regimento (conselhos, colegiados ou comissões de Ética, CPPD, CPA, ou outras de interesse da Instituição)";
	$fatorpontuacao = 0.10;
	$unidade = "mês";
	$qtdemaxunid = 50;
	$nivel = "RSCI";
	$diretriz = "D";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 37:
	$criterio = 37;
	$nomecriterio = "Participação como TITULAR em conselhos de classe e profissionais";
	$fatorpontuacao = 0.10;
	$unidade = "mês";
	$qtdemaxunid = 100;
	$nivel = "RSCI";
	$diretriz = "D";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 38:
	$criterio = 38;
	$nomecriterio = "Participação como SUPLENTE em conselhos de classe e profissionais";
	$fatorpontuacao = 0.05;
	$unidade = "mês";
	$qtdemaxunid = 200;
	$nivel = "RSCI";
	$diretriz = "E";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 39:
	$criterio = 39;
	$nomecriterio = "Membro da gestão sindical (presidente, diretor e conselheiro)";
	$fatorpontuacao = 0.20;
	$unidade = "mês";
	$qtdemaxunid = 50;
	$nivel = "RSCI";
	$diretriz = "D";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 40:
	$criterio = 40;
	$nomecriterio = "Participação em Comissão de processo administrativo disciplinar, sindicância e ético";
	$fatorpontuacao = 1.00;
	$unidade = "processo";
	$qtdemaxunid = 10;
	$nivel = "RSCI";
	$diretriz = "D";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 41:
	$criterio = 41;
	$nomecriterio = "Trabalho Desenvolvido no âmbito do MEC (cessão)";
	$fatorpontuacao = 0.20;
	$unidade = "mês";
	$qtdemaxunid = 50;
	$nivel = "RSCI";
	$diretriz = "D";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 42:
	$criterio = 42;
	$nomecriterio = "Comissão ou Grupo de trabalho de caráter pedagógico e Núcleos Docentes Estruturantes (NDE)";
	$fatorpontuacao = 0.20;
	$unidade = "mês";
	$qtdemaxunid = 50;
	$nivel = "RSCI";
	$diretriz = "D";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 43:
	$criterio = 43;
	$nomecriterio = "Produção de livros didáticos e paradidáticos";
	$fatorpontuacao = 2.00;
	$unidade = "livro";
	$qtdemaxunid = 5;
	$nivel = "RSCI";
	$diretriz = "E";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 44:
	$criterio = 44;
	$nomecriterio = "Produção de apostilas, manuais técnicos, apresentações, roteiros técnicos, culturais e esportivos e outros instrumentos didáticos";
	$fatorpontuacao = 0.50;
	$unidade = "material";
	$qtdemaxunid = 20;
	$nivel = "RSCI";
	$diretriz = "E";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 45:
	$criterio = 45;
	$nomecriterio = "Projeto e implantação de ambientes de ensino/aprendizagem, laboratórios, oficinas, estúdios, salas ou áreas para práticas esportivas";
	$fatorpontuacao = 2.00;
	$unidade = "projeto aprovado";
	$qtdemaxunid = 5;
	$nivel = "RSCI";
	$diretriz = "E";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 46:
	$criterio = 46;
	$nomecriterio = "Cargo de Direção CD-1";
	$fatorpontuacao = 1.00;
	$unidade = "mês";
	$qtdemaxunid = 20;
	$nivel = "RSCI";
	$diretriz = "F";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 47:
	$criterio = 47;
	$nomecriterio = "Cargo de Direção CD-2";
	$fatorpontuacao = 0.50;
	$unidade = "mês";
	$qtdemaxunid = 40;
	$nivel = "RSCI";
	$diretriz = "F";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 48:
	$criterio = 48;
	$nomecriterio = "Cargo de Direção CD-3";
	$fatorpontuacao = 1.00;
	$unidade = "mês";
	$qtdemaxunid = 40;
	$nivel = "RSCI";
	$diretriz = "F";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 49:
	$criterio = 49;
	$nomecriterio = "Cargo de Direção CD-4";
	$fatorpontuacao = 0.50;
	$unidade = "mês";
	$qtdemaxunid = 40;
	$nivel = "RSCI";
	$diretriz = "F";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 50:
	$criterio = 50;
	$nomecriterio = "Função gratificada ou não gratificada de Coordenação de Área, Curso ou de atividades administrativas nomeadas pelo Reitor ou Diretor de campus";
	$fatorpontuacao = 0.50;
	$unidade = "mês";
	$qtdemaxunid = 40;
	$nivel = "RSCI";
	$diretriz = "F";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 51:
	$criterio = 51;
	$nomecriterio = "Elaboração de provas de concurso público e ingresso";
	$fatorpontuacao = 2.00;
	$unidade = "Concurso/Processo seletivo";
	$qtdemaxunid = 5;
	$nivel = "RSCI";
	$diretriz = "G";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 52:
	$criterio = 52;
	$nomecriterio = "Revisão de provas de concurso público e ingresso";
	$fatorpontuacao = 1.00;
	$unidade = "Concurso/Processo seletivo";
	$qtdemaxunid = 10;
	$nivel = "RSCI";
	$diretriz = "G";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 53:
	$criterio = 53;
	$nomecriterio = "Correção de provas de concurso público e ingresso";
	$fatorpontuacao = 1.00;
	$unidade = "Concurso/Processo seletivo";
	$qtdemaxunid = 10;
	$nivel = "RSCI";
	$diretriz = "G";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 54:
	$criterio = 54;
	$nomecriterio = "Coordenação de Concurso Público";
	$fatorpontuacao = 2.00;
	$unidade = "concurso concluído";
	$qtdemaxunid = 5;
	$nivel = "RSCI";
	$diretriz = "G";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 55:
	$criterio = 55;
	$nomecriterio = "Banca de concurso público";
	$fatorpontuacao = 1.00;
	$unidade = "banca concluída";
	$qtdemaxunid = 10;
	$nivel = "RSCI";
	$diretriz = "G";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 56:
	$criterio = 56;
	$nomecriterio = "Banca de de seleção de professor substituto e/ou temporário";
	$fatorpontuacao = 0.50;
	$unidade = "banca concluída";
	$qtdemaxunid = 20;
	$nivel = "RSCI";
	$diretriz = "G";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 57:
	$criterio = 57;
	$nomecriterio = "Banca para aprovações do programa CERTIFIC e equivalentes";
	$fatorpontuacao = 0.50;
	$unidade = "banca concluída";
	$qtdemaxunid = 20;
	$nivel = "RSCI";
	$diretriz = "G";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 58:
	$criterio = 58;
	$nomecriterio = "Banca de TCC ou Monografia";
	$fatorpontuacao = 0.50;
	$unidade = "banca concluída";
	$qtdemaxunid = 20;
	$nivel = "RSCI";
	$diretriz = "G";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 59:
	$criterio = 59;
	$nomecriterio = "Banca de Projeto Integrador (ou conectado saberes)";
	$fatorpontuacao = 0.25;
	$unidade = "banca concluída";
	$qtdemaxunid = 40;
	$nivel = "RSCI";
	$diretriz = "G";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 60:
	$criterio = 60;
	$nomecriterio = "Curso adicional de graduação";
	$fatorpontuacao = 10.0;
	$unidade = "curso concluído";
	$qtdemaxunid = 1;
	$nivel = "RSCI";
	$diretriz = "H";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	/* ****** */
	/* RSC-II */
	/* ****** */
	
	// Critério 61:
	$criterio = 61;
	$nomecriterio = "Orientação ou coorientação de TCC de cursos técnicos";
	$fatorpontuacao = 0.50;
	$unidade = "orientação concluída";
	$qtdemaxunid = 40;
	$nivel = "RSCII";
	$diretriz = "A";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 62:
	$criterio = 62;
	$nomecriterio = "Orientação de Projeto Integrador nos cursos (ou similares)";
	$fatorpontuacao = 0.50;
	$unidade = "orientação concluída";
	$qtdemaxunid = 40;
	$nivel = "RSCII";
	$diretriz = "A";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 63:
	$criterio = 63;
	$nomecriterio = "Orientação ou coorientação de TCC  de cursos de graduação";
	$fatorpontuacao = 1.00;
	$unidade = "orientação concluída";
	$qtdemaxunid = 20;
	$nivel = "RSCII";
	$diretriz = "A";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 64:
	$criterio = 64;
	$nomecriterio = "Orientação ou coorientação de Monografia de especialização";
	$fatorpontuacao = 1.25;
	$unidade = "orientação concluída";
	$qtdemaxunid = 16;
	$nivel = "RSCII";
	$diretriz = "A";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 65:
	$criterio = 65;
	$nomecriterio = "Orientação de estudantes em atividades de ensino, pesquisa e extensão";
	$fatorpontuacao = 1.00;
	$unidade = "orientação concluída";
	$qtdemaxunid = 20;
	$nivel = "RSCII";
	$diretriz = "A";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 66:
	$criterio = 66;
	$nomecriterio = "Orientação ou supervisão de estágios curriculares, obrigatório ou não";
	$fatorpontuacao = 0.20;
	$unidade = "mês";
	$qtdemaxunid = 50;
	$nivel = "RSCII";
	$diretriz = "A";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 67:
	$criterio = 67;
	$nomecriterio = "Participação em Banca de Curso de Pós Graduação Lato Sensu";
	$fatorpontuacao = 1.00;
	$unidade = "banca concluída";
	$qtdemaxunid = 10;
	$nivel = "RSCII";
	$diretriz = "A";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 68:
	$criterio = 68;
	$nomecriterio = "Propriedade intelectual - registro de patente";
	$fatorpontuacao = 10.0;
	$unidade = "Registro";
	$qtdemaxunid = 1;
	$nivel = "RSCII";
	$diretriz = "B";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 69:
	$criterio = 69;
	$nomecriterio = "Propriedade intelectual - depósito de patente";
	$fatorpontuacao = 5.00;
	$unidade = "Depósito";
	$qtdemaxunid = 2;
	$nivel = "RSCII";
	$diretriz = "B";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 70:
	$criterio = 70;
	$nomecriterio = "Produto ou processo não patenteado, protótipo, software não registrado e similares";
	$fatorpontuacao = 2.00;
	$unidade = "desenv. concluído";
	$qtdemaxunid = 5;
	$nivel = "RSCII";
	$diretriz = "B";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 71:
	$criterio = 71;
	$nomecriterio = "Participação em comissões, grupos de trabalho, ministrante de oficina, estabelecidos institucionalmente";
	$fatorpontuacao = 0.40;
	$unidade = "Comissão concluída";
	$qtdemaxunid = 50;
	$nivel = "RSCII";
	$diretriz = "C";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 72:
	$criterio = 72;
	$nomecriterio = "Participação em núcleo de inivação tecnológica ou atividdes correlatas";
	$fatorpontuacao = 0.40;
	$unidade = "mês";
	$qtdemaxunid = 50;
	$nivel = "RSCII";
	$diretriz = "C";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 73:
	$criterio = 73;
	$nomecriterio = "Participação em comissão de elaboração de PCC/PPC de curso Técnico";
	$fatorpontuacao = 2.00;
	$unidade = "PCC/PPC concluído";
	$qtdemaxunid = 10;
	$nivel = "RSCII";
	$diretriz = "C";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 74:
	$criterio = 74;
	$nomecriterio = "Participação em comissão de elaboração de PCC/PPC de curso FIC";
	$fatorpontuacao = 0.50;
	$unidade = "PCC/PPC concluído";
	$qtdemaxunid = 40;
	$nivel = "RSCII";
	$diretriz = "C";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 75:
	$criterio = 75;
	$nomecriterio = "Coordenação de reformulação de Projetos Pedagógicos de novos Cursos";
	$fatorpontuacao = 1.25;
	$unidade = "PCC/PPC concluído";
	$qtdemaxunid = 16;
	$nivel = "RSCII";
	$diretriz = "C";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 76:
	$criterio = 76;
	$nomecriterio = "Participação em comissão de reformulação de PCC/PPC de curso Técnicos";
	$fatorpontuacao = 1.00;
	$unidade = "PCC/PPC concluído";
	$qtdemaxunid = 20;
	$nivel = "RSCII";
	$diretriz = "C";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 77:
	$criterio = 77;
	$nomecriterio = "Participação em comissão de reformulação de PCC/PPC de curso FIC";
	$fatorpontuacao = 0.25;
	$unidade = "PCC/PPC concluído";
	$qtdemaxunid = 80;
	$nivel = "RSCII";
	$diretriz = "C";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 78:
	$criterio = 78;
	$nomecriterio = "Coordenação de projetos de pesquisa, inovação tecnológica e extensão na própria instituição";
	$fatorpontuacao = 4.00;
	$unidade = "projeto concluído";
	$qtdemaxunid = 5;
	$nivel = "RSCII";
	$diretriz = "D";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 79:
	$criterio = 79;
	$nomecriterio = "Participação como executor de projeto de pesquisa, inovação tecnológica e extensão na própria instituição";
	$fatorpontuacao = 5.00;
	$unidade = "projeto concluído";
	$qtdemaxunid = 4;
	$nivel = "RSCII";
	$diretriz = "D";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 80:
	$criterio = 80;
	$nomecriterio = "Participação em projetos de pesquisa, inovação tecnológica e extensão na própria instituição";
	$fatorpontuacao = 2.5;
	$unidade = "projeto concluído";
	$qtdemaxunid = 8;
	$nivel = "RSCII";
	$diretriz = "D";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 81:
	$criterio = 81;
	$nomecriterio = "Orientação e supervisão ao corpo docente e/ou discente nos aspectos  pedagógicos, de saúde e de assistência social";
	$fatorpontuacao = 0.10;
	$unidade = "mês";
	$qtdemaxunid = 50;
	$nivel = "RSCII";
	$diretriz = "D";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 82:
	$criterio = 82;
	$nomecriterio = "Participação como membro nos órgãos normativos e de assessoramento do IFSC";
	$fatorpontuacao = 0.10;
	$unidade = "mês";
	$qtdemaxunid = 50;
	$nivel = "RSCII";
	$diretriz = "D";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 83:
	$criterio = 83;
	$nomecriterio = "Participação, como membro do Conselho Superior, bem como em comissões instituídas pelo Ministério da Educação";
	$fatorpontuacao = 0.20;
	$unidade = "mês";
	$qtdemaxunid = 50;
	$nivel = "RSCII";
	$diretriz = "D";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 84:
	$criterio = 84;
	$nomecriterio = "Atuação nos processos de ensino, pesquisa e extensão e as inerentes ao exercício de direção, assessoramento, chefia, coordenação e assistência na própria instituição, nos diversos níveis e modalidades de educação";
	$fatorpontuacao = 0.10;
	$unidade = "mês";
	$qtdemaxunid = 100;
	$nivel = "RSCII";
	$diretriz = "D";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 85:
	$criterio = 85;
	$nomecriterio = "Coordenação de Projetos Integradores";
	$fatorpontuacao = 2.50;
	$unidade = "projeto concluído";
	$qtdemaxunid = 4;
	$nivel = "RSCII";
	$diretriz = "E";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 86:
	$criterio = 86;
	$nomecriterio = "Participação em Projetos Integradores";
	$fatorpontuacao = 1.25;
	$unidade = "projeto concluído";
	$qtdemaxunid = 8;
	$nivel = "RSCII";
	$diretriz = "E";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 87:
	$criterio = 87;
	$nomecriterio = "Participação na organização de conferência, congresso, simpósio e similares";
	$fatorpontuacao = 2.00;
	$unidade = "evento concluído";
	$qtdemaxunid = 5;
	$nivel = "RSCII";
	$diretriz = "F";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 88:
	$criterio = 88;
	$nomecriterio = "Participação na organização de workshop, seminário e similares";
	$fatorpontuacao = 1.00;
	$unidade = "evento concluído";
	$qtdemaxunid = 10;
	$nivel = "RSCII";
	$diretriz = "F";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 89:
	$criterio = 89;
	$nomecriterio = "Participação na organização de palestra e similares";
	$fatorpontuacao = 0.50;
	$unidade = "evento concluído";
	$qtdemaxunid = 20;
	$nivel = "RSCII";
	$diretriz = "F";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 90:
	$criterio = 90;
	$nomecriterio = "Participação na organização de eventos esportivos, sociais, culturais e filantrópicos";
	$fatorpontuacao = 0.50;
	$unidade = "evento concluído";
	$qtdemaxunid = 20;
	$nivel = "RSCII";
	$diretriz = "F";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 91:
	$criterio = 91;
	$nomecriterio = "Curso de aperfeiçoamento adicional";
	$fatorpontuacao = 10.0;
	$unidade = "curso concluído";
	$qtdemaxunid = 1;
	$nivel = "RSCII";
	$diretriz = "G";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 92:
	$criterio = 92;
	$nomecriterio = "Curso de especialização adicional";
	$fatorpontuacao = 10.0;
	$unidade = "curso concluído";
	$qtdemaxunid = 1;
	$nivel = "RSCII";
	$diretriz = "G";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	/* ******* */
	/* RSC-III */
	/* ******* */
	
	// Critério 93:
	$criterio = 93;
	$nomecriterio = "Contratos de transferência de tecnologia e licenciamento";
	$fatorpontuacao = 2.00;
	$unidade = "contrato ou licenciamento";
	$qtdemaxunid = 5;
	$nivel = "RSCIII";
	$diretriz = "A";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 94:
	$criterio = 94;
	$nomecriterio = "Participação em programa ou projeto de desenvolvimento e/ou transferência de tecnologia";
	$fatorpontuacao = 5.00;
	$unidade = "programa concluído";
	$qtdemaxunid = 2;
	$nivel = "RSCIII";
	$diretriz = "A";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 95:
	$criterio = 95;
	$nomecriterio = "Elaboração e utilização de protótipo com aplicação em ensino, pesquisa e/ou extensão";
	$fatorpontuacao = 2.50;
	$unidade = "protótipo concluído";
	$qtdemaxunid = 4;
	$nivel = "RSCIII";
	$diretriz = "A";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 96:
	$criterio = 96;
	$nomecriterio = "Participação em comissão de elaboração de PPC de novos Cursos: médio, técnico, graduação e pós-graduação";
	$fatorpontuacao = 3.00;
	$unidade = "PPC concluído";
	$qtdemaxunid = 10;
	$nivel = "RSCIII";
	$diretriz = "B";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 97:
	$criterio = 97;
	$nomecriterio = "Participação em comissão de elaboração de PPC de novos Cursos FIC";
	$fatorpontuacao = 2.00;
	$unidade = "PPC concluído";
	$qtdemaxunid = 15;
	$nivel = "RSCIII";
	$diretriz = "B";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 98:
	$criterio = 98;
	$nomecriterio = "Participação em comissão de reformulação de PPC de Cursos: médio, técnico, graduação e pós-graduação";
	$fatorpontuacao = 2.00;
	$unidade = "PPC concluído";
	$qtdemaxunid = 15;
	$nivel = "RSCIII";
	$diretriz = "B";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 99:
	$criterio = 99;
	$nomecriterio = "Participação em comissão de reformulação de PPC de Cursos FIC";
	$fatorpontuacao = 1.50;
	$unidade = "PPC concluído";
	$qtdemaxunid = 20;
	$nivel = "RSCIII";
	$diretriz = "B";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 100:
	$criterio = 100;
	$nomecriterio = "Participação em comissão de implantação de PPC de novos Cursos: médio, técnico, graduação e pós-graduação";
	$fatorpontuacao = 3.00;
	$unidade = "PPC concluído";
	$qtdemaxunid = 10;
	$nivel = "RSCIII";
	$diretriz = "B";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 101:
	$criterio = 101;
	$nomecriterio = "Participação em comissão de implantação de PPC de novos Cursos FIC";
	$fatorpontuacao = 1.50;
	$unidade = "PPC concluído";
	$qtdemaxunid = 20;
	$nivel = "RSCIII";
	$diretriz = "B";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 102:
	$criterio = 102;
	$nomecriterio = "Participação em comissão de formulação ou reformulação de PDI, PPI, Planejamento Estratégico, RDP, Regimentos e Estatutos";
	$fatorpontuacao = 3.00;
	$unidade = "comissão concluída";
	$qtdemaxunid = 10;
	$nivel = "RSCIII";
	$diretriz = "B";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 103:
	$criterio = 103;
	$nomecriterio = "Aplicação de métodos e tecnologias educacionais que proporcionem a interdisciplinaridade e a integração de conteúdos (ex. projeto integrador, conectando saberes etc.)";
	$fatorpontuacao = 3.00;
	$unidade = "projeto concluído";
	$qtdemaxunid = 10;
	$nivel = "RSCIII";
	$diretriz = "B";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 104:
	$criterio = 104;
	$nomecriterio = "Coordenação e/ou responsabilidade técnica por laboratórios de apoio ao ensino,  pesquisa e extensão";
	$fatorpontuacao = 0.30;
	$unidade = "mês";
	$qtdemaxunid = 100;
	$nivel = "RSCIII";
	$diretriz = "B";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 105:
	$criterio = 105;
	$nomecriterio = "Participação como membro dos órgãos normativos e de assesssoramento do IFSC";
	$fatorpontuacao = 0.30;
	$unidade = "mês";
	$qtdemaxunid = 100;
	$nivel = "RSCIII";
	$diretriz = "B";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 106:
	$criterio = 106;
	$nomecriterio = "Participação, como membro do Conselho Superior, bem como em comissões instituídas pelo Ministério da Educação";
	$fatorpontuacao = 0.30;
	$unidade = "mês";
	$qtdemaxunid = 100;
	$nivel = "RSCIII";
	$diretriz = "B";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 107:
	$criterio = 107;
	$nomecriterio = "Captação de recursos em projetos de pesquisa, inovação tecnológica e extensão";
	$fatorpontuacao = 5.00;
	$unidade = "projeto concluído";
	$qtdemaxunid = 2;
	$nivel = "RSCIII";
	$diretriz = "C";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
		
	// Critério 108:
	$criterio = 108;
	$nomecriterio = "Coordenação de núcleo de inovação tecnológica";
	$fatorpontuacao = 0.25;
	$unidade = "mês";
	$qtdemaxunid = 40;
	$nivel = "RSCIII";
	$diretriz = "C";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 109:
	$criterio = 109;
	$nomecriterio = "Coordenação e/ou participação em programas, projetos de pesquisa e/ou de extensão";
	$fatorpontuacao = 0.25;
	$unidade = "mês";
	$qtdemaxunid = 40;
	$nivel = "RSCIII";
	$diretriz = "C";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 110:
	$criterio = 110;
	$nomecriterio = "Coordenação e/ou participação em ações de extensão (visitas, eventos externos, parcerias, ações sociais ou similares) ";
	$fatorpontuacao = 0.20;
	$unidade = "evento concluído";
	$qtdemaxunid = 50;
	$nivel = "RSCIII";
	$diretriz = "C";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 111:
	$criterio = 111;
	$nomecriterio = "Captação de recursos em projetos de pesquisa, inovação tecnológica e extensão em parceria com outras instituições";
	$fatorpontuacao = 2.50;
	$unidade = "projeto concluído";
	$qtdemaxunid = 4;
	$nivel = "RSCIII";
	$diretriz = "D";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 112:
	$criterio = 112;
	$nomecriterio = "Coordenação de projetos de pesquisa, inovação tecnológica e extensão em parceria com outras instituições";
	$fatorpontuacao = 2.50;
	$unidade = "projeto concluído";
	$qtdemaxunid = 4;
	$nivel = "RSCIII";
	$diretriz = "D";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 113:
	$criterio = 113;
	$nomecriterio = "Coordenação ou participação em equipe  visando a implantação de unidades de ensino";
	$fatorpontuacao = 2.50;
	$unidade = "projeto concluído";
	$qtdemaxunid = 4;
	$nivel = "RSCIII";
	$diretriz = "D";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 114:
	$criterio = 114;
	$nomecriterio = "Liderança de grupo de pesquisa";
	$fatorpontuacao = 0.20;
	$unidade = "mês";
	$qtdemaxunid = 50;
	$nivel = "RSCIII";
	$diretriz = "D";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 115:
	$criterio = 115;
	$nomecriterio = "Membro de grupo de pesquisa";
	$fatorpontuacao = 0.10;
	$unidade = "mês";
	$qtdemaxunid = 100;
	$nivel = "RSCIII";
	$diretriz = "D";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 116:
	$criterio = 116;
	$nomecriterio = "Trabalhos técnicos e consultorias internacionais";
	$fatorpontuacao = 2.50;
	$unidade = "atividade concluída";
	$qtdemaxunid = 4;
	$nivel = "RSCIII";
	$diretriz = "E";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 117:
	$criterio = 117;
	$nomecriterio = "Trabalhos técnicos e consultorias nacionais";
	$fatorpontuacao = 2.00;
	$unidade = "atividade concluída";
	$qtdemaxunid = 5;
	$nivel = "RSCIII";
	$diretriz = "E";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 118:
	$criterio = 118;
	$nomecriterio = "Membro de comissão de licitação, padronização, compras, especificação e análise de material permanente";
	$fatorpontuacao = 0.50;
	$unidade = "comissão concluída";
	$qtdemaxunid = 20;
	$nivel = "RSCIII";
	$diretriz = "E";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 119:
	$criterio = 119;
	$nomecriterio = "Curso Stricto Sensu";
	$fatorpontuacao = 10.0;
	$unidade = "curso concluído";
	$qtdemaxunid = 1;
	$nivel = "RSCIII";
	$diretriz = "F";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 120:
	$criterio = 120;
	$nomecriterio = "Prêmios por atividades científicas, artísticas, esportivas e culturais";
	$fatorpontuacao = 4.00;
	$unidade = "prêmio";
	$qtdemaxunid = 5;
	$nivel = "RSCIII";
	$diretriz = "G";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 121:
	$criterio = 121;
	$nomecriterio = "Publicação de livro especializado";
	$fatorpontuacao = 5.00;
	$unidade = "livro";
	$qtdemaxunid = 4;
	$nivel = "RSCIII";
	$diretriz = "G";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 122:
	$criterio = 122;
	$nomecriterio = "Publicação de capítulo de livro especializado";
	$fatorpontuacao = 2.50;
	$unidade = "capítulo";
	$qtdemaxunid = 8;
	$nivel = "RSCIII";
	$diretriz = "G";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 123:
	$criterio = 123;
	$nomecriterio = "Tradutor de livro especializado";
	$fatorpontuacao = 2.50;
	$unidade = "livro";
	$qtdemaxunid = 8;
	$nivel = "RSCIII";
	$diretriz = "G";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 124:
	$criterio = 124;
	$nomecriterio = "Revisor técnico de livro especializado";
	$fatorpontuacao = 2.50;
	$unidade = "livro";
	$qtdemaxunid = 8;
	$nivel = "RSCIII";
	$diretriz = "G";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 125:
	$criterio = 125;
	$nomecriterio = "Publicação de artigo em revista indexada";
	$fatorpontuacao = 5.00;
	$unidade = "artigo";
	$qtdemaxunid = 4;
	$nivel = "RSCIII";
	$diretriz = "G";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 126:
	$criterio = 126;
	$nomecriterio = "Publicação de artigo em revista não indexada";
	$fatorpontuacao = 2.50;
	$unidade = "artigo";
	$qtdemaxunid = 8;
	$nivel = "RSCIII";
	$diretriz = "G";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 127:
	$criterio = 127;
	$nomecriterio = "Publicação de relatório de pesquisa interno";
	$fatorpontuacao = 2.00;
	$unidade = "relatório";
	$qtdemaxunid = 10;
	$nivel = "RSCIII";
	$diretriz = "G";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 128:
	$criterio = 128;
	$nomecriterio = "Apresentação ou publicação de trabalho de pesquisa em evento internacional";
	$fatorpontuacao = 2.00;
	$unidade = "trabalho";
	$qtdemaxunid = 10;
	$nivel = "RSCIII";
	$diretriz = "G";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 129:
	$criterio = 129;
	$nomecriterio = "Apresentação ou publicação de trabalho de pesquisa em evento nacional";
	$fatorpontuacao = 1.00;
	$unidade = "trabalho";
	$qtdemaxunid = 20;
	$nivel = "RSCIII";
	$diretriz = "G";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 130:
	$criterio = 130;
	$nomecriterio = "Contemplado em edital de pesquisa ou extensão de agências de fomento";
	$fatorpontuacao = 2.00;
	$unidade = "edital";
	$qtdemaxunid = 10;
	$nivel = "RSCIII";
	$diretriz = "G";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 131:
	$criterio = 131;
	$nomecriterio = "Unidades curriculares diferentes ministradas ao longo da carreira (ensino ou extensão)";
	$fatorpontuacao = 1.00;
	$unidade = "unidade curricular";
	$qtdemaxunid = 20;
	$nivel = "RSCIII";
	$diretriz = "G";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 132:
	$criterio = 132;
	$nomecriterio = "Orientação de TCC ou Monografia";
	$fatorpontuacao = 2.00;
	$unidade = "monografia concluída";
	$qtdemaxunid = 10;
	$nivel = "RSCIII";
	$diretriz = "G";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 133:
	$criterio = 133;
	$nomecriterio = "Orientação de Dissertação";
	$fatorpontuacao = 4.00;
	$unidade = "dissertação concluída";
	$qtdemaxunid = 5;
	$nivel = "RSCIII";
	$diretriz = "G";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 134:
	$criterio = 134;
	$nomecriterio = "Atuação do docente na Educação de Jovens e Adultos";
	$fatorpontuacao = 0.50;
	$unidade = "semestre";
	$qtdemaxunid = 40;
	$nivel = "RSCIII";
	$diretriz = "G";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 135:
	$criterio = 135;
	$nomecriterio = "Atuação do docente no Ensino Médio";
	$fatorpontuacao = 0.50;
	$unidade = "semestre";
	$qtdemaxunid = 40;
	$nivel = "RSCIII";
	$diretriz = "G";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 136:
	$criterio = 136;
	$nomecriterio = "Atuação do docente no Ensino Técnico";
	$fatorpontuacao = 0.50;
	$unidade = "semestre";
	$qtdemaxunid = 40;
	$nivel = "RSCIII";
	$diretriz = "G";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 137:
	$criterio = 137;
	$nomecriterio = "Atuação do docente nos Cursos de Graduação (Bacharelado, Licenciatura e Tecnológico)";
	$fatorpontuacao = 1.00;
	$unidade = "semestre";
	$qtdemaxunid = 20;
	$nivel = "RSCIII";
	$diretriz = "G";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");

	// Critério 138:
	$criterio = 138;
	$nomecriterio = "Atuação do docente em Pós Graduação lato sensu";
	$fatorpontuacao = 0.50;
	$unidade = "mês";
	$qtdemaxunid = 40;
	$nivel = "RSCIII";
	$diretriz = "G";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	
	// Critério 139:
	$criterio = 139;
	$nomecriterio = "Atuação do docente em Pós Graduação Stricto Sensu (Mestrado)";
	$fatorpontuacao = 1.50;
	$unidade = "trimestre";
	$qtdemaxunid = 13;
	$nivel = "RSCIII";
	$diretriz = "G";
	$query = "INSERT INTO TabRSC (id, criterio, nomecriterio, fatorpontuacao, unidade, qtdemaxunid, nivel, diretriz) VALUES (NULL, $criterio, '$nomecriterio', $fatorpontuacao, '$unidade', $qtdemaxunid, '$nivel', '$diretriz')";
    $result = mysqli_query($link, $query) or die("Bad Query: $query");
	}

	fnQuadroPontuacaoMax($link);
	$res = mysqli_query($link,"SELECT * FROM QuadroPontuacaoMax");
	$rows = mysqli_num_rows($res);

	if ($rows == 0) {
		// RSC-I Diretriz: A
		$nivel = "RSCI";
		$diretriz = "A";
		$descricao = "A - Experiência na área de formação e/ou atuação do docente, anterior ao ingresso na instituição, contemplando o impacto de suas ações nas demais diretrizes dispostas para todos os níveis de RSC";
		$PontMax = 10;
		$query = "INSERT INTO QuadroPontuacaoMax (id, nivel, diretriz, descricao, PontuacaoMax) VALUES (NULL, '$nivel', '$diretriz', '$descricao', $PontMax)";
		$result = mysqli_query($link, $query) or die("Bad Query: $query");

		// RSC-I Diretriz: B
		$nivel = "RSCI";
		$diretriz = "B";
		$descricao = "B - Cursos de capacitação na área de interesse institucional";
		$PontMax = 10;
		$query = "INSERT INTO QuadroPontuacaoMax (id, nivel, diretriz, descricao, PontuacaoMax) VALUES (NULL, '$nivel', '$diretriz', '$descricao', $PontMax)";
		$result = mysqli_query($link, $query) or die("Bad Query: $query");

		// RSC-I Diretriz: C
		$nivel = "RSCI";
		$diretriz = "C";
		$descricao = "C - Atuação nos diversos níveis e modalidades de educação";
		$PontMax = 20;
		$query = "INSERT INTO QuadroPontuacaoMax (id, nivel, diretriz, descricao, PontuacaoMax) VALUES (NULL, '$nivel', '$diretriz', '$descricao', $PontMax)";
		$result = mysqli_query($link, $query) or die("Bad Query: $query");

		// RSC-I Diretriz: D
		$nivel = "RSCI";
		$diretriz = "D";
		$descricao = "D - Atuação em comissões e representações institucionais, de classes profissionais, contemplando o impacto de suas ações nas demais diretrizes dispostas para todos os níveis do RSC";
		$PontMax = 10;
		$query = "INSERT INTO QuadroPontuacaoMax (id, nivel, diretriz, descricao, PontuacaoMax) VALUES (NULL, '$nivel', '$diretriz', '$descricao', $PontMax)";
		$result = mysqli_query($link, $query) or die("Bad Query: $query");

		// RSC-I Diretriz: E
		$nivel = "RSCI";
		$diretriz = "E";
		$descricao = "E - Produção de material didático e/ou implantação de ambientes de aprendizagem, nas atividades de ensino, pesquisa, extensão e/ou inovação";
		$PontMax = 10;
		$query = "INSERT INTO QuadroPontuacaoMax (id, nivel, diretriz, descricao, PontuacaoMax) VALUES (NULL, '$nivel', '$diretriz', '$descricao', $PontMax)";
		$result = mysqli_query($link, $query) or die("Bad Query: $query");

		// RSC-I Diretriz: F
		$nivel = "RSCI";
		$diretriz = "F";
		$descricao = "F - Atuação na gestão acadêmica e institucional, contemplando o impacto de suas ações individuais nas demais diretrizes dispostas para todos os níveis de RSC";
		$PontMax = 20;
		$query = "INSERT INTO QuadroPontuacaoMax (id, nivel, diretriz, descricao, PontuacaoMax) VALUES (NULL, '$nivel', '$diretriz', '$descricao', $PontMax)";
		$result = mysqli_query($link, $query) or die("Bad Query: $query");

		// RSC-I Diretriz: G
		$nivel = "RSCI";
		$diretriz = "G";
		$descricao = "G - Participação em processos seletivos, em bancas de avaliação acadêmica e/ou de concursos";
		$PontMax = 10;
		$query = "INSERT INTO QuadroPontuacaoMax (id, nivel, diretriz, descricao, PontuacaoMax) VALUES (NULL, '$nivel', '$diretriz', '$descricao', $PontMax)";
		$result = mysqli_query($link, $query) or die("Bad Query: $query");

		// RSC-I Diretriz: H
		$nivel = "RSCI";
		$diretriz = "H";
		$descricao = "H - Outras graduações, na área de interesse, além daquela que o habilita e define o nível de RSC pretendido, no âmbito do plano de qualificação institucional";
		$PontMax = 10;
		$query = "INSERT INTO QuadroPontuacaoMax (id, nivel, diretriz, descricao, PontuacaoMax) VALUES (NULL, '$nivel', '$diretriz', '$descricao', $PontMax)";
		$result = mysqli_query($link, $query) or die("Bad Query: $query");
		
		// RSC-II Diretriz: A
		$nivel = "RSCII";
		$diretriz = "A";
		$descricao = "A - Orientação do corpo discente em atividades de ensino, pesquisa, extensão e/ou inovação";
		$PontMax = 20;
		$query = "INSERT INTO QuadroPontuacaoMax (id, nivel, diretriz, descricao, PontuacaoMax) VALUES (NULL, '$nivel', '$diretriz', '$descricao', $PontMax)";
		$result = mysqli_query($link, $query) or die("Bad Query: $query");

		// RSC-II Diretriz: B
		$nivel = "RSCII";
		$diretriz = "B";
		$descricao = "B - Participação no desenvolvimento de protótipos, depósitos e/ou registros de propriedade intelectual";
		$PontMax = 10;
		$query = "INSERT INTO QuadroPontuacaoMax (id, nivel, diretriz, descricao, PontuacaoMax) VALUES (NULL, '$nivel', '$diretriz', '$descricao', $PontMax)";
		$result = mysqli_query($link, $query) or die("Bad Query: $query");

		// RSC-II Diretriz: C
		$nivel = "RSCII";
		$diretriz = "C";
		$descricao = "C - Participação em grupos de trabalho e oficinas institucionais";
		$PontMax = 20;
		$query = "INSERT INTO QuadroPontuacaoMax (id, nivel, diretriz, descricao, PontuacaoMax) VALUES (NULL, '$nivel', '$diretriz', '$descricao', $PontMax)";
		$result = mysqli_query($link, $query) or die("Bad Query: $query");

		// RSC-II Diretriz: D
		$nivel = "RSCII";
		$diretriz = "D";
		$descricao = "D - Participação no desenvolvimento de projetos, de interesse institucional, de ensino, pesquisa, extensão e/ou inovação";
		$PontMax = 20;
		$query = "INSERT INTO QuadroPontuacaoMax (id, nivel, diretriz, descricao, PontuacaoMax) VALUES (NULL, '$nivel', '$diretriz', '$descricao', $PontMax)";
		$result = mysqli_query($link, $query) or die("Bad Query: $query");

		// RSC-II Diretriz: E
		$nivel = "RSCII";
		$diretriz = "E";
		$descricao = "E - Participação no desenvolvimento de projetos e/ou práticas pedagógicas de reconhecida relevância";
		$PontMax = 10;
		$query = "INSERT INTO QuadroPontuacaoMax (id, nivel, diretriz, descricao, PontuacaoMax) VALUES (NULL, '$nivel', '$diretriz', '$descricao', $PontMax)";
		$result = mysqli_query($link, $query) or die("Bad Query: $query");

		// RSC-II Diretriz: F
		$nivel = "RSCII";
		$diretriz = "F";
		$descricao = "F - Participação na organização de eventos científicos, tecnológicos, esportivos, sociais e/ou culturais";
		$PontMax = 10;
		$query = "INSERT INTO QuadroPontuacaoMax (id, nivel, diretriz, descricao, PontuacaoMax) VALUES (NULL, '$nivel', '$diretriz', '$descricao', $PontMax)";
		$result = mysqli_query($link, $query) or die("Bad Query: $query");

		// RSC-II Diretriz: G
		$nivel = "RSCII";
		$diretriz = "G";
		$descricao = "G - Outras pós-graduações lato sensu, na área de interesse, além daquela que o habilita e define o nível de RSC pretendido, no âmbito do plano de qualificação institucional";
		$PontMax = 10;
		$query = "INSERT INTO QuadroPontuacaoMax (id, nivel, diretriz, descricao, PontuacaoMax) VALUES (NULL, '$nivel', '$diretriz', '$descricao', $PontMax)";
		$result = mysqli_query($link, $query) or die("Bad Query: $query");		

		// RSC-III Diretriz: A
		$nivel = "RSCIII";
		$diretriz = "A";
		$descricao = "A - Desenvolvimento, produção e transferência de tecnologias";
		$PontMax = 10;
		$query = "INSERT INTO QuadroPontuacaoMax (id, nivel, diretriz, descricao, PontuacaoMax) VALUES (NULL, '$nivel', '$diretriz', '$descricao', $PontMax)";
		$result = mysqli_query($link, $query) or die("Bad Query: $query");

		// RSC-III Diretriz: B
		$nivel = "RSCIII";
		$diretriz = "B";
		$descricao = "B - Desenvolvimento de pesquisas e aplicação de métodos e tecnologias educacionais que propiciem a interdisciplinaridade e a integração de conteúdos acadêmicos na educação profissional e tecnológica ou na educação básica";
		$PontMax = 30;
		$query = "INSERT INTO QuadroPontuacaoMax (id, nivel, diretriz, descricao, PontuacaoMax) VALUES (NULL, '$nivel', '$diretriz', '$descricao', $PontMax)";
		$result = mysqli_query($link, $query) or die("Bad Query: $query");

		// RSC-III Diretriz: C
		$nivel = "RSCIII";
		$diretriz = "C";
		$descricao = "C - Desenvolvimento de pesquisas e atividades de extensão que proporcionem a articulação institucional com os arranjos sociais, culturais e produtivos";
		$PontMax = 10;
		$query = "INSERT INTO QuadroPontuacaoMax (id, nivel, diretriz, descricao, PontuacaoMax) VALUES (NULL, '$nivel', '$diretriz', '$descricao', $PontMax)";
		$result = mysqli_query($link, $query) or die("Bad Query: $query");

		// RSC-III Diretriz: D
		$nivel = "RSCIII";
		$diretriz = "D";
		$descricao = "D - Atuação em projetos e/ou atividades em parceria com outras instituições";
		$PontMax = 10;
		$query = "INSERT INTO QuadroPontuacaoMax (id, nivel, diretriz, descricao, PontuacaoMax) VALUES (NULL, '$nivel', '$diretriz', '$descricao', $PontMax)";
		$result = mysqli_query($link, $query) or die("Bad Query: $query");

		// RSC-III Diretriz: E
		$nivel = "RSCIII";
		$diretriz = "E";
		$descricao = "E - Atuação em atividades de assistência técnica nacional e/ou internacional";
		$PontMax = 10;
		$query = "INSERT INTO QuadroPontuacaoMax (id, nivel, diretriz, descricao, PontuacaoMax) VALUES (NULL, '$nivel', '$diretriz', '$descricao', $PontMax)";
		$result = mysqli_query($link, $query) or die("Bad Query: $query");

		// RSC-III Diretriz: F
		$nivel = "RSCIII";
		$diretriz = "F";
		$descricao = "F - Outras pós-graduações stricto sensu, na área de interesse, além daquela que o habilita e define o nível de RSC pretendido, no âmbito do plano de qualificação institucional";
		$PontMax = 10;
		$query = "INSERT INTO QuadroPontuacaoMax (id, nivel, diretriz, descricao, PontuacaoMax) VALUES (NULL, '$nivel', '$diretriz', '$descricao', $PontMax)";
		$result = mysqli_query($link, $query) or die("Bad Query: $query");

		// RSC-III Diretriz: G
		$nivel = "RSCIII";
		$diretriz = "G";
		$descricao = "G - Produção acadêmica e/ou tecnológica, nas atividades de ensino, pesquisa, extensão e/ou inovação";
		$PontMax = 20;
		$query = "INSERT INTO QuadroPontuacaoMax (id, nivel, diretriz, descricao, PontuacaoMax) VALUES (NULL, '$nivel', '$diretriz', '$descricao', $PontMax)";
		$result = mysqli_query($link, $query) or die("Bad Query: $query");		
	}

?>

<!--
</div>
</body>
</html>
-->