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
		'pasta'=>'aluno',
	);


	if ($_GET['ID']>0) $dados = db_dados("SELECT *, DATE_FORMAT(data,'%d/%m/%Y') as data FROM ".$Config['tabela']." WHERE ".$Config['id']."=".(int)$_GET['ID']." LIMIT 1;");

?>
<?
include('../includes/Mensagem.php');
$ondeestou = 'Novo aluno';
?>
                	<div class="conthead">
                        <h2>Adicionar Aluno</h2>
                    </div>
<div id="conteudo">
<?

	include('../includes/Mensagem.php');
	
	if ($dados['id_aluno']>0) $dados['imagem'] = $dados['codigo'].'/capa.jpg';
	if (empty($dados['data'])) $dados['data']=date('d/m/Y');
	if ($dados['flag_status']=='') $dados['flag_status']='1';

	# Montando os Dados
	$campos = array(
		#	0=>Tipo			1=>Titulo		2=>Nome Campo		3=>Tamanho(px)	4=>CampoExtra		5=>Comentário								6=>Atributos
		array('text',		'Nome',		'titulo',			'500',			'',					'',											''),
		array('text',		'E-mail',		'email',			'500',			'',					'',											''),
		array('textarea',		'Sobre',		'sobre',			'250',			'',					'',											''),
		array('file',		'Foto',		'imagem',			'350',			1,					'',											''),
		array('flag',		'Ativo?',		'flag_status',		'500',			'',					'',											''),
		array('manual',		'Cursos',	'alunocurso',		'500',			'',					'',											''),
		);


		# Permissões
		$dados['alunocurso'] = '';
		$consulta = db_consulta("SELECT * FROM tbgalerias ORDER BY titulo ASC");
		while ($linha = db_lista($consulta)) {
			$dados['alunocurso'].='<label><input type=checkbox name="alunocurso[]" value="'.$linha['id_galeria'].'"';
			if (cursoProfessor54323($dados['id_aluno'],$linha['id_galeria'])) $dados['alunocurso'].= ' checked="checked" ';
			$dados['alunocurso'].='> '.($linha['titulo']).'</label><br />';
		}


	# Exibindo os campos
	echo adminCampos($campos,$Config,$dados);






?>
</div>
<?
	include('../includes/Rodape.php');
?>