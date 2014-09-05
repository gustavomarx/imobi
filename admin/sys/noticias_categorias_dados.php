<? 
	define('ID_MODULO',1,true);
	include('../includes/Config.php');
	include('../includes/Topo.php');
	include('../includes/tinyMCE_advanced.php');

	$Config = array(
		'arquivo'=>'noticias_categorias',
		'tabela'=>'tbnoticias_categorias',
		'titulo'=>'categoria',
		'id'=>'id_categoria',
		'urlfixo'=>'', 
		'pasta'=>'links',
	);


	if ($_GET['ID']>0) $dados = db_dados("SELECT * FROM ".$Config['tabela']." WHERE ".$Config['id']."=".(int)$_GET['ID']." LIMIT 1;");

?>
<?

$ondeestou = 'Editar Categorias';
?>

		 <section>

		            	<header>
		                <a href="#menu" class="showmenu button">Menu</a>
						<h2 style="color:#fff; padding:0 20px">Adicionar Categorias</h2>
						</header>

	<div id="conteudo">
		        <section style="min-height:600px">
<?
 
include('../includes/Mensagem.php');

	# Montando os Dados
	$campos = array(
		#	0=>Tipo			1=>Titulo		2=>Nome Campo		3=>Tamanho(px)	4=>CampoExtra		5=>Comentário								6=>Atributos
		array('text',		'Categoria',		'categoria',			'500',			'',					'',											''),
	);


	# Exibindo os campos
	echo adminCampos($campos,$Config,$dados);






?>
</div>
<?
	include('../includes/Rodape.php');
?>