<? 
	define('ID_MODULO',37,true);
	include('../includes/Config.php');
	include('../includes/Topo2.php');
 

	$Config = array(
		'arquivo'=>'professores',
		'tabela'=>'tbmaterias',
		'titulo'=>'titulo',
		'id'=>'id_materia',
		'urlfixo'=>'', 
		'pasta'=>'materias',
	);


	if ($_GET['ID']>0) $dados = db_dados("SELECT * FROM ".$Config['tabela']." WHERE ".$Config['id']."=".(int)$_GET['ID']." LIMIT 1;");
	$dados['nome']=str_replace('\\','',$dados['nome']);
	$dados['sobre']=str_replace('\\','',$dados['sobre']);
	
	




?>


		 <section>

		            	<header>
		                <a href="#menu" class="showmenu button">Menu</a>
						<h2 style="color:#fff; padding:0 20px">Adicionais / Características</h2>
						</header>

	<div id="conteudo">
		        <section style="min-height:600px">
 
<?

	include('../includes/Mensagem.php');


	# Montando os Dados
	$campos = array(
		#	0=>Tipo			1=>Titulo		2=>Nome Campo		3=>Tamanho(px)	4=>CampoExtra		5=>Comentário								6=>Atributos
	 
		array('text',		'Título',		'nome',			'500',			'',					'',											''),
 
		);


 

	# Exibindo os campos
	echo adminCampos($campos,$Config,$dados);






?>
</div>
<?
	include('../includes/Rodape.php');
?>