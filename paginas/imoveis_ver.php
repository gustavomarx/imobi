
<head>

<style>


	<? 
		include ('../site/imoveis/style.css'); 
		include ('../site/imoveis/css/responsive.css'); 
		include ('../site/css/bootstrap.min.css'); 
		include ('../site/css/bootstrap.css'); 
		include ('../site/css/bootstrap-multiselect.css'); 




	?>
	</style> 





	<script src="<?=($quemsomos['vimeo']);?>/site/imoveis/js/libs/modernizr-2.0.6.min.js"></script>
	 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> 
	<script>window.jQuery || document.write('<script src="<?=($quemsomos['vimeo']);?>/site/imoveis/js/libs/jquery-1.7.1.min.js"><\/script>')</script>

	<script src="<?=($quemsomos['vimeo']);?>/site/imoveis/js/plugins.js"></script>
	<script src="<?=($quemsomos['vimeo']);?>/site/imoveis/js/script.js"></script>



<link rel="stylesheet" href="http://imobiliaria7setembro.com.br/site/css/bootstrap.min.css">
<link rel="stylesheet" href="http://imobiliaria7setembro.com.br/site/css/bootstrap.css">
<script src="http://imobiliaria7setembro.com.br/site/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="http://imobiliaria7setembro.com.br/site/css/bootstrap-multiselect.css" type="text/css">
<script type="text/javascript" src="http://imobiliaria7setembro.com.br/site/js/bootstrap-multiselect.js"></script>

</head>





<div id="alinha-voltar">
  <div id="voltar">
    <a href="javascript:window.history.go(-1)"><img src="<?=($quemsomos['vimeo']);?>/voltar.png"></a>
  </div>
</div>

<?


if ($_GET['id']>0) {
	$busca = " AND id_galeria=".(int)$_GET['id'];
} else if ($_GET['categoria']>0) {
	$busca = " AND tbgalerias.id_galeria=".(int)$_GET['categoria'];
}

$dados = db_dados("
	SELECT 
		tbgalerias.*, tbloja_categorias.*, tbcursos.*, tbestado_categorias.*, tbconteudo_categorias.* ,
		DATE_FORMAT(tbgalerias.data,'%d/%m/%Y')  as data1
	FROM 
		tbgalerias
		LEFT JOIN tbloja_categorias ON (tbloja_categorias.id_categoria = tbgalerias.cidade)
		LEFT JOIN tbcursos ON (tbcursos.id_curso = tbgalerias.id_curso)
		LEFT JOIN tbestado_categorias ON (tbestado_categorias.id_estado = tbgalerias.estado)
		LEFT JOIN tbconteudo_categorias ON (tbconteudo_categorias.id_finalidade = tbgalerias.finalidade)
	WHERE 1
		".$busca." AND flag_status=1
	ORDER BY 
		data DESC
	LIMIT 1;
		");
	$dados['titulo']=str_replace('\\','',$dados['titulo']);
	$dados['texto']=str_replace('\\','',$dados['texto']);
	
	db_consulta('UPDATE tbgalerias SET contador=contador+1 WHERE id_galeria='.(int)$dados['id_galeria']." LIMIT 1");
	
?>
	
	
	
	
	
	
	<div id="main">
		<div class="width-container">

			<div id="container-sidebar">
				
				
				<div class="content-boxed">
					<h2 class="title-bg"><?=$dados['finalidade'];?> de <?=$dados['titulo'];?> <span>R$ <?=$dados['preco'];?></span></h2>
					
					
					
					
					<div class="property-listing-single">
						
						
					
						<div id="property-single-slider">
						<div id="slider" class="flexslider">
				          <ul class="slides">
				            

								<?
								  	$fotos = db_consulta("SELECT * FROM tbgalerias_fotos WHERE 1 ".$busca." AND flag_status=1 ORDER BY posicao ASC;");
									$i=0;
									if (db_linhas($fotos)>0) {
									while ($foto = db_lista($fotos)) { $i++;
								?>
								<li>
					  	    	    <a href="<?=utf8_decode($dadosconfig['url']);?>/arquivos/galeria/<?=$dados['codigo'];?>/fotos/<?=$foto['imagem'];?>" rel="prettyPhoto[gallery]">
										<img src="<?=utf8_decode($dadosconfig['url']);?>/arquivos/galeria/<?=$dados['codigo'];?>/fotos/<?=$foto['imagem'];?>" />
									</a>
					  	    	</li>
								 
								<?
								if (($i%7)==0) echo '';
								}
								?>
								<?
								} else echo '';

								  ?>
				
							
							
				          </ul>
				        </div>
						
						<div id="carousel" class="flexslider">
				          <ul class="slides">
								<?
								  	$fotos = db_consulta("SELECT * FROM tbgalerias_fotos WHERE 1 ".$busca." AND flag_status=1 ORDER BY posicao ASC;");
									$i=0;
									if (db_linhas($fotos)>0) {
									while ($foto = db_lista($fotos)) { $i++;
								?>
									<li>

											<img src="<?=utf8_decode($dadosconfig['url']);?>/arquivos/galeria/<?=$dados['codigo'];?>/miniaturas/<?=$foto['imagem'];?>" />

						  	    	</li>

								<?
								if (($i%7)==0) echo '';
								}
								?>
								<?
								} else echo '';

								  ?>
							 
							 
				          </ul>
				        </div>
				
						</div>
						<div class="clearfix"></div>
						<script type="text/javascript">
						jQuery(document).ready(function($) {
						    $(window).load(function(){
						      $('#carousel').flexslider({
						        animation: "slide",
						        controlNav: false,
						        animationLoop: false,
						        slideshow: false,
						        itemWidth: 145,
						        itemMargin: 15,
						        asNavFor: '#slider'
						      });

						      $('#slider').flexslider({
						        animation: "fade",
						        controlNav: false,
						        animationLoop: false,
						        slideshow: false,
						        sync: "#carousel",
						        start: function(slider){
						          $('body').removeClass('loading');
						        }
						      });
						    });
						});
						</script>
						
						
					</div>
					
					
					
					
					<p><?=($dados['conteudo']);?></p>


					<h5 class="additional-features-headline">Informações</h5>

					<br />
								
											<div class="listings-street-widget"><?=$dados['bairro'];?>, <?=$dados['categoria'];?> - <?=$dados['estado'];?></div>
											
											<div class="listings-price-widget"><?=$dados['finalidade'];?>: R$ <?=$dados['preco'];?></div>
											<div class="property-information-price">Código:<?=$dados['id_galeria'];?></div>

												<div class="clearfix"></div>

				
					
					
					<h5 class="additional-features-headline">Adicionais</h5>
					<ul class="additional-features">
								<?
								$i=0;
								$SQL = "SELECT 
												tbmaterias.*, liga_prof.* 
											FROM 
												tbmaterias
												LEFT JOIN liga_prof ON (liga_prof.id_materia = tbmaterias.id_materia) 
											WHERE liga_prof.id_galeria = ".(int)$_GET['id']."
											ORDER BY 
												tbmaterias.nome DESC
												";
								$Lista = new Consulta($SQL,999,$PGATUAL);
								while ($linha = db_lista($Lista->consulta)) { $i++;
								?>



			<li><?=($linha['nome']);?></li>



								<?
								}
								?>
					</ul>
					
					<div class="clearfix"></div>


				
					<div class="share-section-listing">
						<span class="share-text">Compartilhe este im&oacute;vel:</span>
						<script type="text/javascript">var switchTo5x=true;</script>
						<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
						<script type="text/javascript">stLight.options({publisher: "b779a7d6-8947-431e-8a89-abe575e1b4b0"}); </script>
						<span class='st_facebook' displayText='Facebook'></span>
						<span class='st_twitter' displayText='Twitter'></span>
						<span class='st_pinterest' displayText='Pinterest'></span>
						<span class='st_email' displayText='E-mail'></span>
						<span class="st_print"><a href="javascript:window.print()">Imprimir</a></span>
						<div class="clearfix"></div>
					</div>

					
					
					
				
				<div class="clearfix"></div>
				</div><!-- close .content-boxed -->
				
				
		</div>		
				
				
				
					<div id="sidebar">


						<div class="content-boxed">
							<h2 class="title-bg">Informa&ccedil;&otilde;es gerais</h2>
							<div id="sidebar-map">

							 <a href="<?=$dados['mapa'];?>&output=embed?iframe=true&width=90%25&height=90%25" rel="prettyPhoto"><img src="<?=($quemsomos['vimeo']);?>/mapa.png"></a>

								</div>
								<div id="more-map">
									<a href="https://maps.google.com.br/?ll=-16.337941,-48.951001&spn=0.008607,0.016522&t=h&z=17&output=embed?iframe=true&width=90%25&height=90%25" rel="prettyPhoto">Ver mapa &uarr;</a><!-- just plug in the address and leave other options alone -->
								</div>
								<div class="clearfix"></div>

								<div class="property-meta-single">
									
									<div class="listings-address-widget"><?=$dados['bairro'];?>, <?=$dados['categoria'];?> - <?=$dados['estado'];?></div>
									
									<div class="listings-price-widget"><?=$dados['finalidade'];?>: R$ <?=$dados['preco'];?></div>
									<div class="listings-price-widget">Código: <?=$dados['id_galeria'];?></div>				
								</div>

								<ul id="house-details-sidebar">
									<li>Finalidade: <span><?=$dados['finalidade'];?></span></li>
									<li>Banheiros:	<span><?=$dados['banho'];?></span></li>
									<li>Su&iacute;tes:	<span><?=$dados['suites'];?></span></li>
									<li>Dormitórios:	<span><?=$dados['quartos'];?></span></li>
									<li>Vagas:	<span><?=$dados['garagens'];?></span></li>
									<li>&Aacute;rea &uacute;til:	<span><?=$dados['area'];?></span></li>
						
								</ul>	
						</div><!-- close .content-boxed -->
				
				
				</div>
				 