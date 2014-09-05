<? 
	define('ID_MODULO',9,true);
	include('../includes/Config.php');
	include('../includes/Topo.php');
 

	$Config = array(
		'arquivo'=>'cursos',
		'tabela'=>'tbgalerias',
		'titulo'=>'titulo',
		'id'=>'id_galeria',
		'urlfixo'=>'', 
		'pasta'=>'galeria',
	);


	if ($_GET['ID']>0) $dados = db_dados("SELECT *, DATE_FORMAT(data,'%d/%m/%Y') as data FROM ".$Config['tabela']." WHERE ".$Config['id']."=".(int)$_GET['ID']." LIMIT 1;");

?>
<?
include('../includes/Mensagem.php');
$ondeestou = 'Nova Galeria';
?>
                	<div class="conthead">
                        <h2>Adicionar Curso</h2>
                    </div>
<div id="conteudo">
<?

	include('../includes/Mensagem.php');
	
	if ($dados['id_galeria']>0) $dados['imagem'] = $dados['codigo'].'/capa.jpg';
	if (empty($dados['data'])) $dados['data']=date('d/m/Y');
	if ($dados['flag_status']=='') $dados['flag_status']='1';

	# Montando os Dados
	$campos = array(
		#	0=>Tipo			1=>Titulo		2=>Nome Campo		3=>Tamanho(px)	4=>CampoExtra		5=>Comentário								6=>Atributos
		array('text',		'Título',		'titulo',			'500',			'',					'',											''),
		array('textarea',		'Sobre o Curso',		'sobre',			'250',			'',					'',											''),
		array('textarea',		'Conteúdo',		'conteudo',			'250',			'',					'',											''),
		array('textarea',		'Público Álvo',		'publico',			'250',			'',					'',											''),
		array('textarea',		'Pré-Requisitos',		'requisitos',			'250',			'',					'',											''),
		array('textarea',		'Softwares Utilizados',		'softwares',			'250',			'',					'',											''),
		array('flag',		'Vídeo?',		'flag_status',		'500',			'',					'',											''),
		array('textarea',		'Código do vídeo',		'video',			'250',			'',					'',											''),
		array('file',		'Background',		'imagem',			'350',			1,					'',											''),
	);


	# Exibindo os campos
	echo adminCampos($campos,$Config,$dados);






?>
</div>
<?
	include('../includes/Rodape.php');
?>