<? 
	include ('../includes/BancoDeDados.php'); 
	include ('../includes/Funcoes.php'); 
	include ('../includes/Config.php'); 
	include ('../includes/Imagens.php'); 
	include ('../includes/Validacoes.php');
	
	echo "
	<script type=\"text/javascript\" language=\"javascript\">
	
	function CarregaBairros(id_cidade){
		//alert(id_cidade);
		$.post('../admin/sys/carrega_bairros.php',{id:id_cidade},
			function(data){
				$('#recebendo').html(data);
			});
	}
	</script>";
	
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
					<a class="facebook" href="<?=($quemsomos['facebook']);?>" target="_blank"><img src="<?=($quemsomos['vimeo']);?>/site/imoveis/images/face.png"></a>
					 
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
						<a href="<?=($quemsomos['vimeo']);?>/home">Inicial</a>
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
						<a href="<?=($quemsomos['vimeo']);?>/site/?p=servicos">Serviços</a>
						
						 <ul>
						    <li>
							  <a target = "blank" href="http://www.google.com.br">2ª Via do boleto</a>
							</li>
							<li>
							  <a href="<?=($quemsomos['vimeo']);?>/site/?p=documentos">Formulários e Documentos</a>
							</li>
							<li>
							  <a href="<?=($quemsomos['vimeo']);?>/site/?p=cadastre">Cadastre seu Imóvel</a>
							</li>
							<li>
							  <a href="<?=($quemsomos['vimeo']);?>/site/?p=solicite">Solicite um Imóvel</a>
							</li>
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
	
<div class="nav-container">
<div class="nav">
	
	<div id="bg-filtro">
						
							<div id="filtro-topo">
							<form method="get" class="advanced-search-form" action="<?=($quemsomos['vimeo']);?>/site/">
<input type="hidden" name="p" value="imoveis" />
						 	
							<div id="ladodir">
								<select name="g" class="larg-select"> 
									<option value="" selected="selected">Tipo de Imóvel &nbsp&nbsp</option>
									<?
									$i=0;
									$SQL = "SELECT * FROM tbzoneamento ORDER BY tipo_zona DESC";
									$Lista = new Consulta($SQL,99,$PGATUAL);
									while ($linha = db_lista($Lista->consulta)) { $i++;
									?>

									<option value="<?=$linha['id_zona'];?>"><?=($linha['tipo_zona']);?></option>   
									<?
									}
									?>
								</select>

							</div>
							
							
							
							<div id="ladodir">
								<select name="c" class="larg-select"> 
									<option value="" selected="selected">Finalidade</option>
									<?
									$i=0;
									$SQL = "SELECT * FROM tbconteudo_categorias ORDER BY finalidade DESC";
									$Lista = new Consulta($SQL,99,$PGATUAL);
									while ($linha = db_lista($Lista->consulta)) { $i++;
									?>

									<option value="<?=$linha['id_finalidade'];?>"><?=($linha['finalidade']);?></option>   
									<?
									}
									?>
								</select>

							</div>
							
							<div id="ladodir">
								<select name="f" class="larg-select"> 
									<option value="" selected="selected">Todos os tipos</option> 
								 
									
									<?
									$i=0;
									$SQL = "SELECT * FROM tbcursos ORDER BY curso ASC";
									$Lista = new Consulta($SQL,99,$PGATUAL);
									while ($linha = db_lista($Lista->consulta)) { $i++;
									?>
                                     <option value="<?=$linha['id_curso'];?>"><?=($linha['curso']);?></option> 
								 
									<?
									}
									?>
								</select>

							</div>
							<div id="ladodir">
								<select name="l" id="selecione" class="larg-select" onchange="CarregaBairros(this.value)"> 
									<option value="0" selected="selected">Cidade</option> 
								 
									
									<?
									$i=0;
									$SQL = "SELECT * FROM tbloja_categorias ORDER BY categoria ASC";
									$Lista = new Consulta($SQL,99,$PGATUAL);
									while ($linha = db_lista($Lista->consulta)) { $i++;
									?>
                                    <option value="<?=$linha['id_categoria'];?>"><?=($linha['categoria']);?></option> 
								 
									<?
									}
									?>
								</select>

							</div>
							
							<div id="ladodir">
								<select name="m" id="recebendo" class="larg-select"> 
									<option value="" selected="selected"> Todos Bairros &nbsp&nbsp&nbsp&nbsp </option> 
								</select>

							</div>
							
							<div id="ladodir">
							    <select name="preco" class="larg-select">
									<option value="" selected="selected">Faixa de Valor</option>
									<option value="1">Até 100 mil</option>
									<option value="2">De 100 a 200 mil</option>
									<option value="3">De 200 a 300 mil</option>
									<option value="4">De 300 a 400 mil</option>
									<option value="5">De 400 a 500 mil</option>
									<option value="6">De 500 a 600 mil</option>
									<option value="7">De 600 a 800 mil</option>
									<option value="8">De 800 a 1 milhão</option>
									<option value="9">De 1 a 1.2 milhão</option>
									<option value="10">De 1.2 a 1.4 milhão</option>
									<option value="11">De 1.4 a 1.5 milhão</option>
									<option value="12">Acima de 1.5 milhão</option>
								</select>
							</div>
							
							<div id="ladodir"><input type="submit" class="submit-advanced" value="FILTRAR" /></div>

							<br>
							<div class="checkBoxes">
                              <label>Dormitorios</label>
                              <div style="float:left; position:relative;"><input type="checkbox" name="quarto1" value="1">&nbsp;1&nbsp;</div>
                              <div style="float:left; position:relative;"><input type="checkbox" name="quarto2" value="2">&nbsp;2&nbsp;</div>
                              <div style="float:left; position:relative;"><input type="checkbox" name="quarto3" value="3">&nbsp;3&nbsp;</div>
                              <div style="float:left; position:relative;"><input type="checkbox" name="quarto4" value="4">&nbsp;4&nbsp;</div>


							</div>
		
				 

							<div class="clearfix"></div>

						</form>

						</div><!-- close .social-icons -->
					</div><!-- close .content-boxed -->
	
	<div id="search-container" style='padding: 6px 0px;'>
		<div class="width-container">
          <div id="lado-a-lado1">
			<form method="get" class="searchform" action="<?=($quemsomos['vimeo']);?>/site/">
				<input type="hidden" name="p" value="busca" />
				<input type="text" class="field" name="palavra" id="s" placeholder="Ex. casa no centro" />
				<input type="submit" class="submit" id="searchsubmit" value="Buscar" />

<div id="lado-a-lado2">
			<form method="get" class="searchform" action="<?=($quemsomos['vimeo']);?>/site/">
				<input type="hidden" name="p" value="busca_codigo" />
				<input type="text" class="field" name="codigo" id="c" placeholder="Busca por Código do Imóvel" style/>
				<input type="submit" class="submit" id="searchsubmit" value="Buscar" />
				
			<!--	<div class="clearfix"></div> -->
			 
			</form>
          </div><!-- close lado-a-lado2 -->

				
			<!--	<div class="clearfix"></div> -->




			</form>
          </div><!-- close lado-a-lado1 -->

		</div><!-- close width-container -->
		
		
		
	<div class="clearfix"></div>
	</div><!-- close #search-container -->

</div><!-- close class="nav-container" -->
</div><!-- close class="nav" -->

	
	



		<?
				// Inclusão das páginas do portal
				include ('secoes.php');
		?>







			
			<div id="sidebar">
								
				
				<!--
				<div class="content-boxed">
					<h2 class="title-bg">Encontre</h2>
					<ul>
						//<?
						//$i=0;
						//$SQL = "SELECT * FROM tbcursos ORDER BY curso ASC";
						//$Lista = new Consulta($SQL,99,$PGATUAL);
						//while ($linha = db_lista($Lista->consulta)) { $i++;
						//?>

						//<li><a href="<?=($quemsomos['vimeo']);?>/site/?p=imoveis&f=<?=$linha['id_curso'];?>"><?=($linha['curso']);?></a></li> 
						//<?
						//}
						//?>
					</ul>
				</div> close .content-boxed -->
				
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
											WHERE flag_status=1
										ORDER BY 
											tbgalerias.id_galeria DESC
											";
							$Lista = new Consulta($SQL,15,$PGATUAL);
							while ($linha = db_lista($Lista->consulta)) { $i++;
							?>

							<li>
								<a href="<?=($quemsomos['vimeo']);?>/<?=$linha['id_galeria'];?>/<?=(nomeArquivo($linha['titulo']));?>">
								<div class="property-thumbnail">
									<img src="<?=($quemsomos['vimeo']);?>/arquivos/galeria/<?=($linha['codigo']);?>/capa.jpg" alt="<?=($linha['titulo']);?>">
								</div>
								<div class="property-meta">
									<div class="listings-address-widget"><?=$linha['bairro'];?></div>
									<div class="listings-street-widget"><?=$linha['categoria'];?> - <?=$linha['estado'];?></div>
									<div class="listings-price-widget">R$ <?php echo number_format($linha['preco'],2,',','.');?></div>
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
	 
						<div class="clearfix"></div>
						
					</div><!-- close .social-icons -->
				</div><!-- close .content-boxed -->
				

				
				<div class="content-boxed">
					<h2 class="title-bg">Blog</h2>
					<ul class="widget-listings">
								<?
		
			 

				$i=0;
				$SQL = " SELECT
						tbnoticias.*,
						DATE_FORMAT(tbnoticias.data,'%d/%m/%Y')  as data1 ,
						tbnoticias_categorias.*
					FROM 
						tbnoticias
						INNER JOIN tbnoticias_categorias ON (tbnoticias_categorias.id_categoria = tbnoticias.id_categoria)
				 
					ORDER BY 
						data DESC
						";	
						
			 
?>
<?

	$Lista = new Consulta($SQL,3,$PGATUAL);
	while ($linha = db_lista($Lista->consulta)) { $i++;
?>

							<li>
								<a href="<?=utf8_decode($dadosconfig['url']);?>/site/?p=blog&id=<?=$linha['id_noticia'];?>"> 
								<div class="property-thumbnail">
									<? if (strlen($linha['imagem'])>0)  { ?>  
							         <a href="<?=utf8_decode($dadosconfig['url']);?>/site/?p=blog&id=<?=$linha['id_noticia'];?>"><img src="<?=utf8_decode($dadosconfig['url']);?>/img.php?img=arquivos/noticias/<?=$linha['imagem'];?>&x=60&y=60&corta=0"/>
							    <? } else {  } ?>
								</div> </a> 
								<div class="property-meta">
								<a href="<?=utf8_decode($dadosconfig['url']);?>/site/?p=blog&id=<?=$linha['id_noticia'];?>">	<p><?=($linha['titulo']);?></p></a>
								</div>
								<div class="clearfix"></div>
								
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
					<span><?=($quemsomos['texto']);?></span>
					
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
						<span>Telefone</span>: <div id="fone"><?=($quemsomos['youtube']);?></div>
						<br><span>E-mail</span>: <a href="mailto:<?=($quemsomos['email']);?>" ><?=($quemsomos['email']);?></a>
					</div>
				</div>
			
		<div class="clearfix"></div>
		</div><!-- close .width-container -->
		<div id="copyright">
			<div class="width-container">
				<span class="copyright-left"><?=($quemsomos['titulo']);?>
			    - Todos os direitos reservados. Desenvolvido por <a href="http://www.haniger.com.br" target="_blank">Haniger</a></span></div>
		  <!-- close .width-container -->	
		</div><!-- close #copyright -->

	</footer>

</body>
</html>
