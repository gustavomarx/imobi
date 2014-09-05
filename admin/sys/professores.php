<? 
	define('ID_MODULO',37,true);
	include('../includes/Config.php');
	include('../includes/Topo.php');
	

	$Config = array(
		'arquivo'=>'professores',
		'tabela'=>'tbmaterias',
		'titulo'=>'titulo',
		'id'=>'id_materia',
		'urlfixo'=>'', 
		'pasta'=>'materias',
	);

?>

		 <section>

		            	<header>
		                <a href="#menu" class="showmenu button">Menu</a>
						<h2 style="color:#fff; padding:0 20px">Adicionais / Características do imóvel</h2>
						</header>

	<div id="conteudo">
		        <section style="min-height:600px">
<a  id="btnalt" href="professores_dados.php"><img src="../img/add.png" align="absmiddle" /> Adicionar novo adicional</a>
<br />
<br />
<?


include('../includes/Mensagem.php');



	# Montando os campos
	$campos = array(
		#	0=>Tipo			1=>Título		2=>Fonte			3=>Url
		array('texto',		'NOME',		'nome',			''),
 
	);


	# Consulta SQL
	#$SQL = "SELECT *, DATE_FORMAT(data,'%d/%m/%Y %H:%i') as data1 FROM tbmaterias  ORDER BY data DESC";


	$SQL = "SELECT 
				tbmaterias.*, tbmaterias_categorias.*, DATE_FORMAT(data,'%d/%m/%Y %H:%i') as data1
			FROM 
				tbmaterias
				LEFT JOIN tbmaterias_categorias ON (tbmaterias_categorias.id_categoria = tbmaterias.id_categoria) 
			ORDER BY 
				tbmaterias.data DESC
			";


	# Processando os dados
	$Lista = new Consulta($SQL,20,$PGATUAL);
	while ($linha = db_lista($Lista->consulta)) {
		$linha['categoria']=utf8_encode($linha['categoria']);
		$dados[] = $linha;
	}


	# Listando
	echo adminLista($campos,$dados,array('excluir','editar'),$Config,true);



	# Paginação
	echo '<div class="paginacao">'.$Lista->geraPaginacao().'</div>';









?>
</div>
<? include('../includes/Rodape.php'); ?>