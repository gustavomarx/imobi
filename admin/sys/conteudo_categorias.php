<? 
	define('ID_MODULO',23,true);
	include('../includes/Config.php');
	include('../includes/Topo.php');
	

	$Config = array(
		'arquivo'=>'conteudo_categorias',
		'tabela'=>'tbconteudo_categorias',
		'titulo'=>'finalidade',
		'id'=>'id_finalidade',
		'urlfixo'=>'', 
		'pasta'=>'conteudo_categorias',
	);

?>
 
                		<section>

						            	<header>
						                <a href="#menu" class="showmenu button">Menu</a>
										<h2 style="color:#fff; padding:0 20px">Finalidades dos imóveis</h2>
										</header>

					<div id="conteudo">
						        <section style="min-height:600px">
							
							
 


					<a id="btnalt"  href="conteudo_categorias_dados.php"><img src="../img/add.png" align="absmiddle" /> Nova finalidade</a>
					<br />
					<br />
<?
include('../includes/Mensagem.php');


	# Montando os campos
	$campos = array(
		#	0=>Tipo			1=>Título		2=>Fonte			3=>Url
		 
		array('texto',		'RESUMO',		'finalidade',			''),
	 

	);


	# Consulta SQL
	$SQL = "SELECT * FROM tbconteudo_categorias ORDER BY finalidade DESC";


	# Processando os dados
	$Lista = new Consulta($SQL,20,$PGATUAL);
	while ($linha = db_lista($Lista->consulta)) {
		$dados[] = $linha;
	}


	# Listando
	echo adminLista($campos,$dados,array('editar'),$Config,true);



	# Paginação
	echo '<div class="paginacao">'.$Lista->geraPaginacao().'</div>';









?>
</div>
<? include('../includes/Rodape.php'); ?>