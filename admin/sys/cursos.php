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

?>
<?

$ondeestou = 'Galerias';
?>
                		<section>

						            	<header>
						                <a href="#menu" class="showmenu button">Menu</a>
										<h2 style="color:#fff; padding:0 20px">Imóveis</h2>
										</header>

					<div id="conteudo">
						        <section style="min-height:600px">
							
							
<a  id="btnalt" href="cursos_dados.php"><img src="../img/add.png" align="absmiddle" /> Adicionar novo imóvel</a>
<br />
<br />
<?
include('../includes/Mensagem.php');


	# Montando os campos
	$campos = array(
		#	0=>Tipo			1=>Título		2=>Fonte			3=>Url
		    array('texto',		'CODIGO',		'id_galeria',			''),
	        array('texto',		'BAIRRO',		'bairro',			''),
			array('texto',		'CORRETOR',		'id_corretor',			''),
			array('texto',		'FINALIDADE',	'finalidade',		''),
			array('texto',		'TÍTULO',		'titulo',			''),
			array('texto',		'VALOR',		'preco', 			''),
			array('texto',		'ENDERECO',		'endereco',			''),
			array('capa',		'FOTO CAPA2',		'codigo',			''),
			
 
	);

 
	# Consulta SQL
	#$SQL = "SELECT *, DATE_FORMAT(data,'%d/%m/%Y %H:%i') as data1 FROM tbnoticias  ORDER BY data DESC";


	$SQL = "SELECT 
				tbgalerias.*, tbconteudo_categorias.*, DATE_FORMAT(data,'%d/%m/%Y %H:%i') as data1
			FROM 
				tbgalerias
				LEFT JOIN tbconteudo_categorias ON (tbconteudo_categorias.id_finalidade = tbgalerias.finalidade)
				LEFT JOIN tbcorretores ON (tbcorretores.nome_corretor = tbgalerias.id_corretor)
			ORDER BY 
				tbgalerias.id_galeria DESC
			";

	# Processando os dados
	$Lista = new Consulta($SQL,20,$PGATUAL);
	while ($linha = db_lista($Lista->consulta)) {
	$linha['finalidade']=utf8_encode($linha['finalidade']);
      //POG - nome do corretor
      $corretor = mysql_query("SELECT * FROM tbcorretores WHERE id_corretor=".$linha['id_corretor']) or die("Erro ao buscar nome do corretor!");
      while($linhaCorretor=mysql_fetch_array($corretor)){
         $linha['id_corretor']=$linhaCorretor['nome_corretor'];
      }

    	$dados[] = $linha;
	}


/*    echo "<pre>";
    print_r($dados);
    echo "</pre>";
  */
	# Listando
    if ($_SESSION['Admin']['nome'] == 'Administrador'){
	echo adminLista($campos,$dados,array('excluir','editar','status','premium2','fotos'),$Config,false);
	}
	else
	{
	echo adminLista($campos,$dados,array('excluir','editar','status','fotos'),$Config,false);
    }


	# Paginação
	echo '<div class="paginacao">'.$Lista->geraPaginacao().'</div>';









?>
</div>
<? include('../includes/Rodape.php'); ?>
