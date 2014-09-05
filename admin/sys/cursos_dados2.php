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


if ($_GET['ID']>0) $dados = db_dados("SELECT * FROM ".$Config['tabela']." WHERE ".$Config['id']."=".(int)$_GET['ID']." LIMIT 1;");
$dados['titulo']=str_replace('\\','',$dados['titulo']);
$dados['sobre']=str_replace('\\','',$dados['sobre']);
//$T = $_GET['ID'];
?>
<?

$ondeestou = 'Nova Galeria';
?>
   <!-- Sidebar End -->

  	<section>
	        
	            	<header>
	                <a href="#menu" class="showmenu button">Menu</a>
					<h2 style="color:#fff; padding:0 20px">Adicionar novo imóvel</h2>
					</header>
	              
<div id="conteudo">
	        <section style="min-height:600px">
             
	
	<? if ($_GET['ID']>0) echo 
	'
		<a  id="btnalt" href="cursos_fotos.php?id_galeria='.(int)$_GET['ID'].'"><img src="../img/btfotos.gif" align="absmiddle" /> Inserir fotos em '.$dados['titulo'].'</a>
		<br />
		<br />
	'; ?>
 	
	
<?

 include('../includes/Mensagem.php');
	
	if ($dados['id_galeria']>0) $dados['imagem'] = $dados['codigo'].'/capa.jpg';
	if (empty($dados['data'])) $dados['data']=date('d/m/Y');
	if ($dados['flag_status']=='') $dados['flag_status']='1';
	

	

 # Categoria6
 $Categoria6=array();
	$tmp6s = db_consulta("SELECT * FROM tbcorretores ORDER BY nome_corretor ASC");
	while ($tmp6 = db_lista($tmp6s)) {
		$Categoria6[($tmp6['nome_corretor'])]=$tmp6['id_corretor'];
	}

	# Categoria1
	$Categoria1=array();
	$tmp5s = db_consulta("SELECT * FROM tbzoneamento ORDER BY tipo_zona ASC");
	while ($tmp5 = db_lista($tmp5s)) {
		$Categoria1[($tmp5['tipo_zona'])]=$tmp5['id_zona'];
	}
		

	# Categoria
	$Categoria=array();
	$tmp1s = db_consulta("SELECT * FROM tbcursos ORDER BY curso ASC");
	while ($tmp1 = db_lista($tmp1s)) {
		$Categoria[($tmp1['curso'])]=$tmp1['id_curso'];
	}

	# Categoria
	$Categoria2=array();
	$tmp2s = db_consulta("SELECT * FROM tbconteudo_categorias ORDER BY finalidade ASC");
	while ($tmp2 = db_lista($tmp2s)) {
		$Categoria2[($tmp2['finalidade'])]=$tmp2['id_finalidade'];
	}
	
	# Categoria
	$Categoria3=array();
	$tmp3s = db_consulta("SELECT * FROM tbloja_categorias ORDER BY categoria ASC");
	while ($tmp3 = db_lista($tmp3s)) {
		$Categoria3[($tmp3['categoria'])]=$tmp3['id_categoria'];
	}
	
	# Categoria
	$Categoria4=array();
	$tmp4s = db_consulta("SELECT * FROM tbestado_categorias ORDER BY estado ASC");
	while ($tmp4 = db_lista($tmp4s)) {
		$Categoria4[($tmp4['estado'])]=$tmp4['id_estado'];
	}
	

	# Montando os Dados
	$campos = array(
		#	0=>Tipo			1=>Titulo		2=>Nome Campo		3=>Tamanho(px)	4=>CampoExtra		5=>Comentário								6=>Atributos
		array('select',		'Corretor',	'id_corretor',		'150',			$Categoria6,			'<a target="_blank" style="margin:0 0 0 10px;" href="corretores.php"><img width="20px" src="../img/bteditar.gif"></a>'),
		array('select',		'Zona',	'id_zona',		'150',			$Categoria1,			'',											''),
		array('select',		'Tipo',	'id_curso',		'150',			$Categoria,			'<a target="_blank" style="margin:0 0 0 10px;" href="cursos_categorias.php"><img width="20px" src="../img/bteditar.gif"></a>',											''),
		array('select',		'Finalidade',	'finalidade',		'150',			$Categoria2,			'<a target="_blank" style="margin:0 0 0 10px;" href="conteudo_categorias.php"><img width="20px" src="../img/bteditar.gif"></a>',											''),
		array('text',		'Título',		'titulo',			'500',			'',					'',											''),
		array('text',		'Endereço',		'endereco',			'500',			'',					'',											''),
		array('text',		'Bairro',		'bairro',			'200',			'',					'',											''),
			array('text',		'CEP',		'cep',			'200',			'',					'',											''),
			array('select',		'Estado',	'estado',		'150',			$Categoria4,			'',											''),
		array('select',		'Cidade',	'cidade',		'150',			$Categoria3,			'<a target="_blank" style="margin:0 0 0 10px;" href="loja_categorias.php"><img width="20px" src="../img/bteditar.gif"></a>',											''),
		
			array('text',		'Link Mapa (google maps)',	'mapa',		'500',			'',			'ex: https://maps.google.com.br/?ll=-16.337941,-48.951001&spn=0.008607,0.016522&t=h&z=17',											''),
		array('text',		'Valor R$',		'preco',			'100',			'',					'Ex: 1.000,00',											''),
		array('text',		'Condomínio R$',		'condominio',			'100',			'',					'Ex: 100,00',											''),
		array('text',		'Quartos',		'quartos',			'50',			'',					'Quantidade de quartos, ex: 3',	 										''),
		
		array('text',		'Banheiros',		'banho',			'50',			'',					'Quantidade de banheiros',	  				''),
		array('text',		'Suítes',		'suites',			'50',			'',					'Quantidade de suítes',											''),
		array('text',		'Garagens',		'garagens',			'50',			'',					'Número de vagas',											''),
		array('text',		'Área útil',		'area',			'100',			'',					'Metros quadrados',											''),
		array('textarea',		'Descrição do imóvel',		'conteudo',			'',			'',					'',											''),
		array('file',		'Foto capa',		'imagem',			'',			'',					'',											''),
		array('manual',		'Adicionais do imóvel<a target="_blank" style="margin:0 0 0 10px;" href="professores.php"><img src="../img/bteditar.gif"></a>',	'cursos',		'500',			'',					'',											''),
			array('text',		'Palavras de busca',		'tags',			'500',			'',					'',											''),
			);


			# Permissões
			$dados['cursos'] = '';
			$consulta = db_consulta("SELECT * FROM tbmaterias ORDER BY nome ASC");
			while ($linha = db_lista($consulta)) {
				$dados['cursos'].='<label><input type=checkbox name="cursos[]" value="'.$linha['id_materia'].'"';
				if (cursoProfessor($dados['id_galeria'],$linha['id_materia'])) $dados['cursos'].= ' checked="checked" ';
				$dados['cursos'].='> '.($linha['nome']).'</label><br />';
			}
			

	# Exibindo os campos
	echo adminCampos($campos,$Config,$dados);






?>
</div>
<?
	include('../includes/Rodape.php');
?>
