<? 
	define('ID_MODULO',60,true);
	include('../includes/Config.php');
	include('../includes/Topo.php');
 

	$Config = array(
		'arquivo'=>'agenda',
		'tabela'=>'tbagenda',
		'titulo'=>'titulo',
		'id'=>'id_agenda',
		'urlfixo'=>'', 
		'pasta'=>'agenda',
	);


	if ($_GET['ID']>0) $dados = db_dados("SELECT *, DATE_FORMAT(data,'%d/%m/%Y') as data FROM ".$Config['tabela']." WHERE ".$Config['id']."=".(int)$_GET['ID']." LIMIT 1;");

?>
<?
include('../includes/Mensagem.php');
?>
                	<div class="conthead">
                        <h2>Adicionar Evento</h2>
                    </div>
<div id="conteudo">
<?

 
	if (empty($dados['data'])) $dados['data']=date('d/m/Y');


	# Montando os Dados
	$campos = array(
		#	0=>Tipo			1=>Titulo		2=>Nome Campo		3=>Tamanho(px)	4=>CampoExtra		5=>Comentário								6=>Atributos
		array('text',		'Título',		'titulo',			'500',			'',					'',											''),
		array('data',		'Data',			'data',				'100',			'',					' <- Clique no calendário',					''),
		array('file',		'Imagem',			'imagem',				'255',			'',					'',					''),
		array('textarea',		'Descrição',	'descricao',			'500',				'',					'',											''),
	);


	# Exibindo os campos
	echo adminCampos($campos,$Config,$dados);






?>
</div>
<?
	include('../includes/Rodape.php');
?>