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

?>
<?
include('../includes/Mensagem.php');
?>
                	<div class="conthead">
                        <h2>Carreiras</h2>
                    </div>
<div id="conteudo">
<a  id="btnalt" href="carreiras_dados.php"><img src="../img/add.png" align="absmiddle" /> Adicionar Nova carreira</a>
<br />
<br />
<?



	# Montando os campos
	$campos = array(
		#	0=>Tipo			1=>Título		2=>Fonte			3=>Url
		
		
		array('resumo',		'TÍTULO',		'titulo',		''),
		array('resumo',		'TEXTO',			'texto',		''),

	);


	# Consulta SQL
	$SQL = "SELECT
			tbloja.*, tbloja_categorias.* 
	
	FROM 	tbloja
			LEFT JOIN tbloja_categorias ON (tbloja_categorias.id_categoria = tbloja.id_categoria)

	ORDER BY tbloja.id_produto DESC";



	# Processando os dados
	$Lista = new Consulta($SQL,20,$PGATUAL);
	while ($linha = db_lista($Lista->consulta)) {
	$linha['id_categoria']=utf8_encode($linha['categoria']);
		$dados[] = $linha;
	}


	# Listando
	echo adminLista($campos,$dados,array('excluir','editar','flag_status'),$Config,true);



	# Paginação
	echo '<div class="paginacao">'.$Lista->geraPaginacao().'</div>';









?>
</div>
<? include('../includes/Rodape.php'); ?>