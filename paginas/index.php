<? 
	include ('../includes/BancoDeDados.php'); 
	include ('../includes/Funcoes.php'); 
	include ('../includes/Config.php'); 
	include ('../includes/Imagens.php'); 
	include ('../includes/Validacoes.php');
	
	$datavisita=date("d/m/Y");
	if ($consultavisita = db_dados( "SELECT * FROM visitantes WHERE data=".$datavisita."")) db_consulta('UPDATE visitantes SET contador=contador+1 WHERE data='.$datavisita." LIMIT 1");
	else { db_consulta("INSERT INTO visitantes (contador, data) VALUES (1, ".$datavisita.")"); }

?>
<?
# Configurações
$dadosconfig = db_dados( "SELECT * FROM tbconfiguracoes WHERE id_config=1");
$quemsomos = db_dados("SELECT * FROM tbdepartamentos WHERE id_departamentos=150 LIMIT 1");
?>


<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>  <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?=($quemsomos['titulo']);?></title>
	<meta name="description" content="imóveis, imobiliaria, <?=($quemsomos['titulo']);?>, aluguel, casa, apartamento, temporada, venda, lancamentos, corretores">
	<meta name="viewport" content="width=device-width">
	
	<style>
	<? 
		include ('../site/imoveis/style.css'); 
		include ('../site/imoveis/css/responsive.css'); 
	?>
	</style>

	<link href='http://fonts.googleapis.com/css?family=PT+Sans:700%7COpen+Sans:600' rel='stylesheet' type='text/css'><!-- Custom Google Fonts -->

	<script src="<?=($quemsomos['vimeo']);?>/site/imoveis/js/libs/modernizr-2.0.6.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="<?=($quemsomos['vimeo']);?>/site/imoveis/js/libs/jquery-1.7.1.min.js"><\/script>')</script>

	<script src="<?=($quemsomos['vimeo']);?>/site/imoveis/js/plugins.js"></script>
	<script src="<?=($quemsomos['vimeo']);?>/site/imoveis/js/script.js"></script>
	
</head>
<body>	
	<div class="header-top">
		<div class="width-container">
			<div class="header-top-left">
				<span class="phone-header-top"><?=($quemsomos['youtube']);?></span>
				<a href="mailto:<?=($quemsomos['email']);?>" class="email-header-top"><?=($quemsomos['email']);?></a>
			</div><!-- close .header-top-left -->
			<div class="social-icons">
					<a class="facebook" href="<?=($quemsomos['facebook']);?>" target="_blank">F</a>
					<a class="twitter" href="<?=($quemsomos['twitter']);?>" target="_blank">t</a>
					<a class="google" href="<?=($quemsomos['google']);?>" target="_blank">g</a>
					 
			</div><!-- close .social-icons -->
		<div class="clearfix"></div>
		</div><!-- close .width-container -->
	</div>
	
	<header>
		<div class="header-border-top"></div>
		<div class="width-container">
			
			<h1 id="logo"><a href="<?=($quemsomos['vimeo']);?>"><img src="<?=($quemsomos['vimeo']);?>/site/imoveis/images/logo.png" alt="<?=($quemsomos['titulo']);?>"></a></h1>
			
			<nav>
				<ul class="sf-menu">
					<li>
						<a href="<?=($quemsomos['vimeo']);?>/home">Home</a>
					</li>
					 <li>
						<a href="<?=($quemsomos['vimeo']);?>/site/?p=imoveis">Imóveis</a>
					<ul>
							<?
							$i=0;
							$SQL = "SELECT * FROM tbconteudo_categorias ORDER BY finalidade DESC";
							$Lista = new Consulta($SQL,99,$PGATUAL);
							while ($linha = db_lista($Lista->consulta)) { $i++;
							?>

							<li><a href="<?=($quemsomos['vimeo']);?>/site/?p=imoveis&c=<?=$linha['id_finalidade'];?>"><?=($linha['finalidade']);?></a></li>
							<?
							}
							?>
							<li><a href="<?=($quemsomos['vimeo']);?>/site/?p=imoveis">Todos</a></li>
							
					  	</ul>
					</li>
					
					<li>
						<a href="#">Empresa</a>
					<ul>
					<?
					$i=0;
					$SQL = "SELECT * FROM tblinks ORDER BY titulo DESC";
					$Lista = new Consulta($SQL,99,$PGATUAL);
					while ($linha = db_lista($Lista->consulta)) { $i++;
					?>

					<li><a href="<?=($quemsomos['vimeo']);?>/pagina/<?=$linha['id_link'];?>/<?=(nomeArquivo($linha['titulo']));?>"><?=($linha['titulo']);?></a></li>
					<?
					}
					?>
					</ul>
				</li>
				
					<li>
						<a href="<?=($quemsomos['vimeo']);?>/site/?p=blog">Blog</a>
					</li>
					<li>
						<a href="<?=($quemsomos['vimeo']);?>/contato">Contato</a>
					</li>
				</ul>
			</nav>
			
		<div class="clearfix"></div>
		</div><!-- close .width-container -->
		<div class="header-border-bottom"></div>
	</header>
	
	<div id="search-container">
		<div class="width-container">
			<form method="get" class="searchform" action="<?=($quemsomos['vimeo']);?>/site/">
				<input type="hidden" name="p" value="busca" />
				<label for="s" class="assistive-text">Pesquisar:</label>
				<input type="text" class="field" name="palavra" id="s" placeholder="Ex. apartamento em brasília" />
				<input type="submit" class="submit" id="searchsubmit" value="Buscar" />
				
				<div class="clearfix"></div>
			 
			</form>
		</div><!-- close width-container -->
		
		
		
	<div class="clearfix"></div>
	</div><!-- close #search-container -->

 

	
	



		<?
				// Inclusão das páginas do portal
				include ('secoes.php');
		?>







			
			<div id="sidebar">
				
				
			
				
				
				
				
				
				
				<div class="content-boxed">
					<h2 class="title-bg">Catálogo de imóveis</h2>
					<ul>
						<?
						$i=0;
						$SQL = "SELECT * FROM tbcursos ORDER BY curso ASC";
						$Lista = new Consulta($SQL,99,$PGATUAL);
						while ($linha = db_lista($Lista->consulta)) { $i++;
						?>

						<li><a href="<?=($quemsomos['vimeo']);?>/site/?p=imoveis&f=<?=$linha['id_curso'];?>"><?=($linha['curso']);?></a></li> 
						<?
						}
						?>
					</ul>
				</div><!-- close .content-boxed -->
				
				<div class="content-boxed">
					<h2 class="title-bg">Últimos</h2>
					<ul class="widget-listings">
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
											
										ORDER BY 
											tbgalerias.contador DESC
											";
							$Lista = new Consulta($SQL,4,$PGATUAL);
							while ($linha = db_lista($Lista->consulta)) { $i++;
							?>

							<li>
								<a href="<?=($quemsomos['vimeo']);?>/<?=$linha['id_galeria'];?>/<?=(nomeArquivo($linha['titulo']));?>">
								<div class="property-thumbnail">
									<img src="<?=($quemsomos['vimeo']);?>/arquivos/galeria/<?=($linha['codigo']);?>/capa.jpg" alt="<?=($linha['titulo']);?>">
								</div>
								<div class="property-meta">
									<div class="listings-address-widget"><?=$linha['endereco'];?></div>
									<div class="listings-street-widget"><?=$linha['categoria'];?> - <?=$linha['estado'];?></div>
									<div class="listings-price-widget">R$ <?=$linha['preco'];?></div>
								</div>
								<div class="clearfix"></div>
								</a>
							</li>
 

							<?
							}
							?>
					</ul>
					
					
				</div><!-- close .content-boxed -->
				
				<div class="content-boxed">
					<h2 class="title-bg">Social</h2>
					<div class="social-icons-widget">

						<a  href="<?=($quemsomos['facebook']);?>" target="_blank" class="social-facebook">Facebook</a>
						<a href="<?=($quemsomos['twitter']);?>" target="_blank" class="social-twitter">Twitter</a>
						<a href="<?=($quemsomos['google']);?>" target="_blank" class="social-google">google</a>
	 
						<div class="clearfix"></div>
						
					</div><!-- close .social-icons -->
				</div><!-- close .content-boxed -->
				

				
				<div class="content-boxed">
					<h2 class="title-bg">Últimos</h2>
					<ul class="widget-listings">
								<?
		
				if ($_GET['id']>0) {
					$busca = " AND id_noticia=".(int)$_GET['id'];
				} else if ($_GET['categoria']>0) {
					$busca = " AND tbnoticias.id_categoria=".(int)$_GET['categoria'];
				}

				$i=0;
				$SQL = " SELECT
						tbnoticias.*,
						DATE_FORMAT(tbnoticias.data,'%d/%m/%Y')  as data1 ,
						tbnoticias_categorias.*
					FROM 
						tbnoticias
						INNER JOIN tbnoticias_categorias ON (tbnoticias_categorias.id_categoria = tbnoticias.id_categoria)
					WHERE 1
						".$busca."
					ORDER BY 
						data DESC
						";	
						
			if ($_GET['categoria']>0) {
?>
<?

	$Lista = new Consulta($SQL,3,$PGATUAL);
	while ($linha = db_lista($Lista->consulta)) { $i++;
?>

							<li>
								<a href="<?=utf8_decode($dadosconfig['url']);?>/site/?p=blog&id=<?=$linha['id_noticia'];?>"> 
								<div class="property-thumbnail">
									<? if (strlen($linha['imagem'])>0)  { ?>  
							         <a href="<?=utf8_decode($dadosconfig['url']);?>/site/?p=blog&id=<?=$linha['id_noticia'];?>"><img src="<?=utf8_decode($dadosconfig['url']);?>/img.php?img=arquivos/noticias/<?=$linha['imagem'];?>&x=60&y=60&corta=0"/></a> 
							    <? } else {  } ?>
								</div>
								<div class="property-meta">
									<h3><?=($linha['titulo']);?></h3>
								</div>
								<div class="clearfix"></div>
								</a>
							</li>
 

							<?
							}
							?>
					</ul>
					
					
				</div><!-- close .content-boxed -->

				
				
				
				<div class="clearfix"></div>
				
			</div><!-- close #sidebar -->
			
			
			
			
			
			
		<div class="clearfix"></div>
		</div><!-- close .width-container -->
	</div><!-- close #main -->


	<footer>
		<div class="width-container">
				
				<div class="grid4column">
					<h4><?=($quemsomos['titulo']);?></h4>
					<?=($quemsomos['texto']);?>
				</div>
				
				<div class="grid4column">
					<h4>Catálogo de imóveis</h4>
					<ul>
						<?
						$i=0;
						$SQL = "SELECT * FROM tbcursos ORDER BY curso ASC";
						$Lista = new Consulta($SQL,99,$PGATUAL);
						while ($linha = db_lista($Lista->consulta)) { $i++;
						?>

						<li><a href="<?=($quemsomos['vimeo']);?>/site/?p=imoveis&f=<?=$linha['id_curso'];?>"><?=($linha['curso']);?></a></li> 
						<?
						}
						?>
					</ul>
				</div>
				
				<div class="grid4column">
					<h4>Empresa</h4>
					<ul>
						<?
						$i=0;
						$SQL = "SELECT * FROM tblinks ORDER BY titulo DESC";
						$Lista = new Consulta($SQL,99,$PGATUAL);
						while ($linha = db_lista($Lista->consulta)) { $i++;
						?>

						<li><a href="<?=($quemsomos['vimeo']);?>/pagina/<?=$linha['id_link'];?>/<?=(nomeArquivo($linha['titulo']));?>"><?=($linha['titulo']);?></a></li>
						<?
						}
						?>
						
					<li>
						<a href="<?=($quemsomos['vimeo']);?>/site/?p=blog">Blog</a>
					</li>
					<li>
						<a href="<?=($quemsomos['vimeo']);?>/contato">Contato</a>
					</li>
					</ul>
				</div>
				
				<div class="grid4column lastcolumn">
					<h4>Atendimento</h4>
					<div class="location-widget">
						<br><span>Telefone</span>: <?=($quemsomos['youtube']);?>
						<br><span>E-mail</span>: <a href="#"><?=($quemsomos['email']);?></a>
					</div>
				</div>
			
		<div class="clearfix"></div>
		</div><!-- close .width-container -->
		<div id="copyright">
			<div class="width-container">
				<span class="copyright-left">
				&copy; 2012 <?=($quemsomos['titulo']);?> - todos os direitos reservados. criado por <a href="" target="_blank">Weverson</a></span>
				<a href="#" id="scrollToTop">ir para o topo</a>
			<div class="clearfix"></div>
			</div><!-- close .width-container -->	
		</div><!-- close #copyright -->

	</footer>

</body>
</html>