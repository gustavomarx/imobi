<? 
	define('ID_MODULO',31,true);
	include('../includes/Config.php');
	include('../includes/Topo.php');
	

	$Config = array(
		'arquivo'=>'zoneamento',
		'tabela'=>'tbzoneamento',
		'titulo'=>'tipo_zona',
		'id'=>'id_zona',
		'urlfixo'=>'', 
		'pasta'=>'zoneamento',
	);

?>
 
                		<section>

						            	<header>
						                <a href="#menu" class="showmenu button">Menu</a>
										<h2 style="color:#fff; padding:0 20px">Finalidades dos imóveis</h2>
										</header>

					<div id="conteudo">
						        <section style="min-height:600px">
							
							
 


					<a id="btnalt"  href="zoneamento_dados.php"><img src="../img/add.png" align="absmiddle" /> Nova Zona</a>
					<br />
					<br />
<?
include('../includes/Mensagem.php');


	# Montando os campos
	$campos = array(
		#	0=>Tipo			1=>Título		2=>Fonte			3=>Url
		 
		array('texto',		'RESUMO',		'tipo_zona',			''),
	 

	);


	# Consulta SQL
	$SQL = "SELECT * FROM tbzoneamento ORDER BY tipo_zona DESC";


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