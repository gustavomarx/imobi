<? 
	define('ID_MODULO',15,true);
	include('../includes/Config.php');
	include('../includes/Topo.php');
 

	$Config = array(
		'arquivo'=>'departamentos',
		'tabela'=>'tbdepartamentos',
		'titulo'=>'titulo',
		'id'=>'id_departamentos',
		'urlfixo'=>'', 
		'pasta'=>'departamentos',
	);


	if ($_GET['ID']>0) $dados = db_dados("SELECT *, DATE_FORMAT(data,'%d/%m/%Y') as data FROM ".$Config['tabela']." WHERE ".$Config['id']."=".(int)$_GET['ID']." LIMIT 1;");
	$dados['texto']=str_replace('\\','',$dados['texto']);
?>
<?

?>
      
		 <section>

		            	<header>
		                <a href="#menu" class="showmenu button">Menu</a>
						<h2 style="color:#fff; padding:0 20px">Institucional</h2>
						</header>

	<div id="conteudo">
		        <section style="min-height:600px">
 
	<a  id="btnalt" href="departamentos_fotos.php?id_departamentos=150"><img src="../img/btfotos.gif" align="absmiddle" /> Adicionar fotos da imobiliária</a>
	<br />
	<br />
	
	
<?

 

include('../includes/Mensagem.php');

	# Categoria
	$Categoria=array();
	$tmp1s = db_consulta("SELECT * FROM tbdepartamentos_categorias ORDER BY categoria ASC");
	while ($tmp1 = db_lista($tmp1s)) {
		$Categoria[$tmp1['categoria']]=$tmp1['id_categoria'];
	}

	
	
	if ($dados['id_departamentos']>0) $dados['imagem'] = $dados['codigo'].'/capa.jpg';
	if (empty($dados['data'])) $dados['data']=date('d/m/Y');
	if ($dados['flag_status']=='') $dados['flag_status']='1';

	# Montando os Dados
	$campos = array(
		#	0=>Tipo			1=>Titulo		2=>Nome Campo		3=>Tamanho(px)	4=>CampoExtra		5=>Comentário								6=>Atributos
	 
		array('text',		'Título',		'titulo',			'500',			'',					'',											''),
		array('textarea',	'Texto Institucional',		'texto',			'250',			'',					'',											''),
		array('text',		'Facebook',		'facebook',			'500',			'',					'',											''),
		array('text',		'Twitter',		'twitter',			'500',			'',					'',											''),
		array('text',		'Google +',		'google',			'500',			'',					'',											''),
	 
		array('text',		'E-mail',		'email',			'500',			'',					'',											''),
			array('text',		'Telefone Geral',		'youtube',			'500',			'',					'',											''),
					array('text',		'url',		'vimeo',			'500',			'',					'',											''),
		array('file',		'Logo',		'imagem',			'500',			'',					'',											''),
	);


	# Exibindo os campos
	echo adminCampos($campos,$Config,$dados);



?><a  id="btnalt" href="departamentos_fotos.php?id_departamentos=150"><img src="../img/btfotos.gif" align="absmiddle" /> Adicionar fotos da imobiliária</a><?


?>
</div>
<?
	include('../includes/Rodape.php');
?>