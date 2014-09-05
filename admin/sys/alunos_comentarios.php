<? 
	define('ID_MODULO',41,true);
	include('../includes/Config.php');
	include('../includes/Topo.php');
	

	$Config = array(
		'arquivo'=>'alunos',
		'tabela'=>'tbalunos',
		'titulo'=>'titulo',
		'id'=>'id_aluno',
		'urlfixo'=>'', 
		'pasta'=>'alunos',
	);

?>
<?
include('../includes/Mensagem.php');
$ondeestou = 'Comentários';
?>
                	<div class="conthead">
                        <h2>Comentários</h2>
                    </div>
<div id="conteudo">
<?

	// -----------------------------------------------------------------------------------------------------------
	// Sistema de Busca
	// -----------------------------------------------------------------------------------------------------------
	$busca='';
	if ($_GET['id_aluno'] > 0) {
		$busca .= ' AND tbalunos.id_aluno='.(int)$_GET['id_aluno'];
		$dados_busca['id_aluno']= $_GET['id_aluno'];
	}

	

	# alunos
	$alunos=array('-'=>'0');
	$tmp1s = db_consulta("SELECT * FROM tbalunos ORDER BY titulo ASC");
	while ($tmp1 = db_lista($tmp1s)) {
		$alunos[$tmp1['titulo']." (ID - ".$tmp1['id_aluno'].")"] = $tmp1['id_aluno'];
	}


	# Os campos
	$campos = array(
		#	0=>Tipo			1=>Titulo		2=>Nome Campo		3=>Tamanho(px)	4=>CampoExtra		5=>Comentário								6=>Atributos
		array('select',		'aluno',		'id_aluno',		'250',			$alunos,			'',											''),
		
	);


	# Exibindo os campos
	echo adminBusca($campos,$Config,$dados_busca);







	// -----------------------------------------------------------------------------------------------------------
	// Listagem
	// -----------------------------------------------------------------------------------------------------------



	# Montando os campos
	$campos = array(
		#	0=>Tipo			1=>Título		2=>Fonte			3=>Url
		array('texto',		'TÍTULO',		'titulo',			''),
		array('texto',		'NOME',			'nome',				''),
		array('texto',		'EMAIL',		'email',			''),
		array('texto',		'DATA',			'data1',			''),
		array('texto',		'IP',			'ip',				''),
		array('texto',		'MENSAGEM',		'mensagem',			''),
	);


	# Consulta SQL
	$SQL = "
		SELECT 
			tbalunos_comentarios.*,
			tbalunos.*,
			DATE_FORMAT(tbalunos_comentarios.datahora,'%d/%m/%Y %H:%i:%s') as data1 
		FROM 
			tbalunos_comentarios 
			INNER JOIN tbalunos ON (tbalunos.id_aluno = tbalunos_comentarios.id_aluno)
		WHERE 1
			".$busca."
		ORDER BY datahora DESC";

	# Processando os dados
	$Lista = new Consulta($SQL,20,$PGATUAL);
	while ($linha = db_lista($Lista->consulta)) {
		$dados[] = $linha;
	}


	# Listando
	echo adminLista($campos,$dados,array('excluir','status'),$Config,true);



	# Paginação
	echo '<div class="paginacao">'.$Lista->geraPaginacao().'</div>';









?>
</div>
<? include('../includes/Rodape.php'); ?>