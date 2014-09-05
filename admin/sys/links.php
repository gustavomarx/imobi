<? 
	define('ID_MODULO',25,true);
	include('../includes/Config.php');
	include('../includes/Topo.php');
	

	$Config = array(
		'arquivo'=>'links',
		'tabela'=>'tblinks',
		'titulo'=>'texto',
		'id'=>'id_link',
		'urlfixo'=>'', 
		'pasta'=>'links',
	);

?>
<?

?>

		 <section>

		            	<header>
		                <a href="#menu" class="showmenu button">Menu</a>
						<h2 style="color:#fff; padding:0 20px">Páginas</h2>
						</header>

	<div id="conteudo">
		        <section style="min-height:600px">
<a id="btnalt"  href="links_dados.php"><img src="../img/add.png" align="absmiddle" /> Adicionar nova página</a>
<br />
<br />
<?

 include('../includes/Mensagem.php');
	# Montando os campos
	$campos = array(
		#	0=>Tipo			1=>Título		2=>Fonte			3=>Url
		
 
		array('texto',		'TITULO',		'titulo',			''),
		array('foto',		'IMAGEM',		'imagem',			''),
		array('resumo',		'TEXTO',		'descricao',			''),
	);


	# Consulta SQL
	$SQL = "SELECT * FROM tblinks ORDER BY id_link DESC";


	# Processando os dados
	$Lista = new Consulta($SQL,20,$PGATUAL);
	while ($linha = db_lista($Lista->consulta)) {
		$dados[] = $linha;
	}


	# Listando
	echo adminLista($campos,$dados,array('excluir','editar'),$Config,true);



	# Paginação
	echo '<div class="paginacao">'.$Lista->geraPaginacao().'</div>';









?>
</div>
<? include('../includes/Rodape.php'); ?>