<?


if ($_GET['g']>0) {
	$tipo = " AND tbgalerias.id_zona=".(int)$_GET['g'];
} 


	$preco_imovel = $_GET['preco'];
	switch($preco_imovel){
		case '0-100000';
		$valor = 'AND preco < 100000';
		case '100000-200000';
		$valor = 'AND preco BETWEEN 100000 AND 200000';
		case '200000-300000';
		$valor = 'AND preco BETWEEN 200000 AND 300000';
		case '300000-400000';
		$valor = 'AND preco BETWEEN 300000 AND 400000';
		case '400000-500000';
		$valor = 'AND preco BETWEEN 400000 AND 500000';
		case '500000-600000';
		$valor = 'AND preco BETWEEN 500000 AND 600000';
		case '600000-800000';
		$valor = 'AND preco BETWEEN 600000 AND 800000';
		case '800000-1000000';
		$valor = 'AND preco BETWEEN 800000 AND 1000000';
		case '1000000-1200000';
		$valor = 'AND preco BETWEEN 1000000 AND 1200000';
		case '1200000-1400000';
		$valor = 'AND preco BETWEEN 1200000 AND 1400000';
		case '1400000-1500000';
		$valor = 'AND preco BETWEEN 1400000 AND 1500000';
		case '1500000-0';
		$valor = 'AND preco > 1500000';
		break;
		}

//POG -> combina玢o ->quarto<- "melhorar" no futuro com um FOR-combinatorio
//1, 2, 3 e 4
if($_GET['quarto1']>0 AND $_GET['quarto2']>0 AND $_GET['quarto3']>0 AND $_GET['quarto4']>0) {
	$busca = " AND tbgalerias.quartos=1 OR tbgalerias.quartos=2 OR tbgalerias.quartos=3 OR tbgalerias.quartos=4";
//1, 2 e 3
}elseif($_GET['quarto1']>0 AND $_GET['quarto2']>0 AND $_GET['quarto3']>0) {
	$busca = " AND tbgalerias.quartos=1 OR tbgalerias.quartos=2 OR tbgalerias.quartos=3";
//1, 2 e 4
}elseif($_GET['quarto1']>0 AND $_GET['quarto2']>0 AND $_GET['quarto4']>0) {
	$busca = " AND tbgalerias.quartos=1 OR tbgalerias.quartos=2 OR tbgalerias.quartos=4";
//2, 3 e 4
}if($_GET['quarto2']>0 AND $_GET['quarto3']>0 AND $_GET['quarto4']>0) {
	$busca = " AND tbgalerias.quartos=2 OR tbgalerias.quartos=3 OR tbgalerias.quartos=4";
//1 e 2
}elseif($_GET['quarto1']>0 AND $_GET['quarto2']>0) {
	$busca = " AND tbgalerias.quartos=1 OR tbgalerias.quartos=2";
//1 e 3
}elseif($_GET['quarto1']>0 AND $_GET['quarto3']>0) {
	$busca = " AND tbgalerias.quartos=1 OR tbgalerias.quartos=3";
//1 e 4
}elseif($_GET['quarto1']>0 AND $_GET['quarto4']>0) {
	$busca = " AND tbgalerias.quartos=1 OR tbgalerias.quartos=4";
//2 e 3
}elseif($_GET['quarto2']>0 AND $_GET['quarto3']>0) {
	$busca = " AND tbgalerias.quartos=2 OR tbgalerias.quartos=3";
//3 e 4
}elseif($_GET['quarto3']>0 AND $_GET['quarto4']>0) {
	$busca = " AND tbgalerias.quartos=3 OR tbgalerias.quartos=4";
//2 e 4
}elseif($_GET['quarto2']>0 AND $_GET['quarto4']>0) {
	$busca = " AND tbgalerias.quartos=2 OR tbgalerias.quartos=4";
//1
}elseif ($_GET['quarto1']>0) {
	$busca = " AND tbgalerias.quartos=1";
//2
}elseif ($_GET['quarto2']>0) {
	$busca = " AND tbgalerias.quartos=2";
//3
}elseif ($_GET['quarto3']>0) {
	$busca = " AND tbgalerias.quartos=3";
//4
}elseif ($_GET['quarto4']>0) {
	$busca = " AND tbgalerias.quartos=4";
}else{
	//echo "<script>alert('null');</script>";
}
if ($_GET['f']>0) {
	$busca = " AND tbgalerias.id_curso=".(int)$_GET['f'];
} 
	
if ($_GET['c']>0) {
		$busca1 = " AND tbgalerias.finalidade=".(int)$_GET['c'];
	}
	
if ($_GET['l']>0) {
		$busca2 = " AND tbgalerias.cidade=".(int)$_GET['l'];
	}
	
if (isset($_GET['m'])) {
	if($_GET['m']!='todos'){
		$busca3 = " AND tbgalerias.bairro LIKE '%".$_GET['m']."%'";
	}else{
		echo "<script>alert('passou3');</script>";
		$busca3 = "";
	} 
}


$dados0 = db_dados( "SELECT * FROM tbzoneamento WHERE id_zona=".(int)$_GET['g']);	
$dados = db_dados( "SELECT * FROM tbconteudo_categorias WHERE id_finalidade=".(int)$_GET['c']);
$dados1 = db_dados( "SELECT * FROM tbcursos WHERE id_curso=".(int)$_GET['f']);
$dados2 = db_dados( "SELECT * FROM tbloja_categorias WHERE id_categoria=".(int)$_GET['l']);
?>
<div id="main">
	<div class="width-container">
		
	 
	 
		
		
		<div id="container-sidebar">
			<div class="content-boxed">
				<h2 class="title-bg">Im贸veis: <?=$dados0['tipo_zona'];?> <?if ($_GET['c']>0) {echo "/";}?> <?=$dados['finalidade'];?> <?if ($_GET['f']>0) {echo "/";}?> <?=$dados1['curso'];?> <?if ($_GET['c']>0) {echo "/";}?> <?=$dados2['categoria'];?><?if (isset($_GET['m'])) {echo "/"; echo $_GET['m']; }?></h2>
				
				<?
				$i=0;
				$SQL = "SELECT 
								tbgalerias.*, tbloja_categorias.*, tbcursos.*, tbestado_categorias.*, tbconteudo_categorias.* ,
								DATE_FORMAT(tbgalerias.data,'%d/%m/%Y')  as data1
							FROM 
								tbgalerias
								LEFT JOIN tbloja_categorias ON (tbloja_categorias.id_categoria = tbgalerias.cidade)
								LEFT JOIN tbcursos ON (tbcursos.id_curso = tbgalerias.id_curso)
								LEFT JOIN tbestado_categorias ON (tbestado_categorias.id_estado = tbgalerias.estado)
								LEFT JOIN tbconteudo_categorias ON (tbconteudo_categorias.id_finalidade = tbgalerias.finalidade)
								WHERE 1
								    ".$tipo."
									".$busca."
									".$busca1."
									".$busca2."
									".$busca3."
									".$valor."
								 AND flag_status=1
							
							ORDER BY 
								tbgalerias.titulo DESC
								";
				$Lista = new Consulta($SQL,5,$PGATUAL);
				while ($linha = db_lista($Lista->consulta)) { $i++;
				?>

			 
				
					<div class="property-listing">

						<div class="property-listing-thumb">
							<div class="notification-listing"><?=$linha['curso'];?></div>
							<a href="<?=($quemsomos['vimeo']);?>/<?=$linha['id_galeria'];?>/<?=(nomeArquivo($linha['titulo']));?>"><img src="<?=($quemsomos['vimeo']);?>/arquivos/galeria/<?=($linha['codigo']);?>/capa.jpg" alt="<?=($linha['titulo']);?>"></a>
						</div>

						<div class="property-information">
							<div class="property-information-address"><a href="<?=($quemsomos['vimeo']);?>/<?=$linha['id_galeria'];?>/<?=(nomeArquivo($linha['titulo']));?>"><?=$linha['bairro'];?></a></div>
							<div class="property-information-location"><a href="<?=($quemsomos['vimeo']);?>/<?=$linha['id_galeria'];?>/<?=(nomeArquivo($linha['titulo']));?>"><?=$linha['categoria'];?> - <?=$linha['estado'];?></a></div>
							<div class="property-information-price"><a href="<?=($quemsomos['vimeo']);?>/<?=$linha['id_galeria'];?>/<?=(nomeArquivo($linha['titulo']));?>">R$ <?= number_format($linha['preco'],2,'.',',');?>teste</a></div>
							<div class="property-highlight">
								<div class="sq-highlight"><?=$linha['area'];?></div>
								<div class="bed-higlight"><?=$linha['quartos'];?> Dormit贸rios</div>
								<div class="bath-higlight"><?=$linha['suites'];?> Su铆tes</div>
							</div>
							<div class="property-highlight">
								<div class="garage-higlight"><?=$linha['garagens'];?> Vagas</div>
								<div class="time-higlight">Atualizado: <?=$linha['data1'];?></div>
							</div>
							<div class="property-highlight">
								<div class="property-information-price">C贸digo:<?=$linha['id_galeria'];?></div>
							</div>
							<div class="clearfix"></div>
						</div><!-- close property-information-->

						<div class="clearfix"></div>

						<div class="property-listing-base">
							<div class="grid2column">
								<div class="property-status">Im贸vel dispon铆vel para: <a href="#"><?=$linha['finalidade'];?></a></div>
								
							</div>
							<div class="grid2column lastcolumn">
								<a href="<?=($quemsomos['vimeo']);?>/<?=$linha['id_galeria'];?>/<?=(nomeArquivo($linha['titulo']));?>" class="button secondary-button">Ver im贸vel</a>
							</div>
							<div class="clearfix"></div>
							<hr>
						</div><!-- close .property-listing-base -->
					</div>
				
				
				
				<?
				}
				?>
				
				
				
				
			
				
			 
				



				
				
				
			
			<div class="clearfix"></div>
			</div><!-- close .content-boxed -->
			
			
			<div class="pagination"><?=$Lista->geraPaginacao();?></div>
		 
			
			
			
		</div><!-- close #container-sidebar --> 
