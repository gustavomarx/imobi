<? 
	define('ID_MODULO',44,true);
	include('../includes/Config.php');
	include('../includes/Topo.php');
 

	$Config = array(
		'arquivo'=>'horarios',
		'tabela'=>'tbdownloads',
		'titulo'=>'titulo',
		'id'=>'id_download',
		'urlfixo'=>'', 
		'pasta'=>'loja',
	);


	if ($_GET['ID']>0) $dados = db_dados("SELECT * FROM ".$Config['tabela']." WHERE ".$Config['id']."=".(int)$_GET['ID']." LIMIT 1;");
	if ($_GET['ID']>0) $verifica = db_dados("SELECT * FROM ".$Config['tabela']." WHERE ".$Config['id']."=".(int)$_GET['ID']." LIMIT 1;");

?>
<?
include('../includes/Mensagem.php');
?>
                	<div class="conthead">
                        <h2>Adicionar nova turma</h2>
                    </div>
<div id="conteudo">
<?

# Categorias brasileiros
$Categorias=array();
$tmp1s = db_consulta("SELECT * FROM tbdownloads_categorias ORDER BY categoria ASC");
while ($tmp1 = db_lista($tmp1s)) {
	$Categorias[$tmp1['categoria']]=$tmp1['id_categoria'];
}


# Categorias brasileiros
$Categorias2=array();
$tmp1s2 = db_consulta("SELECT * FROM tbgalerias ORDER BY titulo ASC");
while ($tmp12 = db_lista($tmp1s2)) {
	$Categorias2[$tmp12['titulo']]=$tmp12['id_galeria'];
}



# Montando os Dados
$campos = array(
	#	0=>Tipo			1=>Titulo		2=>Nome Campo		3=>Tamanho(px)	4=>CampoExtra		5=>Comentário								6=>Atributos
	array('select',		'Curso',		'curso',			'',			$Categorias2,					'',											''),
	array('select',		'Local',		'id_categoria',			'',			$Categorias,					'',											''),
		array('text',		'Data',		'data',			'500',			'',					'',											''),
		array('text',		'Horário',		'horario',			'500',			'',					'',											''),
		array('manual',		'DOM',	'DOM',		'500',			'',					'',											''),
		array('manual',		'SEG',	'SEG',		'500',			'',					'',											''),
		array('manual',		'TER',	'TER',		'500',			'',					'',											''),
		array('manual',		'QUA',	'QUA',		'500',			'',					'',											''),
		array('manual',		'QUI',	'QUI',		'500',			'',					'',											''),
		array('manual',		'SEX',	'SEX',		'500',			'',					'',											''),
		array('manual',		'SAB',	'SAB',		'500',			'',					'',											''),
		);

	 
 
		 
	 
	 
		 
			if ($verifica['DOM'] == 1) { $dados['DOM'].= '<label><input type=checkbox name="DOM" value="1" checked="checked"> </label>'; } else { $dados['DOM'].= '<label><input type=checkbox name="DOM" value="1"> </label> '; }
			 
			
 
			if ($verifica['SEG'] == 1) { $dados['SEG'].= '<label><input type=checkbox name="SEG" value="1" checked="checked"> </label>'; } else { $dados['SEG'].= '<label><input type=checkbox name="SEG" value="1"> </label>'; }
		 
			
 
			if ($verifica['TER'] == 1) { $dados['TER'].= '<label><input type=checkbox name="TER" value="1" checked="checked"> </label>'; } else { $dados['TER'].= '<label><input type=checkbox name="TER" value="1"> </label>'; }
			 
			
 
			if ($verifica['QUA'] == 1) { $dados['QUA'].= '<label><input type=checkbox name="QUA" value="1" checked="checked"> </label>'; } else { $dados['QUA'].= '<label><input type=checkbox name="QUA" value="1"> </label>'; }
			 
			
		 
			if ($verifica['QUI'] == 1) { $dados['QUI'].= '<label><input type=checkbox name="QUI" value="1" checked="checked"> </label>'; } else { $dados['QUI'].= '<label><input type=checkbox name="QUI" value="1"> </label>'; }
		 
			

			if ($verifica['SEX'] == 1) { $dados['SEX'].= '<label><input type=checkbox name="SEX" value="1" checked="checked"> </label>'; } else { $dados['SEX'].= '<label><input type=checkbox name="SEX" value="1"> </label>'; }
		 
			
 
			if ($verifica['SAB'] == 1) { $dados['SAB'].= '<label><input type=checkbox name="SAB" value="1" checked="checked"> </label>'; } else { $dados['SAB'].= '<label><input type=checkbox name="SAB" value="1"> </label>'; }
	 
 


	# Exibindo os campos
	echo adminCampos($campos,$Config,$dados);






?>
</div> 
<?
	include('../includes/Rodape.php');
?>