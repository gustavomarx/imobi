<? 
	define('ID_MODULO',31,true);
	include('../includes/Config.php');
	include('../includes/Topo.php');
	include('../includes/tinyMCE_advanced.php');

	$Config = array(
		'arquivo'=>'corretores',
		'tabela'=>'tbcorretores',
		'titulo'=>'nome_corretor',
		'id'=>'id_corretor',
		'urlfixo'=>'', 
		'pasta'=>'corretores',
	);


	if ($_GET['ID']>0) $dados = db_dados("SELECT * FROM ".$Config['tabela']." WHERE ".$Config['id']."=".(int)$_GET['ID']." LIMIT 1;");

?>
<?
 
$ondeestou = 'Cargo';
?>
	  <section>

	            	<header>
	                <a href="#menu" class="showmenu button">Menu</a>
					<h2 style="color:#fff; padding:0 20px">Tipos</h2>
					</header>

<div id="conteudo">
	        <section style="min-height:600px">
<?
 
include('../includes/Mensagem.php');

	# Montando os Dados
	$campos = array(
		#	0=>Tipo			1=>Titulo		2=>Nome Campo		3=>Tamanho(px)	4=>CampoExtra		5=>Comentário								6=>Atributos
		array('text',		'Nome do Corretor',		'nome_corretor',			'500',			'',					'',											''),
	);


	# Exibindo os campos
	echo adminCampos($campos,$Config,$dados);






?>
</div>
<?
	include('../includes/Rodape.php');
?>