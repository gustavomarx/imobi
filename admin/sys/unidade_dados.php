<? 
	define('ID_MODULO',17,true);
	include('../includes/Config.php');
	include('../includes/Topo.php');
	#include('../includes/tinyMCE_advanced.php');

	$Config = array(
		'arquivo'=>'unidade',
		'tabela'=>'tbdestaque',
		'titulo'=>'cidade',
		'id'=>'id_destaque',
		'urlfixo'=>'', 
		'pasta'=>'destaque',
	);


	if ($_GET['ID']>0) $dados = db_dados("SELECT * FROM ".$Config['tabela']." WHERE ".$Config['id']."=".(int)$_GET['ID']." LIMIT 1;");

?>
 
         
			 <section>

			            	<header>
			                <a href="#menu" class="showmenu button">Menu</a>
							<h2 style="color:#fff; padding:0 20px">Adicionar Unidades</h2>
							</header>

		<div id="conteudo">
			        <section style="min-height:600px">
<?

 include('../includes/Mensagem.php');



	# Montando os Dados
	$campos = array(
		#	0=>Tipo			1=>Titulo		2=>Nome Campo		3=>Tamanho(px)	4=>CampoExtra		5=>Comentário								6=>Atributos
		array('text',		'Cidade',		'cidade',			'500',			'',					'',											''),
		array('text',		'Telefone',			'telefone',			'500',			'',					'',											''),
		array('textarea',	'Endereço',	'endereco',		array(80,10),	'',					'',											''),
		array('text',		'CEP',			'cep',			'500',			'',					'',											''),
		array('textarea2',		'MAPA',			'imagem',			'500',			'',					'',											''),
	);


	# Exibindo os campos
	echo adminCampos($campos,$Config,$dados);






?>
</div>
<?
	include('../includes/Rodape.php');
?>