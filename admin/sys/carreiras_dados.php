<? 
	define('ID_MODULO',47,true);
	include('../includes/Config.php');
	include('../includes/Topo.php');
 

	$Config = array(
		'arquivo'=>'carreiras',
		'tabela'=>'tbloja',
		'titulo'=>'titulo',
		'id'=>'id_produto',
		'urlfixo'=>'', 
		'pasta'=>'loja',
	);


	if ($_GET['ID']>0) $dados = db_dados("SELECT * FROM ".$Config['tabela']." WHERE ".$Config['id']."=".(int)$_GET['ID']." LIMIT 1;");

?>
<?
include('../includes/Mensagem.php');
?>
                	<div class="conthead">
                        <h2>Adicionar nova carreira</h2>
                    </div>
<div id="conteudo">
<?

 	# Categorias brasileiros
	$Categorias=array();
	$tmp1s = db_consulta("SELECT * FROM tbloja_categorias ORDER BY categoria ASC");
	while ($tmp1 = db_lista($tmp1s)) {
		$Categorias[$tmp1['categoria']]=$tmp1['id_categoria'];
	}



	# Montando os Dados
	$campos = array(
		#	0=>Tipo			1=>Titulo		2=>Nome Campo		3=>Tamanho(px)	4=>CampoExtra		5=>Comentário								6=>Atributos
	 
		array('text',		'Título',		'titulo',			'500',			'',					'',											''),
		array('textarea',	'Descrição',	'texto',		array(80,10),	'',					'',											''),
		array('manual',		'Curso',	'careiraaa',		'500',			'',					'',											''),
		);


		# Permissões
		$dados['careiraaa'] = '';
		$consulta = db_consulta("SELECT * FROM tbgalerias ORDER BY titulo ASC");
		while ($linha = db_lista($consulta)) {
			$dados['careiraaa'].='<label><input type=checkbox name="careiraaa[]" value="'.$linha['id_galeria'].'"';
			if (cursoProfessor2($dados['id_produto'],$linha['id_galeria'])) $dados['careiraaa'].= ' checked="checked" ';
			$dados['careiraaa'].='> '.($linha['titulo']).'</label><br />';
		}


	# Exibindo os campos
	echo adminCampos($campos,$Config,$dados);






?>
</div>
<?
	include('../includes/Rodape.php');
?>