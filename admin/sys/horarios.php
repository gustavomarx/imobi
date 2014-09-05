<? 
	define('ID_MODULO',44,true);
	include('../includes/Config.php');
	include('../includes/Topo.php');
	

	$Config = array(
		'arquivo'=>'horarios',
		'tabela'=>'tbdownloads',
		'titulo'=>'local',
		'id'=>'id_download',
		'urlfixo'=>'', 
		'pasta'=>'loja',
	);

?>
<?
include('../includes/Mensagem.php');
?>
                	<div class="conthead">
                        <h2>Horarios</h2>
                    </div>
<div id="conteudo">
<a  id="btnalt" href="horarios_dados.php"><img src="../img/add.png" align="absmiddle" /> Adicionar Nova turma</a>
<br />
<br />
<?



	# Montando os campos
	$campos = array(
		#	0=>Tipo			1=>Título		2=>Fonte			3=>Url
		
		
		array('resumo',		'CURSOS ABERTOS',		'titulo',		''),
 

	);


	# Consulta SQL
	$SQL = "SELECT
			tbdownloads.*, tbgalerias.* 
	
	FROM 	tbdownloads
			LEFT JOIN tbgalerias ON (tbgalerias.id_galeria = tbdownloads.curso)

	ORDER BY tbdownloads.id_download DESC";



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