<? 
	define('ID_MODULO',1,true);
	include('../includes/Config.php');
	include('../includes/Topo.php');
	

	$Config = array(
		'arquivo'=>'noticias',
		'tabela'=>'tbnoticias',
		'titulo'=>'titulo',
		'id'=>'id_noticia',
		'urlfixo'=>'', 
		'pasta'=>'noticias',
	);

?>
<?

?>

		 <section>

		            	<header>
		                <a href="#menu" class="showmenu button">Menu</a>
						<h2 style="color:#fff; padding:0 20px">Notícias</h2>
						</header>

	<div id="conteudo">
		        <section style="min-height:600px">
<a id="btnalt"  href="noticias_dados.php"><img src="../img/add.png" align="absmiddle" /> Adicionar nova notícia</a>
<br />
<br />
<?

include('../includes/Mensagem.php');

	# Montando os campos
	$campos = array(
		#	0=>Tipo			1=>Título		2=>Fonte			3=>Url
		array('texto',		'CATEGORIA',	'categoria',		''),
		array('texto',		'TÍTULO',		'titulo',			''),
		array('texto',		'SUBTÍTULO',		'subtitulo',			''),
		array('texto',		'CRÉDITOS',		'creditos',			''),
		array('texto',		'DATA',			'data1',			''),
		array('resumo',		'RESUMO',		'texto',			''),
	);


	# Consulta SQL
	#$SQL = "SELECT *, DATE_FORMAT(data,'%d/%m/%Y %H:%i') as data1 FROM tbnoticias  ORDER BY data DESC";

	$SQL = "SELECT 
				tbnoticias.*, tbnoticias_categorias.*, DATE_FORMAT(data,'%d/%m/%Y %H:%i') as data1
			FROM 
				tbnoticias
				LEFT JOIN tbnoticias_categorias ON (tbnoticias_categorias.id_categoria = tbnoticias.id_categoria) 
			ORDER BY 
				tbnoticias.data DESC
			";

	# Processando os dados
	$Lista = new Consulta($SQL,20,$PGATUAL);
	while ($linha = db_lista($Lista->consulta)) {
	$linha['categoria']=($linha['categoria']);
		$dados[] = $linha;
	}


	# Listando
	echo adminLista($campos,$dados,array('excluir','editar'),$Config,true);



	# Paginação
	echo '<div class="paginacao">'.$Lista->geraPaginacao().'</div>';









?>
</div>
<? include('../includes/Rodape.php'); ?>