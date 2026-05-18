<?php	
// Tabelas definidas de acordo com a Resolução 29/2014/Consup

/*
TabCPPD
Cria a tabela com os usuários da CPPD e do CDP para gerenciar este Aplicativo. Inicializa com os seguintes usuários padrões:
	cppd.secretaria@ifsc.edu.br | cppd#formRSC@2024
	cdp.secretaria@ifsc.edu.br	| cdp#formRSC@2024
	
	ife: nome do Instituto Federal (caso outros desejem usar este aplicativo)
	siglaife: sigla do Instituto Federal
	usuario: nome de quem está se cadastrando
	siape: matrícula SIAPE do usuário
	senha: senha para acessar o aplicativo no ambiente CPPD
	email: e-mail para contato e login no ambiente CPPD
	campus: campus onde o usuário está lotado
	telefone: número de telefone do usuário
*/
function fnTabCPPD($link) {
	mysqli_query($link,"CREATE TABLE IF NOT EXISTS TabCPPD (
        id int unsigned zerofill NOT NULL auto_increment,
		ife TEXT NOT NULL,
		siglaife TEXT NOT NULL,
		usuario TEXT NOT NULL,
		siape TEXT,
		senha TEXT NOT NULL,
		email TEXT NOT NULL,
		campus TEXT,
		telefone TEXT,
        PRIMARY KEY(id));");
}

/*
TabDocente
Tabela com o cadastro dos docentes que desejam solicitar RSC
	nome: nome do docente que vai solicitar RSC
	siape: matrícula SIAPE do docente
	ife: instituto federal do docente (caso outros desejem usar este aplicativo)
	siglaife: sigla do instituto federal
	senha: senha de acesso do docente
	email: e-mail para contato com o docente e login no ambiente Docente
	rsc: nível de rsc que o docente está pleiteando
*/
function fnTabDocente($link){
	mysqli_query($link,"CREATE TABLE IF NOT EXISTS TabDocente (
        id int unsigned zerofill NOT NULL auto_increment,
		nome TEXT NOT NULL,
		siape TEXT NOT NULL,
		ife	TEXT NOT NULL,
		siglaife TEXT NOT NULL,
		senha TEXT NOT NULL,
		email TEXT NOT NULL,
		rsc	TEXT NOT NULL,
        PRIMARY KEY(id));"
	);
	return;
}

/*
TabAutenticador
Tabela para os servidores federais que vao autenticar os documentos do docente requerente do beneficio RSC.
	nome: nome do autenticador
	email: e-mail institucional do autenticador
	senha: senha de acesso ao cadastro do autenticador
	siape: nº siape do autenticador
	ife: instituto federal de educação do autenticador
	siglaife: sigla do instituto federal de educação do autenticador
	campus: campus de lotação do autenticador
	telefone: telefone para entrar em contato com o autenticador
*/
function fnTabAutenticador($link) {
	mysqli_query($link,"CREATE TABLE IF NOT EXISTS TabAutenticador (
        id int unsigned zerofill NOT NULL auto_increment,
		nome TEXT NOT NULL,
		email TEXT NOT NULL,
		senha TEXT NOT NULL,
		siape TEXT,
		ife TEXT,
		siglaife TEXT,
		campus TEXT,
		telefone TEXT,
        PRIMARY KEY(id));"
	);	
}

/*
TabDocAutenticar
Tabela com os documentos que precisam ser autenticados.
	idAuth: id do autenticador
	emailAuth: e-mail do autenticador
	siapeAuth: siape do autenticador, vai constar na autenticação
	docente: nome do docente que solicitou a autenticação
	siape: siape do docente que solicitou a autenticação
	nomeTabPedidoRSC: nome da tabela que está o documento a ser autenticado
	idTabPedidoRSC: id para encontrar o documento a ser autenticado
	dataAutenticacao: data que o documento foi autenticado
	arquivo: documento autenticado salvo
	tipoarquivo: extensão, indicando o tipo do documento
	authPronta: '-1' - indica que o autenticador recusou de fazer a autenticação; '0' - indica que o documento ainda não foi autenticado; '1' - indica que o autenticador fez o upload do arquivo autenticado;
*/
function fnTabDocAutenticar($link) {
	mysqli_query($link,"CREATE TABLE IF NOT EXISTS TabDocAutenticar (
        id int unsigned zerofill NOT NULL auto_increment,
		idAuth int NOT NULL,
		emailAuth TEXT NOT NULL,
		docente TEXT NOT NULL,
		siape TEXT NOT NULL,
		nomeTabPedidoRSC TEXT NOT NULL,
		idTabPedidoRSC int NOT NULL,
		dataSolicitacao DATE NOT NULL,
		documento TEXT NOT NULL,
		dataAutenticacao DATE,
		arquivo MEDIUMBLOB,
		tipoarquivo TEXT,
		authPronta SMALLINT,
        PRIMARY KEY(id));"
	);	
}

/*
TabRSC
Tabela com todos os critérios de RSC definidos pela Resolução 29/2014/Consup
	criterio: número do critério
	nomecriterio: nome que descreve o critério
	fatorpontuacao: fator de pontuação do critério
	unidade: unidade de medida do critério (projeto, mês, GT, comissão, orientação ...)
	qtdemaxunid: quantidade máxima de unidades que pode ser solicitada para o critério
	nivel: nível de RSC que o critério faz parte
	diretriz: diretriz dentro do nível onde está definido o critério
*/
function fnTabRSC($link) {
	mysqli_query($link,"CREATE TABLE IF NOT EXISTS TabRSC (
		id int unsigned zerofill NOT NULL auto_increment,
		criterio INT NOT NULL,
		nomecriterio TEXT NOT NULL,
		fatorpontuacao DECIMAL(4,2) NOT NULL,
		unidade TEXT NOT NULL,
		qtdemaxunid DECIMAL(3,0) NOT NULL,
		nivel TEXT NOT NULL,
		diretriz TEXT NOT NULL,
		PRIMARY KEY(id));"
	);
	return;
}

/*
QuadroPontuacaoMax
Tabela com a pontuação máxima que cada Diretriz pode ter
	nivel: Nível que a Diretriz faz parte
	diretriz: Diretriz que está sendo definida a pontuação máxima
	descricao: Descrição que caracteriza cada diretriz (texto que será apresentado no aplicativo)
	PontuacaoMax: pontuação máxima atribuída à diretriz pela Resolução 29/2014/Consup
*/
function fnQuadroPontuacaoMax($link) {
	mysqli_query($link,"CREATE TABLE IF NOT EXISTS QuadroPontuacaoMax (
        id int unsigned zerofill NOT NULL auto_increment,
		nivel TEXT NOT NULL,
		diretriz TEXT NOT NULL,
		descricao TEXT NOT NULL,
		PontuacaoMax INT NOT NULL,
        PRIMARY KEY(id));"
	);	
}

/*
TabAvaliadoresRSC
Cadastro de avaliadores RSC feito pela CPPD ou CDP. Senha padrão no momento do cadastro: ifsc. Posteriormente cada avaliador deverá alterar a sua senha.
	nome: nome do avaliador de mérito do pedido de RSC
	email: e-mail do avaliador e login para acessar o Ambiente Avaliador
	senha: senha para acessar o Ambiente Avaliador, padrão na criação é: ifsc
	ife: instituto federal de educação do avaliador
	siglaife: sigla do instituto federal de educação do avaliador
	siape: matrícula SIAPE do avaliador, precisa ser docente servidor dos IFE ou Univ. Federal
	telefone: telefone para contato com o avaliador
*/
function fnTabAvaliadoresRSC($link) {
	mysqli_query($link,"CREATE TABLE IF NOT EXISTS TabAvaliadoresRSC (
		id int unsigned zerofill NOT NULL auto_increment,
		nome TEXT NOT NULL,
		email TEXT NOT NULL,
		senha TEXT NOT NULL,
		ife	TEXT NOT NULL,
		siglaife TEXT NOT NULL,
		siape TEXT NOT NULL,
		telefone TEXT NOT NULL,
		PRIMARY KEY(id));"
	);
}

/*
TabInstitutosFederais
Tabela com o cadastro de todos os Institutos Federais do Brasil
	nome: nome do instituto federal de educação
	sigla: sigla do instituto federal de educação
	estado: estado onde o IFE está localizado
*/
function fnTabInstitutosFederais ($link) {
	mysqli_query($link,"CREATE TABLE IF NOT EXISTS TabInstitutosFederais (
		id int unsigned zerofill NOT NULL auto_increment,
		nome TEXT NOT NULL,
		sigla TEXT NOT NULL,
		estado TEXT NOT NULL,
		PRIMARY KEY(id));"
	);
}


/*
$nomeTab = "TabPedidoRSC_" . $siape
Tabela com as solicitações em cada critério pelo docente
	siape: matrícula SIAPE do docente que está solicitando RSC
	criterio: número do critério
	nomecriterio: nome do critério
	datadoc: data do documento, referente a quando a atividade foi concluída
	qtdeunidades: quantidade de unidades solicitadas com o documento comprobatório que será anexado
	pontuacaorequerida: pontuação requerida no critério
	fatorpontuacao: fator de pontuação do critério
	unidade: unidade do critério (mês, orientação, projeto ...)
	nivel: nível RSC do critério
	diretriz: diretriz do critério
	unidDefPresidente: unidades deferidas pelo presidente da Comissão Especial
	PontDefPresidente: pontuação deferida pelo presidente da Comissão Especial
	observPresidente: justificativa do presidente para a pontuação atribuída
	unidDefMembExt: unidades deferidas pelo membro externo da Comissão Especial
	PontDefMembExt: pontuação deferida pelo membro externo da Comissão Especial
	observMembExt: justificativa do membro externo para a pontuação atribuída
	unidDefMembInterno: unidades deferidas pelo membro interno da Comissão Especial
	PontDefMembInterno: pontuação deferida pelo membro interno da Comissão Especial
	observMembInterno: justificativa do membro interno para a pontuação atribuída
	arquivo: arquivo comprobatório da atividade concluída, em jpg ou png
	tipoarquivo: tipo da extensão do arquivo
	arquivoauth: '-1' - significa que não precisa autenticar; '0' - significa que o arquivo não foi autenticado; 'valor inteiro' - índice da tabela TabDocAutenticar onde está salvo o arquivo autenticado
	emailAuth: e-mail de quem vai autenticar para poder encontrar nas tabelas TabDocAutenticar e TabAutenticador as informações sobre o documento e o autenticador
*/
function fnTabPedidoRSC ($nomeTab,$link) {
	mysqli_query($link,"CREATE TABLE IF NOT EXISTS $nomeTab (
		id int unsigned zerofill NOT NULL auto_increment,
		siape TEXT NOT NULL,
		criterio INT NOT NULL,
		nomecriterio TEXT NOT NULL,
		datadoc DATE NOT NULL,
		qtdeunidades INT NOT NULL,
		pontuacaorequerida DECIMAL(5,2) NOT NULL,
		fatorpontuacao DECIMAL(4,2) NOT NULL,
		unidade TEXT NOT NULL,
		nivel TEXT NOT NULL,
		diretriz TEXT NOT NULL,
		unidDefPresidente INT,
		PontDefPresidente DECIMAL(5,2),
		observPresidente TEXT,
		unidDefMembExt INT,
		PontDefMembExt DECIMAL(5,2),
		observMembExt TEXT,
		unidDefMembInterno INT,
		PontDefMembInterno DECIMAL(5,2),
		observMembInterno TEXT,
		arquivo MEDIUMBLOB,
		tipoarquivo TEXT,
		arquivoauth INT,
		emailAuth TEXT,
		PRIMARY KEY(id));"
	);	
}

/*
FormularioPedidoRSC
Tabela para o Formulário de Pedido de RSC - cadastro do docente solicitante no aplicativo
	docente: nome do docente solicitante de RSC
	ife: instituto federal do docente solicitante 
	siape: matrícula SIAPE do docente
	nasc: data de nascimento do docente
	email: e-mail do docente solicitante de RSC
	campus: nome do campus de lotação do docente
	telefone: número de telefone do docente
	portariaRT: Número da Portaria de Retribuição por Titulação que dá o direito a solicitação de RSC
	dataRT: data da Portaria de Retribuição por Titulação
	ingrservpub: data que o docente ingressou no serviço público federal
	ingrifsc: data que o docente ingressou no Instituto Federal
	rsc: nível de RSC que o docente está solicitando
	classe: classe da carreira do docente 
	dataPedido: data do pedido de RSC no SIPAC
	sipac: número do processo no SIPAC referente ao pedido de RSC feito pelo docente
	resultado: resultado final da solicitação
*/
function fnTabFormularioPedidoRSC($link) {
	mysqli_query($link,"CREATE TABLE IF NOT EXISTS FormularioPedidoRSC (
		id int unsigned zerofill NOT NULL auto_increment,
		docente TEXT NOT NULL,
		ife TEXT NOT NULL,
		siape TEXT NOT NULL,
		nasc DATE NOT NULL,
		email TEXT NOT NULL,
		campus TEXT NOT NULL,
		telefone TEXT NOT NULL,
		portariaRT TEXT NOT NULL,
		dataRT DATE NOT NULL,
		ingrservpub DATE NOT NULL,
		ingrifsc DATE NOT NULL,
		rsc TEXT NOT NULL,
		classe TEXT NOT NULL,
		dataPedido DATE,
		sipac TEXT,
		resultado TEXT,
		PRIMARY KEY(id));"
	);	
	return;
}

/* 
TabAnaliseFormaCPPD
Tabela para a Análise de Forma da CPPD. Cada análise de forma que é feita recebe um número. As vezes um mesmo pedido de RSC passa mais de uma vez pela análise de forma. O número é autoincrementado, sendo composto pelo ano de registro.
	numAnaliseForma: número da análise de forma que será realizada
	anoAnaliseForma: ano que o processo foi recebido pela CPPD e registrado no sistema
	siape: matrícula SIAPE do docente requerente do RSC
	avaliador: nome do avaliador da CPPD 
	siapeAvaliador: matrícula SIAPE do avaliador da CPPD
	status: estado que o pedido se encontra:
			"novo": pedido novo cadastrado
			"distribuído": há um avaliador responsável pela avaliação
			"deferido": análise de forma concluída e está Ok, será enviado para composição da Comissão Especial
			"indeferido": processo precisa de ajustes e foi devolvido para correções
	observacao: anotações feitas durante avaliação para realização de ajustes quando o pedido precisa de correções. 
*/
function fnAnaliseFormaCPPD($link)	{
	$query = "CREATE TABLE IF NOT EXISTS AnaliseFormaCPPD (
		id int unsigned zerofill NOT NULL auto_increment,
		numAnaliseForma INT NOT NULL,
		anoAnaliseForma INT NOT NULL,
		siape TEXT NOT NULL,
		sipac TEXT NOT NULL,
		avaliador TEXT,
		siapeAvaliador TEXT,
		status TEXT NOT NULL,
		observacao TEXT,
		PRIMARY KEY(id));";
	$res = mysqli_query($link, $query);	
}

/*
$nomeTab = "TabAnaliseForma_" . $siapeAvaliador;
Tabela Análise de Forma de cada avaliador da CPPD. Cada critério será avaliado e registrado seu status e observações para um melhor acompanhamento da avaliação.
	numAnaliseForma: número da análise de forma que será realizada
	anoAnaliseForma: ano que o processo foi recebido pela CPPD e registrado no sistema
	idCriterio: id do critério referente da tabela "TabPedidoRSC_" . $siape
	status: estado do critério; "deferido" - aprovado; "indeferido" - necessita de ajustes
	observacao: anotações do avaliador, principalmente se o critério for indeferido
*/
function fnTabAnaliseFormaAvaliador($nomeTab,$link)	{
	$query = "CREATE TABLE IF NOT EXISTS $nomeTab (
		id int unsigned zerofill NOT NULL auto_increment,
		numAnaliseForma INT NOT NULL,
		anoAnaliseForma INT NOT NULL,
		idCriterio INT NOT NULL,
		status TEXT NOT NULL,
		observacao TEXT NOT NULL,
		PRIMARY KEY(id));";
	$res = mysqli_query($link, $query);	
}

/* 
$nomeTab = "QuadroPontuacao_" . $siape;
Cria uma Tabela de pontuação para cada docente. Onde será gravada a pontuação total de cada nível e diretriz.
	nivel: nível de RSC da pontuação
	diretriz: diretriz do nível de pontuação
	Pontuacao: pontuação total da diretriz
*/
function fnQuadroPontosDocente($nomeTab,$link)	{
	$query = "CREATE TABLE IF NOT EXISTS $nomeTab (
		id int unsigned zerofill NOT NULL auto_increment,
		nivel TEXT NOT NULL,
		diretriz TEXT NOT NULL,
		Pontuacao DECIMAL(4,2) NOT NULL,
		PRIMARY KEY(id));";
	$res = mysqli_query($link, $query);	
}

/*
$nomeTab = "QuadroPontAvaliadores_" . $siape;
Cria a tabela Quadro de Pontuação da Avaliação para cada docente que está solicitando RSC.
	nivel: nível de RSC da pontuação requerida
	diretriz: diretriz do nível de RSC
	descricao: descrição da diretriz - que envolve diversos critérios
	pontMax: pontuação máxima da diretriz
	PontRequer: pontuação requerida pelo docente
	PontDeferPres: pontuação deferida pelo presidente da Comissão Especial
	PontDeferExte: pontuação deferida pelo membro externo da Comissão Especial
	PontDeferInterno: pontuação deferida pelo membro interno da Comissão Especial
*/ 
function fnQuadroTabAvaliacao($nomeTab,$link) {
	$query = "CREATE TABLE IF NOT EXISTS $nomeTab (
		id int unsigned zerofill NOT NULL auto_increment,
		nivel TEXT NOT NULL,
		diretriz TEXT NOT NULL,
		descricao TEXT NOT NULL,
		pontMax INT NOT NULL,
		PontRequer DECIMAL(5,2) NOT NULL,
		PontDeferPres DECIMAL(5,2) NOT NULL,
		PontDeferExte DECIMAL(5,2) NOT NULL,
		PontDeferInterno DECIMAL(5,2) NOT NULL,
		PRIMARY KEY(id));";
	$res = mysqli_query($link, $query);	
}

/*
TabSolicitaRSC
Cria a tabela de solicitação da RSC, em que a variável estado pode assumir as seguintes descrições:
1) ditribuir_analise_forma
2) em_analise_forma
3) aguarda_sorteio_banca
4) aguarda_avaliacao
5) avaliacao_concluida

	docente: nome do docente que está solicitando RSC
	siape: matrícula SIAPE do docente
	email: e-mail do docente para contato
	rsc: nível de RSC solicitado
	datapedido: data do pedido de RSC no SIPAC (data oficial do pedido)
	dataMovimentacao: data atualizada a cada vez que o estado do pedido muda
	campus: campus de lotação do docente
	nomeTabCriterios: tabela com o nome: "TabPedidoRSC_" . $siape
	nomeTabQuadroPontos: Tabela com o nome: "QuadroPontuacao_" . $siape;
	estado: movimentação do pedido de RSC
	sipac: número do processo no sistema SIPAC (oficial)
	avaliadorCPPD: membro da CPPD responsável por fazer a análise de forma
	presidentebanca: presidente da Comissão Especial que fará análise de mérito
	ifepresidente: instituto federal do presidente da Comissão Especial
	membroexterno: membro externo da Comissão Especial que fará análise de mérito
	ifemembroexterno: instituto federal do membro externo da Comissão Especial
	membrointerno: membro interno da Comissão Especial que fará análise de mérito
	ifemembrointerno: instituto federal do membro interno da Comissão Especial
	resultado: pedido deferido ou indeferido
	dataconcessao: data que o docente terá direito a concessão do benefício, caso pedido deferido
*/
function fnTabSolicitaRSC($link) {
	$query = "CREATE TABLE IF NOT EXISTS TabSolicitaRSC (
		id int unsigned zerofill NOT NULL auto_increment,
		docente TEXT NOT NULL,
		siape TEXT NOT NULL,
		email TEXT NOT NULL,
		rsc TEXT NOT NULL,
		datapedido DATE NOT NULL,
		dataMovimentacao DATE,
		campus TEXT NOT NULL,
		nomeTabCriterios TEXT NOT NULL,
		nomeTabQuadroPontos TEXT NOT NULL,
		estado TEXT NOT NULL,
		sipac TEXT,
		avaliadorCPPD TEXT,
		presidentebanca TEXT,
		ifepresidente TEXT,
		membroexterno TEXT,
		ifemembroexterno TEXT,
		membrointerno TEXT,
		ifemembrointerno TEXT,
		resultado TEXT,
		dataconcessao DATE,
		PRIMARY KEY(id));";
	$result = mysqli_query($link,$query);	
}

/* 
$nomeTab = "TabMinhasAvaliacoes_" . $siapeAvaliador
Tabela de Avaliações pendentes, em que a variável Estado pode assumir as seguintes descrições:
Estado:	-> 0_pendente
		-> 1_concluida
		-> 2_redistribuida
		-> 3_rejeitada
	idPedido: id da Tabela "TabPedidoRSC_" . $siape
	siapeDocente: siape do docente solicitante
	nomeDocente: nome do docente solicitante
	siapePresidente: siape do presidente da Comissão Especial de avaliação
	nomePresidente: nome do presidente da Comissão Especial de avaliação
	siapeExterno: siape do membro externo da Comissão Especial de avaliação
	nomeExterno: nome do membro externo da Comissão Especial de avaliação
	siapeInterno: siape do membro interno da Comissão Especial de avaliação
	nomeInterno: nome do membro interno da Comissão Especial de avaliação
	dataDistribuicao: data da distribuição do pedido RSC para a Comissão Especial
	Estado: movimentação do pedido de RSC pela Comissão Especial
	dataAvaliacao: data da avaliação final da Comissão Especial
	PontuacaoGlobal: pontuação total em todos os níveis deferida pelo avaliador
	PontuacaoRSC1: pontuação deferida no nível RSCI
	PontuacaoRSC2: pontuação deferida no nível RSCII
	PontuacaoRSC3: pontuação deferida no nível RSCIII
	Parecer: parecer final do avaliador, incluindo as justificativas para indeferimento dos pontos solicitados
	dataBeneficio: data, a partir de quando o benefício deverá ser concedido
*/
function fnMinhasAvaliacoes($nomeTab,$link) {
	mysqli_query($link,"CREATE TABLE IF NOT EXISTS $nomeTab (
		id int unsigned zerofill NOT NULL auto_increment,
		idPedido INT NOT NULL,
		siapeDocente TEXT NOT NULL,
		nomeDocente TEXT NOT NULL,
		siapePresidente TEXT NOT NULL,
		nomePresidente TEXT NOT NULL,
		siapeExterno TEXT NOT NULL,
		nomeExterno TEXT NOT NULL,
		siapeInterno TEXT NOT NULL,
		nomeInterno TEXT NOT NULL,
		dataDistribuicao DATE NOT NULL,
		Estado TEXT NOT NULL,
		dataAvaliacao DATE,
		PontuacaoGlobal DECIMAL(5,2),
		PontuacaoRSC1 DECIMAL(5,2),
		PontuacaoRSC2 DECIMAL(5,2),
		PontuacaoRSC3 DECIMAL(5,2),
		Parecer TEXT,
		dataBeneficio DATE,		
		PRIMARY KEY(id));"
	);	
}

/*
TabFormacao
Cria a tabela de quantitativo de documentos da formação acadêmica do docente. Serve de base para a tabela "TabItinerario_" . $siape
	siape: matrícula SIAPE do docente que está solicitando RSC
	graduacao: quantiade de diplomas de graduação
	especializacao: quantidade de certificados de especialização
	mestrado: quantidade de certificados de mestrado
	experiencia: quantidade de documentos comprovando experiência profissional
	descricao: descrição do itinerário de formação
*/
function fnTabFormacao($link) {
	mysqli_query($link,"CREATE TABLE IF NOT EXISTS TabFormacao (
        id int unsigned zerofill NOT NULL auto_increment,
		siape TEXT NOT NULL,
		graduacao INT NOT NULL,
		especializacao INT NOT NULL,
		mestrado INT NOT NULL,
		experiencia INT NOT NULL,
		descricao TEXT NOT NULL,
        PRIMARY KEY(id));");
}

/*
$nomeTab = "TabItinerario_" . $siape
Tabela com os documentos do itinerário de formação e da experiência do docente, indicados na tabela TabFormacao
	documento: indica qual é o tipo do documento, refente na tabela TabFormacao
	arquivo: arquivo que será salvo
	tipoarquivo: tipo do arquivo, png ou jpg
	arquivoauth: '-1' - significa que não precisa autenticar; 0 - significa que o arquivo não foi autenticado; 'valor inteiro' - índice da tabela TabDocAutenticar onde está salvo o arquivo autenticado
	emailAuth: e-mail de quem vai autenticar para poder encontrar nas tabelas TabDocAutenticar e TabAutenticador as informações sobre o documento e o autenticador
*/
function fnTabItinerario ($nomeTab,$link) {
	mysqli_query($link,"CREATE TABLE IF NOT EXISTS $nomeTab (
		id int unsigned zerofill NOT NULL auto_increment,
		documento TEXT NOT NULL,
		dataDoc DATE NOT NULL,
		arquivo MEDIUMBLOB NOT NULL,
		tipoarquivo TEXT NOT NULL,
		arquivoauth INT,
		emailAuth TEXT,
        PRIMARY KEY(id));");
}


?>