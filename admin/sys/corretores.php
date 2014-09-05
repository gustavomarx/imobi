<? 
	define('ID_MODULO',31,true);
	include('../includes/Config.php');
	include('../includes/Topo.php');
	

	$Config = array(
		'arquivo'=>'corretores',
		'tabela'=>'tbcorretores',
		'titulo'=>'corretor',
		'id'=>'id_corretor',
		'urlfixo'=>'', 
		'pasta'=>'corretores',
	);

?>
<?

?>
              	  <section>

				            	<header>
				                <a href="#menu" class="showmenu button">Menu</a>
								<h2 style="color:#fff; padding:0 20px">Tipo de imóvel</h2>
								</header>

			<div id="conteudo">
				        <section style="min-height:600px">

<a  id="btnalt" href="corretores_dados.php"><img src="../img/add.png" align="absmiddle" /> Adicionar novo</a>
<br />
<br />

<?

 
include('../includes/Mensagem.php');

	# Montando os campos
	$campos = array(
		#	0=>Tipo			1=>Título		2=>Fonte			3=>Url
		array('texto',		'Nome do Corretor',		'nome_corretor',			''),
	);


	# Consulta SQL
	$SQL = "SELECT * FROM tbcorretores ORDER BY nome_corretor DESC";


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